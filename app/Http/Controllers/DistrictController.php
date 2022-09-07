<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use Session;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $districts = District::all();
        return view('admin.pages.districts.districts', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.pages.districts.district_add', compact('countries'));
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

            'name_en'=> 'required|min:2|max:150',
            'name_ar' => 'required|min:2|max:150',
            'city_id'=> 'required',
            'country_id' => 'required',
            ]
            );
      $dist = new District();
      $dist->city_id = $request->input('city_id');
      $dist
      ->setTranslation('name', 'en', $request->input('name_en'))
      ->setTranslation('name', 'ar', $request->input('name_ar'))

      ->save();
      Session::flash('success','District Added Successfully');
      return redirect()->route('districts.index');
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
        $district = District::find($id);
        $countries = Country::all(); 
        $cities = City::all();
        $country_id = Country::where('id',$district->City->country_id)->first(); 
        $city_id = City::where('id',$district->city_id)->first(); 

        return view('admin.pages.districts.district_details' ,compact('district','countries','cities','country_id','city_id'));
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
            'city_id'=> 'required',
            ]
            );
      $dist = District::find($id);
      $dist->city_id = $request->input('city_id');
      $dist
      ->setTranslation('name', 'en', $request->input('name_en'))
      ->setTranslation('name', 'ar', $request->input('name_ar'))

      ->save();
      Session::flash('success','District Updated Successfully');
      return redirect()->route('districts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dist = District::find($id);
        $dist->delete();
        Session::flash('success','District Deleted Successfully');
        return redirect()->route('districts.index');
    }
}
