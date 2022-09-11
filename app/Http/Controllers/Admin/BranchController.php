<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use Session;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::all();
        return view('admin.pages.branchs.branchs', compact('branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $organizations = Organization::all();
        return view('admin.pages.branchs.branch_add', compact('organizations','countries','cities','districts'));
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
            'name_en'=> 'required|min:2|max:250',
            'name_ar' => 'required|min:2|max:250',
            'phone_1'=> 'required|min:4|max:15',
            'phone_2'=> 'max:15',
            'email' => 'required|email|max:200',
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'organization_id' => 'required',
            'address' => 'required|max:400',
            ]
            );
        $branch = new Branch();
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
        Session::flash('success','Branch Added Successfully');
        return redirect()->route('branchs.index');
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
        return view('admin.pages.branchs.branch_details', compact('branch','organizations','countries','cities','districts','country_id','city_id'));
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
         $this->validate($request,[
            'name_en'=> 'required|min:2|max:250',
            'name_ar' => 'required|min:2|max:250',
            'phone_1'=> 'required|min:4|max:15',
            'phone_2'=> 'max:15',
            'email' => 'required|email|max:200',
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'organization_id' => 'required',
            'address' => 'required|max:400',
            ]
            );
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
        Session::flash('success','Branch Updated Successfully');
        return redirect()->route('branchs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        Session::flash('success','Branch Deleted Successfully');
        return redirect()->route('branchs.index');
    }
}
