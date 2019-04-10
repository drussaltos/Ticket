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


Route::get('/', 'AuthController@loginForm');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');



Route::get('/admin/create', 'Admin\TicketController@create')->name('admin.create');
Route::post('/admin', 'Admin\TicketController@store')->name('admin.store');
Route::get('/admin/{id}/edit', 'Admin\TicketController@edit')->name('admin.edit');
Route::put('/admin/{id}', 'Admin\TicketController@update')->name('admin.update');
Route::delete('/admin/{id}', 'Admin\TicketController@destroy')->name('admin.destroy');


Route::group(['middleware'	=>	'user'], function(){
    Route::get('/admin', 'Admin\TicketController@index')->name('admin.index');
    Route::get('/admin/{id}/edit_file', 'Admin\TicketController@editFile')->name('admin.edit_file');
    Route::put('/admin/update_file/{id}', 'Admin\TicketController@updateFile')->name('admin.update_file');
});

Route::group(['middleware'	=>	'admin'], function(){
    Route::get('/admin/create', 'Admin\TicketController@create')->name('admin.create');
    Route::post('/admin', 'Admin\TicketController@store')->name('admin.store');
    Route::get('/admin/{id}/edit', 'Admin\TicketController@edit')->name('admin.edit');
    Route::put('/admin/{id}', 'Admin\TicketController@update')->name('admin.update');
    Route::delete('/admin/{id}', 'Admin\TicketController@destroy')->name('admin.destroy');

});