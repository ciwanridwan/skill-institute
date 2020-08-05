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
	return view('trainings.index');
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
route::get('/webinar/details', 'WebinarController@details')->name('details-webinar');

// TRAINING
route::get('/trainings', 'TrainingController@index')->name('trainings');
route::get('/trainings/details/{id}', 'TrainingController@details')->name('training-details');

Route::group(['middleware' => 'peserta'], function() {
    Route::get('dashboard', 'PesertaController@dashboard')->name('dashboard-peserta');
});

// Route::get('/password-reset', 'MailController@sendEmailResetPassword');

Route::group(['prefix' => 'admin'], function () {
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');
	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('dashboard');
	Route::get('/data-peserta', 'PesertaController@index')->name('data-peserta');
	Route::get('/subscribe-peserta', 'PesertaController@subscribed')->name('subscribed-peserta');
	Route::get('/product/details', 'PesertaController@subscribed')->name('product-details');

	// TRAINING
	Route::group(['prefix' => 'pelatihan'], function (){
		Route::get('table', 'TrainingController@table')->name('data-training');
		Route::get('create', 'TrainingController@create')->name('create-training');
		Route::post('store', 'TrainingController@store')->name('store-training');
		Route::get('edit/{id}', 'TrainingController@edit')->name('edit-training');
		Route::post('update/{id}', 'TrainingController@update')->name('update-training');
		
		// LEVEL TRAINING
		Route::get('level-training/create', 'LevelTrainingController@create')->name('create-level');
		Route::post('level-training/store', 'LevelTrainingController@store')->name('store-level');
		Route::get('level-training/table', 'LevelTrainingController@index')->name('table-level');
		Route::get('level-training/edit/{id}', 'LevelTrainingController@edit')->name('edit-level');
		Route::post('level-training/update/{id}', 'LevelTrainingController@update')->name('update-level');

		// KATEGORI TRAINING
		Route::get('kategori/create', 'KategoriTrainingController@create')->name('create-kategori');
		Route::post('kategori/store', 'KategoriTrainingController@store')->name('store-kategori');
		Route::get('kategori/table', 'KategoriTrainingController@index')->name('table-kategori');
		Route::get('kategori/edit/{id}', 'KategoriTrainingController@edit')->name('edit-kategori');
		Route::post('kategori/update/{id}', 'KategoriTrainingController@update')->name('update-kategori');
	});

	// WEBINAR 
	Route::group(['prefix' => 'webinar'], function (){
		Route::get('table', 'WebinarController@table')->name('table-webinar');
		Route::get('create', 'WebinarController@create')->name('create-webinar');
		Route::post('store', 'WebinarController@store')->name('store-webinar');
		Route::get('edit/{id}', 'WebinarController@edit')->name('edit-webinar');
		Route::post('update/{id}', 'WebinarController@update')->name('update-webinar');
	});
	

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
