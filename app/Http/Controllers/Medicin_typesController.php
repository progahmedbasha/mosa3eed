<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinType;

class Medicin_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $medicin_types = MedicinType::all();
        return view('admin.pages.medicin_types.medicin_types', compact('medicin_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.medicin_types.medicin_type_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicin_type = new MedicinType();
        $medicin_type
        ->setTranslation('type', 'en', $request->input('type_en'))
        ->setTranslation('type', 'ar', $request->input('type_ar')) ;
        $medicin_type->save();
        return redirect()->route('medicin_types.index')->with('success','Medicin Type Added Successfully');
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
         $medicin_type = MedicinType::find($id);
        return view('admin.pages.medicin_types.medicin_type_details', compact('medicin_type'));
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
        $medicin_type = MedicinType::find($id);
        $medicin_type
        ->setTranslation('type', 'en', $request->input('type_en'))
        ->setTranslation('type', 'ar', $request->input('type_ar')) ;
        $medicin_type->save();
        return redirect()->route('medicin_types.index')->with('success','Medicin Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = MedicinType::find($id);
        $type->delete();
        return redirect()->route('medicin_types.index')->with('success','Medicin Type Deleted Successfully');
    }
}
