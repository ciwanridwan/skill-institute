<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
	return view('shops.index');
});

// PESERTA
// route::get('dashboard', 'PesertaController@dashboard')->name('dashboard');

// REGISTER
route::get('/register', 'PesertaController@register')->name('register-peserta');
route::post('/store-register', 'PesertaController@storeRegister')->name('store-register');

// LOGIN
route::get('/login', 'PesertaController@login')->name('login-peserta');
route::post('/store-login', 'PesertaController@storeLogin')->name('store-login');

// WEBINAR
route::get('/webinar', 'WebinarController@index')->name('webinar');

// SHOP
route::get('/shop', 'ShopController@index')->name('shop');

// PRODUCT
route::get('/product-details', 'ProductController@details')->name('product');

Route::group(['middleware' => 'peserta'], function() {
    Route::get('dashboard', 'PesertaController@dashboard')->name('dashboard-peserta');
});

// Route::get('/password-reset', 'MailController@sendEmailResetPassword');

Route::group(['prefix' => 'admin'], function () {
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('dashboard');

	Route::group(['middleware' => 'auth'], function () {
		Route::resource('user', 'UserController', ['except' => ['show']]);
		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
		Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
		Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	});

	Route::group(['middleware' => 'auth'], function () {
		Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	});
});
