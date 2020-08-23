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


//customer login/logout routes
Route::get('login', 'Customers\Auth\CustomerLogin@login_form')->name('login');
Route::post('customer-login', 'Customers\Auth\CustomerLogin@login')->name('customer.login.Post');
Route::get('logout', function(){return abort(404);});
Route::post('logout', 'Customers\Auth\CustomerLogout@logout')->name('logout');
Route::get('registration', function(){return redirect()->route('login');});
Route::post('registration', 'Customers\Auth\RegistrationController@register')->name('customer.registration.post');

//reset password
Route::get('reset/passoword/{token?}/{email?}', 'Customers\Auth\ForgotPassword@pass_reset_form')->name('customer.resetPassForm.get');
Route::post('reset/send-link', 'Customers\Auth\ForgotPassword@send_reset_link')->name('customer.sendPassResetLink.post');
Route::post('reset/passoword', 'Customers\Auth\ForgotPassword@password_reset_post')->name('customer.passwordReset.post');

//customer protected routes
Route::group(['as'=>'customer.', 'prefix'=>'customer', 'middleware' => ['customerMW']], function(){
	Route::get('dashboard', 'Customers\CustomerController@dashboard')->name('dashboard.get');
	Route::post('profile-update', 'Customers\CustomerController@profile_update')->name('profieUpdate.post');
	
	//address
	Route::get('addresses', 'Customers\CustomerController@get_address')->name('address.get');
	Route::post('addresses', 'Customers\CustomerController@update_address')->name('addressUpdate.post');
});
