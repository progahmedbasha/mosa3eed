<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SaleBill;
use App\Models\admin\Medicin;
use App\Models\admin\Branch;
use App\Models\BranchMedicin;
use App\Models\UserBranch;
use App\Models\OrderItem;
use App\Models\SaleBillProduct;
use App\Models\organization\Purchase;
use Session;
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
        // fo get all organization branches 
        $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
        foreach ($branches as $branch) {
            $sale_bills = SaleBill::where('branch_id',$branch->id)->withCount('SaleBillProduct')->whenSearch($request->search)->paginate(20);
        }
        return view('organization.pages.sale_bills.sale_bills', compact('sale_bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->user_type_id == 4)
        {
            $branches = UserBranch::where('user_id' , Auth::user()->id)->get();
        }
        elseif(Auth::user()->user_type_id == 3)
        {
            $branches = Branch::where('organization_id' , Auth::user()->organization_id)->get();
        }
        // $branches = UserBranch::where('user_id' , Auth::user()->id)->get();
         $empty = SaleBill::where('branch_id',Auth::user()->branch_id)->get();
        if($empty->count() < 1)
        {
            $order_number = 1;
        }
        else {
          return  $order_number = SaleBill::where('branch_id',Auth::user()->branch_id)->get()->last()->bill_number+1;
        }
    
        return view('organization.pages.pos.sale_page', compact('order_number','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // return $request;
        // for ceate last otder number
       $sales = SaleBill::where('branch_id', $request->branch_id)->first();
        //if condiction sallbill empty 
        if($sales == null)
        {
            // return 1;
    //    $order_number = SaleBill::get()->last()->bill_number+1;
        $order = new SaleBill();
        $order->bill_number = 1;
        $order->user_id = Auth::user()->id;
        $order->branch_id = $request->branch_id;
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
                $product = BranchMedicin::where('medicin_id',$request->product_id[$i])->where('branch_id', $request->branch_id )->first();
                $old_qty = $product->available_quantity;
                $set_qty = $old_qty - $new_qty ;
                $product->update(['available_quantity' => $set_qty]);
             
              }
        }
        else
        {
        $order_number = SaleBill::where('branch_id', $request->branch_id)->get()->last()->bill_number+1;
        $order = new SaleBill();
        $order->bill_number = $order_number;
        $order->user_id = Auth::user()->id;
        $order->branch_id = $request->branch_id;
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
                $product = BranchMedicin::where('medicin_id',$request->product_id[$i])->where('branch_id', $request->branch_id )->first();
                $old_qty = $product->available_quantity;
                $set_qty = $old_qty - $new_qty ;
                $product->update(['available_quantity' => $set_qty]);
              }
        }
        //endif condiction sallbill empty 
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
        return view('organization.pages.sale_bills.sale_bill_items_show', compact('sale_bills','sale_number','id'));
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
        return redirect()->route('organization_sale_page.index')->with('success','SaleBill Deleted Successfully');
    }
    public function item_edite($order , $id)
    {
         $bill_number = SaleBill::find($order);
         $bill_item = SaleBillProduct::find($id);
        $medicins = Medicin::all();
         return view('organization.pages.sale_bills.sale_bill_item_edit', compact('bill_item','bill_number','medicins'));
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
      return redirect()->route('organization_sale_page.show',$bill_number)->with('success','Request Updated Successfully');
    }
    public function  order_item_delete($order, $id)
    {
        $bill = SaleBillProduct::find($id);
        $bill->delete();
        return redirect()->route('organization_sale_page.show',$order)->with('success','Item Deleted Successfully');
    }
    public function sale_store_ajax(Request $request)
    {
   
        if(request()->branch)
        {
                $new_qty =  $request->qty;
                $product = BranchMedicin::where('medicin_id',$request->product_id)->where('branch_id', $request->branch )->first();
                if($product ==null)
                {
                    $msg = "qty not in stock"; 
                    $total = $request->total ;
                    return response()->json(['status' => false, 'total' =>$total, 'error_stock' => $msg]);
                }
                $old_qty = $product->available_quantity;
            if($old_qty >= $new_qty)
            {        
                $medicin = Medicin::where('barcode', $request->product_id)->first();
                $product_bill = new OrderItem();
                $product_bill->bill_number = $request->order_number;
                $product_bill->medicin_id = $medicin->id;
                $product_bill->price = $medicin->price;
                $product_bill->qty = $request->qty;
                $product_bill->discnum = $request->discnum;
                $product_bill->discpersent = $request->discpersent;

                if (request()->discpersent){
                $product_bill->total_cost =   number_format( ( $medicin->price -   ($medicin->price  * $product_bill->discpersent / 100  ) )* $request->qty , 2);
                }else{
                    $product_bill->total_cost = ($medicin->price  - $product_bill->discnum ) * $product_bill->qty ;
                }
                $product_bill->save();

                $product_name = $product_bill->Medicin;
                $price = $product_bill->price * $product_bill->qty;
                $total = $product_bill->total_cost;

                $html = view('organization.pages.pos.buying_table_ajax', compact('product_name','product_bill','price'))->render();
                return response()->json(['status' => true, 'result' => $html, 'total' =>$total]);
                }
                else{
                        $msg = "qty not true"; 
                        $total = $request->total ;
                        return response()->json(['status' => false, 'total' =>$total, 'error' => $msg]);
                }
        }
        else{
            $msg= "No branch"; 
            // return $response;
            $total = 0 ;
            return response()->json(['status' => false, 'total' =>$total, 'error_branch' => $msg]);
        }

    }
    
    
    public function sale_ajax_destroy(Request $request)
    {
        $id = $request->id_product;
        $row = OrderItem::where('id', $id)->first();
        // $price = $row->qty * $row->price;
        $price = $row->total_cost ;
        $row->delete();
        return response()->json([
            'success' => 'Record deleted successfully!',
            'price' => $price,
        ]);
    }
    public function update_qty_ajax(Request $request)
    {
        // return $request;    
                $branchprod_qty = BranchMedicin::where('medicin_id',$request->medicin_id)->first();
                $old_qty =  $branchprod_qty->available_quantity;
                $new_qty = $request->qty;
      
        if($old_qty >= $new_qty)
            {
                $product = OrderItem::where('id',$request->product_id)->first();
                $product->update(['qty' => $new_qty]);
                $total_price_item = $request->qty * $product->total_cost;
                return response()->json(['status' => true, 'total_price_item' => $total_price_item]);
            }
        else{
            $msg= "qty error"; 
            $total = 0 ;
            return response()->json(['status' => false, 'total' =>$total, 'error_qty' => $msg]);
        }
    }
    public function get_bill_number_ajax(Request $request)
    {
        // return 1;
        $order_number = SaleBill::where('branch_id', $request->branch)->first();
        if($order_number == null)
        {
            $order_number = 1;
        }
        else{
            $order_number = SaleBill::where('branch_id', $request->branch)->get()->last()->bill_number+1;
        }
      return response()->json(['status' => true, 'order_number' => $order_number]);
    }
    public function get_order_disc_num_ajax(Request $request)
    {
            // return $request;
            $total = $request->total;
            $dic = $request->dicount;
            $new_total = $total - $dic;
            $order_total_dic =   number_format( ( $total - $dic ) , 2);
        return response()->json(['status' => true, 'dic' => $dic, 'total' => $total, 'order_total_dic' => $order_total_dic]);
    }
        public function get_order_disc_persent_ajax(Request $request)
    {
            // return $request;
            $total = $request->total;
            $dic = $request->dicount;
            $order_total_dic =   number_format( ( $total -   ($total  * $dic / 100  ) ) , 2);
            // $new_total = $total - $dic;
        return response()->json(['status' => true, 'dic' => $dic, 'total' => $total, 'order_total_dic' =>$order_total_dic]);
    }
    
}
