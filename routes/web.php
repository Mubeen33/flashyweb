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


// Route::get('vendor-request', function () {
//     return view('vendor.vendor-request');
// });
// Route::get('vendor-request','vendor\VendorController@index');
// Route::post('send-vendor-request','vendor\VendorController@saveVendorRequest');