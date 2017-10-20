<?php

use \Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/tokens', 'HomeController@getTokens')->name('home.getTokens');
Route::get('/home/clients', 'HomeController@getClients')->name('home.getClients');
Route::get('/home/authorized-clients', 'HomeController@getAuthorizedClients')->name('home.getAuthorizedClients');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('email', function (){
    Mail::to("johnporrasr@gmail.com")->send(new \App\Mail\Email());
});
