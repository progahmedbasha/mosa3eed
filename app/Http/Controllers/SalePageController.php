<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\SaleBill;
use App\Models\admin\Medicin;
use App\Models\OrderItem;
use App\Models\SaleBillProduct;
use Illuminate\Http\Request;

class SalePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empty = SaleBill::get();
        if($empty->count() < 1)
        {
            $order_number = 1;
        }
    //   return  $order = [];
        // $order_number = SaleBill::get()->last()->id+1;
        // if(!empty($empty)){
        //   $order_number = 1;
        // }
        else {
            $order_number = SaleBill::get()->last()->bill_number+1;
        }
    
        return view('admin.pages.pos.sale_page', compact('order_number'));
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
        $order = new SaleBill();
        $order->bill_number = $request->order_number;
        $order->user_id = Auth::user()->id;
        $order->status = "Active";
        $order->save();

            $countItems = count($request->product_id);
            // // save in multi record
              for($i=0; $i<$countItems; $i++){
                $product_bill = new SaleBillProduct();
                $product_bill->bill_id = $order->id;
                $product_bill->medicin_id = $request->product_id[$i];
                $product_bill->price = $request->price[$i];
                $product_bill->qty = $request->qty[$i];
                $product_bill->total_cost = $request->total_cost[$i];

                $product_bill->save();
              }
              OrderItem::where('bill_number', $order->bill_number)->delete();
        return redirect()->back()->with('success', 'Sale Bille SAved Successfully');  

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
    public function sale_store_ajax(Request $request)
    {
            $medicin = Medicin::where('barcode', $request->product_id)->first();
            $product_bill = new OrderItem();
            $product_bill->bill_number = $request->order_number;
            $product_bill->medicin_id = $medicin->id;
            $product_bill->price = $medicin->price;
            $product_bill->qty = $request->qty;
            $product_bill->total_cost = $medicin->price * $product_bill->qty;
            $product_bill->save();

            $product_name = $product_bill->Medicin;
            $price = $product_bill->price * $product_bill->qty;

            // $total = OrderItem::where('bill_number', $product_bill->bill_number)->get();
            $total_order = $product_bill->where('bill_number', $product_bill->bill_number)->sum('total_cost');
        
        $html = view('admin.pages.pos.buying_table_ajax', compact('product_name','product_bill','price'))->render();
        return response()->json(['status' => true, 'result' => $html, 'total_order' =>$total_order]);
    }
    
}
