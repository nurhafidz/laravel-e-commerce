<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publik\HomeController;
use App\Http\Controllers\Publik\UserController;
use App\Http\Controllers\Publik\CartController;
use App\Http\Controllers\Publik\InboxPubController;
use App\Http\Controllers\Publik\InboxPubUController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\Publik\OTPController;
use App\Http\Controllers\Seller\StoreController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\AdminSellerController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Seller\SaldoController;
use App\Http\Controllers\Seller\PesananController;
use App\Http\Controllers\service\PenggunaController;
use App\Http\Controllers\service\PenjualController;
use App\Http\Controllers\Service\ProdukSellerController;
use App\Http\Controllers\Auth\GoogleController;


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

Route::get('/auth/google', [GoogleController::class,'redirectToGoogle']);
Route::get('/callback/google', [GoogleController::class,'handleGoogleCallback']);

Route::get('/search',[HomeController::class, 'search'])->name('pub.search');
Route::get('/detail-toko/{storename}',[HomeController::class, 'homestore'])->name('det.store');
Route::get('/c/{parent}',[HomeController::class, 'catmain'])->name('catmain.search');
Route::get('/c/{parent}/{child}',[HomeController::class, 'catchild'])->name('catchild.search');
Route::get('/otp/create',[OTPController::class, 'create']);
Route::get('/otp/test',[OTPController::class, 'test']);
Route::get('/otp/cek',[OTPController::class, 'checkstatus']);
Route::post('/otp/check',[OTPController::class, 'otpcheck']);
Route::get('/otp',[OTPController::class, 'index']);


Route::get('/test', function () {
    return view('welcome');
});
Route::get('/test2', function () {
    return view('index');
});
Route::get('/kertas', function () {
    return view('publik.print.index');
});
Route::get('/privacy-policy', function () {
    return view('privacy');
});
Route::get('/detailuser', [UserController::class, 'detail'])->name('detail.user');
Route::get('/detailuser/getcity/{id}', [UserController::class, 'getCity'] );
Route::get('/detailuser/getdistrict/{id}', [UserController::class, 'getDistrict'] );
Route::post('/detailuser/update/{id}', [UserController::class, 'detailupdate'])->name('detail.update');

Route::post('/keranjang/update', [CartController::class, 'updateCart'])->name('front.update_cart');

Route::get('/new-store',[StoreController::class, 'create'])->name('create.seller');
Route::post('new-store',[StoreController::class, 'store'])->name('store.seller');

