<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationAdmin;
use App\Models\organization\OrganizationShift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\UserBranch;
use App\Models\User;
use App\Models\admin\UserType;
use App\Http\Requests\OrganizationAdmin\StoreRequest;
use App\Http\Requests\OrganizationAdmin\UpdateRequest;
use Session;
use Illuminate\Support\Facades\Hash;
class OrganizationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // $organization_admins = User::where('organization_id',!null)->get();
    //     $organization_admins = OrganizationAdmin::paginate(50);
    //     return view('admin.pages.organization_admins.organization_admins', compact('organization_admins'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user_types = UserType::skip(1)->skip(2)->take(2)->get();
        return view('admin.pages.organization_admins.organization_admin_add', compact('id','user_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // for get organization id
        $org_id = $request->input('organization_id');
        $org_district = Organization::where('id', $org_id)->first();
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->phone = $request->input('phone');
        $user->user_type_id = $request->user_type_id ;
        $user->district_id = $org_district->district_id ;
            if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
            $admin_org = new OrganizationAdmin();
            $admin_org->organization_id = $org_id;
            $admin_org->user_id = $user->id;
            if($request->user_type_id ==3){
                $admin_org->type = "Owner Admin";
            }
            if($request->user_type_id ==4){
                $admin_org->type = "Organization Admin";
            }
            $admin_org->save();
        // $branch_id = $request->branch_id;

        
        return redirect()->route('org_admins',$org_id)->with('success','Organization Admin Added Successfully');
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
    public function edit($id,$org)
    {
        $organization = Organization::where('id',$org)->first();
        $org_admin = User::find($id);
        $user_types = UserType::skip(1)->skip(2)->take(2)->get();
        return view('admin.pages.organization_admins.organization_admin_details', compact('org_admin','user_types','organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        // for return page after update
       $org_id = $request->input('organization_id');
    //  return   $admin_org = OrganizationAdmin::where('user_id',$id)->where('organization_id',$org_id)->first();
        // $org_district = Organization::where('id', $org_id)->first();
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->phone = $request->input('phone');
        $user->user_type_id = $request->user_type_id ;
            if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
        return redirect()->route('org_admins',$org_id)->with('success','Organization Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = OrganizationAdmin::find($id);
        $admin->delete();
        return redirect()->back()->with('success','Admin Deleted Successfully');
    }

}