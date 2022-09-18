<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\Purchase;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\admin\Medicin;
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
        $purchases = Purchase::whereHas('Organization' , function($q) use($search) {
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
        $data = $request->all();
        Purchase::create($data);
        Session::flash('success','Purchases Added Successfully');
        return redirect()->route('purchases.index');  
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
        return view('admin.pages.purchases.purchase_details', compact('purchase','organizations','branches','medicins'));
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
        $purchase = Purchase::find($id);
        $data = $request->all();
        $purchase->update($data);
        Session::flash('success','Purchase Updated Successfully');
        return redirect()->route('purchases.index');  
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
        $purchase->delete();
        Session::flash('success','Purchase Deleted Successfully');
        return redirect()->route('purchases.index');
    }
}
