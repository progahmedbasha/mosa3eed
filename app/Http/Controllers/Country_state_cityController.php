<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;

use App\Models\Country;
use App\Models\District;
use App\Models\City;
class Country_state_cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $data = Country::all();
    //    $data['countries'] = Country::get(["name","id"]);
    //   return view('super_admin.pages.city_add',$data);
    }

    public function fetchCity(Request $request)
   {
       $data['cities'] = City::where("country_id",$request->city_id)->get();

       return response()->json($data);
   }
   public function fetchdistrict(Request $request)
   {
       $data['districts'] = District::where("city_id",$request->city_id)->get();

       return response()->json($data);
   }
//    public function fetchCity(Request $request)
//    {
//        $data['cities'] = City::where("state_id",$request->state_id)->get(["name_en", "id"]);
//        return response()->json($data);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