Route::get('/inbox', [InboxPubController::class, 'index'])->name('inbox');
Route::get('/inbox/{id}', [InboxPubController::class, 'show'])->name('inbox.show');


Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
    Route::get('/inboxpub', [InboxPubUController::class, 'index'])->name('inbox2');
    Route::get('/inboxpub/{id}', [InboxPubUController::class, 'show'])->name('inbox.show2');
    Route::put('/tambakekeranjang', [CartController::class, 'addToCart'])->name('front.cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('front.checkout')->middleware('App\Http\Middleware\SellerandGuestcheck');
    Route::post('/processCheckout', [CartController::class, 'processCheckout'])->name('processCheckout')->middleware('App\Http\Middleware\SellerandGuestcheck');
    Route::get('/myorder', [UserController::class, 'myorder'])->name('myorder')->middleware('App\Http\Middleware\SellerandGuestcheck');
    Route::get('/myorder/detail/{orderid}', [UserController::class, 'orderdetail'])->name('myorder.detail')->middleware('App\Http\Middleware\SellerandGuestcheck');
    Route::put('/myorder/detail/{orderid}/changestatus', [UserController::class, 'changestatus'])->name('myorder.changestatus')->middleware('App\Http\Middleware\SellerandGuestcheck');
    Route::get('/profil', [UserController::class, 'show'] );
    Route::put('/profil/update', [UserController::class, 'update'] );
    Route::patch('/profil/update/image', [UserController::class, 'updateimage'] );
    Route::get('/profil', [UserController::class, 'show'] );
    Route::get('/payment/success', function () {
    return view('publik.payment.success');
    });
    Route::get('/payment/fail', function () {
        return view('publik.payment.fail');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'App\Http\Middleware\Sellercheck','middleware' =>'auth'], function () {
    Route::get('/dashboard/{storename}',[StoreController::class, 'index'])->name('dashboard.seller');
    Route::get('/seller/{storename}/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/seller/{storename}/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/seller/{storename}/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/seller/{storename}/product/{brandname}',[ProductController::class,'show'])->name('product.show');
    Route::put('/seller/{storename}/product/{id}/changestatus',[ProductController::class,'changestatus'])->name('product.changestatus');
    Route::get('/seller/{storename}/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/seller/{storename}/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/seller/{storename}/product/{id}/delete',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('/seller/{storename}/saldo',[SaldoController::class,'index'])->name('seller.saldo');
    Route::post('/seller/{storename}/saldo/create',[SaldoController::class,'create']);
    Route::get('/seller/{storename}/pesanan',[PesananController::class,'index'])->name('seller.pesanan');
    Route::get('/seller/{storename}/pesanan/{orderid}',[PesananController::class,'show'])->name('seller.pesanan.show');
    Route::get('/seller/{storename}/pesanan/{orderid}/print',[PesananController::class,'print'])->name('seller.pesanan.print');
    Route::get('/seller/{storename}/product/{brandname}/editproduk',[ProductController::class,'edit'])->name('product.editproduk');
    Route::post('/storereview/{iduser}/{orderid}',[UserController::class, 'storereview']);
    Route::get('/seller/{storename}/edit',[StoreController::class,'edit'])->name('store.edit');

});
Route::group(['middleware' => 'App\Http\Middleware\Maintenercheck','middleware' =>'auth'], function () {
    Route::get('/services/dashboard',[ServiceController::class,'index'] )->name('service.dashboard');
    Route::get('/services/pengguna',[PenggunaController::class,'index'] )->name('service.pengguna');
    Route::get('/services/pengguna/{id}',[PenggunaController::class,'show'] )->name('service.pengguna.show');
    Route::get('/services/seller',[PenjualController::class,'index'] )->name('service.seller.index');
    Route::get('/services/produk',[ProdukSellerController::class,'index'] )->name('service.produk');
    Route::get('/services/produk/{id}',[ProdukSellerController::class,'show'] )->name('service.produk.show');
    Route::get('/services/servicesellershow/{id}',[PenjualController::class,'show'] )->name('service.seller.show');
    Route::put('/services/seller/{id}/editstatus',[PenjualController::class,'editstatus'] )->name('service.seller.show.editstatus');
});
Route::group(['middleware' => 'App\Http\Middleware\Admincheck','middleware' =>'auth'], function () {
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
    Route::get('/admin/banner',[BannerController::class,'index'])->name('banner.index');
});
Route::group([
    'prefix' => 'wishlists',
], function () {
    Route::get('/',[WishlistsController::class,'index'])
         ->name('wishlists.wishlist.index');
    Route::get('/create',[WishlistsController::class,'create'])
         ->name('wishlists.wishlist.create');
    Route::get('/show/{wishlist}',[WishlistsController::class,'show'])
         ->name('wishlists.wishlist.show')->where('id', '[0-9]+');
    Route::get('/{wishlist}/edit',[WishlistsController::class,'edit'])
         ->name('wishlists.wishlist.edit')->where('id', '[0-9]+');
    Route::post('/',[WishlistsController::class,'store'])
         ->name('wishlists.wishlist.store');
    Route::put('wishlist/{wishlist}',[WishlistsController::class,'update'])
         ->name('wishlists.wishlist.update')->where('id', '[0-9]+');
    Route::delete('/wishlist/{wishlist}',[WishlistsController::class,'destroy'])
         ->name('wishlists.wishlist.destroy')->where('id', '[0-9]+');
});
