<?php

namespace App\Http\Controllers\Api;

use App\Events\AcceptAppEvent;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPerson;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ContractRequest;
use App\Http\Requests\LanguageRequest;
use App\Http\Requests\quranDateRequest;
use App\Models\User;
use App\Events\SubmitAppEvent;
use PHPUnit\Exception;
use App\Http\Resources\ContractResource;
use App\Http\Resources\QuranDateResource;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
/**
 * @author Ahmed Mohamed
 */
class ContractController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var Contract
     */
    protected $contractModel;

    /**
     * @var ContractPerson
     */
    protected $contractPersonModel;


    protected $uploadFiles;

    /**
     * @param Contract $contract
     * @param ContractPerson $contractPerson
     * @param UploadFilesController $uploadFilesController
     */
    public function __construct(Contract $contract, ContractPerson $contractPerson, UploadFilesController $uploadFilesController)
    {
        $this->contractModel = $contract;
        $this->contractPersonModel = $contractPerson;
        $this->uploadFiles = $uploadFilesController;
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->apiResponseValidation($validator);
        }

        $contracts = $this->contractModel->query()->get();

        return $this->apiResponse('successfully', $contracts);
    }

    /**
     * @return Application|Response|ResponseFactory
     */
    public function listWithStatus(){

        $contracts = Contract::query()

            ->when(request('status') === 'Accepted'

                || request('status') === 'Pending', function ($query){

                $query->whereStatus('A')->orWhere('status', 'P')->whenUser();

            })->when(request('status') === 'Rejected', function($query){

                $query->whereStatus('R');

            })->when(request('status') === 'Closed', function ($query){

                $query->whereStatus('C');
            })
            ->whenUser()
            ->latest('id')
            ->get();

        return $this->apiResponse('successfully', $contracts);
    }

    /**
     * @param ContractRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function create(ContractRequest $request)
    {
        // please make that in validation
        $contractCheck = $this->contractModel->where('user_id',Auth::id())->first();

        if (!is_null($contractCheck) && $request->user()->isUser()){
            $message = 'your already created contract before';
            return $this->apiResponse($message, null,'لقد قمت بانشاء عقد سابقا',422);
        }

        // return $this->apiResponse('successfully', $request->all());

        $persons = $request->post('data');
//        // dd(count($persons));
//        if(count($persons) !== 5){
//            return $this->apiResponse('person not valid', null, 'person count error', 422);
//        }

        $array = $this->preparePerson($persons);

        DB::beginTransaction();


        $contract = $this->contractModel->create([
            'quran_date' => $request->post('quran_date'),
            'is_mosque' => $request->post('is_mosque'),
            'quran_address' => $request->post('quran_address'),
            'deferred_dowry' => $request->post('deferred_dowry'),
            'prompt_dower' => $request->post('prompt_dower'),
            'terms' => $request->post('terms'),
            'user_id' => Auth::id(),
        ]);


        $contract->persons()->saveMany($array);

        $this->prepareFiles($contract, $request);  // upload all files

        // fire event to send mail ro admin & sheikh &user
        $users = User::query()->where('role_id',1)
            ->orWhere('role_id',2)
            ->get();

        SubmitAppEvent::dispatch($contract, $users);

        DB::commit();

        return $this->apiResponse('successfully', $contract->load('persons'));
    }

    /**
     * @param ContractRequest $request
     * @param $id
     * @return Application|ResponseFactory|Response
     */
    public function update(ContractRequest $request, $id)
    {

        $contract = $this->contractModel->find($id);

        if($contract->status === 'P'){

            $array = $this->preparePerson($request->post('data'));

            DB::beginTransaction();

            $contract->update([
                'quran_date' => $request->post('quran_date'),
                'is_mosque' => $request->post('is_mosque'),
                'quran_address' => $request->post('quran_address'),
                'user_id' => Auth::id()
            ]);

            if($contract->persons()){
                $contract->persons()->delete();
            }

            $contract->persons()->saveMany($array);

            $this->prepareFiles($contract, $request);

            DB::commit();

            return $this->apiResponse('successfully updated', $contract->load('persons'));
        }
        else{
            return $this->apiResponse('your contract in not open any more,you can not update', $contract->load('persons'));
        }
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function show(Request $request)
    {
        $contract = $this->contractModel
            ->whereId($request->post('contract_id'))
            ->with('persons')->first();

        return $this->apiResponse('successfully', new ContractResource($contract));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function updateStatus(Request $request): array
    {
        $contract = Contract::query()->find($request->post('contract_id'));
        if(!$contract){
            return [
                'data' => null,
                'status' => false,
                'status_code' => 400,
                'message' => 'this contract not exist'
            ];
        }
        else{
            $contract->update(['status' => $request->post('status')]);
            $userId = $contract->user_id;
            $user = User::whereId($userId)->first();
            $admins = User::query()->where('role_id',1)->get();
            AcceptAppEvent::dispatch($contract, $user, $admins);

            return [
                'data' => $contract,
                'status' => true,
                'status_code' => 200,
                'message' => 'status changed successfully'
            ];
        }
    }

      /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Request $request)
    {
        $contract = $this->contractModel
            ->query()->find($request->post('contract_id'))
            ->delete();

        return $this->apiResponse('successfully', $contract);
    }

    /**
     * @param $persons
     * @return array
     */
    private function preparePerson($persons): array
    {
        $array = [];

        foreach ($persons as $person){

            $data = [
                'first_name' => $person['first_name'],
                'last_name' => $person['last_name'],
                'middle_name' => $person['middle_name'],
                'email' => $person['email']?? null,
                'type' => $person['type'],
                'birth_date' => $person['birth_date'],
                'birth_place' => $person['birth_place'],
                'nationality' => $person['nationality'],
                'marital_status' => $person['marital_status'] ?? null,
                'profession' => $person['profession'],
                'address' => $person['address'],
                'phone_number' => $person['phone_number'],
                'kinship_degree' => $person['kinship_degree'] ?? null,
            ];

            $array[] = new $this->contractPersonModel($data);
        }

        return $array;
    }

    /**
     * @param $model
     * @param $request
     * @return
     */
    private function prepareFiles($model, $request)
    {
        $husbandFront = $request->post('husbandFront');
        $husbandBack = $request->post('husbandBack');
        $wifeFront = $request->post('wifeFront');
        $wifeBack = $request->post('wifeBack');
        $firstWitnessFront = $request->post('firstWitnessFront');
        $firstWitnessBack = $request->post('firstWitnessBack');
        $secondWitnessFront = $request->post('secondWitnessFront');
        $secondWitnessBack = $request->post('secondWitnessBack');
        $agentFront = $request->post('agentFront');
        $agentBack = $request->post('agentBack');
        $divorceCertificate = $request->post('divorceCertificate');
        $husbandDeathCertificate = $request->post('husbandDeathCertificate');

        try {
            if($husbandFront){
                $this->uploadFiles->uploadFile($model, $husbandFront, 'husbandFront');
            }

            if($husbandBack){
                $this->uploadFiles->uploadFile($model, $husbandBack, 'husbandBack');
            }

            if($wifeFront){
                $this->uploadFiles->uploadFile($model, $wifeFront, 'wifeFront');
            }

            if($wifeBack){
                $this->uploadFiles->uploadFile($model, $wifeBack, 'wifeBack');
            }

            if($firstWitnessFront){
                $this->uploadFiles->uploadFile($model, $firstWitnessFront, 'firstWitnessFront');
            }

            if($firstWitnessBack){
                $this->uploadFiles->uploadFile($model, $firstWitnessBack, 'firstWitnessBack');
            }

            if($secondWitnessFront){
                $this->uploadFiles->uploadFile($model, $secondWitnessFront, 'secondWitnessFront');
            }

            if($secondWitnessBack){
                $this->uploadFiles->uploadFile($model, $secondWitnessBack, 'secondWitnessBack');
            }

            if($secondWitnessBack){
                $this->uploadFiles->uploadFile($model, $secondWitnessBack, 'secondWitnessBack');
            }

            if($agentFront){
                $this->uploadFiles->uploadFile($model, $agentFront, 'agentFront');
            }

            if($agentBack){
                $this->uploadFiles->uploadFile($model, $agentBack, 'agentBack');
            }

            if($divorceCertificate) {
                $this->uploadFiles->uploadFile($model, $divorceCertificate, 'divorceCertificate');
            }

            if($husbandDeathCertificate) {
                $this->uploadFiles->uploadFile($model, $husbandDeathCertificate, 'husbandDeathCertificate');
            }

        }catch (Exception $exception){
            return $this->apiResponse('successfully', $exception);
        }
    }

    /**
     * @param LanguageRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function updateLanguage(LanguageRequest $request)
    {
        $user = User::whereId(Auth::id())->first();

        $user->update(
            ['lang' => $request->post('lang')]
        );

        return $this->apiResponse('successfully', $user);
    }

    public function updateQuranDate(quranDateRequest $request,$id)
    {
        $user = Auth::user();
        $contract = $this->contractModel->find($id);
        if ($user->role_id=='2'){
            $contract->update([
                'quran_date' => $request->quran_date,
                'updated_by' =>Auth::id()
            ]);
            return $this->apiResponse('successfully', $contract );

        }
        else{
            return $this->apiResponse('api.no_permission', $user);

        }

    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function listQuranDate()
    {
        $contracts = $this->contractModel
        ->whereNotNull('updated_by')
        ->with('contractOwner')
        ->get();

        return $this->apiResponse('successfully', QuranDateResource::collection($contracts));
    }

    public function checkContractExist(Request $request)
    {
      $contractCheck = $this->contractModel->where('user_id',Auth::id())->first();
      if (!is_null($contractCheck) && $request->user()->isUser()){
        $message = __('api.you_already_created_contract_before');
        return $this->apiResponse($message, 'true');
      }
        return $this->apiResponse(null, 'false' );
    }



    public function contractPdf($contractId)
    {
        $persons = ContractPerson::where('contract_id',$contractId)->get();
        // if($persons){
            $contract = Contract::whereId($contractId)->first();
            if($contract)
            {
                $array=[];
                foreach ($persons as $person){

                $data['client_information'] = [
                    'first_name' => $person['first_name'],
                    'last_name' => $person['last_name'],
                    'middle_name' => $person['middle_name'],
                    'email' => $person['email']?? null,
                    'type' => $person['type'],
                    'birth_date' => $person['birth_date'],
                    'birth_place' => $person['birth_place'],
                    'nationality' => $person['nationality'],
                    'marital_status' => $person['marital_status'] ?? null,
                    'profession' => $person['profession'],
                    'address' => $person['address'],
                    'phone_number' => $person['phone_number'],
                    'kinship_degree' => $person['kinship_degree'] ?? null,
                ];

                $array[] =$data;

            }
            // dd($array);


                $data['quran_date']             = $contract->quran_date;
                $data['is_mosque']                 = $contract->is_mosque;
                $data['quran_address']                = $contract->quran_address;

                $pdf = Pdf::loadView('pdf.contract',['data'=>$data,'array'=>$array]);

                if (ob_get_length() > 0) { ob_end_clean(); }


                $pdf->save(storage_path().'\app\public\filename.pdf');

                // $contract->addMedia(storage_path().'\app\public\filename.pdf')->toMediaCollection();
                return $pdf->download('pdfview.pdf');
                // File::delete(storage_path().'\app\public\filename.pdf');

                // return [
                //     'data'=>null,
                //     'status' => true,
                //     'status_code' => 200,
                //     'message' => "pdf downloaded successfully"
                // ];


            }

    }
}
