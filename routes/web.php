<?php

use Illuminate\Support\Facades\Route;

// Movies routes
Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

// Tv routes
Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

// Actors routes
Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/{id}', 'ActorsController@show')->name('actors.show');

// for pagination
Route::get('/actors/page/{page?}', 'ActorsController@index');