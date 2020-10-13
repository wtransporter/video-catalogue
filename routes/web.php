<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ArticlesController@index');
Route::get('articles', 'ArticlesController@index')->name('articles');
Route::get('article/create', 'ArticlesController@create')->name('article.create');
Route::get('article/{article:slug}', 'ArticlesController@show')->name('article.show');
Route::get('article/{article:slug}/edit', 'ArticlesController@edit')->name('article.edit');
Route::get('video/{file}', 'ArticlesController@video')->name('article.video');
Route::patch('article/{article:slug}', 'ArticlesController@update')->name('article.update');
Route::post('articles', 'ArticlesController@store')->name('article.store');
Route::delete('article/{article}', 'ArticlesController@destroy');


Auth::routes();


