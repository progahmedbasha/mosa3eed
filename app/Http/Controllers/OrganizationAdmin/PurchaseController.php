<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrganizationDashboard\purchases\StoreRequest;
use App\Models\organization\Purchase;
use App\Models\admin\Branch;
use App\Models\admin\Medicin;
use App\Models\BranchMedicin;
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
        $purchases = Purchase::where('organization_id', Auth::user()->oraganization_id)->whenSearch($request->search)->orWhereHas('Organization' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->orWhereHas('Branch' , function($q) use($search) {
                $q->where('phone_1',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->paginate(20);
        return view('organization.pages.purchases.purchases', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $medicins = Medicin::all();
        return view('organization.pages.purchases.purchase_add', compact('branches','medicins'));
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
            'organization_id' => Auth::user()->organization_id ,
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
        return redirect()->route('organization_purchases.index')->with('success','Purchases Added Successfully');  
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
        $branches = Branch::all();
        $medicins = Medicin::all();
        $price = BranchMedicin::where('branch_id', $purchase->branch_id)->where('medicin_id', $purchase->medicin_id)->first();
        return view('organization.pages.purchases.purchase_details', compact('purchase','branches','medicins','price'));
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
        $product = Purchase::find($id);
        $product->update([
            'organization_id' => Auth::user()->organization_id ,
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
        
        return redirect()->route('organization_purchases.index')->with('success','Purchases Updated Successfully');  

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
        return redirect()->route('organization_purchases.index')->with('success','Purchase Deleted Successfully');
    }
}
