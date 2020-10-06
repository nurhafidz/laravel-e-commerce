<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publik\HomeController;
use App\Http\Controllers\Publik\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.guest');
Route::get('/detail/{slug}', [HomeController::class, 'show']);
Route::get('/keranjang', function () {
    return view('orderlist');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/profil', function () {
    return view('profil.profil');
});
Route::get('/detailuser', [UserController::class, 'detail'])->name('detail.user');
Route::get('/detailuser/getregency/{id}', [UserController::class, 'getRegency'] );
Route::get('/detailuser/getdistrict/{id}', [UserController::class, 'getDistrict'] );
Route::get('/detailuser/getvillage/{id}', [UserController::class, 'getVillage']);
Route::post('/detailuser/update/{id}', [UserController::class, 'detailupdate'])->name('detail.update');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
