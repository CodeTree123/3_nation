<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[FrontendController::class, 'index'])->name('index');

Route::get('/header',[FrontendController::class, 'header'])->name('header');
Route::get('/footer',[FrontendController::class, 'footer'])->name('footer');
Route::get('/shop_main_category',[FrontendController::class, 'shop_main_category'])->name('shop_main_category');
Route::get('/single_product',[FrontendController::class, 'single_product'])->name('single_product');
Route::get('/cart',[FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout',[FrontendController::class, 'checkout'])->name('checkout');
Route::get('/about_us',[FrontendController::class, 'about_us'])->name('about_us');
Route::get('/profile',[FrontendController::class, 'profile'])->name('profile');
Route::get('/privacy_policy',[FrontendController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_and_conditions',[FrontendController::class, 'terms_and_conditions'])->name('terms_and_conditions');

Route::get('/register',[FrontendController::class, 'register'])->name('register_view');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::get('/login',[FrontendController::class, 'login'])->name('login_view');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/change_password',[AuthController::class, 'change_password'])->name('change_password');

Route::get('/admin',[FrontendController::class, 'admin_index'])->name('admin_index');
Route::post('/shop/edit_profile',[ShopController::class,'shop_edit_profile'])->name('shop_edit_profile');

Route::get('/shop/catagory', [ShopController::class, 'shop_catagory'])->name('shop_catagory');
Route::post('/shop/catagory/add', [ShopController::class, 'shop_catagory_add'])->name('shop_catagory_add');
Route::get('/shop/catagory/edit/{id}', [ShopController::class, 'shop_catagory_edit']);
Route::put('/shop/catagory/update', [ShopController::class, 'shop_catagory_update'])->name('shop_catagory_update');
Route::delete('/shop/catagory/delete', [ShopController::class, 'shop_catagory_delete'])->name('shop_catagory_delete');

Route::get('/shop/sub_catagory', [ShopController::class, 'shop_sub_catagory'])->name('shop_sub_catagory');
Route::post('/shop/sub_catagory/add', [ShopController::class, 'shop_sub_catagory_add'])->name('shop_sub_catagory_add');
Route::get('/shop/sub_catagory/edit/{id}', [ShopController::class, 'shop_sub_catagory_edit']);
Route::put('/shop/sub_catagory/update', [ShopController::class, 'shop_sub_catagory_update'])->name('shop_sub_catagory_update');
Route::delete('/shop/sub_catagory/delete', [ShopController::class, 'shop_sub_catagory_delete'])->name('shop_sub_catagory_delete');

Route::get('/shop/service', [ShopController::class, 'shop_service'])->name('shop_service');
Route::post('/shop/service/add', [ShopController::class, 'shop_service_add'])->name('shop_service_add');
Route::get('/shop/service/edit/{id}', [ShopController::class, 'shop_service_edit']);
Route::put('/shop/service/update', [ShopController::class, 'shop_service_update'])->name('shop_service_update');
Route::delete('/shop/service/delete', [ShopController::class, 'shop_service_delete'])->name('shop_service_delete');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
