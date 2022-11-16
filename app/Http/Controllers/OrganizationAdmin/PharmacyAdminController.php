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
        $users = User::where('user_type_id', '3')->where('organization_id',Auth::user()->organization_id)->whenSearch($request->search)->paginate(50);
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
        $admin = new OrganizationAdmin();
        $admin->organization_id = Auth::user()->organization_id;
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
