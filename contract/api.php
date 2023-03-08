<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ContractController;
use App\Http\Controllers\Api\UploadFilesController;
use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function (){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/verify', [AuthController::class , 'verifiedEmail']);
    Route::post('/forget-password' , [AuthController::class , 'forgetPassword'])
        ->name('user.forget-password');

    Route::post('/reset-password'  , [AuthController::class , 'resetPassword'])
        ->name('user.password.reset');
});


Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'admin'], function (){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('home', [HomeController::class, 'home']);

    // Note
    Route::post('contracts', [ContractController::class, 'index']);
    Route::post('contracts/update/{id}', [ContractController::class, 'update']);
    Route::post('contracts/status', [ContractController::class, 'updateStatus']);
    Route::post('contracts/show', [ContractController::class, 'show']);
    Route::post('contracts/destroy', [ContractController::class, 'destroy']);
    Route::get('contracts/list', [ContractController::class, 'listWithStatus']);
    Route::get('/activity/log'           , function(){
        return Activity::all();
    });
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'user'], function (){

    Route::post('contracts/create', [ContractController::class, 'create']);
    Route::post('contracts/update/{id}', [ContractController::class, 'update']);
    Route::post('contracts/upload/images/{id}', [UploadFilesController::class, 'uploadImage']);

});






