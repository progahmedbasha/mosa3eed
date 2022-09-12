<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationShift;
use App\Models\organization\Shift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use Session;
class OrganizationshiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization_shifts = OrganizationShift::all();
        return view('admin.pages.organization_shifts.organization_shifts', compact('organization_shifts'));
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
        $shifts = Shift::all();
        return view('admin.pages.organization_shifts.organization_shift_add', compact('organizations','branches','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countItems = count($request->days);
        for($i=0; $i<$countItems; $i++){
            $org_shift = new OrganizationShift();
            $org_shift->organization_id = $request->input('organization_id');
            $org_shift->branch_id = $request->input('branch_id');
            $org_shift->days = $request->days[$i];
            $org_shift->from = $request->input('from');
            $org_shift->to = $request->input('to');
            $org_shift->shift_id = $request->input('shift_id');
            $org_shift->save();
        }
        Session::flash('success','Organization Shifts Added Successfully');
        return redirect()->route('organization_shifts.index');
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
        //
    }
}
