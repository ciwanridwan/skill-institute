<?php

use App\Http\Controllers\PesertaController;
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

Route::get('/test', function (){
	return view('peserta.trainings.continues.dashboard');
});
// Add Training
Route::get('/payment/{id}', 'AddUserTrainingController@create')->name('add-user-trainings');
Route::post('/store-add-training', 'AddUserTrainingController@store')->name('store-add-user-trainings');
Route::post('/payment/{id}', 'PaymentController@store')->name('payment');
Route::get('/button-create/{id}', 'AddUserTrainingController@buttonCreate')->name('button-create');

// PESERTA
Route::get('/', 'TrainingController@index')->name('trainings-index');
Route::get('/chart/add', 'ChartController@create')->name('add-chart');
Route::post('/chart/store-add', 'ChartController@store')->name('store-chart');
Route::get('/chart', 'ChartController@index')->name('index-chart');
Route::get('/chart/display', 'ChartController@displayChart')->name('display-chart');


// REGISTER
route::get('/register', 'PesertaController@register')->name('register-peserta');
route::post('/store-register', 'PesertaController@storeRegister')->name('store-register');

// LOGIN
route::get('/login', 'PesertaController@login')->name('login-peserta');
route::post('/store-login', 'PesertaController@storeLogin')->name('store-login');

// WEBINAR
route::get('/webinar', 'WebinarController@index')->name('webinar');
route::get('/webinar/details/{id}', 'WebinarController@details')->name('details-webinar');
route::get('/webinar/payment/{id}', 'PaymentController@paymentWebinar')->name('payment-webinar');

// TRAINING
route::get('/training', 'TrainingController@index')->name('trainings');
Route::group(['prefix' => 'training'], function () {
	route::get('/details/{id}', 'TrainingController@details')->name('training-details');
	route::get('/offline', 'TrainingController@trainingOffline')->name('training-offline');
	route::get('/online', 'TrainingController@trainingOnline')->name('training-online');
});

