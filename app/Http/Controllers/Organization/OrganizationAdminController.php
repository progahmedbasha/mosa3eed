<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\organization\OrganizationAdmin;
use App\Models\organization\Shift;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\User;
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
        $organization_admins = OrganizationAdmin::with('User','Organization','Shift','Branch')->get();
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
         $shifts = Shift::all();
        return view('admin.pages.organization_admins.organization_admin_add', compact('organizations','branches','users','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'organization_id'=> 'required',
            ]
            );
        $org_admin = new OrganizationAdmin();
        $org_admin->organization_id = $request->input('organization_id');
        $org_admin->branch_id = $request->input('branch_id');
        $org_admin->user_id = $request->input('user_id');
        $org_admin->shift_id = $request->input('shift_id');
        $org_admin->save();
        Session::flash('success','Organization Admin Added Successfully');
        return redirect()->route('organization_admins.index');
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
