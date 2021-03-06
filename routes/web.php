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

Route::get('/success', 'CartController@success')->name('success');

Route::middleware('auth')
    ->group(function(){
        Route::get('/cart', 'CartController@index')->name('cart');
        Route::post('/cart/{id}', 'CartController@delete')->name('cart-delete');
        
        Route::post('/checkout', 'CheckoutController@process')->name('checkout');
        Route::get('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');
        Route::get('/dashboard/products/create', 'DashboardProductController@create')->name('dashboard-product-create');
        Route::post('/dashboard/products/create', 'DashboardProductController@store')->name('dashboard-product-store');
        Route::get('/dashboard/products/{id}', 'DashboardProductController@detail')->name('dashboard-product-detail');
        Route::post('/dashboard/products/{id}', 'DashboardProductController@update')->name('dashboard-product-update');

        Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')->name('dashboard-product-gallery-upload');
        Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')->name('dashboard-product-gallery-delete');

        Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transactions');
        Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@detail')->name('dashboard-transactions-detail');
        Route::post('/dashboard/transactions/{id}', 'DashboardTransactionController@update')->name('dashboard-transactions-update');

        Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-setting-store');
        Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-setting-account');
        Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')->name('dashboard-setting-redirect');

    });



// ->middleware(['auth','admin'])
Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
    });