<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'TaskController@index')->name("home");

Route::get('/showTask/{id}', 'TaskController@show')->name("showTask");

// modifica
Route::get('/editTask/{id}', 'TaskController@edit')->name("editTask");
Route::post('/updateTask/{id}', 'TaskController@update')->name("updateTask");

// eliminazione
Route::get('/destroyTask/{id}', 'TaskController@destroy')->name("destroyTask");

// inserimento nuovo
Route::get('/createTask', 'TaskController@create')->name("createTask");
Route::post('/storeTask', 'TaskController@store')->name("storeTask");
