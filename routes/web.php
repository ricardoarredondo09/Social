<?php

Route::view('/', 'welcome')->name('home');


//Statuses Routes
Route::post('statuses', 'StatusesController@store')->name('statuses.store')->middleware('auth');
Route::get('/statuses', 'StatusesController@index')->name('statuses.index');

//Statuses likes routes

Route::post('statuses/{status}/likes', 'StatusLikesController@store')->name('statuses.like.store')->middleware('auth');
Route::delete('statuses/{status}/likes', 'StatusLikesController@destroy')->name('statuses.like.destroy')->middleware('auth');



Route::auth();