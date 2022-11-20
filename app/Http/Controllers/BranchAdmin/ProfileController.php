<?php

namespace App\Http\Controllers\BranchAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\User;
use App\Models\District;
use App\Models\admin\UserType;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = User::where('id', Auth::user()->id)->first();
        $user_types = UserType::get();
        $cities = City::all();
        $organizations = Organization::all();
        $city_id = City::where('id',$user->District->city_id)->first();
        $country_id = Country::where('id',$user->District->City->country_id)->first();
        $countries = Country::all();

        return view('branch_admin.pages.profile.profile',compact('user','user_types','cities','city_id','organizations','country_id','countries'));
    }
     public function update(UpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (request()->password){
        $user->password = Hash::make($request['password']);
        }
        $user->phone = $request->input('phone');
        $user->organization_id = $request->input('organization_id');
        $user->district_id = $request->input('district_id');
         $user->user_type_id = $request->input('user_type_id');        
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/admins'), $filename);
            $user->photo=$filename;
            }
        $user->save();
        return redirect()->route('branch_admin_profile.index')->with('success', 'Profile Updated Successfully');

    }


}
