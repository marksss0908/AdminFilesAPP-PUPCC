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





//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

//files
Route::get('/{subfolder}/files', 'FileController@index')->name('files.index');
Route::get('/files/create/{subfolder}', 'FileController@create')->name('files.create');
Route::post('/files/store', 'FileController@store')->name('files.store'); 


