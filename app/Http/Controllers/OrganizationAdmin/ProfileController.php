<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrganizationDashboard\Organization\StoreRequest;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use App\Models\District;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = Organization::where('id',Auth::user()->organization_id)->first();
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$organization->District->City->country_id)->first();
        $city_id = City::where('id',$organization->District->city_id)->first(); 
        return view('organization.pages.profile.profile',compact('organization','countries','cities','districts','country_id','city_id'));
    }
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
        return redirect()->route('organization_profile.index')->with('success', 'Organization Updated Successfully');

    }


}
