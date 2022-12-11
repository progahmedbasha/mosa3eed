<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Organization\StoreRequest;
use App\Models\admin\Organization;
use App\Models\admin\Branch;
use App\Models\organization\OrganizationAdmin;
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
    public function index(Request $request)
    {
          $organizations = Organization::whenSearch($request->search)->paginate(50);
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
    public function store(StoreRequest $request)
    {
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
        $branchs = Branch::where('organization_id', $id)->get();
        return view('admin.pages.branchs.branchs', compact('branchs'));
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
    public function update(StoreRequest $request, $id)
    {
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
        $org->Branch()->delete();
        $org->User()->delete();
        $org->delete();
        Session::flash('success','Organization Deleted Successfully');
        return redirect()->route('organizations.index');
    }
    public function org_admins($id)
    {
         $organization_admins = OrganizationAdmin::where('organization_id', $id)->get();
        return view('admin.pages.organization_admins.organization_admins', compact('organization_admins'));

    }
}
