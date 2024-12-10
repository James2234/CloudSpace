<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AuthController;

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
Route::get('/demo', [Controllers\DemoController::class, 'index']);
Route::post('/tokens/create', [AuthController::class, 'create']);
Route::post('/getCode',[AuthController::class,'getCode']);
Route::post('/login',[AuthController::class,'login'])->name('login');;
Route::post('/wechatLogin',[AuthController::class,'wechatLogin']);
Route::middleware('auth:api')->group(function () {
    Route::post('/getProfile', [AuthController::class, 'getProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/setUserInfo', [Controllers\UserController::class, 'setUserInfo']);
    Route::post('/publishRequirement', [Controllers\UserController::class, 'publishRequirement']);
    Route::get('/getPublishList', [Controllers\UserController::class, 'getPublishList']);

});
