<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchAdmin\BranchAdminStoreRequest;
use App\Http\Requests\BranchAdmin\BranchAdminUpdateRequest;
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
        // $admins = UserBranch::paginate(50);
        // return view('admin.pages.branch_admins.branch_admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($org, $branch_id )
    {
        $countries = Country::all();
         $cities = City::all();
         $districts = District::all();
         $branch = Branch::where('organization_id',$branch_id)->first();
         $shifts = BranchShift::where('branch_id',$branch_id)->get();
        return view('admin.pages.branch_admins.branch_admin_add', compact('branch_id','org','countries','cities','districts','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchAdminStoreRequest $request)
    {
        // return $request;
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
            $admin_branch->organization_id = $request->org_id;
            $admin_branch->branch_id = $request->branch_id;
            $admin_branch->user_id = $user->id;
            $admin_branch->branch_shift_id = $request->branch_shift_id;
            $admin_branch->save();
        $org = $request->org_id;
        $branch = $request->branch_id;
        return redirect()->route('admins_branch', ['org' => $org,'branch' => $branch])->with('success','Branch Admin Added Successfully');
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
    public function edit($org , $branch ,$id )
    {
        // return $id;
        $user = User::where('id', $id)->first();
        $shifts = BranchShift::where('branch_id',$branch)->get();
        $user_branch = UserBranch::where('user_id', $id)->where('branch_id',$branch)->first();
        return view('admin.pages.branch_admins.branch_admin_details', compact('id','user','shifts','branch','org','user_branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchAdminUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (request()->password){
        $user->password = Hash::make($request['password']);
        }
        $user->phone = $request->input('phone');
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
        $branch_id = $request->branch_id;
        $org = $request->org_id;
        return redirect()->route('admins_branch', ['org' => $org,'branch' => $branch_id])->with('success','Branch Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','Admin Deleted Successfully');
    }
    public function admins_branch($org , $branch)
    {
        $admins = UserBranch::where('branch_id', $branch)->get();
        return view('admin.pages.branch_admins.branch_admins', compact('admins','org','branch'));
    }
}