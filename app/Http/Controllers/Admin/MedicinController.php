<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicin\StoreRequest;
use Illuminate\Http\Request;
use App\Models\admin\Medicin;
use App\Models\EffectiveMaterial;
use App\Models\MedicinShape;
use App\Models\MedicinType;
use App\Models\Unit;
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

        return view('admin.pages.medicins.medicins', compact('medicins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $effective_materials = EffectiveMaterial::all();
        $medicin_shapes = MedicinShape::all();
        $medicin_types = MedicinType::all();
        return view('admin.pages.medicins.medicin_add', compact('effective_materials','medicin_shapes','medicin_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $unit = new Unit();
        $unit->big = $request->big;
        $unit->center = $request->center;
        $unit->small = $request->small;
        $unit->save();

        $medicin = new Medicin();
        $medicin->barcode = $request->input('barcode');
        $medicin
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $medicin->effective_material_id = $request->input('effective_material_id');
        $medicin->barcode = $request->input('barcode');
        $medicin->tags = $request->input('tags');
        $medicin->description = $request->input('description');
        $medicin->producing_company = $request->input('producing_company');
        $medicin->medicin_type_id = $request->input('medicin_type_id');
        $medicin->medicin_shape_id = $request->input('medicin_shape_id');
        $medicin->expected_discount = $request->input('expected_discount');
        $medicin->unit_id = $unit->id;
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
        $effective_materials = EffectiveMaterial::all();
        $medicin_shapes = MedicinShape::all();
        $medicin_types = MedicinType::all();
        $medicin_unit = Unit::where('id', $medicin->unit_id)->first();
        return view('admin.pages.medicins.medicin_details', compact('medicin','effective_materials','medicin_shapes','medicin_types','medicin_unit'));
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
        $medicin = Medicin::find($id);
        $medicin->barcode = $request->input('barcode');
        $medicin
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $medicin->effective_material_id = $request->input('effective_material_id');
        $medicin->barcode = $request->input('barcode');
        $medicin->tags = $request->input('tags');
        $medicin->description = $request->input('description');
        $medicin->producing_company = $request->input('producing_company');
        $medicin->medicin_type_id = $request->input('medicin_type_id');
        $medicin->medicin_shape_id = $request->input('medicin_shape_id');
        $medicin->expected_discount = $request->input('expected_discount');
        $medicin->save();

        $medicin_unit = Unit::where('id', $medicin->unit_id)->first();
        $medicin_unit->big = $request->big;
        $medicin_unit->center = $request->center;
        $medicin_unit->small = $request->small;
        $medicin_unit->save();
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
