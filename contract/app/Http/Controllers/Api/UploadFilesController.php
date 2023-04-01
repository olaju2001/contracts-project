<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Models\TemporaryFile;
use App\Traits\FileUploadTrait;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Response;

class UploadFilesController extends Controller
{
    use ApiResponseTrait, FileUploadTrait;

    /**
     * @param $model
     * @param $folder
     * @param $collection
     * @return Application|ResponseFactory|Response|void
     */
    public function uploadFile($model, $folder, $collection)
    {
        $temporaryFile = TemporaryFile::where('folder', $folder)->first();

        if($temporaryFile){
            $path = storage_path('app/public/contracts/tmp/'. $folder .'/' .$temporaryFile->filename);

            $model->clearMediaCollection($collection);

            $model->addMedia($path)->toMediaCollection($collection);

            try {
                rmdir(storage_path('app/public/contracts/tmp/'. $folder));
            }catch (Exception  $e){

                return $this->apiResponse('successfully', $temporaryFile);
            }
            $temporaryFile->delete();
        }
    }

    /**
     * @param FileRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function uploadTemp(FileRequest $request)
    {
        $folder = $this->uploadFileTemp($request->file('data'));
        return $this->apiResponse('successfully', $folder);
    }

    /**
     * @param FileRequest $request
     * @return array
     */
    public function removeTemp(Request $request): array
    {
        $this->removeFileTemp($request->post('data'));
        return ['data' => 'remove done'];
    }
}
