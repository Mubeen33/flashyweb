<?php

namespace App\Http\Livewire\Cart;

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
    public $grandTotal;
    public $totalItem;
    public $componentName='payment';
    public $user;
    public $addressList;
    public $selectedAddress;
    public $paymentMethod;
    public $paymentMethods= [
        [
            'id'=>1,
            'title'=>'Credit & Debit Card',
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
            'title'=>'MasterPass',
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
            'title'=>'MasterPass',
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
        ]

    ];

    protected $listeners = ['updateTab' => 'currentTab'];
    protected $rules=[];



//custom functions
    public function currentTab($parameter){
        if($parameter=='address'){
            $this->addressList=CustomerAddress::where('customer_id',$this->user->id)->get();
        }

        $this->componentName=$parameter;
    }





    public function mount(){
        $this->addressList=CustomerAddress::where('customer_id',12)->get();
        $this->user=Auth::user();
        if(Session::has('cart')){
            $this->cartProducts=Session::get('cart');
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
            $this->subTotal+=$product['price']*$product['quantity'];
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
    }
    private function sessionUpdate(){
        Session::put('cart',$this->cartProducts);

    }



    //add address
    public function proceedOrder($tab){

        if($tab=='address'){
            $this->addressList=CustomerAddress::where('customer_id',$this->user->id)->get();

                if(!$this->addressList->count() > 0){
                    $tab='add-address';
                }

        }elseif($tab=='payment'){

            $this->resetValidation('selectedAddress');
            $this->rules=[ 'selectedAddress' => 'required'];
            $this->validate();
            Session::put('checkOutSelectedDetail.selectedAddress',$this->selectedAddress);

        }elseif($tab=='confirm'){

            $this->resetValidation('paymentMethod');
            $this->rules=[ 'paymentMethod' => 'required'];
            $this->validate();
            Session::put('checkOutSelectedDetail.paymentMethod',$this->selectedAddress);

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
        $this->addressList=CustomerAddress::where('customer_id',$this->user->id)->get();
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


    public function render()
    {
        $this->countSubTotal();
        return view('livewire.cart.view');
    }
}
