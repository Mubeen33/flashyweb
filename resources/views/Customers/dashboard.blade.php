@extends('layouts.master')
@push('styles')
<style type="text/css">
    #searchKey__,
    #selected_row_per_page,
    #hidden__status{
        border: 1px solid #ddd;
        padding: 2px 10px;
        outline: none;
    }
</style>
@endpush
@section('content')
    <main class="ps-page--my-account">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li id="page_breadcrumb">Customer / Dashboard</li>
                </ul>
            </div>
        </div>

        @if(session()->has('success'))
        <div class="container mt-3">
            <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Your Order has been placed successfully
        </div>
        </div>
        @endif
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            @include('Customers.partials.dashboard-left')
                        </div>
                    </div>
                    <div class="col-lg-8" id="customer_content">
                        
                </div>
            </div>
        </section>

    </main>
    @push('scripts')
    <script>
        $(function () {
    $('#customer_address').on('click', function () {
        $.ajax({
            
                url: "{{ route('customer.address.get') }}",
                success: function(data){
                    
                    $('#customer_content').html(data);
                    $('#page_breadcrumb').text('Customer / Address');
                }
            });
    });
    });
    $(function () {
    $('#customer_profile').on('click', function () {
        $.ajax({
            
                url: "{{ route('customer.profile.get') }}",
                success: function(data){
                    
                    $('#customer_content').html(data);
                    $('#page_breadcrumb').text('Customer / Profile');
                  
                }
            });
    });
    }); 
    $(document).ready(function() {
    $.ajax({
            
            url: "{{ route('customer.profile.get') }}",
            success: function(data){
                
                $('#customer_content').html(data);
                $('#page_breadcrumb').text('Customer / Profile');
              
            }
        });
    });
    $(function () {
    $('#customer_orders').on('click', function () {
        $.ajax({
            
                url: "{{ route('customer.orders.index') }}",
                success: function(data){
                    
                    $('#customer_content').html(data);
                    $('#page_breadcrumb').text('Customer / Orders');
                  
                }
            });
    });
    });
    $(function() {
          $( 'ul.customer_menu li' ).on( 'click', function() {
                $( this ).parent().find( 'li.active' ).removeClass( 'active' );
                $( this ).addClass( 'active' );
          });
    });
  
   
        
    </script>
    @if(session()->has('success'))
    <script type="text/javascript">
        $(function() {
                $( 'ul.customer_menu li' ).parent().find( 'li.active' ).removeClass( 'active' );
                $( '#customer_ordersTab' ).addClass( 'active' );
                $.ajax({
            
                url: "{{ route('customer.orders.index') }}",
                success: function(data){
                    
                    $('#customer_content').html(data);
                    $('#page_breadcrumb').text('Customer / Orders');
                  
                }
            });
    });
    </script>
    @endif
    
    <script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
    @endpush
@endsection
