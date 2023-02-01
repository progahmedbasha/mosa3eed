<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\BranchAttendance;
use App\Models\User;
use App\Models\UserBranch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $branchs = UserBranch::where('user_id', Auth::user()->id)->get();
    //     return view('branch_admin.pages.branches.branches',compact('branchs'));

    // }
      public function all_branch_attendance()
    {
        $branchs = UserBranch::where('user_id', Auth::user()->id)->get();
        return view('branch_admin.pages.attendances.all_branches', compact('branchs'));
    }
    public function attendance($id)
    {
        $branch_name = Branch::where('id', $id)->first("name");
        $organization_attendances = BranchAttendance::where('branch_id', $id)->get();
        return view('branch_admin.pages.attendances.branch_attendances', compact('organization_attendances','id','branch_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = User::all();
        return view('branch_admin.pages.attendances.attendance_add', compact('users','id'));
    }
    public function easysign()
    {
        $users = User::all();
        $branches = UserBranch::where('user_id', Auth::user()->id)->get();
        return view('branch_admin.pages.attendances.sign_add', compact('users','branches'));
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
        return redirect()->route('bran_attendance',$branch->id)->with('success','Branch Attendance Added Successfully');  
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
}