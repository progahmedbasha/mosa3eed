<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Http\Requests\City\StoreRequest;
use Session;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.pages.cities.cities', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.pages.cities.city_add', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        
        $country= new City;
        $country->name_en = $request->name_en;
        $country->name_ar = $request->name_ar;
        $country->country_id = $request->country_id;

        $country->save();
        Session::flash('success','City Added Successfully');
        return redirect()->route('cities.index');
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
        $city = City::find($id);
        $countries = Country::all();
        $country_id = Country::where('id',$city->country_id)->first();
        return view('admin.pages.cities.city_details', compact('city','country_id','countries'));
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

            'name_en'=> 'required|min:2|max:150',
            'name_ar' => 'required|min:2|max:150',
            'country_id' => 'required',
            ]
            );
        $country= City::find($id);
        $country->name_en = $request->name_en;
        $country->name_ar = $request->name_ar;
        $country->country_id = $request->country_id;

        $country->save();
        Session::flash('success','City Updated Successfully');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();
        Session::flash('success','City Deleted Successfully');
        return redirect()->route('cities.index');
    }
}
