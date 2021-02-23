<?php

namespace App\Http\Livewire\Cart;

use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AddAddress extends Component
{
    public $user;
    public $type;
    public $recipient_name;
    public $recipient_phone_no;
    public $street_address;
    public $business_name;
    public $building_complex;
    public $suburb;
    public $city_town;
    public $province;
    public $postal_code;
    public $address_id;
    public $action = false;
    protected $listeners = ['editAddress' => 'editAddress'];

    protected $rules = [
        'type' => 'required',
        'recipient_name' => 'required|min:3',
        'recipient_phone_no' => 'required|min:9|max:15',
        'street_address' => 'required|min:10',
        'business_name' => 'nullable',
        'building_complex' => 'nullable',
        'suburb' => 'nullable',
        'city_town' => 'required',
        'province' => 'required',
        'postal_code' => 'required',
    ];

    public function mount()
    {
        $this->user = Auth::user();

    }

    public function updated($propertyName)
    {
//        $this->dispatchBrowserEvent('swal', [
//            'title' => 'This is the Title',
//            'message' => 'This is the heading message',
//            'icon' => 'error',
//
//        ]);
//        $this->dispatchBrowserEvent('toast', [
//            'icon' => 'error',
//            'title' => 'This is the title message'
//        ]);

//        $this->emit('updateTab','address');

        $this->validateOnly($propertyName);
    }

    public function editAddress($id)
    {


        $address = CustomerAddress::findOrFail($id);
        $this->address_id = $address->id;
        $this->type = $address->type;
        $this->recipient_name = $address->recipient_name;
        $this->recipient_phone_no = $address->recipient_phone_no;
        $this->street_address = $address->street_address;
        $this->business_name = $address->business_name;
        $this->building_complex = $address->building_complex;
        $this->suburb = $address->suburb;
        $this->city_town = $address->city_town;
        $this->province = $address->province;
        $this->postal_code = $address->postal_code;
        $this->emit('updateTab', 'add-address');
    }

    public function createAddress()
    {
        $validatedData = $this->validate();
        $validatedData['customer_id'] = $this->user->id;
        CustomerAddress::create($validatedData);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Successfully!',
                'message' => 'Your Address has been Added Successfully',
                'icon' => 'success',
            ]);
        $this->emit('updateTab', 'address');
    }

    public function updateAddress($address_id)
    {
        $validatedData = $this->validate();
        CustomerAddress::where('id', $address_id)->update($validatedData);
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Successfully!',
            'message' => 'Your Address has been Updated Successfully',
            'icon' => 'success',

        ]);
        $this->emit('updateTab', 'address');
    }

    public function render()
    {
        return view('livewire.cart.add-address');
    }

}
