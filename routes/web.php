<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::redirect('/', '/page2');

// Route::resource('/page2','CategoryController')->name('page2');


Route::get('/category/index','CategoryController@index');
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::post('/category/show/{id}','CategoryController@show');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update','CategoryController@update');
Route::post('/category/destroy','CategoryController@destroy');


