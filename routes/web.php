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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
