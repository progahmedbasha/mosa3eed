<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Branch;
use App\Models\organization\OrganizationShift;
use App\Models\organization\OrganizationAdmin;
use App\Models\UserBranch;
use App\Models\User;
use App\Http\Requests\PharmacyAdmin\StoreRequest;

class PharmacyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = OrganizationAdmin::where('organization_id',Auth::user()->organization_id)->paginate(50);
        return view('organization.pages.admins.admins',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
         $users = User::where('organization_id', Auth::user()->organization_id)->get();
         $shifts = OrganizationShift::where('organization_id', Auth::user()->organization_id)->get();
        return view('organization.pages.admins.organization_admin_add', compact('branches','users','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
   
        if(request()->branch_id)
        {
            $admin = new OrganizationAdmin();
            $admin->organization_id = Auth::user()->organization_id;
            $admin->user_id = $request->user_id;
            $admin->organization_shift_id = $request->organization_shift_id;
            $admin->type = "Branch Admin";
            $admin->save();
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
                 $admin = new OrganizationAdmin();
                $admin->organization_id = Auth::user()->organization_id;
                $admin->user_id = $request->user_id;
                $admin->organization_shift_id = $request->organization_shift_id;
                $admin->type = "Organization Admin";
                $admin->save();
            // for save if user admin for all branches 
            $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
            foreach ($branches as $key => $value) {
                    $branch = new UserBranch();
                    $branch->user_id = $admin->user_id;
                    $branch->branch_id = $value->id;
                    $branch->save();
            }
            User::where('id', $admin->user_id)->update(['user_type_id' => 3]);
        }
        
        return redirect()->route('pharmacy_admins.index')->with('success','Organization Admin Added Successfully');
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
    public function edite($user_id, $id)
    {
        $user = OrganizationAdmin::find($id);
        $user_branch = UserBranch::where('user_id', $user_id)->get();
        $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
        $users = User::where('organization_id', Auth::user()->organization_id)->get();
        $shifts = OrganizationShift::where('organization_id', Auth::user()->organization_id)->get();
        return view('organization.pages.admins.admin_details', compact('user','user_branch','branches','users','shifts'));
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
  
        
             $branchs = request()->branch_id;
            foreach ($branchs as $key => $branch) {
                // for save only selected branch
                if($branch !== null)
                {
                    $admin = OrganizationAdmin::find($id);
                    $admin->organization_id = Auth::user()->organization_id;
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
                        $admin->organization_id = Auth::user()->organization_id;
                        $admin->user_id = $request->user_id;
                        $admin->organization_shift_id = $request->organization_shift_id;
                        $admin->type = "Organization Admin";
                        $admin->save();
                        $user_branch = UserBranch::where('user_id', $request->user_id)->get();
                            foreach ($user_branch as $key => $value) {
                                $value->delete();
                            }
                        $branches = Branch::where('organization_id', Auth::user()->organization_id)->get();
                        foreach ($branches as $key => $value) {
                                $branch = new UserBranch();
                                $branch->user_id = $admin->user_id;
                                $branch->branch_id = $value->id;
                                $branch->save();
                        }
                        User::where('id', $admin->user_id)->update(['user_type_id' => 3]);
                }
            }
        return redirect()->route('pharmacy_admins.index')->with('success','Organization Admin Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
       $user = User::where('id', $id)->first();
       $user->delete();
       return redirect()->route('pharmacy_admins.index')->with('success','Organization Admin Deleted Successfully');
    }
}
