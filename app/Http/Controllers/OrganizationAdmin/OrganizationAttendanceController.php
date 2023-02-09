<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use App\Models\BranchAttendance;
use App\Models\organization\OrganizationAdmin;
use App\Models\UserBranch;
use Illuminate\Http\Request;
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
    // public function index(Request $request)
    // {
        //
    // }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = UserBranch::where('branch_id' , $id)->get();
        return view('organization.pages.organization_attendances.organization_attendance_add', compact('users','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $branch = Branch::where('id', $request->branch_id)->first();
        $date_time = Carbon::now();
        $date = $date_time->toDateString();
        $time = $date_time->toTimeString();
        BranchAttendance::create([
            'organization_id' => $branch->organization_id ,
            'branch_id' => $request->branch_id ,
            'user_id' => $request->user_id ,
            'type' => $request->type ,
            'date' => $date ,
            'time' => $time ,
          ]);
        return redirect()->route('org_branch_attendance',$branch->id)->with('success','Branch Attendance Added Successfully');  
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
        $shift = BranchAttendance::find($id);
        $shift->delete();
        return redirect()->back()->with('success','Shift Deleted Successfully');
    }
    public function all_org_attendance()
    {
        $organizations = OrganizationAdmin::where('user_id', Auth::user()->id)->get();
        return view('organization.pages.organization_attendances.all_organizations', compact('organizations'));
    }
    public function all_branch_attendance($id)
    {
           $branchs = Branch::where('organization_id', $id)->get();
            $organization_name = Organization::where('id', $id)->first("name"); 
        return view('organization.pages.organization_attendances.all_branches', compact('branchs','organization_name','id'));
    }
    public function branch_attendance($id)
    {
         $organization_attendances = BranchAttendance::where('branch_id',$id)->paginate(20);
        return view('organization.pages.organization_attendances.organization_attendances', compact('organization_attendances','id'));   
    }
    public function easysign()
    {
        $organizations = OrganizationAdmin::where('user_id', Auth::user()->id)->get();
        $users = User::all();
        $branches = Branch::all();
        return view('organization.pages.organization_attendances.sign_add', compact('users','branches','organizations'));
    }
}