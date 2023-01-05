<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationShift;
use App\Http\Requests\OrganizationDashboard\OrganizationShift\StoreRequest;
use App\Models\organization\ShiftDay;
use App\Models\organization\Shift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class OrganizationshiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $organization_shifts = OrganizationShift::where('organization_id', Auth::user()->organization_id)->whenSearch($request->search)->paginate(20);
        return view('organization.pages.organization_shifts.organization_shifts', compact('organization_shifts'));
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
        // $days = Day::all();
        return view('organization.pages.organization_shifts.organization_shift_add', compact('organizations','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
    
            $org_shift = new OrganizationShift();
            $org_shift->organization_id = Auth::user()->organization_id;
            $org_shift->branch_id = $request->input('branch_id');
            $org_shift
                ->setTranslation('name', 'en', $request->input('name_en'))
                ->setTranslation('name', 'ar', $request->input('name_ar')) ;
             $org_shift->days =  json_encode($request->days);
            $org_shift->from = $request->input('from');
            $org_shift->to = $request->input('to');
            $org_shift->save();
        return redirect()->route('org_shifts.index')->with('success','Organization Shifts Added Successfully');
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
        $org_shift = OrganizationShift::find($id);
        $organizations = Organization::all();
        $branches = Branch::all();
        
        return view('organization.pages.organization_shifts.organization_shift_details', compact('org_shift','organizations','branches'));
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
            $org_shift = OrganizationShift::find($id);
            $org_shift->organization_id = Auth::user()->organization_id;
            $org_shift->branch_id = $request->input('branch_id');
            $org_shift
                ->setTranslation('name', 'en', $request->input('name_en'))
                ->setTranslation('name', 'ar', $request->input('name_ar')) ;
            $org_shift->days =  json_encode($request->days);
            $org_shift->from = $request->input('from');
            $org_shift->to = $request->input('to');
            $org_shift->save();
        return redirect()->route('org_shifts.index')->with('success','Organization Shifts Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = OrganizationShift::find($id);
        $shift->delete();
        return redirect()->route('org_shifts.index')->with('success','Organization Shifts Deleted Successfully');
    }
}
