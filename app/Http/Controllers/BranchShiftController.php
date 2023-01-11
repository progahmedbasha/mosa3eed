<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchShift;
use App\Http\Requests\OrganizationShift\StoreRequest;
use App\Models\organization\Shift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use App\Models\ShiftDay;
use Session;
class BranchShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $branch_shifts = BranchShift::whenSearch($request->search)->paginate(20);
        return view('admin.pages.organization_shifts.organization_shifts', compact('branch_shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.pages.organization_shifts.organization_shift_add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 1;
        $branch_id = $request->branch_id;
           $shift  = new BranchShift();
                    $shift->name = $request->shift_name;
                    $shift->branch_id = $request->branch_id;
                    $shift->save();
                    $countItems = count($request->day);
                    for($i=0; $i<$countItems; $i++){
                        $shift_day  = new ShiftDay();
                        $shift_day->branch_shift_id = $shift->id;
                        $shift_day->day = $request->day[$i];
                        $shift_day->from = $request->from[$i];
                        $shift_day->to = $request->to[$i];
                        $shift_day->save();
                    }
        Session::flash('success','Branch Shifts Added Successfully');
        return redirect()->route('branch_shifts',$branch_id);
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
        
        return view('admin.pages.organization_shifts.organization_shift_details', compact('org_shift','organizations','branches'));
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
            $org_shift->organization_id = $request->input('organization_id');
            $org_shift->branch_id = $request->input('branch_id');
            $org_shift
                ->setTranslation('name', 'en', $request->input('name_en'))
                ->setTranslation('name', 'ar', $request->input('name_ar')) ;
            $org_shift->days =  json_encode($request->days);
            $org_shift->from = $request->input('from');
            $org_shift->to = $request->input('to');
            $org_shift->save();
        Session::flash('success','Organization Shifts Updated Successfully');
        return redirect()->route('organization_shifts.index');
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
        Session::flash('success','Purchase Deleted Successfully');
        return redirect()->route('purchases.index');
    }
        public function shifts($id)
    {
        $branch_shifts = BranchShift::where('branch_id', $id)->get();
        return view('admin.pages.organization_shifts.organization_shifts', compact('branch_shifts','id'));
    }
}
