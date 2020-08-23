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

Route::get('/', 'RootController@index')->name('frontend.rootPage');


Route::group(['as'=>'frontend.'], function(){
	//vendors routes
	Route::get('vendor-registration', 'Vendors\VendorController@vendor_registration')->name('vendor_registration.get');
	Route::resource('vendor', 'Vendors\VendorController');
});


//customer login routes
Route::get('login', 'Customers\Auth\CustomerLogin@login_form')->name('login');
Route::post('customer-login', 'Customers\Auth\CustomerLogin@login')->name('customer.login.Post');

//customer protected routes
Route::group(['as'=>'customer.', 'prefix'=>'customer', 'middleware' => ['customerMW']], function(){
	Route::get('dashboard', 'Customers\CustomerController@dashboard')->name('dashboard.get');
});