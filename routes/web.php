<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('menu', 'MenuController@index')->name('menu');
Route::post('menu', 'MenuController@update')->name('menu.update');
Route::get('menu/build', 'MenuController@builder')->name('menu.builder');


