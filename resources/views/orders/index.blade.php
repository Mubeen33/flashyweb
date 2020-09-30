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
                    <li><a href="index.html">Home</a></li>
                    <li>Customer / Orders</li>
                </ul>
            </div>
        </div>
        <section class="ps-section--account">
            <div class="container">
                @include('msg.msg')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ps-section__left">
                            @include('Customers.partials.dashboard-left')
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                                
                               <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between">
                                                <div><h4 class="card-title">My Orders ({{$data->total()}})</h4></div>
                                                <div>
                                                    <select id="hidden__status" title="Sort By Status">
                                                        <option value="" selected>Status</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Canceled">Canceled</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                    <input type="text" id="searchKey__" placeholder="Search">
                                                    <select id="selected_row_per_page" title="Display row per page">
                                                        <option value="5" selected="1">Show 5</option>
                                                        <option value="10">Show 10</option>
                                                        <option value="15">Show 15</option>
                                                        <option value="20">Show 20</option>
                                                        <option value="25">Show 25</option>
                                                        <option value="30">Show 30</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Order ID</th>
                                                                    <th>Vendor</th>
                                                                    <th>Product</th>
                                                                    <th>Category</th>
                                                                    <th>Price</th>
                                                                    <th>Image</th>
                                                                    <th>Order QTY</th>
                                                                    <th class="sortAble" sorting-column='created_at' sorting-order='DESC'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/> <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 3.707 5.354 6.354a.5.5 0 1 1-.708-.708l3-3z"/> </svg>
                                                                        Order Date
                                                                    </th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody id="render__data">
                                                                @include('orders.partials.orders-list')
                                                            </tbody>
                                                            
                                                        </table>
                                                        <input type="hidden" id="hidden__action_url" value="{{ route('customer.orders.ajaxPgination') }}">
                                                        <input type="hidden" id="hidden__page_number" value="1">
                                                        <input type="hidden" id="hidden__sort_by" value="created_at">
                                                        <input type="hidden" id="hidden__sorting_order" value="DESC">
                                                        <input type="hidden" id="hidden__id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection



@push('scripts')

<script type="text/javascript">
    //if change status
    $("#hidden__status").on('change', function(){
        let action_url = $("#hidden__action_url").val()
        let searchKey = $("#searchKey__").val()
        let pageNumber = 1;
        let sort_by = $("#hidden__sort_by").val()
        let sorting_order = $("#hidden__sorting_order").val()
        let hidden__status = $(this).val()
        let row_per_page = $("#selected_row_per_page").val()
        let hidden__id = $("#hidden__id").val()
        fetch_paginate_data(action_url, pageNumber, searchKey, sort_by, sorting_order, hidden__status, row_per_page, hidden__id);
    })
</script>

<script type="text/javascript" src="{{ asset('js/ajax-pagination.js') }}"></script>
@endpush