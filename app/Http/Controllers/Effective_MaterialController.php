<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EffectiveMaterial;

class Effective_MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $effective_materials = EffectiveMaterial::all();
        return view('admin.pages.effective_materials.effective_materials', compact('effective_materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.effective_materials.effective_material_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new EffectiveMaterial();
        $material
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $material->save();
        return redirect()->route('effective_materials.index')->with('success','Effective Material Added Successfully');
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
        $material = EffectiveMaterial::find($id);
        return view('admin.pages.effective_materials.effective_material_details', compact('material'));
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
        $material = EffectiveMaterial::find($id);
        $material
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $material->save();
        return redirect()->route('effective_materials.index')->with('success','Effective Material Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = EffectiveMaterial::find($id);
        $material->delete();
        return redirect()->route('effective_materials.index')->with('success','Effective Material Deleted Successfully');
    }
}
