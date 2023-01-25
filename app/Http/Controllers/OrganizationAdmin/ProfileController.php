<?php

namespace App\Http\Controllers\OrganizationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrganizationDashboard\Organization\StoreRequest;
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
        $user = User::where('id',Auth::user()->id)->first();
        $countries = Country::all();
        $cities = City::all();
        $districts = District::all();
        $country_id = Country::where('id',$user->District->City->country_id)->first();
        $city_id = City::where('id',$user->District->city_id)->first(); 
        return view('organization.pages.profile.profile',compact('user','countries','cities','districts','country_id','city_id'));
    }
     public function update(StoreRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->district_id = $request->input('district_id');
        if (request()->password){
        $user->password = Hash::make($request['password']);
        }
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated Successfully');

    }


}