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

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::resource('clients', 'ClientController');
    Route::get('/clients/{id}/confirmDelete', 'ClientController@confirmDelete');

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/{id}/confirmDelete', 'CategoryController@confirmDelete');

    Route::resource('subcategories', 'SubcategoryController');
    Route::get('/subcategories/{id}/confirmDelete', 'SubcategoryController@confirmDelete');

    Route::resource('paymentTypes', 'PaymentTypeController');
    Route::get('paymentTypes/{id}/confirmDelete', 'PaymentTypeController@confirmDelete');

    Route::resource('invoiceStates', 'InvoiceStateController');
    Route::get('invoiceStates/{id}/confirmDelete', 'InvoiceStateController@confirmDelete');

    Route::resource('invoices', 'InvoiceController');
    Route::get('invoices/{id}/confirmDelete', 'InvoiceController@confirmDelete');
    Route::get('invoices/{id}/editState', 'InvoiceController@editState');
    //Route::patch('invoices/{id}', 'InvoiceController@updateState')->name('invoices.updateState');
    Route::patch('invoices', 'InvoiceController@updateState')->name('invoices.updateState');

    Route::resource('details', 'DetailController');
    Route::get('details/{id}/confirmDelete', 'DetailController@confirmDelete');

    Route::get('/home', 'HomeController@index')->name('home');
});
