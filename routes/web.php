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

Route::get('dashboard','DashboardController@index');
