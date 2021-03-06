<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\ProductVariation;
use App\Models\Vendor;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\ProductMedia;
//use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\OrderAdminMail;
use App\Mail\OrderSellerMail;
use App\User;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){

    	// session()->forget('cart');
    	if (isset($_POST['action']) && $_POST['action']=='add'){

				$product_id        =  $_POST['product_id'];
				$vendor_id         =  $_POST['vendor_id'];
				$quantity          =  $_POST['quantity'];
				$price             =  $_POST['price'];
				// $variation_id      =  $_POST['variation_id'];
				$v_p_id            =  $_POST['v_p_id'];


				$vendor     = Vendor::where('id',$vendor_id)->value('company_name');
//				$image_id   = Product::where('id',$product_id)->value('image_id');
				$product_attributes   = Product::select('image_id','width','hieght','length')->where('id',$product_id)->first();

				$image_id=$product_attributes->image_id;



            $volume=(($product_attributes->width*$product_attributes->hieght*$product_attributes->length)/5000) ;
				$volume=$volume < 5 ? 5 : $volume;

				$variation_id = VendorProduct::where('id',$v_p_id)->value('variation_id');

				if (empty($variation_id)) {

					$image      = ProductMedia::where('image_id',$image_id)->value('image');
					$name       = Product::where('id',$product_id)->value('title');
				}
				else{

					$image = ProductVariation::where('product_id',$product_id)->where('id',$variation_id)->value('variant_image');
					$variation 	= ProductVariation::where('product_id',$product_id)->where('id',$variation_id)->first();
					$name       = Product::where('id',$product_id)->value('title');

					if (!empty($variation->second_variation_value)) {

							$name       = $name."(".$variation->first_variation_value."-".$variation->second_variation_value.")";

					}
					else{

						$name       = $name."(".$variation->first_variation_value.")";
					}
					if (empty($image)) {

						$image      = ProductMedia::where('image_id',$image_id)->value('image');
					}
				}

				$cart = session()->get('cart');

				if(isset($cart[$v_p_id]) && !empty($cart[$v_p_id]))
				{
					if(!array_key_exists($v_p_id,$cart))
					{

						$cart[$v_p_id] = [
			                        'v_p_id'       => $v_p_id,
									'product_id'   => $product_id,
									'vendor_id'    => $vendor_id,
									'name'         => $name,
									'price'        => $price,
									'quantity'     => $quantity,
									'image'	       => $image,
									'vendor'       => $vendor,
									'weight'       => $volume,
									'shipping_price'=> ''
			            ];
			             session()->put('cart', $cart);

					}
					else{

						$cart[$v_p_id]['price'] 	= $price;
						$cart[$v_p_id]['quantity'] 	= $quantity;
						session()->put('cart', $cart);
					}
				}
				else{
				  $cart[$v_p_id] = [
			                        'v_p_id'       => $v_p_id,
									'product_id'   => $product_id,
									'vendor_id'    => $vendor_id,
									'name'         => $name,
									'price'        => $price,
									'quantity'     => $quantity,
									'image'	       => $image,
									'vendor'       => $vendor,
                                    'weight'       => $volume,
                                    'shipping_price'=> ''

                  ];
		             session()->put('cart', $cart);
				}
		}
		//================= Remove product from Cart ======================= //

if(isset($_POST['action']) && $_POST['action'] == "delete"){

	@$v_p_id   	= trim($_POST['p_id']);
	$cart = session()->get('cart');

    if(isset($cart[$v_p_id])) {

        unset($cart[$v_p_id]);

        session()->put('cart', $cart);
    }
}
// ============================== Empty Whole Cart ====================== //

if(isset($_POST['action']) && $_POST['action'] == "empty"){
	$cart = session()->get('cart');
	unset($cart);
}
// ====================================================================== //

		$cart = session()->get('cart');
		if(isset($cart)){

			  		  $tquantity = 0;
					  $tPrice    = 0;
					  foreach(session('cart') as $id => $data){
					  		$priceProduct = $data['price']*$data['quantity'];
							$tPrice		 += $priceProduct;
							$tquantity 	 += $data['quantity'];
							$id           = base64_encode($data['product_id']);


							echo '
									<div class="ps-product--cart-mobile">
			                            <div class="ps-product__thumbnail"><a href=""><img src="'.$data['image'].'" alt=""></a></div>
			                               <div class="ps-product__content"><a href="javascript:void(0)" type="button" class="ps-product__remove" onclick="remove_cart('.$data['v_p_id'].')"><i class="icon-cross"></i></a><a href="product.php?id='.$id.'&name='.str_replace(" ", "-",$data['name']).'">'.$data['name'].'</a>
			                        <p><strong>Sold by:</strong> '.$data['vendor'].'</p><small>'.$data['quantity'].' x '.$data['price'].'</small>
			                    </div>
			                </div>';
						}
						if ($tPrice!=0) {

							echo '<div class="ps-cart__footer">
                                    <h3>Sub Total:<strong>R'.$tPrice.'</strong></h3>';

									    if (!Auth::guard('customer')->check()) {

									    	echo '<figure><a class="ps-btn" href="">View Cart</a><a class="ps-btn" href="'.url('checkout').'">Checkout</a></figure>';

									    }else{
									      echo '<figure><a class="ps-btn" href="'.url("checkout").'">View Cart</a><a class="ps-btn" href="'.url("checkout").'">Checkout</a></figure>';
									    }

                               echo '</div>';
                        }
                        echo '`'.$tquantity;
				}
    }

    // Buy Now

    public function buyNow(Request $request){

    	if (isset($_POST['action']) && $_POST['action']=='add'){

				$product_id        =  $_POST['product_id'];
				$vendor_id         =  $_POST['vendor_id'];
				$quantity          =  $_POST['quantity'];
				$price             =  $_POST['price'];
				// $variation_id      =  $_POST['variation_id'];
				$v_p_id            =  $_POST['v_p_id'];


				$vendor     = Vendor::where('id',$vendor_id)->value('company_name');
				$image_id   = Product::where('id',$product_id)->value('image_id');


				$variation_id = VendorProduct::where('id',$v_p_id)->value('variation_id');

				if (empty($variation_id)) {

					$image      = ProductMedia::where('image_id',$image_id)->value('image');
					$name       = Product::where('id',$product_id)->value('title');
				}
				else{

					$image = ProductVariation::where('product_id',$product_id)->where('id',$variation_id)->value('variant_image');
					$variation 	= ProductVariation::where('product_id',$product_id)->where('id',$variation_id)->first();
					$name       = Product::where('id',$product_id)->value('title');

					if (!empty($variation->second_variation_value)) {

							$name       = $name."(".$variation->first_variation_value."-".$variation->second_variation_value.")";

					}
					else{

						$name       = $name."(".$variation->first_variation_value.")";
					}
					if (empty($image)) {

						$image      = ProductMedia::where('image_id',$image_id)->value('image');
					}
				}

				$cart = session()->get('cart');

				if(isset($cart[$v_p_id]) && !empty($cart[$v_p_id]))
				{
					if(!array_key_exists($v_p_id,$cart))
					{

						$cart[$v_p_id] = [
			                        'v_p_id'       => $v_p_id,
									'product_id'   => $product_id,
									'vendor_id'    => $vendor_id,
									'name'         => $name,
									'price'        => $price,
									'quantity'     => $quantity,
									'image'	       => $image,
									'vendor'       => $vendor
			            ];
			             session()->put('cart', $cart);

					}
					else{

						$cart[$v_p_id]['price'] 	= $price;
						$cart[$v_p_id]['quantity'] 	= $quantity;
						session()->put('cart', $cart);
					}
				}
				else{
				  $cart[$v_p_id] = [
			                        'v_p_id'       => $v_p_id,
									'product_id'   => $product_id,
									'vendor_id'    => $vendor_id,
									'name'         => $name,
									'price'        => $price,
									'quantity'     => $quantity,
									'image'	       => $image,
									'vendor'       => $vendor
		            ];
		             session()->put('cart', $cart);
				}
		}
		// =========================================================//
		$cart = session()->get('cart');
		if(isset($cart)){

			  		  $tquantity = 0;
					  $tPrice    = 0;
					  foreach(session('cart') as $id => $data){
					  		$priceProduct = $data['price']*$data['quantity'];
							$tPrice		 += $priceProduct;
							$tquantity 	 += $data['quantity'];
							$id           = base64_encode($data['product_id']);


							echo '
									<div class="ps-product--cart-mobile">
			                            <div class="ps-product__thumbnail"><a href=""><img src="'.$data['image'].'" alt=""></a></div>
			                               <div class="ps-product__content"><a href="javascript:void(0)" type="button" class="ps-product__remove" onclick="remove_cart('.$data['v_p_id'].')"><i class="icon-cross"></i></a><a href="product.php?id='.$id.'&name='.str_replace(" ", "-",$data['name']).'">'.$data['name'].'</a>
			                        <p><strong>Sold by:</strong> '.$data['vendor'].'</p><small>'.$data['quantity'].' x '.$data['price'].'</small>
			                    </div>
			                </div>';
						}
						if ($tPrice!=0) {

							echo '<div class="ps-cart__footer">
                                    <h3>Sub Total:<strong>R'.$tPrice.'</strong></h3>';

									    if (!Auth::guard('customer')->check()) {

									    	echo '<figure><a class="ps-btn" href="">View Cart</a><a class="ps-btn" href="'.url('checkout').'">Checkout</a></figure>';

									    }else{
									      echo '<figure><a class="ps-btn" href="'.url("checkout").'">View Cart</a><a class="ps-btn" href="'.url("checkout").'">Checkout</a></figure>';
									    }

                               echo '</div>';
                        }
                        echo '`'.$tquantity;
				}

    }
    // End Buy Now

    //checkout page
    public function checkout(){
    	if (!Auth::guard('customer')->check()) {
    		return redirect()->route('login', ['checkout'])->with('Please login to view checkout!');
    	}

    	$cart = session()->get('cart');
		if(isset($cart)){
			return view('orders.checkout');
		}
		return redirect()->route('frontend.rootPage');

    }




    //save cart data
    public function checkout_post(Request $request){

    	$this->validate($request, [
    		'grandTotal'=>'required|numeric',
    		'address'=>'required|numeric',
    		'payment_options'=>'required|string|in:EFT,Debit,Visa,Master,Ozow_ipay'
    	]);

    	$grandTotal = $request->grandTotal;
    	$addressID = $request->address;
    	$payment_option = $request->payment_options;
    	$customer_id = Auth::guard('customer')->user()->id;
    	$first_name = Auth::guard('customer')->user()->first_name;
    	$customeremail = Auth::guard('customer')->user()->email;
    	$vendor_id = NULL;
    	$vendor_product_id = NULL;
    	$qty = NULL;
    	$ord1 = mt_rand(101, 999);
    	$ord2 = mt_rand(100, 999);
    	$ord3 = mt_rand(100, 999);
    	$orderID = $ord1.'-'.$ord2.'-'.$ord3;
    	$route = route('cart.order-success' , $orderID);

    	$cart = session()->get('cart');
		if(isset($cart)){


			foreach($cart as $key=>$data){
		  		$order = new Order();
		  		$order->order_id          = $orderID;
		  		$order->product_id        = $data['product_id'];
		  		//

		  			$category_id          = Product::where('id',$data['product_id'])->value('category_id');

		  		//
		  		$order->category_id       = $category_id;
		  		$order->order_token       = $data['product_id'].'-'.$data['vendor_id'];
		    	$order->vendor_id         = $data['vendor_id'];
		    	$order->customer_id       = $customer_id;
		    	$order->vendor_product_id = $data['v_p_id'];
		    	$order->order_price       = $data['price']*$data['quantity'];
		    	$order->product_price     = $data['price'];
		    	$order->qty               = $data['quantity'];
		    	$order->address_id        = $addressID;
		    	$order->product_name      = $data['name'];
		    	$order->product_image     = $data['image'];
		    	$order->grand_total       = $grandTotal;
		    	$order->payment_option    = $payment_option;
		    	$order->created_at        = Carbon::now();

		    	$saved = $order->save();
			}

			session()->forget('cart');
			if( $request->payment_options == 'EFT' ){

	    		return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID' , 'route'));
	    	}
	    	if( $request->payment_options == 'Debit' ){

	    		return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
	    	}
	    	if( $request->payment_options == 'Visa' ){

	    		return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
	    	}
	    	if( $request->payment_options == 'Master' ){

	    		return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
	    	}

		}
		else{
			return redirect()->back()->with('error', 'Invalid Request/Access | Session Not Found!');
		}

    }

    public function orderSuccess($order_id){

    	Order::where('order_id',$order_id)->update(['payment'=>'paid']);
    	$newOrder   = Order::where('order_id',$order_id)->get();

            if ($newOrder) {

            	// customer Email

	                $subject = 'Your order# ("'.$order_id.') at FlashyBuy';
	                $email = Auth::guard('customer')->user()->email;
	                Mail::to($email)->send(new OrderMail(
	                     $subject,$newOrder
                 	));
                //
	            //admin Mail

	                $subject = 'New order# ("'.$order_id.') is Placed on FlashyBuy';
	                $email = User::value('email');
	                Mail::to($email)->send(new OrderAdminMail(
	                     $subject,$newOrder
                 	));
                //

                //vendor Email


	                	$subject = 'A New order# ("'.$order_id.') of your Product is Placed on FlashyBuy';
	                	foreach ($newOrder as $key => $value) {

	                		$email     = Vendor::where('id',$value->vendor_id)->value('email');

	                		$orderData = Order::where('order_id',$order_id)->where('vendor_id',$value->vendor_id)->get();

	                			Mail::to($email)->send(new OrderSellerMail(
		                     	$subject,$orderData
	                 		));
	                	}


                //
    		    return redirect()->route('customer.dashboard.get')->with('success', 'Order Saved Successfully');
   			}
   			else{
				return redirect()->back()->with('error', 'Invalid Request/Access | Session Not Found!');
			}
    }

}
