<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publik\HomeController;
use App\Http\Controllers\Publik\UserController;
use App\Http\Controllers\Publik\CartController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductController;

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
Route::get('/shop/{storename}/{slug}', [HomeController::class, 'show'])->name('shop.product');
Route::get('/keranjang', [CartController::class, 'listCart']);
Route::get('/checkout', function () {
    return view('publik.checkout');
});
Route::get('/shop', function () {
    return view('publik.shop');
})->name('shop');
Route::get('/profil', function () {
    return view('publik.profil.profil');
});
Route::get('/detailuser', [UserController::class, 'detail'])->name('detail.user');
Route::get('/detailuser/getcity/{id}', [UserController::class, 'getCity'] );
Route::get('/detailuser/getdistrict/{id}', [UserController::class, 'getDistrict'] );
Route::post('/detailuser/update/{id}', [UserController::class, 'detailupdate'])->name('detail.update');

Route::post('keranjang', [CartController::class, 'addToCart'])->name('front.cart');
Route::post('/keranjang/update', [CartController::class, 'updateCart'])->name('front.update_cart');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'App\Http\Middleware\Sellercheck'], function () {
    Route::get('/dashboard/{storename}',[StoreController::class, 'index'])->name('dashboard.seller');
    Route::get('/dashboard/{storename}/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/dashboard/{storename}/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/dashboard/{storename}/product/store',[ProductController::class,'store'])->name('product.store');
});