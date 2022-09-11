<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Session;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        //  $countries = Country::whenSearch($request->search)->paginate(50);
        
        return view('admin.pages.countries.countries', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.countries.countries_add');
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
            ]
            );
        $country= new Country;
        $country->name_en = $request->name_en;
        $country->name_ar = $request->name_ar;
        $country->save();
        Session::flash('success','Country Added Successfully');
        return redirect()->route('countries.index');
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
        $country = Country::find($id);
        return view('admin.pages.countries.countries_details', compact('country'));
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
            ]
            );
        $country = Country::find($id);
        $country->name_en = $request->name_en;
        $country->name_ar = $request->name_ar;
        $country->save();
        Session::flash('success','Country Updated Successfully');
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        Session::flash('success','Country Deleted Successfully');
        return redirect()->route('countries.index');
    }
}
