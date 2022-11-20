<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBranch;
use App\Models\User;
use App\Models\Admin\Branch;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Http\Requests\Branch\StoreRequest;
use Illuminate\Support\Facades\Auth;
class UserBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = UserBranch::where('user_id',Auth::user()->id)->paginate(50);
        return view('branch_admin.pages.branch_admins.branch_admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // $branches = Branch::all();
        // return view('organization.pages.branch_admins.branch_admin_add', compact('users', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // UserBranch::create($data);
        // return redirect()->route('organization_branches.index')->with('success','Branch Admin Added Successfully');
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
        $branch = Branch::find($id);
        $organizations = Organization::all();
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$branch->District->City->country_id)->first();
        $city_id = City::where('id',$branch->District->city_id)->first(); 
        return view('branch_admin.pages.branch_admins.branch_details', compact('branch','organizations','countries','cities','districts','country_id','city_id'));
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
         $branch = Branch::find($id);
        $branch
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $branch->phone_1 = $request->input('phone_1');
        $branch->phone_2 = $request->input('phone_2');
        $branch->email = $request->input('email');
        $branch->organization_id = $request->input('organization_id');
        $branch->district_id = $request->input('district_id');
        $branch->address = $request->input('address');
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/branchs'), $filename);
            $branch->photo=$filename;
            }
        $branch->save();
        return redirect()->route('branch_admin_branches.index')->with('success','Branch Updated Successfully');
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
