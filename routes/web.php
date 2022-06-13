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

Auth::routes(['register' => true]);  //to stop the route for register if we need to denied the register form the website

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices' , 'InvoicesController');

Route::resource('sections' , 'SectionsController');

Route::resource('products' , 'ProductsController');

Route::resource('InvoiceAttachments' , 'InvoiceAttachmentsController');

Route::get('/section/{id}' , 'InvoicesController@getproducts');

Route::get('/edit_invoice/{id}' , 'InvoicesController@edit');

Route::get('/InvoicesDetails/{id}' , 'invoicesDetailsController@edit');

Route::get('/download/{invoice_number}/{file_name}' , 'invoicesDetailsController@get_file');

Route::get('/View_file/{invoice_number}/{file_name}' , 'invoicesDetailsController@open_file');

Route::post('delete_file' , 'invoicesDetailsController@destroy')->name('delete_file');

Route::resource('Archive', 'InvoicesArchiveController');

Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');

Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');

Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');

Route::get('Invoice_UnPaid','InvoicesController@Invoice_UnPaid');

Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');

Route::get('export_invoices', 'InvoicesController@export');


Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

});


Route::get('invoices_report' , 'Invoices_report@index');
Route::post('search_invoices' , 'Invoices_report@search_invoices');

Route::get('customers_report', 'Customers_Reports_controller@index')->name("customers_report");
Route::post('Search_customers', 'Customers_Reports_controller@Search_customers');


Route::get('/{page}' , 'AdminController@index');
