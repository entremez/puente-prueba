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
Route::get('/home', 'Company\CompanyController@index');
Route::get('/home', 'Admin\AdminController@index');
Route::get('/home', 'Provider\ProviderController@index');


//RUTAS ADMINISTRADORES
//Route::middleware(['auth','admin'])->prefix('admin')->group(function()
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function()
{
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin/dashboard');
    Route::get('/dashboard/providers', 'Admin\AdminController@showProviders')->name('providers');
    Route::get('/dashboard/companies', 'Admin\AdminController@showCompanies')->name('companies');
    Route::get('/dashboard/providers/{provider}/edit', 'Admin\Provider\AdminProviderController@edit')->name('edit-provider');

    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin-register');
    Route::post('/register', 'Admin\RegisterController@create');
});
//RUTAS PROVEEDORES
//Route::middleware(['auth','provider'])->prefix('provider')->group(function()
Route::group(['prefix' => 'provider', 'middleware' => ['auth','provider']], function()
{
    Route::get('/dashboard','Provider\ProviderController@index')->name('provider/dashboard');
    Route::post('/dashboard','Provider\ProviderController@edit');
});
// RUTAS COMPAÑIAS Route::middleware(['auth','company'])->prefix('company')->group(function()
Route::group(['prefix' => 'company', 'middleware' => ['auth','company']], function()
{
    Route::get('/dashboard', 'Company\CompanyController@index')->name('company/dashboard');
});


/*Route::get('/provider/login', 'Provider\LoginController@showLoginForm');
Route::post('/provider/login', 'Provider\LoginController@login');
Route::post('/provider/logout', 'Provider\LoginController@logout');*/

// Registration Routes...
Route::get('/provider/register', 'Provider\RegisterController@showRegistrationForm')->name('provider-register');
Route::post('/provider/register', 'Provider\RegisterController@register');

// Password Reset Routes...
/*Route::get('/provider/password/reset', 'Provider\ForgotPasswordController@showLinkRequestForm');
Route::post('/provider/password/email', 'Provider\ForgotPasswordController@sendResetLinkEmail');
Route::get('/provider/password/reset/{token}', 'Provider\ResetPasswordController@showResetForm');
Route::post('/provider/password/reset', 'Provider\ResetPasswordController@reset');*/