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

Route::get('/', function () {
    return view('home');
});

// Route::redirect('/', '/page2');

// Route::resource('/page2','CategoryController')->name('page2');


Route::get('/category/index','CategoryController@index')->name('category.index');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::post('/category/store','CategoryController@store')->name('category.store');
Route::post('/category/show/{id}','CategoryController@show')->name('category.show');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category/update','CategoryController@update')->name('category.update');
Route::post('/category/destroy','CategoryController@destroy')->name('category.destroy');



Route::get('/signup','SignupController@index')->name('signup');;
Route::post('/signup','SignupController@signup')->name('signup.action');
Route::get('/login','LoginController@index')->name('login');
Route::post('/login','LoginController@login')->name('login.action');
Route::get('/logout','LoginController@logout')->name('logout');



Route::get('/dashboard','DashboardController@index')->guard('user')->middleware('auth')->name('dashboard');


