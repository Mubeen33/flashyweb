
                  
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Address</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        {{-- <div class="col-md-6 col-12">
                                            <figure class="ps-block--address">
                                                <figcaption>Billing address</figcaption>
                                                <div class="ps-block__content">
                                                    @if(!$billingAddress)
                                                        <p>You Have Not Set Up This Type Of Address Yet.</p>
                                                    @endif
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" 
                                                        data-target="#billingAddressModal">
                                                        Edit
                                                    </button>

                                                    @if($billingAddress)
                                                    <br><br>
                                                    <div class="form-group table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>{{ $billingAddress->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>{{ $billingAddress->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>State</th>
                                                                <td>{{ $billingAddress->state }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Zip Code</th>
                                                                <td>{{ $billingAddress->zip_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Country</th>
                                                                <td>{{ $billingAddress->country }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    @endif
                                                </div>
                                            </figure>
                                        </div> --}}
                                        <div class="col-md-12 col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        @if(!$shippingAddress)
                                                        <p>You Have Not Set Up This Type Of Address Yet.</p>
                                                    @endif
                                            @if($shippingAddress)
                                            
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Address</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Zip Code</th>
                                                        <th>Country</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td>{{ $shippingAddress->address }}</td>
                                                
                                                    <td>{{ $shippingAddress->city }}</td>
                                                
                                                    <td>{{ $shippingAddress->state }}</td>
                                               
                                                    <td>{{ $shippingAddress->zip_code }}</td>
                                                
                                                    <td>{{ $shippingAddress->country }}</td>
                                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" 
                                                        data-target="#shippingAddressModal">
                                                        Edit
                                                    </button></td>
                                                </tr>
                                                <tbody >
                                                  
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                        @endif
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        {{-- <div class="col-md-6 col-12">
                                            <figure class="ps-block--address">
                                                <figcaption>Shipping address</figcaption>
                                                <div class="ps-block__content">
                                                    @if(!$shippingAddress)
                                                        <p>You Have Not Set Up This Type Of Address Yet.</p>
                                                    @endif
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" 
                                                        data-target="#shippingAddressModal">
                                                        Edit
                                                    </button>

                                                    @if($shippingAddress)
                                                    <br><br>
                                                    <div class="form-group table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>{{ $shippingAddress->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>{{ $shippingAddress->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>State</th>
                                                                <td>{{ $shippingAddress->state }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Zip Code</th>
                                                                <td>{{ $shippingAddress->zip_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Country</th>
                                                                <td>{{ $shippingAddress->country }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    @endif
                                                </div>
                                            </figure>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                   
               
    



    <!-- billing address modal -->
    <div class="modal fade" id="billingAddressModal" tabindex="-1" aria-labelledby="modalLabel-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel-1">Billing Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="address-form" action="{{ route('customer.addressUpdate.post') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="Billing">
                <div class="form-group">
                     <label>Address</label>
                     <input type="text" name="address" placeholder="Address" class="form-control" value="@if($billingAddress){{$billingAddress->address}}@endif">
                </div>
                <div class="form-group">
                     <label>City</label>
                     <input type="text" name="city" placeholder="City" class="form-control" value="@if($billingAddress){{$billingAddress->city}}@endif">
                </div>
                <div class="form-group">
                     <label>State</label>
                     <input type="text" name="state" placeholder="State" class="form-control" value="@if($billingAddress){{$billingAddress->state}}@endif">
                </div>
                <div class="form-group">
                     <label>Zip Code</label>
                     <input type="text" name="zip_code" placeholder="Zip Code" class="form-control" value="@if($billingAddress){{$billingAddress->zip_code}}@endif">
                </div>
                <div class="form-group">
                     <label>Country</label>
                     <input type="text" name="country" placeholder="Country" class="form-control" value="@if($billingAddress){{$billingAddress->country}}@endif">
                </div>
                <div class="form-group">
                     <button class="btn btn-primary" type="submit">Update</button>
                </div>
                <br>
            </form>
            <div class="form-group show-errors text-danger"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- billing address modal -->
    <div class="modal fade" id="shippingAddressModal" tabindex="-1" aria-labelledby="modalLabel-2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel-2">Shipping Address</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="address-form" action="{{ route('customer.addressUpdate.post') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="Shipping">
                <div class="form-group">
                     <label>Address</label>
                     <input type="text" name="address" placeholder="Address" class="form-control" value="@if($shippingAddress){{$shippingAddress->address}}@endif">
                </div>
                <div class="form-group">
                     <label>City</label>
                     <input type="text" name="city" placeholder="City" class="form-control" value="@if($shippingAddress){{$shippingAddress->city}}@endif">
                </div>
                <div class="form-group">
                     <label>State</label>
                     <input type="text" name="state" placeholder="State" class="form-control" value="@if($shippingAddress){{$shippingAddress->state}}@endif">
                </div>
                <div class="form-group">
                     <label>Zip Code</label>
                     <input type="text" name="zip_code" placeholder="Zip Code" class="form-control" value="@if($shippingAddress){{$shippingAddress->zip_code}}@endif">
                </div>
                <div class="form-group">
                     <label>Country</label>
                     <input type="text" name="country" placeholder="Country" class="form-control" value="@if($shippingAddress){{$shippingAddress->country}}@endif">
                </div>
                <div class="form-group">
                     <button class="btn btn-primary" type="submit">Update</button>
                </div>
                <br>
            </form>
            <div class="form-group show-errors text-danger"></div>
          </div>
        </div>
      </div>
    </div>



@push('scripts')
<script type="text/javascript" src="{{ asset('js/customer-address.js') }}"></script>
@endpush