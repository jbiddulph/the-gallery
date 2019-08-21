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

Route::get('/', 'MainController@home')->name('home');

Route::get('/gallery', 'MainController@index')->name('gallery');

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
    Route::get('/admin/artwork', 'AdminartworkController@index')->name('artwork.index')->middleware('admin');
    Route::get('/admin/artwork/create', 'AdminartworkController@create')->name('artwork.create')->middleware('admin');
    Route::post('/admin/artwork/create', 'AdminartworkController@store')->name('artwork.store')->middleware('admin');
    Route::get('/admin/artwork/edit/{id}', 'AdminartworkController@edit')->name('artwork.edit')->middleware('admin');
    Route::post('/admin/artwork/update/{id}', 'AdminartworkController@update')->name('artwork.update')->middleware('admin');
    Route::post('/admin/artwork/destroy', 'AdminartworkController@destroy')->name('artwork.delete')->middleware('admin');
    Route::get('/admin/artwork/trash', 'AdminartworkController@trash')->name('artwork.trash')->middleware('admin');
    Route::get('/admin/artwork/{id}/trash', 'AdminartworkController@restore')->name('artwork.restore')->middleware('admin');
    Route::get('/admin/artwork/{id}/toggle', 'AdminartworkController@toggle')->name('artwork.toggle')->middleware('admin');
