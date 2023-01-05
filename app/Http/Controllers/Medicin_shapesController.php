<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinShape;
class Medicin_shapesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicin_shapes = MedicinShape::all();
        return view('admin.pages.medicin_shapes.medicin_shapes', compact('medicin_shapes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.medicin_shapes.medicin_shape_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shape = new MedicinShape();
        $shape
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $shape->save();
        return redirect()->route('medicin_shapes.index')->with('success','Medicin Shape Added Successfully');
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
        $medicin_shape = MedicinShape::find($id);
        return view('admin.pages.medicin_shapes.medicin_shape_details', compact('medicin_shape'));
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
        $shape = MedicinShape::find($id);
        $shape
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $shape->save();
        return redirect()->route('medicin_shapes.index')->with('success','Medicin Shape Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shape = MedicinShape::find($id);
        $shape->delete();
        return redirect()->route('medicin_shapes.index')->with('success','Medicin Shape Deleted Successfully');
    }
}
