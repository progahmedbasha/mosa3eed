<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\Purchase;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\admin\Medicin;
use App\Models\BranchMedicin;
use App\Http\Requests\Purchase\StoreRequest;
use Session;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $purchases = Purchase::whenSearch($request->search)->orWhereHas('Organization' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->orWhereHas('Branch' , function($q) use($search) {
                $q->where('phone_1',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->paginate(20);
        return view('admin.pages.purchases.purchases', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        $branches = Branch::all();
        $medicins = Medicin::all();
        return view('admin.pages.purchases.purchase_add', compact('organizations','branches','medicins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
      
       $product = Purchase::create([
            'organization_id' => $request->organization_id ,
            'medicin_id' => $request->medicin_id ,
            'type_measurement' => $request->type_measurement ,
            'qty' => $request->qty ,
            'branch_id' => $request->branch_id ,
            'acd' => $request->acd ,
            'due_date' => $request->due_date ,
          ]);
       $medicin = BranchMedicin::where('medicin_id', $product->medicin_id)->where('branch_id', $product->branch_id)->first();
       if($medicin == null)
       {
            BranchMedicin::create([
            'branch_id' => $request->branch_id ,
            'medicin_id' => $request->medicin_id ,
            'available_quantity' => $request->qty ,
            'price' => $request->price ,
          ]);
       }
       else {
         BranchMedicin::where('medicin_id', $product->medicin_id)->where('branch_id', $product->branch_id)->update(['available_quantity' => $medicin->available_quantity + $request->qty]);
       }
    
        
        return redirect()->route('purchases.index')->with('success','Purchases Added Successfully');  
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
        $purchase = Purchase::find($id);
        $organizations = Organization::all();
        $branches = Branch::all();
        $medicins = Medicin::all();
        $price = BranchMedicin::where('branch_id', $purchase->branch_id)->where('medicin_id', $purchase->medicin_id)->first();
        return view('admin.pages.purchases.purchase_details', compact('purchase','organizations','branches','medicins','price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $product = Purchase::find($id);
        $product->update([
            'organization_id' => $request->organization_id ,
            'medicin_id' => $request->medicin_id ,
            'type_measurement' => $request->type_measurement ,
            'qty' => $request->qty ,
            'branch_id' => $request->branch_id ,
            'acd' => $request->acd ,
            'due_date' => $request->due_date ,
          ]);
        $medicin = BranchMedicin::where('medicin_id', $product->medicin_id)->where('branch_id', $product->branch_id)->first();
         $medicin->update([
            'available_quantity' => $medicin->available_quantity + $request->qty,
             'price' => $request->price
             ]);
        return redirect()->route('purchases.index')->with('success','Purchase Updated Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        $medicin = BranchMedicin::where('medicin_id', $purchase->medicin_id)->where('branch_id', $purchase->branch_id)->first();
        $medicin->update([
            'available_quantity' => $medicin->available_quantity - $purchase->qty,
             ]);
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success','Purchase Deleted Successfully');
    }
}
