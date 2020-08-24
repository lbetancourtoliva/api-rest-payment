<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.auth']], function () {

        Route::resource('payments', 'PaymentAPIController');

        Route::post('logout', 'AuthController@logout');

        Route::prefix('configuration')->group(function () {

            Route::get('companies/list', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-list');

            Route::get('companies/create', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-create');

            Route::post('companies/store', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-store');

            Route::put('companies/edit', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-edit');

            Route::delete('companies/destroy', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-destroy');

            Route::get('companies/show', 'CompanyAPIController@getCompanies')
                ->name('configuration.companies-show');

        });
});