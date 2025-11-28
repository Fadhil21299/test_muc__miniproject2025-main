<?php

use Illuminate\Support\Facades\Route;

Route::prefix('serviceused')->group(function() {
    Route::get('/index', 'ServiceusedController@index')->name('serviceused.index');
    Route::get('/create', 'ServiceusedController@create')->name('serviceused.create');
    Route::post('/', 'ServiceusedController@store')->name('serviceused.store');
    Route::get('/{id}/edit', 'ServiceusedController@edit')->name('serviceused.edit');
    Route::put('/{id}', 'ServiceusedController@update')->name('serviceused.update');
    Route::delete('/{id}', 'ServiceusedController@destroy')->name('serviceused.destroy');
});
