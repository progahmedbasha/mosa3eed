<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\SaleBill;
use App\Models\admin\Medicin;
use App\Models\OrderItem;
use App\Models\SaleBillProduct;
use App\Models\BranchMedicin;
use Illuminate\Http\Request;

class SalePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $sale_bills = SaleBill::withCount('SaleBillProduct')->whenSearch($request->search)->paginate(20);
        return view('admin.pages.sale_bills.sale_bills', compact('sale_bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empty = SaleBill::get();
        if($empty->count() < 1)
        {
            $order_number = 1;
        }

        else {
            $order_number = SaleBill::get()->last()->bill_number+1;
        }
    
        return view('admin.pages.pos.sale_page', compact('order_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for ceate last otder number
        $order_number = SaleBill::get()->last()->bill_number+1;
        $order = new SaleBill();
        $order->bill_number = $request->order_number;
        $order->user_id = Auth::user()->id;
        $order->branch_id = Auth::user()->branch_id;
        $order->status = "Active";
        $order->save();

            $countItems = count($request->product_id);
            // // save in multi record
              for($i=0; $i<$countItems; $i++){
                $product_bill = new SaleBillProduct();
                $product_bill->sale_bill_id = $order->id;
                $product_bill->medicin_id = $request->product_id[$i];
                $product_bill->price = $request->price[$i];
                $product_bill->qty = $request->qty[$i];
                // $product_bill->total_cost = $request->total_cost[$i];
                $product_bill->total_cost = $request->price[$i] * $request->qty[$i];
                $product_bill->save();

                //update qty
                $new_qty =  $request->qty[$i];
                $product = BranchMedicin::where('medicin_id',$request->product_id[$i])->where('branch_id',Auth::user()->branch_id )->first();
                $old_qty = $product->qty;
                $set_qty = $old_qty - $new_qty ;
                $product->update(['qty' => $set_qty]);
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
    public function show(Request $request, $id)
    {
        $sale_number = SaleBill::where('id', $id)->first();
        $search = $request->search;
        $sale_bills = SaleBillProduct::where('sale_bill_id', $id)->whenSearch($request->search)->paginate(20);
        return view('admin.pages.sale_bills.sale_bill_items_show', compact('sale_bills','sale_number','id'));
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
        $bill = SaleBill::find($id);
        $bill->delete();
        return redirect()->route('sale_page.index')->with('success','SaleBill Deleted Successfully');
    }
    public function item_edite($order , $id)
    {
        // return $id;
         $bill_number = SaleBill::find($order);
         $bill_item = SaleBillProduct::find($id);
        $medicins = Medicin::all();
         return view('admin.pages.sale_bills.sale_bill_item_edit', compact('bill_item','bill_number','medicins'));
    }
    public function item_update(Request $request , $id)
    {
         // for return page order id 
         $bill_number = $request->input('bill_number');

        $item = SaleBillProduct::find($id);
        $item->medicin_id = $request->input('medicin_id');
        $item->qty = $request->input('qty');
        $item->price = $request->input('price');
        $item->total_cost = $request->input('price') * $request->input('qty');
        $item->save();
      return redirect()->route('sale_page.show',$bill_number)->with('success','Request Updated Successfully');
    }
    public function  order_item_delete($order, $id)
    {
        $bill = SaleBillProduct::find($id);
        $bill->delete();
        return redirect()->route('sale_page.show',$order)->with('success','Item Deleted Successfully');
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
        $total = $product_bill->price * $product_bill->qty;

        $html = view('admin.pages.pos.buying_table_ajax', compact('product_name','product_bill','price'))->render();
        return response()->json(['status' => true, 'result' => $html, 'total' =>$total]);
    }
    public function sale_ajax_destroy(Request $request)
    {
        $id = $request->id_product;
        $row = OrderItem::where('id', $id)->first();
        $price = $row->qty * $row->price;
        $row->delete();
        return response()->json([
            'success' => 'Record deleted successfully!',
            'price' => $price,
        ]);
    }
    public function update_qty_ajax(Request $request)
    {
        // return 11;
        $new_qty = $request->qty;
        $product = OrderItem::where('id',$request->product_id)->first();
        $old_qty = $product->qty;
        $product->update(['qty' => $new_qty]);
       $total_price_item = $request->qty * $request->price;
        return response()->json(['status' => true, 'total_price_item' => $total_price_item]);
    }
    
}
