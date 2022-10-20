<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissedItem;
use App\Models\User;
use App\Models\admin\Branch;
use App\Models\admin\Medicin;
use App\Http\Requests\MissedItem\StoreRequest;
use Session;
class MissedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $missed_items = MissedItem::whereHas('User' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->orWhereHas('Branch' , function($q) use($search) {
                $q->where('phone_1',$search)->orWhere('name', 'like', '%' .$search. '%');})
                 ->orWhereHas('Medicin' , function($q) use($search) {
                $q->where('price',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->paginate(20);

        return view('admin.pages.missed_items.missed_items', compact('missed_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $branches = Branch::all();
        $medicins = Medicin::all();
        return view('admin.pages.missed_items.missed_item_add', compact('users','branches','medicins'));
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
        MissedItem::create($data);
        Session::flash('success','Missed Item Added Successfully');
        return redirect()->route('missed_items.index');
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
        $missed_item = MissedItem::find($id);
        $users = User::all();
        $branches = Branch::all();
        $medicins = Medicin::all();
        return view('admin.pages.missed_items.missed_item_details', compact('missed_item','users','branches','medicins'));
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
        $missed_item = MissedItem::find($id);
        $data = $request->all();
        $missed_item->update($data);
        Session::flash('success','Missed Item Updated Successfully');
        return redirect()->route('missed_items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $missed = MissedItem::find($id);
        $missed->delete();
        Session::flash('success','Missed Item Deleted Successfully');
        return redirect()->route('missed_items.index');
    }
}
