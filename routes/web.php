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

Route::get('/', 'SuperAdminController@index');
Route::get('/company_admin', 'SuperAdminController@index');
Route::get('/company_admin/forget-password', 'SuperAdminController@forgetPassword');

Route::get('/admin/reset-password/{id}', 'SuperAdminController@resetPassword');
Route::post('/admin/sendMail', 'SuperAdminController@sendMail');
Route::get('/company_admin/log_admin', 'SuperAdminController@log_Admin');
Route::post('/company_admin/login', 'SuperAdminController@adminLogin');

Route::get('/company_admin/dashboard', 'SuperAdminController@dashboard');
Route::get('/company_admin/company-master', 'CompanyMasterController@index');
Route::get('/company_admin/company-master/create', 'CompanyMasterController@create');
Route::post('/company_admin/company-master/save', 'CompanyMasterController@save');
Route::get('/company_admin/company-master/edit', 'CompanyMasterController@edit');
Route::post('/company_admin/company-master/update', 'CompanyMasterController@update');
Route::post('/company-master', 'CompanyMasterController@delete');
Route::get('/company_admin/module-master', 'ModuleMasterController@index');
Route::get('/module-master/create', 'ModuleMasterController@create');
Route::post('/company_admin/module-master/save', 'ModuleMasterController@save');
Route::get('/company_admin/module-master/{id}', 'ModuleMasterController@edit');
Route::post('/company_admin/module-master/update', 'ModuleMasterController@update');
Route::post('/company_admin/module-master', 'ModuleMasterController@delete');
Route::get('/company_admin/menu-master', 'MenuMasterController@index');
Route::get('/company_admin/menu-master/create', 'MenuMasterController@create');
Route::post('/company_admin/menu-master/save', 'MenuMasterController@save');
Route::get('/company_admin/menu-master/{id}', 'MenuMasterController@edit');
Route::post('/company_admin/menu-master/update', 'MenuMasterController@update');
Route::post('/company_admin/menu-master', 'MenuMasterController@delete');
Route::get('/company_admin/property', 'PropertyController@index');
Route::get('/company_admin/property/create', 'PropertyController@create');
Route::post('/company_admin/property/save', 'PropertyController@save');
Route::get('/company_admin/property/{id}', 'PropertyController@edit');
Route::post('/company_admin/property/update', 'PropertyController@update');
// clear cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');   
    return "<h1 style='text-align: center;'>Cache cleared successfully !</h1>";
});


