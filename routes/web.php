<?php

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

// Frontend

// Route::get('/', function () {
//     return view('welcome');
// });

// clear cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return "<h1 style='text-align: center;'>!!Cache cleared successfully!</h1>";
});

// Get the current database connection info
Route::get('/artisan-database', function() {
	try {
		print_r('databse name= '.DB::connection()->getDatabaseName());
	} catch (\Exception $e) {
		die("Could not connect to the database.  Please check your configuration. error:" . $e );
    }
});

Route::get('testpdf/', 'ItineraryController@downloadSendQuotation');

Route::get('/viewhotel/{id}', 'CommanController@viewHotel');


// Hotel

Route::get('/', 'superAdminController@index');
Route::get('/company_admin', 'superAdminController@index');
Route::get('/company_admin/forget-password', 'superAdminController@forgetPassword');

Route::get('/reset-password/{id}', 'superAdminController@resetPassword');
Route::post('/sendMail', 'superAdminController@sendMail');
Route::get('/log_admin', 'superAdminController@log_Admin');
Route::post('/login', 'superAdminController@adminLogin');
Route::get('/logout', 'superAdminController@logout');

Route::get('/dashboard', 'superAdminController@dashboard');
Route::get('/company-master', 'CompanyMasterController@index');
Route::get('/company-master/edit', 'CompanyMasterController@edit');
Route::post('/company-master/update', 'CompanyMasterController@update');
Route::post('/company-master', 'CompanyMasterController@delete');
Route::get('/property', 'PropertyController@index');
Route::get('/property/create', 'PropertyController@create');
Route::post('/property/save', 'PropertyController@save');
Route::get('/property/{id}', 'PropertyController@edit');
Route::post('/property/update', 'PropertyController@update');
// clear cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');   
    return "<h1 style='text-align: center;'>Cache cleared successfully !</h1>";
});


