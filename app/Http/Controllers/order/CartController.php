<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\VendorProduct;
use App\Models\ProductVariation;
use App\Models\Vendor;
use App\Models\ProductMedia;
use Illuminate\Support\Facades\Auth;
use DB;


class CartController extends Controller
{
    public function addToCart(Request $request){
    	

    	if (isset($_POST['action']) && $_POST['action']=='add'){
	
				$product_id        =  $_POST['product_id'];
				$vendor_id         =  $_POST['vendor_id'];
				$quantity          =  $_POST['quantity'];
				$price             =  $_POST['price'];
				// $variation_id      =  $_POST['variation_id'];
				$v_p_id            =  $_POST['v_p_id'];

				
				$vendor     = Vendor::where('id',$vendor_id)->value('company_name');
				$name       = Product::where('id',$product_id)->value('title');
				$image_id   = Product::where('id',$product_id)->value('image_id');
				$image      = ProductMedia::where('image_id',$image_id)->value('image');

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
}
