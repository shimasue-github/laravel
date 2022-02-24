<?php

//デフォルト
Route::get('/', function () { return view('welcome');});

//ホーム
Route::get('/home', 'HomeController@home')->name('home');

//設定
Route::get('/configuration', 'HomeController@configuration')->name('configuration');

Route::get('/time', 'HomeController@time')->name('time');
Route::get('/stam', 'HomeController@stam')->name('stam');
Route::get('/kintai', 'HomeController@kintai')->name('kintai');
