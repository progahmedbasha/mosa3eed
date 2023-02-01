<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchShift;
use App\Http\Requests\BranchShift\StoreRequest;
use App\Models\organization\Shift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use App\Models\ShiftDay;
class BranchShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {

    //     $branch_shifts = BranchShift::whenSearch($request->search)->paginate(20);
    //     return view('admin.pages.organization_shifts.organization_shifts', compact('branch_shifts'));
    // }
    public function allorganizations_shift(Request $request)
    {
        $organizations = Organization::whenSearch($request->search)->paginate(50);
        return view('admin.pages.organization_shifts.all_organization', compact('organizations'));

    }
    public function all_branch_shift($id)
    {
        $branchs = Branch::where('organization_id',$id)->paginate(20);
        return view('admin.pages.organization_shifts.all_branches', compact('branchs','id'));
    }
    // public function branch_shift(Request $request ,$id)
    // {
    //      $branch_shifts = BranchShift::where('branch_id',$id)->whenSearch($request->search)->paginate(20);
    //     return view('admin.pages.organization_shifts.organization_shifts', compact('branch_shifts','id'));   
    // }

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
    public function store(StoreRequest $request)
    {
        $branch_id = $request->branch_id;
           $shift  = new BranchShift();
                    $shift->name = $request->shift_name;
                    $shift->branch_id = $request->branch_id;
                    $shift->save();
             $countItems = count($request->day);
            for ($i = 0; $i < $countItems; $i++) {
                //  foreach ($data as $item) {
                if($request->from[$i] !=null)
                {
                    $shift_day = new ShiftDay();
                    $shift_day->branch_shift_id = $shift->id;
                    $shift_day->day = $request->day[$i];
                    $shift_day->from = $request->from[$i];
                    $shift_day->to = $request->to[$i];
                    $shift_day->save();
                }
            }
                   
        return redirect()->route('branch_shifts',$branch_id)->with('success','Branch Shifts Added Successfully');
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
        $branch_shift = BranchShift::find($id);
        $shift_days = ShiftDay::where('branch_shift_id', $id)->get();
        return view('admin.pages.organization_shifts.organization_shift_details', compact('branch_shift','shift_days'));
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
        // return $request;

        $shift  = BranchShift::find($id);
        $shift->name = $request->shift_name;
        $shift->branch_id = $request->branch_id;
        $shift->save();
       
            $shift_day  = ShiftDay::where('branch_shift_id', $id)->get();
            foreach ($shift_day as $key => $value) {
            $value->delete();
            }
            $countItems = count($request->from);
            for($i=0; $i<$countItems; $i++){
            if ($request->from[$i] != null) {
                $shift_day = new ShiftDay();
                $shift_day->branch_shift_id = $shift->id;
                $shift_day->day = $request->day[$i];
                $shift_day->from = $request->from[$i];
                $shift_day->to = $request->to[$i];
                $shift_day->save();
            }
            }
            // for return routes organization branch
        $branch = Branch::where('id', $request->branch_id)->first();

        return redirect()->route('branch_shifts',$branch)->with('success','Branch Shifts Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = BranchShift::find($id);
        $shift->delete();
        return redirect()->back()->with('success','Shift Deleted Successfully');

    }
    public function shifts($id)
    {
        $branch_name = Branch::where('id', $id)->first("name");
        $branch_shifts = BranchShift::where('branch_id', $id)->get();
        return view('admin.pages.organization_shifts.organization_shifts', compact('branch_shifts','id','branch_name'));
    }
}