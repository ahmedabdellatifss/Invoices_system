<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

//Auth::routes();

Auth::routes(['register' => false]);  //to stop the route for register if we need to denied the register form the website

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices' , 'InvoicesController');

Route::resource('sections' , 'SectionsController');

Route::resource('products' , 'ProductsController');

Route::get('/section/{id}' , 'InvoicesController@getproducts');

Route::get('/InvoicesDetails/{id}' , 'invoicesDetailsController@edit');

Route::get('/download/{invoice_number}/{file_name}' , 'invoicesDetailsController@get_file');

Route::get('/View_file/{invoice_number}/{file_name}' , 'invoicesDetailsController@open_file');
Route::post('delete_file' , 'invoicesDetailsController@destroy')->name('delete_file');


Route::get('/{page}' , 'AdminController@index');
