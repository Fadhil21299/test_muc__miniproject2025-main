<?php

use Illuminate\Support\Facades\Route;

Route::prefix('timesheet')->group(function() {
    Route::get('/index', 'TimesheetController@index')->name('timesheet.index');
    Route::get('/create', 'TimesheetController@create')->name('timesheet.create');
    Route::post('/', 'TimesheetController@store')->name('timesheet.store');
    Route::delete('/{id}', 'TimesheetController@destroy')->name('timesheet.destroy');
});
