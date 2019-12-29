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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

Route::resource('clients', 'ClientController');
Route::get('/clients/{id}/confirmDelete', 'ClientController@confirmDelete');

Route::resource('categories', 'CategoryController');
Route::get('/categories/{id}/confirmDelete', 'CategoryController@confirmDelete');

Route::resource('subcategories', 'SubcategoryController');
//Route::put('/subcategories/{id}', 'SubcategoryController@update')->name('subcategory.update');
Route::get('/subcategories/{id}/confirmDelete', 'SubcategoryController@confirmDelete');
