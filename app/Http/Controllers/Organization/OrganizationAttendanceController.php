<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationAttendance;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use Session;
use Carbon\Carbon;
class OrganizationAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $search = $request->search;
    //     $organization_attendances = OrganizationAttendance::whereHas('User' , function($q) use($search) {
    //             $q->where('name',$search)->orWhere('phone', 'like', '%' .$search. '%');})->paginate(20);
    //     return view('admin.pages.organization_attendances.organization_attendances', compact('organization_attendances'));
    // }

    public function allorg_attendance(Request $request)
    {
        $organizations = Organization::whenSearch($request->search)->paginate(50);
        return view('admin.pages.organization_attendances.all_organization', compact('organizations'));

    }
    public function all_branch_attendance($id)
    {
        $branchs = Branch::where('organization_id',$id)->paginate(20);
        return view('admin.pages.organization_attendances.all_branches', compact('branchs','id'));
    }
    public function attendance($id)
    {
         $organization_attendances  = OrganizationAttendance::where('branch_id', $id)->get();
        return view('admin.pages.organization_attendances.organization_attendances', compact('organization_attendances','id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        $users = User::all();
        $branches = Branch::all();
        return view('admin.pages.organization_attendances.organization_attendance_add', compact('organizations','users','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return  $date_time = Carbon::now();
        $date = $date_time->toDateString();
        $time = $date_time->toTimeString();
        OrganizationAttendance::create([
            'organization_id' => $request->organization_id ,
            'branch_id' => $request->branch_id ,
            'user_id' => $request->user_id ,
            'type' => $request->type ,
            'date' => $date ,
            'time' => $time ,
          ]);
        return redirect()->route('organization_attendances.index')->with('success','Organization Attendance Added Successfully');  
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
