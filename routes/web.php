<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HackerController;

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


Route::get('/top','App\Http\Controllers\HackerController@list2' );
Route::get('/new','App\Http\Controllers\HackerController@list3' );
Route::get('/best','App\Http\Controllers\HackerController@list4' );
Route::get('/view/{data1?}','App\Http\Controllers\HackerController@view' );
Route::get('/viewc/{data1?}','App\Http\Controllers\HackerController@viewc' );
Route::get('/hackernews','App\Http\Controllers\HackerController@list');
Route::get('/','App\Http\Controllers\HackerController@list');
Route::get('/navigation','App\Http\Controllers\HackerController@list');

Route::get('/','App\Http\Controllers\HackerController@list');
Route::get('/','App\Http\Controllers\HackerController@save');