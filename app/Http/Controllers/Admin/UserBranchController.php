<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBranch;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\Admin\Branch;
use App\Models\BranchShift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = UserBranch::paginate(50);
        return view('admin.pages.branch_admins.branch_admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $countries = Country::all();
         $cities = City::all();
         $districts = District::all();
         $shifts = BranchShift::where('branch_id',$id)->get();
        return view('admin.pages.branch_admins.branch_admin_add', compact('id','countries','cities','districts','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch_district = Branch::where('id', $request->branch_id)->first();
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->phone = $request->input('phone');
        $user->user_type_id = 5 ;
        $user->district_id = $branch_district->district_id ;
            if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
            $admin_branch = new UserBranch();
            $admin_branch->branch_id = $request->branch_id;
            $admin_branch->user_id = $user->id;
            $admin_branch->branch_shift_id = $request->branch_shift_id;
            $admin_branch->save();
        $branch_id = $request->branch_id;
        return redirect()->route('admins_branch',$branch_id)->with('success','Branch Admin Added Successfully');
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
    public function admins_branch($id)
    {
        $admins = UserBranch::where('branch_id', $id)->get();
        return view('admin.pages.branch_admins.branch_admins', compact('admins','id'));
    }
}
