<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
// Route::get('/shop_main_category/{id}',[FrontendController::class, 'shop_main_category'])->name('shop_main_category');
Route::get('/shop_main_category/{id}',[FrontendController::class, 'shop_main_category'])->name('shop_main_category');
Route::get('/single_product/{id}',[FrontendController::class, 'single_product'])->name('single_product');
Route::get('/cart',[FrontendController::class, 'cart'])->name('cart');
Route::get('/checkout',[FrontendController::class, 'checkout'])->name('checkout');
Route::get('/about_us',[FrontendController::class, 'about_us'])->name('about_us');

Route::get('/profile',[FrontendController::class, 'profile'])->name('profile');
Route::get('/change_password',[FrontendController::class, 'change_password'])->name('change_password_view');
Route::get('/order',[FrontendController::class, 'order'])->name('order');

Route::get('/privacy_policy',[FrontendController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_and_conditions',[FrontendController::class, 'terms_and_conditions'])->name('terms_and_conditions');

Route::get('/register',[FrontendController::class, 'register'])->name('register_view');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::get('/login',[FrontendController::class, 'login'])->name('login_view');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/change_password',[AuthController::class, 'change_password'])->name('change_password');

Route::get('/admin',[FrontendController::class, 'admin_index'])->name('admin_index');
// Route::post('/shop/edit_profile',[ShopController::class,'shop_edit_profile'])->name('shop_edit_profile');

//Branch Route
Route::get('/admin/branch', [AdminController::class, 'branch'])->name('branch');
Route::get('/admin/branch/status/{id}', [AdminController::class, 'branch_status'])->name('branch_status');

// Catagory Route
Route::get('/admin/catagory', [AdminController::class, 'catagory'])->name('catagory');
Route::post('/admin/catagory/add', [AdminController::class, 'catagory_add'])->name('catagory_add');
Route::get('/admin/catagory/edit/{id}', [AdminController::class, 'catagory_edit']);
Route::put('/admin/catagory/update', [AdminController::class, 'catagory_update'])->name('catagory_update');
Route::delete('/admin/catagory/delete', [AdminController::class, 'catagory_delete'])->name('catagory_delete');
Route::get('/admin/catagory/status/{id}', [AdminController::class, 'catagory_status'])->name('catagory_status');

//Sub Catagory Route
Route::get('/admin/sub_catagory', [AdminController::class, 'sub_catagory'])->name('sub_catagory');
Route::post('/admin/sub_catagory/add', [AdminController::class, 'sub_catagory_add'])->name('sub_catagory_add');
Route::get('/admin/sub_catagory/edit/{id}', [AdminController::class, 'sub_catagory_edit']);
Route::put('/admin/sub_catagory/update', [AdminController::class, 'sub_catagory_update'])->name('sub_catagory_update');
Route::delete('/admin/sub_catagory/delete', [AdminController::class, 'sub_catagory_delete'])->name('sub_catagory_delete');
Route::get('/admin/sub_catagory/status/{id}', [AdminController::class, 'sub_catagory_status'])->name('sub_catagory_status');

//Product Route
Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
Route::post('/admin/product/add', [AdminController::class, 'product_add'])->name('product_add');
Route::get('/admin/product/edit/{id}', [AdminController::class, 'product_edit']);
Route::put('/admin/product/update', [AdminController::class, 'product_update'])->name('product_update');
Route::delete('/admin/product/delete', [AdminController::class, 'product_delete'])->name('product_delete');
Route::get('admin/product/status/{id}', [AdminController::class, 'product_status'])->name('product_status');

//Product Stock Route
Route::put('/admin/product/add_stock', [AdminController::class, 'add_product_stock'])->name('add_product_stock');

Route::get('/admin/product/image/{id}', [AdminController::class, 'product_img'])->name('product_img');
Route::get('/admin/product/description/{id}', [AdminController::class, 'product_description'])->name('product_description');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
