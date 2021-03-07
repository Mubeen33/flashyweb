<?php

namespace App\Http\Livewire\Visitor;

use App\Mail\PasswordRecoveryEmail;
use App\Mail\SendDynamicEmail;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BecomeSeller extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $mobile;
    public $company_name;
    public $vat_register;
    public $website_url;
    public $director_first_name;
    public $director_last_name;
    public $director_email;
    public $director_details;
    public $additional_info;
    public $form_status;



    protected $rules = [
        'first_name'=>'required|string|max:50|min:3',
        'last_name'=>'required|string|max:50|min:3',
        'email'=>'required|string|email|max:99|unique:vendors',
        'phone'=>'required|string',
        'mobile'=>'required|min:9|max:16',
        'company_name'=>'required|string|max:50',
        'vat_register'=>'required|string|in:Yes,No',

        'website_url'=>'nullable|string|url',
        'director_details'=>'nullable|string|max:200',
        'director_first_name'=>'nullable|string|max:50',
        'director_last_name'=>'nullable|string|max:50',
        'director_email'=>'nullable|string|email|max:100',
        'additional_info'=>'nullable|string',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }
    public function submit(){
        $validatedData = $this->validate();
//        dd($validatedData);
        $result=Vendor::create($validatedData);
        if($result){
                //send email
                $subject = 'Vendor Request';

                if ($subject) {
                    Mail::to($this->email)->send(new SendDynamicEmail(
                        $this->first_name,$this->last_name, $subject
                    ));
                }
            $this->reset();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Successfully!',
                'message' => 'Thank you for request we will back to you',
                'icon' => 'success',
            ]);
        }else{
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Error!',
                'message' => 'Something is going wrong please try again!',
                'icon' => 'error',
            ]);
        }



    }
    public function render()
    {
        return view('livewire.visitor.become-seller');
    }
}
