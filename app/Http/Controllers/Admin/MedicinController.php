<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicin\StoreRequest;
use Illuminate\Http\Request;
use App\Models\admin\Medicin;
use Session;
class MedicinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicins = Medicin::whenSearch($request->search)->paginate(20);
    //    return $medicins->('name') ;
       foreach ($medicins as $key => $value) {
       return $value->name;
       }
        return view('admin.pages.medicins.medicins', compact('medicins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.medicins.medicin_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {  
        $medicin = new Medicin();
        $medicin
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $medicin->price = $request->input('price');
        $medicin->save();
        Session::flash('success','Medicin Added Successfully');
        return redirect()->route('medicins.index');
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
        $medicin = Medicin::find($id);
        return view('admin.pages.medicins.medicin_details', compact('medicin'));
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
        $medicin = Medicin::find($id);
        $medicin
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $medicin->price = $request->input('price');
        $medicin->save();
        Session::flash('success','Medicin Updated Successfully');
        return redirect()->route('medicins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicin = Medicin::find($id);
        $medicin->delete();
        Session::flash('success','Medicins Deleted Successfully');
        return redirect()->route('medicins.index');
    }
}
