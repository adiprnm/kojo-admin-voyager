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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    $namespacePrefix = "App\\Http\\Controllers\\";

    Route::group(['prefix' => 'orders'], function() use ($namespacePrefix) {
        Route::get('/{id}/json', $namespacePrefix . 'OrderController@retrieve')->name('voyager.orders.show.json');
    });

    Route::group(['prefix' => 'invoices'], function() use ($namespacePrefix) {
        Route::get('/{id}/download', $namespacePrefix . 'InvoiceController@download')->name('voyager.invoices.download');
    });
});
