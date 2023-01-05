<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationAttendance;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class OrganizationAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $organization_attendances = OrganizationAttendance::where('organization_id', Auth::user()->organization_id)->whereHas('User' , function($q) use($search) {
                $q->where('name',$search)->orWhere('phone', 'like', '%' .$search. '%');})->paginate(20);
        return view('organization.pages.organization_attendances.organization_attendances', compact('organization_attendances'));
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
        return view('organization.pages.organization_attendances.organization_attendance_add', compact('organizations','users','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date_time = Carbon::now();
        $date = $date_time->toDateString();
        $time = $date_time->toTimeString();
        OrganizationAttendance::create([
            'organization_id' => Auth::user()->organization_id ,
            'branch_id' => $request->branch_id ,
            'user_id' => $request->user_id ,
            'type' => $request->type ,
            'date' => $date ,
            'time' => $time ,
          ]);
        return redirect()->route('org_attendances.index')->with('success','Organization Attendance Added Successfully');  
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
