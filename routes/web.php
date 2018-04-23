<?php

Route::get('/', 'HomeController@welcome' )->name('welcome');
Route::get('/case/{instance}', 'InstanceController@show')->name('case');
Route::get('/tag/{service}', 'ServiceController@show')->name('service');
Route::get('/providers/{provider}', 'ProviderController@detail')->name('provider');
Route::get('/provider', 'ProviderController@show')->name('providers-list');
Route::post('/provider', 'ProviderController@filtered')->name('providers-list');

Route::get('/travel','TravelController@mainTravel')->middleware('auth.travel')->name('travel');
Route::get('/login/travel', 'Auth\LoginController@showLoginFormTrip')->name('travel.login');
Route::get('/guest/travel','TravelController@guestTravel')->name('travel.guest');

Auth::routes();


Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');


//RUTAS ADMINISTRADORES
Route::group([
            'prefix' => 'admin',
            'middleware' => ['auth','admin'],
            'namespace'  => '\Admin'],
            function()
{
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard/providers', 'AdminController@showProviders')->name('providers');
    Route::get('/dashboard/providers/request', 'AdminController@request')->name('admin.request');
    Route::get('/dashboard/companies', 'AdminController@showCompanies')->name('companies');
    Route::get('/dashboard/providers/{provider}/edit', 'Provider\AdminProviderController@edit')->name('edit-provider');
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin-register');
    Route::post('/register', 'RegisterController@create');

    Route::resource('surveys', 'SurveyController');
    Route::resource('questions', 'QuestionController');
});

//RUTAS PROVEEDORES

Route::group([
        'prefix' => 'provider',
        'middleware' => ['auth','provider'],
        'namespace'  => '\Provider'],
        function()
{
    Route::get('/dashboard', 'ProviderController@index')->name('provider.dashboard');
    Route::post('/dashboard','ProviderController@edit')->name('provider.config');
    Route::put('/dashboard','ProviderController@request')->name('provider.request');
    Route::get('/settings','ProviderController@settings')->name('provider.settings');
    Route::post('/settings','ProviderController@update')->name('provider.update');
    Route::resource('cases', 'CaseController');
    Route::get('/case/{id}/images','CaseImagesController@index')->name('images.case');
    Route::delete('/case/{id}/images','CaseImagesController@destroy')->name('images.destroy');
    Route::post('/case/{id}/images','CaseImagesController@featured')->name('images.featured');
    Route::put('/case/{id}/images','CaseImagesController@update')->name('images.update');

});
Route::get('/provider/register', 'Provider\RegisterController@showRegistrationForm')->name('provider-register');
Route::post('/provider/register', 'Provider\RegisterController@register');


// RUTAS COMPAÑIAS
Route::group([
        'prefix' => 'company',
        'middleware' => ['auth','company'],
        'namespace'  => '\Company'],
        function()
{
    Route::get('/dashboard', 'CompanyController@index')->name('company.dashboard');
    Route::get('/timeline', 'CompanyController@timeline')->name('timeline');
});
