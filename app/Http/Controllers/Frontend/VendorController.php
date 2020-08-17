<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Models\Vendor;

class VendorController extends Controller
{
    //vendor registration
    public function vendor_registration(){
        return view('Frontend.Pages.vendor_registration');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store vendor requests
        //store vendor requests
        $this->validate($request, [
           'first_name'=>'required|string|max:50',
           'last_name'=>'required|string|max:50',
           'email'=>'required|string|email|max:99|unique:vendors',
           'mobile'=>'required|string|max:16',
           'company_name'=>'required|string|max:50',
           'is_vat_registered'=>'required|string|in:Yes,No',
        ]);
        
        //optional fields
        if(request('website')){
            $this->validate($request, [
               'website'=>'nullable|required|string|url',
            ]);
        }
        if(request('business_director_details')){
            $this->validate($request, [
               'business_director_details'=>'nullable|required|string|max:200',
            ]);
        }
        if(request('business_director_first_name')){
            $this->validate($request, [
               'business_director_first_name'=>'required|string|max:50',
            ]);
        }
        if(request('business_director_last_name')){
            $this->validate($request, [
               'business_director_last_name'=>'required|string|max:50',
            ]);
        }
        if(request('business_director_email')){
            $this->validate($request, [
               'business_director_email'=>'required|string|email|max:100',
            ]);
        }
        if(request('business_additional_info')){
            $this->validate($request, [
               'business_additional_info'=>'required|string',
            ]);
        }
        
        
        //if validation pass
        $inserted = Vendor::insert([
           'first_name'=> $request->first_name,
           'last_name'=> $request->last_name,
           'email'=> $request->email,
           'phone'=> $request->phone,
           'mobile'=> $request->mobile,
           'vat_register'=> $request->is_vat_registered,
           'company_name'=> $request->company_name,
           'website_url'=> $request->website,

           'director_first_name'=> $request->business_director_first_name,
           'director_last_name'=> $request->business_director_last_name,
           'director_email'=> $request->business_director_email,
           'director_details'=> $request->business_director_details,
           'additional_info'=> $request->business_additional_info,
           'created_at'=> Carbon::now()
        ]);
        
        if($inserted == true){
            return redirect()->back()->with('success', 'Application success, we will notify shortly.');
        }
        return redirect()->back()->with('error', 'SORRY - Something wrong, please try again later.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
