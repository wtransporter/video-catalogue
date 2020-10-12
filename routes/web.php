<?php

use Illuminate\Support\Facades\Route;


Route::get('articles', 'ArticlesController@index');
Route::get('article/create', 'ArticlesController@create');
Route::get('article/{article}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');
Route::delete('article/{article}', 'ArticlesController@destroy');

Auth::routes();


