<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix('employees')->group(function() {
    Route::get('/index', 'EmployeesController@index')->name('employees.index');
    Route::get('/create', 'EmployeesController@create')->name('employees.create');
    Route::post('/', 'EmployeesController@store')->name('employees.store');
    Route::get('/{id}', 'EmployeesController@show')->name('employees.show');
    Route::get('/{id}/edit', 'EmployeesController@edit')->name('employees.edit');
    Route::put('/{id}', 'EmployeesController@update')->name('employees.update');
    Route::delete('/{id}', 'EmployeesController@destroy')->name('employees.destroy');
});
