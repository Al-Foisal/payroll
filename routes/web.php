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

Route::get('/register', 'RegisterController@register');
Route::post('/register/attempt', 'RegisterController@registerAttempt');
Route::get('/','LoginController@index');
Route::post('login-attempt','LoginController@loginAttempt');
Route::middleware(['auth','web'])->group(function(){
	Route::get('logout','LoginController@logout');
	Route::get('dashboard','DashboardController@index');	


	/** department router */

	Route::get('department/list','DepartmentController@index');
	Route::get('department/create','DepartmentController@create');
	Route::post('department/store','DepartmentController@store');
	Route::get('department/edit','DepartmentController@edit');
	Route::put('department/update','DepartmentController@update');
	Route::get('department/delete','DepartmentController@delete');
});
