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



Route::get('/', 'DashboardController@index')->name('dashboard.index')->middleware('auth');

//dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('auth');

//files
Route::get('/{subfolder}/files', 'FileController@index')->name('files.index')->middleware('auth');


Route::get('/files/create/{subfolder}', 'FileController@create')->name('files.create')->middleware('auth');
Route::post('/files/store/{id}', 'FileController@store')->name('files.store')->middleware('auth'); 


Route::get('/files/{id}/edit', 'FileController@edit')->name('file.edit')->middleware('auth');
Route::put('/files/{id}', 'FileController@update')->name('file.update')->middleware('auth');
Route::get('/files/download/{id}', 'FileController@download')->name('file.download')->middleware('auth');
//folder
Route::get('/folder/create/', 'FolderController@create')->name('folder.create')->middleware('auth');
Route::post('/folder/store', 'FolderController@store')->name('folder.store')->middleware('auth'); 


//subfolder
Route::get('/subfolder/create/', 'SubfolderController@create')->name('subfolder.create')->middleware('auth');
Route::post('/subfolder/store', 'SubfolderController@store')->name('subfolder.store')->middleware('auth'); 

//Roles
Route::get('/roles/create/', 'RolesController@create')->name('roles.create')->middleware('auth');
Route::post('/roles/store/', 'RolesController@store')->name('roles.store')->middleware('auth');

//settings
Route::get('/setting', 'SettingController@index')->name('setting.index')->middleware('auth');
Route::post('/setting/store', 'SettingController@store')->name('setting.store')->middleware('auth'); 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
