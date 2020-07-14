<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index' )->name('home');

Route::prefix('customers')->name('customers.')->group(function () {
  Route::get('/', 'CustomerController@index')->name('index');
  Route::post('/import', 'CustomerController@import')->name('import');
});
