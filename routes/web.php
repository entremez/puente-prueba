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

Route::get('/', 'HomeController@welcome' )->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'Company\CompanyController@index')->middleware('auth','company');;


//RUTAS ADMINISTRADORES
Route::get('/admin/dashboard', 'Admin\AdminController@index')->middleware('auth','admin')->name('dashboard');
Route::get('/admin/dashboard/providers', 'Admin\AdminController@showProviders')->middleware('auth','admin')->name('providers');
Route::get('/admin/dashboard/companies', 'Admin\AdminController@showCompanies')->middleware('auth','admin')->name('companies');
Route::get('/admin/dashboard/providers/{provider}/edit', 'Admin\Provider\AdminProviderController@edit')->middleware('auth','admin')->name('edit-provider');

//RUTAS PROVEEDORES
Route::get('/provider/dashboard','Provider\ProviderController@index')->middleware('auth','provider')->name('provider-dashboard');
Route::post('/provider/dashboard','Provider\ProviderController@edit')->middleware('auth','provider');
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