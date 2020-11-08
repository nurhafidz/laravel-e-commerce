<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publik\HomeController;
use App\Http\Controllers\Publik\UserController;
use App\Http\Controllers\Publik\CartController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\AdminSellerController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Seller\SaldoController;
use App\Http\Controllers\Seller\PesananController;
use App\Http\Controllers\service\PenggunaController;
use App\Http\Controllers\service\PenjualController;
use App\Http\Controllers\Service\ProdukSellerController;


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
Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout')->middleware('App\Http\Middleware\SellerandGuestcheck');
Route::post('/processCheckout', [CartController::class, 'processCheckout'])->name('processCheckout')->middleware('App\Http\Middleware\SellerandGuestcheck');
Route::get('/myorder/{id}', [UserController::class, 'myorder'])->name('myorder')->middleware('App\Http\Middleware\SellerandGuestcheck');
Route::get('/myorder/{id}/detail/{orderid}', [UserController::class, 'orderdetail'])->name('myorder.detail')->middleware('App\Http\Middleware\SellerandGuestcheck');
Route::put('/myorder/{id}/detail/{orderid}/changestatus', [UserController::class, 'changestatus'])->name('myorder.changestatus')->middleware('App\Http\Middleware\SellerandGuestcheck');
Route::get('/shop', function () {
    return view('publik.shop');
})->name('shop');
Route::get('/profil', function () {
    return view('publik.profil.profil');
});
Route::get('/payment/success', function () {
    return view('publik.payment.success');
});
Route::get('/payment/fail', function () {
    return view('publik.payment.fail');
});
// Route::get('/detail', function () {
//     return view('publik.profil.detail');
// });
Route::get('/detailuser', [UserController::class, 'detail'])->name('detail.user');
Route::get('/detailuser/getcity/{id}', [UserController::class, 'getCity'] );
Route::get('/detailuser/getdistrict/{id}', [UserController::class, 'getDistrict'] );
Route::post('/detailuser/update/{id}', [UserController::class, 'detailupdate'])->name('detail.update');

Route::post('keranjang', [CartController::class, 'addToCart'])->name('front.cart');
Route::post('/keranjang/update', [CartController::class, 'updateCart'])->name('front.update_cart');

Route::get('/new-store',[StoreController::class, 'create'])->name('create.seller');
Route::post('new-store',[StoreController::class, 'store'])->name('store.seller');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'App\Http\Middleware\Sellercheck'], function () {
    Route::get('/dashboard/{storename}',[StoreController::class, 'index'])->name('dashboard.seller');
    Route::get('/seller/{storename}/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/seller/{storename}/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/seller/{storename}/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/seller/{storename}/product/{brandname}',[ProductController::class,'show'])->name('product.show');
    Route::put('/seller/{storename}/product/{id}/changestatus',[ProductController::class,'changestatus'])->name('product.changestatus');
    Route::get('/seller/{storename}/saldo',[SaldoController::class,'index'])->name('seller.saldo');
    Route::get('/seller/{storename}/pesanan',[PesananController::class,'index'])->name('seller.pesanan');
    Route::get('/seller/{storename}/pesanan/{orderid}',[PesananController::class,'show'])->name('seller.pesanan.show');
});
Route::group(['middleware' => 'App\Http\Middleware\Maintenercheck'], function () {
    Route::get('/services/dashboard',[ServiceController::class,'index'] )->name('service.dashboard');
    Route::get('/services/pengguna',[PenggunaController::class,'index'] )->name('service.pengguna');
    Route::get('/services/pengguna/{id}',[PenggunaController::class,'show'] )->name('service.pengguna.show');
    Route::get('/services/seller',[PenjualController::class,'index'] )->name('service.seller.index');
    Route::get('/services/produk',[ProdukSellerController::class,'index'] )->name('service.produk');
    Route::get('/services/produk/{id}',[ProdukSellerController::class,'show'] )->name('service.produk.show');
    Route::get('/services/servicesellershow/{id}',[PenjualController::class,'show'] )->name('service.seller.show');
    Route::put('/services/seller/{id}/editstatus',[PenjualController::class,'editstatus'] )->name('service.seller.show.editstatus');
    Route::put('/services/produk/{id}/editstatus',[ProdukSellerController::class,'editstatus'] )->name('service.produk.show.editstatus');
    Route::put('/services/pengguna/{id}/editstatus',[PenggunaController::class,'editstatus'] )->name('service.pengguna.show.editstatus');
});
Route::group(['middleware' => 'App\Http\Middleware\Admincheck'], function () {
    Route::get('/admin/dashboard',[AdminController ::class, 'index'] )->name('admin.dashboard');
    Route::get('/admin/create',[AdminController ::class, 'create'] )->name('admin.create');
    Route::post('/admin/store',[AdminController ::class, 'store'] )->name('admin.store');

    Route::get('/admin/admin',[AdminAdminController::class, 'index'])->name('admin.admin.index');
    Route::get('/admin/admin/{id}/detail',[AdminAdminController::class, 'show'])->name('admin.admin.show');
    Route::put('/admin/admin/{id}/edit-status',[AdminAdminController::class, 'editstatus'])->name('admin.admin.edit.status');
    // Route::get('/admin/admin/{id}/edit',[AdminAdminController::class, 'edit'])->name('admin.admin.edit');
    Route::delete('/admin/admin/{id}/delete',[AdminAdminController::class, 'destroy'])->name('admin.admin.destroy');

    Route::get('/admin/seller',[AdminSellerController::class, 'index'])->name('admin.seller.index');
    Route::get('/admin/seller/{id}/detail',[AdminSellerController::class, 'show'])->name('admin.seller.show');
    Route::put('/admin/seller/{id}/edit-status',[AdminSellerController::class, 'editstatus'])->name('admin.seller.edit.status');
    // Route::get('/admin/seller/{id}/edit',[AdminSellerController::class, 'edit'])->name('admin.seller.edit');
    Route::delete('/admin/seller/{id}/delete',[AdminSellerController::class, 'destroy'])->name('admin.seller.destroy');

    Route::get('/admin/customer',[AdminCustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/admin/customer/{id}/detail',[AdminCustomerController::class, 'show'])->name('admin.customer.show');
    Route::put('/admin/customer/{id}/edit-status',[AdminCustomerController::class, 'editstatus'])->name('admin.customer.edit.status');
    // Route::get('/admin/customer/{id}/edit',[AdminCustomerController::class, 'edit'])->name('admin.customer.edit');
    Route::delete('/admin/customer/{id}/delete',[AdminCustomerController::class, 'destroy'])->name('admin.customer.destroy');

    Route::get('/admin/service',[AdminServiceController::class, 'index'])->name('admin.service.index');
    Route::get('/admin/service/{id}/detail',[AdminServiceController::class, 'show'])->name('admin.service.show');
    Route::put('/admin/service/{id}/edit-status',[AdminServiceController::class, 'editstatus'])->name('admin.service.edit.status');
    Route::get('/admin/service/{id}/edit',[AdminServiceController::class, 'edit'])->name('admin.service.edit');
    Route::delete('/admin/service/{id}/delete',[AdminServiceController::class, 'destroy'])->name('admin.service.destroy');
});