Route::group(['middleware' => 'peserta'], function () {
	Route::group(['prefix' => 'user'], function () {
		Route::get('/edit', 'PesertaController@edit')->name('edit-peserta');
		Route::get('/pelatihan', 'TrainingController@pesertaTraining')->name('user-training');
		Route::get('/pelatihan/history', 'TrainingController@historyTraining')->name('history-training');
		Route::get('/webinar', 'WebinarController@pesertaWebinar')->name('user-webinar');
		Route::get('/dashboard', 'PesertaController@dashboard')->name('dashboard-peserta');
		Route::patch('/update', 'PesertaController@update')->name('update-peserta');
		Route::patch('/update-password', 'PesertaController@updatePassword')->name('update-password');
		Route::post('/logout', 'PesertaController@logoutUser')->name('logout-peserta');
		Route::get('/pelatihan/materi/{id}', 'TrainingController@startTraining')->name('dashboard-pelatihan');
		Route::get('pelatihan/sidebar/{id}', 'TrainingController@sidebar')->name('sidebar-pelatihan');
	});
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
	Route::get('/chart/peserta', 'ChartController@chartPeserta')->name('chart-peserta');

	// TRAINING
	Route::group(['prefix' => 'pelatihan'], function () {
		Route::get('/table', 'TrainingController@table')->name('data-training');
		Route::get('/create', 'TrainingController@create')->name('create-training');
		Route::post('/store', 'TrainingController@store')->name('store-training');
		Route::get('/edit/{id}', 'TrainingController@edit')->name('edit-training');
		Route::post('/update/{id}', 'TrainingController@update')->name('update-training');
		Route::post('/delete/{id}', 'TrainingController@destroy')->name('delete-training');

		//Popular Training
		Route::get('/popular', 'PopularTrainingController@index')->name('popular-training');
		Route::get('/popular/create', 'PopularTrainingController@create')->name('create-popular');
		Route::post('/popular/store', 'PopularTrainingController@store')->name('store-popular');
		Route::get('/popular/edit/{id}', 'PopularTrainingController@edit')->name('edit-populer');
		Route::post('/popular/update/{id}', 'PopularTrainingController@update')->name('update-populer');
		Route::post('/popular/delete/{id}', 'PopularTrainingController@destroy')->name('delete-populer');

		// Publish Training
		Route::get('/publish', 'PublishTrainingController@index')->name('publish-training');
		Route::post('/publish/{id}', 'PublishTrainingController@publish')->name('click-publish');
		Route::post('/unpublish/{id}', 'PublishTrainingController@unPublish')->name('click-unpublish');

		// Materi Training
		Route::group(['prefix' => 'materi'], function (){
			Route::get('/create/{id}', 'MateriPelatihanController@create')->name('create-quiz');
			Route::get('/index/{id}', 'MateriPelatihanController@index')->name('index-quiz');
			Route::post('/store', 'MateriPelatihanController@store')->name('store-quiz');
			Route::get('/edit/{id}', 'MateriPelatihanController@edit')->name('edit-quiz');
			Route::post('/update/{id}', 'MateriPelatihanController@update')->name('update-quiz');
			Route::post('/delete/{id}', 'MateriPelatihanController@destroy')->name('delete-quiz');
		});

		// Voucher Training
		Route::get('/voucher/create', 'VoucherTrainingController@index')->name('create-voucher');
		Route::post('/voucher/create/{id}', 'VoucherTrainingController@addVoucher')->name('store-create-voucher');
		// Route::get('/voucher/create/{id}', 'VoucherTrainingController@modalForm')->name('modal-form');
		Route::get('/voucher/create/{id}', 'VoucherTrainingController@create')->name('form-create-voucher');
		Route::get('/voucher/used', 'VoucherTrainingController@usedVoucher')->name('used-voucher');

		// LEVEL TRAINING
		Route::group(['prefix' => 'level-training'], function () {
			Route::get('/create', 'LevelTrainingController@create')->name('create-level');
			Route::post('/store', 'LevelTrainingController@store')->name('store-level');
			Route::get('/table', 'LevelTrainingController@index')->name('table-level');
			Route::get('/edit/{id}', 'LevelTrainingController@edit')->name('edit-level');
			Route::post('/update/{id}', 'LevelTrainingController@update')->name('update-level');
			Route::post('/delete/{id}', 'LevelTrainingController@destroy')->name('hapus-level');
		});

		// KATEGORI TRAINING
		Route::group(['prefix' => 'kategori'], function () {
			Route::get('/create', 'KategoriTrainingController@create')->name('create-kategori');
			Route::post('/store', 'KategoriTrainingController@store')->name('store-kategori');
			Route::get('/table', 'KategoriTrainingController@index')->name('table-kategori');
			Route::get('/edit/{id}', 'KategoriTrainingController@edit')->name('edit-kategori');
			Route::post('/update/{id}', 'KategoriTrainingController@update')->name('update-kategori');
			Route::post('/delete/{id}', 'KategoriTrainingController@destroy')->name('delete-kategori');
		});
	});

	// WEBINAR 
	Route::group(['prefix' => 'webinar'], function () {
		Route::get('/table', 'WebinarController@table')->name('table-webinar');
		Route::get('/create', 'WebinarController@create')->name('create-webinar');
		Route::post('/store', 'WebinarController@store')->name('store-webinar');
		Route::get('/edit/{id}', 'WebinarController@edit')->name('edit-webinar');
		Route::post('/update/{id}', 'WebinarController@update')->name('update-webinar');
		Route::post('/delete/{id}', 'WebinarController@destroy')->name('delete-webinar');
		Route::post('/publish/{id}', 'WebinarController@publishWebinar')->name('publish-webinar');
		Route::post('/unpublish/{id}', 'WebinarController@unPublishWebinar')->name('unpublish-webinar');
		Route::get('/published', 'WebinarController@indexPublish')->name('publish-index-webinar');
	});


	Route::group(['middleware' => 'auth'], function () {
		Route::resource('user', 'UserController', ['except' => ['show']]);
		Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
		Route::patch('/profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
		Route::patch('/profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	});

	Route::group(['middleware' => 'auth'], function () {
		Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	});
});
