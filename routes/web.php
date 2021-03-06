<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
//Auth::routes(['verify' => true]);


Route::get('/welcome', function() {
//    dd(Auth::user());
    dd(Auth::guard('customer')->user());

    return view('welcome');
});
Route::get('/test-page', function() {

    return view('testPage');
});

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";

});

Route::get('getroute' , function(){
	return route('customer.dashboard.get');
});

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
		Route::post('get-first-variation-data','Product\ProductController@firstVariationData')->name('products.first_variation');
		Route::post('get-second-variation-data','Product\ProductController@secondVariationData')->name('products.second_variation');
		Route::post('get-single-offers','Product\ProductController@getSingleVariantOtherOffers')->name('products.getSingleOffers.post');
		Route::post('get-other-offers','Product\ProductController@getDoubleVariantOtherOffers')->name('products.getOtherOffers.post');
		Route::post('add-to-cart','order\CartController@addToCart')->name('products.addtocart');
		Route::post('buy-now','order\CartController@buyNow')->name('products.buyNow');
		Route::get('order-success/{order_id}','order\CartController@orderSuccess')->name('order-success');

	});
	Route::get('order-process','order\OrderController@orderProcess')->middleware('verified')->name('order.process');
	Route::get('checkout','order\CartController@checkout');
	Route::post('checkout','order\CartController@checkout_post')->name('saveCheckoutData.post');


	//customer login/logout routes
	Route::get('account/{check?}/{intend?}', 'Customers\Auth\CustomerLogin@login_form')->name('login');
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
	Route::group(['as'=>'customer.', 'prefix'=>'customer', 'middleware' => ['customerMW','verified']], function(){

		Route::get('dashboard', 'Customers\CustomerController@dashboard')->name('dashboard.get');
		Route::get('profile', 'Customers\CustomerController@profile')->name('profile.get');
		Route::post('profile-update', 'Customers\CustomerController@profile_update')->name('profieUpdate.post');

		//address
		Route::get('addresses', 'Customers\CustomerController@get_address')->name('address.get');
		Route::post('addresses', 'Customers\CustomerController@update_address')->name('addressUpdate.post');
		Route::post('add-address', 'address\AddressController@add_address')->name('addressAdd.post');

		//orders
		Route::resource('orders', 'order\OrderController');
		Route::get('ajax-orders/fetch', 'order\OrderController@fetch_orders_list')->name('orders.ajaxPgination');

	});
});

Route::get('/{slug}' , function($slug){
	$page = \App\Models\Page::where('slug' , $slug)->first();
	return view('Pages.page')->with('page',$page);
})->name('slug_name');


Route::get('/email/verify/{id}/{hash}','Customers\Auth\VerificationController@index')->name('verification.verify');
Route::post('/email/verification-notification', 'Customers\Auth\VerificationController@resend')->name('verification.send');
Route::get('/email/verify', 'Customers\Auth\VerificationController@verifyPage')->name('verification.notice');
Route::get('/email/verify/success', 'Customers\Auth\VerificationController@verifySuccessPage')->middleware('verified')->name('verification.notice.success');


