<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index' )->name('home');

Route::prefix('customers')->name('customers.')->group(function () {
  Route::get('/', 'CustomerController@index')->name('index');
  Route::get('/show/{id}', 'CustomerController@show')->name('show');
  Route::post('/import', 'CustomerController@import')->name('import');
  Route::get('/export', 'CustomerController@export')->name('export');
  Route::get('/clear', 'CustomerController@clearCustomersFromDatabase')->name('clear');
  Route::get('/generate-route', 'CustomerController@generateRoute')->name('generate-route');
});
