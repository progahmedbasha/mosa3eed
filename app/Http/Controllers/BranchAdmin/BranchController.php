<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\City;
use App\Models\Country;
use App\Models\district;
use App\Models\UserBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = UserBranch::where('user_id', Auth::user()->id)->get();
        return view('branch_admin.pages.branches.branches',compact('branchs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $districts = district::all();
        $country_id = Country::where('id',$branch->District->City->country_id)->first();
        $city_id = City::where('id',$branch->District->city_id)->first(); 
        return view('branch_admin.pages.branches.branch_details', compact('branch','organizations','countries','cities','districts','country_id','city_id'));
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
          // for return page after update

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
        return redirect()->route('branches.index')->with('success','Branch Updated Successfully');
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