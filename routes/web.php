<?php

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('foo', function () {
    return 'Hello World';
});

Route::resource('payments', 'PaymentController');

Route::prefix('configuration')->group(function () {

    Route::get('companies/list', 'CompanyController@getCompanies')
        ->name('configuration.companies-list');

    Route::get('companies/create', 'CompanyController@getCompanies')
        ->name('configuration.companies-create');

    Route::post('companies/store', 'CompanyController@getCompanies')
        ->name('configuration.companies-store');

    Route::put('companies/edit', 'CompanyController@getCompanies')
        ->name('configuration.companies-edit');

    Route::delete('companies/destroy', 'CompanyController@getCompanies')
        ->name('configuration.companies-destroy');

    Route::get('companies/show', 'CompanyController@getCompanies')
        ->name('configuration.companies-show');

});