<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'MainController@index')->name('home');

//Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'PagesController@index')->name('admin')->middleware('admin');

//ADMIN
    //Categories
    Route::get('/admin/categories', 'CategoryController@index')->name('category.index');
    //Category Add
    Route::post('/admin/category/add', 'CategoryController@store')->name('category.add')->middleware('admin');
    //Remove Category
    Route::post('/deleteCategory', 'CategoryController@removeCategory')->name('category.remove')->middleware('admin');
    //Edit Category
    Route::post('/editCategory', 'CategoryController@editCategory')->name('category.edit')->middleware('admin');

    //Artwork
    Route::get('/admin/add-artwork', 'AdminartworkController@index')->name('artwork.index')->middleware('admin');
    Route::get('/admin/add-artwork/create', 'AdminartworkController@create')->name('artwork.create')->middleware('admin');
    Route::post('/admin/add-artwork/create', 'AdminartworkController@store')->name('artwork.store')->middleware('admin');
