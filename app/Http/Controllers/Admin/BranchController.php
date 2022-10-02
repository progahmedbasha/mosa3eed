<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreRequest;
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
    public function index(Request $request)
    {
        $branchs = Branch::whenSearch($request->search)->paginate(50);
//    $branchs =   Branch::where('name', 'like', '%' . $request->search . '%')->paginate(50);
       
     
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
    public function store(StoreRequest $request)
    {
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
        $branch->JobPost()->delete();
        $branch->MissedItem()->delete();
        $branch->delete();
        Session::flash('success','Branch Deleted Successfully');
        return redirect()->route('branchs.index');
    }
}
