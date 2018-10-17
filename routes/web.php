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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])
    ->prefix('todo')
    ->name('todo.')
    ->group(function () {
        Route::get('/{filter?}', 'TodoListController@index')->name('index');
        Route::get('/create', 'TodoListController@create')->name('create');
        Route::post('/store', 'TodoListController@store')->name('store');
        Route::get('/show/{id}', 'TodoListController@show')->name('show');
        Route::get('/edit/{id}', 'TodoListController@edit')->name('edit');
        Route::post('/update/{id}', 'TodoListController@update')->name('update');
        Route::get('/destroy/{id}', 'TodoListController@destroy')->name('destroy');
    });