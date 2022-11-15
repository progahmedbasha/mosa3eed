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
class OrganizationAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization_admins = User::where('organization_id',!null)->get();
        return view('admin.pages.organization_admins.organization_admins', compact('organization_admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $organizations = Organization::all();
         $branches = Branch::all();
         $users = User::all();
         $shifts = OrganizationShift::all();
        return view('admin.pages.organization_admins.organization_admin_add', compact('organizations','branches','users','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $admin = new OrganizationAdmin();
        $admin->organization_id = $request->organization_id;
        $admin->user_id = $request->user_id;
        $admin->organization_shift_id = $request->organization_shift_id;
        $admin->save();
        if(request()->branch_id)
        {
            $countItems = count($request->branch_id);
            // // save in multi record
              for($i=0; $i<$countItems; $i++){
                    $branch = new UserBranch();
                    $branch->user_id = $admin->user_id;
                    $branch->branch_id = $request->branch_id[$i];
                    $branch->save();
              }
              User::where('id', $admin->user_id)->update(['user_type_id' => 4]);
        }
        else{
            User::where('id', $admin->user_id)->update(['user_type_id' => 3]);
        }
        
        return redirect()->route('organization_admins.index')->with('success','Organization Admin Added Successfully');
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
        $org_admin = OrganizationAdmin::find($id);
        $organizations = Organization::all();
         $users = User::all();
         $shifts = OrganizationShift::all();
        return view('admin.pages.organization_admins.organization_admin_details', compact('org_admin','organizations','users','shifts'));
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
        $admin = OrganizationAdmin::find($id);
        $data = $request->all();
        $admin->update($data);
        Session::flash('success','Organization Admin Updated Successfully');
        return redirect()->route('organization_admins.index');
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
        Session::flash('success','Organization Admin Deleted Successfully');
        return redirect()->route('organization_admins.index');
    }

}
