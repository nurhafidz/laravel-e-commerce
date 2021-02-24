<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publik\CartController;
use App\Http\Controllers\Publik\UserController;
use App\Http\Controllers\Admin\SaldoAdminController;

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
Route::get('city',[CartController::class, 'getCity']);
Route::get('district',[CartController::class, 'getDistrict']);
Route::get('cost/{id}', [CartController::class, 'getCourier']);
Route::post('cekresi', [CartController::class, 'waybill']);
Route::post('getinvoice', [UserController::class, 'getinvoice']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
