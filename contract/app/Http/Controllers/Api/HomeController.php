<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Http\Traits\ApiResponseTrait; /// pls don't user it
use App\Models\Contract;
use App\Models\ContractPerson;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
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

    /**
     * @var User
     */
    protected $userModel;

    /**
     * @param Contract $contract
     * @param ContractPerson $contractPerson
     * @param User $userModel
     */
    public function __construct(Contract $contract, ContractPerson $contractPerson, User $userModel)
    {
        $this->contractModel = $contract;
        $this->contractPersonModel = $contractPerson;
        $this->userModel = $userModel;
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function home()
    {
        $acceptedContracts = $this->contractModel->where('status','A')->count();
        $pendingContracts = $this->contractModel->where('status','P')->count();
        $rejectedContracts = $this->contractModel->where('status','R')->count();
        $closedContracts = $this->contractModel->where('status','C')->count();

        $users = $this->userModel->user()->count();
        $sheikhs = $this->userModel->sheikh()->count();

        $data = [
            'acceptedContracts'=> $acceptedContracts,
            'pendingContracts'=> $pendingContracts,
            'rejectedContracts'=> $rejectedContracts,
            'closedContracts'=> $closedContracts,
            'users' => $users,
            'sheikhs' => $sheikhs
        ];

//        return $this->apiResponse($data,true,100002,200,"Dashboard Statistics Listed successfully"); // don't user it before
        return $this->apiResponse(__('api.Listed_successfully'), $data );
    }
}
