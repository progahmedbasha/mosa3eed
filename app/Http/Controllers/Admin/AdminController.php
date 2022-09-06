<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\admin\UserType;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\admin\Organization;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.pages.admin.list',compact('users'));
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
         $user_types = UserType::get();
         $organizations = Organization::get();
          return view('admin.pages.admin.admin_add', compact('user_types','countries','cities','districts','organizations'));
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
            'name'=> 'required|min:2|max:150',
            'email' => 'required|unique:users|email|max:200',
            'password' => 'required|min:4|max:25',
            'phone' => 'required|min:9|max:15',  
            'user_type_id' => 'required',
            'country_id' => 'required', 
            'city_id' => 'required', 
            'district_id' => 'required',     
            ]
            );
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
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
        Session::flash('success','Admin Added Successfully');
        return redirect()->route('admin.index');
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
        $data = User::with('District')->find($id);
        $user_types = UserType::get();
        $organizations = Organization::all();
        $districts = District::all();
        $country_id = Country::where('id',$data->District->City->country_id)->first();
        $countries = Country::all();
        $cities = Country::all();
        $city_id = City::where('id',$data->District->city_id)->first(); 
        return view('admin.pages.admin.admin_details' ,compact('data','user_types','districts','country_id','city_id','organizations','countries','cities'));
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
            'name'=> 'required|min:2|max:150',
            'email' => 'required|email|max:200',
            'password' => 'max:25',
            'phone' => 'required|min:9|max:15',  
            'user_type_id' => 'required',
            'country_id' => 'required', 
            'city_id' => 'required', 
            'district_id' => 'required',      
            ]
            );
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
        Session::flash('success','Admin Updated Successfully');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success','Admin Deleted Successfully');
        return redirect()->route('admin.index');
    }
}
