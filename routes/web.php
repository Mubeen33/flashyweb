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
Route::get('application', 'Application\SiteMaintenanceController@application')->name('frontend.application.get');
Route::group(['middleware'=>['AppStatusMW']], function(){

	Route::get('/', 'RootController@index')->name('frontend.rootPage');

	Route::group(['as'=>'frontend.'], function(){
		//vendors routes
		Route::get('become-a-vendor', 'Vendors\VendorController@become_a_vendor')->name('becomeAVendor.get');
		Route::get('vendor-registration', 'Vendors\VendorController@vendor_registration')->name('vendor_registration.get');
		// Route::resource('vendor', 'Vendors\VendorController');
		Route::post('vendor-store','Vendors\VendorController@store')->name('vendor.store');


		//product details
		Route::get('product/{slug}', 'Product\ProductController@get_single_product')->name('signgleProduct.get');
	});
Route::group(['as'=>'frontend.'], function(){
	//vendors routes
	Route::get('become-a-vendor', 'Vendors\VendorController@become_a_vendor')->name('becomeAVendor.get');
	Route::get('vendor-registration', 'Vendors\VendorController@vendor_registration')->name('vendor_registration.get');
	// Route::resource('vendor', 'Vendors\VendorController');
	Route::post('vendor-store','Vendors\VendorController@store')->name('vendor.store');

	//product details
	Route::get('product/{slug}', 'Product\ProductController@get_single_product')->name('signgleProduct.get');
});
Route::group(['as'=>'cart.'], function(){

	Route::post('add-to-cart','order\CartController@addToCart')->name('products.addtocart');


});



	//customer login/logout routes
	Route::get('login', 'Customers\Auth\CustomerLogin@login_form')->name('login');
	Route::post('customer-login', 'Customers\Auth\CustomerLogin@login')->name('customer.login.Post');
	Route::get('logout', function(){return abort(404);});
	Route::post('logout', 'Customers\Auth\CustomerLogout@logout')->name('logout');
	Route::get('registration', function(){return redirect()->route('login');});
	Route::post('registration', 'Customers\Auth\RegistrationController@register')->name('customer.registration.post');

	//popup control
	Route::get('popup-dont-show', function(){return abort(404);});
	Route::post('popup-dont-show', 'Popup\PopupControlller@dont_show')->name('popUpDontShow.post');

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

		//orders
		Route::resource('orders', 'order\OrderController');
		Route::get('ajax-orders/fetch', 'order\OrderController@fetch_orders_list')->name('orders.ajaxPgination');

	});



});
