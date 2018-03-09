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

Route::get('/', 'HomeController@welcome' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','provider');

//RUTAS PROVEEDORES

/*Route::get('/provider/login', 'Provider\LoginController@showLoginForm');
Route::post('/provider/login', 'Provider\LoginController@login');
Route::post('/provider/logout', 'Provider\LoginController@logout');*/

// Registration Routes...
Route::get('/provider/register', 'Provider\RegisterController@showRegistrationForm');
Route::post('/provider/register', 'Provider\RegisterController@register');

// Password Reset Routes...
/*Route::get('/provider/password/reset', 'Provider\ForgotPasswordController@showLinkRequestForm');
Route::post('/provider/password/email', 'Provider\ForgotPasswordController@sendResetLinkEmail');
Route::get('/provider/password/reset/{token}', 'Provider\ResetPasswordController@showResetForm');
Route::post('/provider/password/reset', 'Provider\ResetPasswordController@reset');*/

Route::get('/admin/register', 'Admin\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'Admin\RegisterController@register');