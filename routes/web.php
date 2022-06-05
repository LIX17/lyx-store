<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

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
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@register_post')->name('register-post');
Route::get('/register/success', 'AuthController@success')->name('register-success');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@login_post')->name('login-post');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');
Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');

Route::middleware('auth')->group(function(){
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/cart/{id}', 'CartController@delete')->name('cart-delete');
    Route::get('/success', 'CartController@success')->name('success');
    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    Route::get('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');
Route::get('/dashboard/products/add', 'DashboardProductController@create')->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', 'DashboardProductController@detail')->name('dashboard-product-detail');

Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@detail')->name('dashboard-transactions-detail');

Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-setting-store');
Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-setting-account');

// ->middleware(['auth','admin'])
Route::prefix('admin')->namespace('Admin')
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });