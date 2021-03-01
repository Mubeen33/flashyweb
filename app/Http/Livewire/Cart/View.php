<?php

namespace App\Http\Livewire\Cart;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingPrice;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Request;

class View extends Component
{
    use AuthorizesRequests;

    public $cartProducts;
    public $subTotal=0;
    public $totalShipping=0;
    public $grandTotal;
    public $totalItem;
    public $componentName='view';
    public $user;
    public $addressList;
    public $selectedAddress;
    public $paymentMethod;
    public $next;
    public $back='view';
    public $listOfSeller;
    public $paymentMethods= [
        [
            'id'=>1,
            'title'=>'EFT',
            'enum'=>'EFT',
            'description'=>'Dummy Text for Bank Payment Method',
            'images'=>[
                'app-assets/images/payment-method/Visa.svg',
                'app-assets/images/payment-method/Mastercard.svg',
                'app-assets/images/payment-method/Amex.svg',
                'app-assets/images/payment-method/Diners.svg'
            ]
        ],
        [
            'id'=>2,
            'title'=>'Debit',
            'enum'=>'Debit',
            'description'=>'Dummy Text for Bank Payment Method',
            'images'=>[
                'app-assets/images/payment-method/Absa.svg',
                'app-assets/images/payment-method/FNB.svg',
                'app-assets/images/payment-method/Standard.svg',
                'app-assets/images/payment-method/Capitec.svg',
                'app-assets/images/payment-method/Investec.svg',
                'app-assets/images/payment-method/TymeBank.svg',
                'app-assets/images/payment-method/Bidvest.svg'
            ]
        ],
        [
            'id'=>3,
            'title'=>'Visa',
            'enum'=>'Visa',
            'description'=>'Dummy Text for Bank Payment Method',
            'images'=>[
                'app-assets/images/payment-method/Absa.svg',
                'app-assets/images/payment-method/FNB.svg',
                'app-assets/images/payment-method/Standard.svg',
                'app-assets/images/payment-method/Capitec.svg',
                'app-assets/images/payment-method/Investec.svg',
                'app-assets/images/payment-method/TymeBank.svg',
                'app-assets/images/payment-method/Bidvest.svg'
            ],
        ],
        [
            'id'=>4,
            'title'=>'Master',
            'enum'=>'Master',
            'description'=>'Dummy Text for Bank Payment Method',
            'images'=>[
                'app-assets/images/payment-method/Absa.svg',
                'app-assets/images/payment-method/FNB.svg',
                'app-assets/images/payment-method/Standard.svg',
                'app-assets/images/payment-method/Capitec.svg',
                'app-assets/images/payment-method/Investec.svg',
                'app-assets/images/payment-method/TymeBank.svg',
                'app-assets/images/payment-method/Bidvest.svg'
            ],
        ]

    ];

    protected $listeners = ['updateTab' => 'currentTab'];
    protected $rules=[];



//custom functions
    public function currentTab($parameter){
        if($parameter=='address'){
            $this->updateAddressList($this->user->id);
        }

        $this->componentName=$parameter;
    }
    public function hydrate(){

        if(!Session::has('cart') || count(session('cart')) < 1) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Info!',
                'message' => 'Please Add products in Cart then you can proceed further!',
                'icon' => 'success',
            ]);
            $this->componentName='view';

        }

    }

    public function mount(){
//        dd(session('cart'));
//        Session::forget('cart');
//        dd(session()->all());
//        dd($this->cartProducts,$this->listOfSeller);
        $this->user=Auth::guard('customer')->user();
        $this->updateAddressList($this->user->id);
        if(Session::has('cart')){

            $this->cartProducts=Session::get('cart');
            $this->listOfSeller=collect($this->cartProducts)->unique('vendor');
            $shippingRates=ShippingPrice::get();


            foreach($this->cartProducts as $key=>$product){
                $rate = $shippingRates->filter(function ($value, $key) use($product) {
                    if($value->min_weight <= $product['weight']  &&  $product['weight'] <= $value->max_weight  ){
                    return $value;

                    }
                });

                if($rate->isNotEmpty()){
                    $defaultPrice=$rate[0]->default_price;
                    $minWeight=$rate[0]->min_weight;
                    $perKgPrice=$rate[0]->per_kg_price;
                    $productWeight=$product['weight'];

                    $overWeight=$productWeight > $minWeight ?  $productWeight - $minWeight: $minWeight;

                    $shippingPrice= $overWeight==$minWeight ? $defaultPrice : (($overWeight*$perKgPrice)+$defaultPrice);

                    $this->cartProducts[$key]['shipping_price']=$shippingPrice;
                }else{
                    $this->cartProducts[$key]['shipping_price']=1;

                }

            }
//            dd($this->cartProducts,$this->listOfSeller);

//            dd('=====================================================');


        }else{
            $this->cartProducts=[];
        }
    }

    public function getHeading($key){
        return $this->headings[$key];
    }

    public function updatedComponentName(){
        session(['componentName'=>$this->componentName]);
        if($this->componentName=='address'){
//            dd($this->componentName);
//            $this->componentName='add-address';
        }

    }
    public function countSubTotal(){
        $this->totalItem=0;
        $this->subTotal=0;
        foreach($this->cartProducts as $product){
            $this->totalItem+=$product['quantity'];
            $this->totalShipping+=$product['quantity']*$product['shipping_price'];
            $this->subTotal+=($product['price']*$product['quantity'])+($product['quantity']*$product['shipping_price']);
        }
    }

    public function increament($key,$qty){
        $this->cartProducts[$key]['quantity']++;
        $this->sessionUpdate();

        $this->countSubTotal();
    }
    public function decrement($key,$qty){
        $this->cartProducts[$key]['quantity'] > 1 ? $this->cartProducts[$key]['quantity']-- : '';
        $this->sessionUpdate();
        $this->countSubTotal();

    }
    public function removeItem($key){
        unset($this->cartProducts[$key]);
        Session::forget('cart');

        $this->sessionUpdate();
        $this->countSubTotal();
        $this->listOfSeller=collect($this->cartProducts)->unique('vendor');

    }
    private function sessionUpdate(){
        Session::put('cart',$this->cartProducts);

    }



    //add address
    public function proceedOrder($tab){

        if($tab=='address'){
            $this->updateAddressList($this->user->id);
                if(!$this->addressList->count() > 0){
                    $tab='add-address';
                }

        }elseif($tab=='payment'){

            $this->resetValidation('selectedAddress');
            $this->rules=[ 'selectedAddress' => 'required'];
            $this->validate();
            Session::put('checkOutSelectedDetail.selectedAddress',$this->selectedAddress);

        }elseif($tab=='delivery'){


        }elseif($tab=='confirm'){

            $this->resetValidation('paymentMethod');
            $this->rules=[ 'paymentMethod' => 'required'];
            $this->validate();
            Session::put('checkOutSelectedDetail.paymentMethod',$this->paymentMethod);

            $grandTotal = $this->subTotal;
            $addressID = $this->selectedAddress;
            $payment_option = $this->paymentMethod;
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
            $records=[];
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

            $order->save();
            }
            Session::forget('cart');
            Session::forget('checkOutSelectedDetail');
            $this->cartProducts=[];
//            $this->dispatchBrowserEvent('swal', [
//                'title' => 'Successfully!',
//                'message' => 'Your Order has been placed successfully!',
//                'icon' => 'success',
//            ]);
            $this->componentName='success';

            if( $payment_option == 'EFT' ){

                return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID' , 'route'));
            }
            if( $payment_option == 'Debit' ){

                return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
            }
            if( $payment_option == 'Visa' ){

                return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
            }
            if( $payment_option == 'Master' ){

                return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
            }

        }
        $this->componentName=$tab;






    }
    public function deleteAddress($id){
        CustomerAddress::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Successfully!',
            'message' => 'Your Address has been Deleted Successfully',
            'icon' => 'success',
        ]);
        $this->updateAddressList($this->user->id);
    }

    public function deliveryType($tab,$type){
            session([
                'checkOutSelectedDetail'=>[
                    'userId'=>$this->user->id,
                    'deliveryType'=>$type
                ]
            ]);
            $this->proceedOrder($tab);
    }
    public function completeOrder(){

        $grandTotal = $this->subTotal;
        $addressID = $this->selectedAddress;
        $payment_option = $this->paymentMethod;
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
        $records=[];
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

//            $saved = $order->save();
        }
        Session::forget('cart');
        Session::forget('checkOutSelectedDetail');
        dd($payment_option,'--------------000000000000---------------------');
        if( $payment_option == 'EFT' ){

            return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID' , 'route'));
        }
        if( $payment_option == 'Debit' ){

            return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
        }
        if( $payment_option == 'Visa' ){

            return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
        }
        if( $payment_option == 'Master' ){

            return view('orders.payfast_payment',compact('grandTotal','first_name','customeremail','payment_option','orderID'));
        }
    }
    public function updateAddressList($id){
        $this->addressList=CustomerAddress::where('customer_id',$id)->get();

    }
//    public function footerAction($back,$next){
//        $this->back=$back;
//        $this->next=$next;
//    }


    public function render()
    {
        $this->back='home';
        $this->countSubTotal();
        return view('livewire.cart.view');
    }
}
