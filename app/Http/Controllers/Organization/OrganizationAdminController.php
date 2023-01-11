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
use App\Http\Requests\OrganizationAdmin\StoreRequest;
use Session;
use Illuminate\Support\Facades\Hash;
class OrganizationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $organization_admins = User::where('organization_id',!null)->get();
        $organization_admins = OrganizationAdmin::paginate(50);
        return view('admin.pages.organization_admins.organization_admins', compact('organization_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.pages.organization_admins.organization_admin_add', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // for get organization id
        $org_id = $request->input('organization_id');
        $org_district = Organization::where('id', $org_id)->first();
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->phone = $request->input('phone');
        $user->user_type_id = 4 ;
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
            $admin_org->type = "Organization Admin";
            $admin_org->save();
        // $branch_id = $request->branch_id;

        
        return redirect()->route('organizations.show',$org_id)->with('success','Organization Admin Added Successfully');
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
        // return $id;
        $org_admin = OrganizationAdmin::find($id);
        $organizations = Organization::all();
        $user_branch = UserBranch::where('user_id', $org_admin->user_id)->get();
        $branches = Branch::get();
         $users = User::all();
         $shifts = OrganizationShift::all();
        return view('admin.pages.organization_admins.organization_admin_details', compact('org_admin','organizations','users','shifts','user_branch','branches'));
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
        // for return page after update
        $org_id = $request->input('organization_id');

           $branchs = request()->branch_id;
            foreach ($branchs as $key => $branch) {
                // for save only selected branch
                if($branch !== null)
                {
                    $admin = OrganizationAdmin::find($id);
                    $admin->organization_id = $request->organization_id;
                    $admin->user_id = $request->user_id;
                    $admin->organization_shift_id = $request->organization_shift_id;
                    $admin->type = "Branch Admin";
                    $admin->save();
                    $user_branch = UserBranch::where('user_id', $request->user_id)->get();
                        foreach ($user_branch as $key => $value) {
                            $value->delete();
                        }
                    $countItems = count($request->branch_id);
                        // // save in multi record
                        for($i=0; $i<$countItems; $i++){
                                $branch = new UserBranch();
                                $branch->user_id = $admin->user_id;
                                $branch->branch_id = $request->branch_id[$i];
                                $branch->save();
                        }
                        User::where('id', $admin->user_id)->update(['user_type_id' => 4]);
                }else{
                     // for save if user admin for all branches 
                        $admin = OrganizationAdmin::find($id);
                        $admin->organization_id = $request->organization_id;
                        $admin->user_id = $request->user_id;
                        $admin->organization_shift_id = $request->organization_shift_id;
                        $admin->type = "Organization Admin";
                        $admin->save();
                        $user_branch = UserBranch::where('user_id', $request->user_id)->get();
                            foreach ($user_branch as $key => $value) {
                                $value->delete();
                            }
                        $branches = Branch::where('organization_id', $request->organization_id)->get();
                        foreach ($branches as $key => $value) {
                                $branch = new UserBranch();
                                $branch->user_id = $admin->user_id;
                                $branch->branch_id = $value->id;
                                $branch->save();
                        }
                        User::where('id', $admin->user_id)->update(['user_type_id' => 3]);
                }
            }
        return redirect()->route('organizations.show',$org_id)->with('success','Organization Admin Updated Successfully');
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
