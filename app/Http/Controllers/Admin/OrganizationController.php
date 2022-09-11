<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use App\Models\District;
use Session;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $organizations = Organization::all();
          return view('admin.pages.organizations.organizations', compact('organizations'));
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
        return view('admin.pages.organizations.organizations_add', compact('countries','cities','districts'));
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
            'contact_en'=> 'required|min:2|max:250',
            'contact_ar'=> 'required|min:2|max:250',
            'email' => 'required|unique:users|email|max:200',
            'phone' => 'required|min:9|max:15',  
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required|max:400',
             'type' => 'required',
            ]
            );
        $org = new Organization();
        $org
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $org
        ->setTranslation('contact_name', 'en', $request->input('contact_en'))
        ->setTranslation('contact_name', 'ar', $request->input('contact_ar')) ;
        $org->email = $request->input('email');
        $org->phone = $request->input('phone');
        $org->type = $request->input('type');
        $org->district_id = $request->input('district_id');
        $org->address = $request->input('address');
        $org->status = $request->input('status');
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/organizations'), $filename);
            $org->photo=$filename;
            }
        $org->save();
        Session::flash('success','Organization Added Successfully');
        return redirect()->route('organizations.index');
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
        $organization = Organization::with('District')->find($id);
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$organization->District->City->country_id)->first();
        $city_id = City::where('id',$organization->District->city_id)->first(); 
        return view('admin.pages.organizations.organization_details', compact('organization','countries','cities','districts','country_id','city_id'));
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
            'contact_en'=> 'required|min:2|max:250',
            'contact_ar'=> 'required|min:2|max:250',
            'email' => 'required|email|max:200',
            'phone' => 'required|min:9|max:15',  
            'country_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'address' => 'required|max:400',
             'type' => 'required',
            ]
            );
        $org = Organization::find($id);
        $org
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $org
        ->setTranslation('contact_name', 'en', $request->input('contact_en'))
        ->setTranslation('contact_name', 'ar', $request->input('contact_ar')) ;
        $org->email = $request->input('email');
        $org->phone = $request->input('phone');
        $org->type = $request->input('type');
        $org->district_id = $request->input('district_id');
        $org->address = $request->input('address');
        $org->status = $request->input('status');
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/organizations'), $filename);
            $org->photo=$filename;
            }
        $org->save();
        Session::flash('success','Organization Updated Successfully');
        return redirect()->route('organizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $org = Organization::has('User')->get();
        $org = Organization::find($id);
        $org->User()->delete();
        $org->delete();
        Session::flash('success','Category Deleted Successfully');
        return redirect()->route('organizations.index');
    }
}
