<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index' )->name('home');

Route::prefix('customers')->name('customers.')->group(function () {
  Route::get('/', 'CustomerController@index')->name('index');
  Route::get('/{id}', 'CustomerController@show')->name('show');
  Route::post('/import', 'CustomerController@import')->name('import');
});
