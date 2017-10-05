<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/tokens', 'HomeController@getTokens')->name('home.getTokens');
Route::get('/home', 'HomeController@index')->name('home');
