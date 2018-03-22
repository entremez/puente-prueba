<?php

Route::get('/', 'HomeController@welcome' )->name('welcome');
Route::get('/case/{instance}', 'InstanceController@show')->name('case');
Route::get('/tag/{service}', 'ServiceController@show')->name('service');

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
Route::group(['prefix' => 'provider', 'middleware' => ['auth','provider']], function()
{
    Route::get('/dashboard','Provider\ProviderController@index')->name('provider/dashboard');
    Route::post('/dashboard','Provider\ProviderController@edit');
});
Route::get('/provider/register', 'Provider\RegisterController@showRegistrationForm')->name('provider-register');
Route::post('/provider/register', 'Provider\RegisterController@register');


// RUTAS COMPAÑIAS Route::middleware(['auth','company'])->prefix('company')->group(function()
Route::group(['prefix' => 'company', 'middleware' => ['auth','company']], function()
{
    Route::get('/dashboard', 'Company\CompanyController@index')->name('company/dashboard');
});
