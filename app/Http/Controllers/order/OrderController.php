<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\VendorProduct;
use Auth;

class OrderController extends Controller
{

    public function __construct(){
        $this->middleware('auth:customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::where([
                    'customer_id'=>Auth::guard('customer')->user()->id
                ])
                ->with(['get_vendor', 'get_vendor_product'])
                ->orderBy('created_at', 'DESC')
                ->groupby('order_id')
                ->paginate(5);
                echo "<pre>";
                print_r($data);
                return;
        return view('orders.index', compact('data'));
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
        //
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





    //ajax fetch
    public function fetch_orders_list(Request $request){
        if ($request->ajax()) {
            $searchKey = $request->search_key;
            $sort_by = $request->sort_by;
            $sorting_order = $request->sorting_order;
            $status = $request->status;
            $row_per_page = $request->row_per_page;
            $vendor_id = $request->id;

            if (empty($sort_by)) {
                $sort_by = "created_at";
            }
            if (empty($sorting_order)) {
                $sorting_order = "DESC";
            }

            $authCustomerID = Auth::guard('customer')->user()->id;

            if (!empty($searchKey)) {
                $ven_product_id_list = [];
                $productIDList = [];
                //if search key only contain numeric
                if (is_numeric($searchKey)) {
                    //search order ID
                    $order_id_list = Order::where('order_id', 'LIKE', "%$searchKey%")
                                            ->where('customer_id', '=', $authCustomerID)
                                            ->get('vendor_product_id');
                    foreach ($order_id_list as $key => $value) {
                        $ven_product_id_list[] = $value->vendor_product_id;
                    }
                    $product_id_list = Product::where('id', 'LIKE', "%$searchKey%")->get('id');
                    foreach ($product_id_list as $key => $value) {
                        $productIDList[] = $value->id;
                    }
                }

                //products
                $products = Product::where('title', 'LIKE', "%$searchKey%")->get('id');
                foreach ($products as $key => $value) {
                    $productIDList[] = $value->id;
                }

                //vendor products
                $productIDList = array_unique($productIDList);
                $vendor_products = VendorProduct::whereIn('prod_id', $productIDList)
                                            ->where([
                                                'active'=>1
                                            ])
                                            ->get('id');
                
                foreach ($vendor_products as $key => $value) {
                    $ven_product_id_list[] = $value->id;
                }


                //unique the array - the id list of vendor_products tbl id
                $ven_product_id_list = array_unique($ven_product_id_list);

                //if have status
                if (!empty($status)) {
                    $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where([
                            'customer_id'=>$authCustomerID,
                            'status'=>$status
                        ])
                        ->with(['get_vendor', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                    return view('orders.partials.orders-list', compact('data'))->render();
                }

                $data = Order::whereIn('vendor_product_id', $ven_product_id_list)
                        ->where('customer_id', $authCustomerID,)
                        ->with(['get_vendor', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }


            //without search key

            //if only have status
            if (!empty($status)) {
                $data = Order::where([
                        'customer_id'=>$authCustomerID,
                        'status'=>$status
                    ])
                    ->with(['get_vendor', 'get_vendor_product'])
                    ->orderBy($sort_by, $sorting_order)
                    ->paginate($row_per_page);
                return view('orders.partials.orders-list', compact('data'))->render();
            }

            $data = Order::where('customer_id', $authCustomerID)
                        ->with(['get_vendor', 'get_vendor_product'])
                        ->orderBy($sort_by, $sorting_order)
                        ->paginate($row_per_page);
            return view('orders.partials.orders-list', compact('data'))->render();
            
        }
        return abort(404);
    }
}
