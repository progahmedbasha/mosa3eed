<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JobPost\StoreRequest;
use App\Models\JobPost;
use App\Models\JobTitle;
use App\Models\admin\Branch;
use App\Models\admin\Organization;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use Session;
class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job_posts = JobPost::whenSearch($request->search)->paginate(50);
        return view('admin.pages.job_posts.job_posts', compact('job_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        $job_titles = JobTitle::all();
        $districts = District::all();
        $organizations = Organization::all();
        $countries = Country::all();
        $cities = City::all();

        return view('admin.pages.job_posts.job_post_add', compact('branches','job_titles','districts','organizations','countries','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_post = new JobPost();
        $job_post->subject = $request->subject;
        $job_post->district_id = $request->district_id;
        $job_post->breif = $request->breif;
        $job_post->status = $request->status;
        $job_post->email_contract = $request->email_contract;
        
        $job_post->job_title_id = $request->job_title_id;
        $job_post->branch_id = $request->branch_id;
        $job_post->address = $request->address;
        $job_post->experince = $request->experince;
        $job_post->expected_salary = $request->expected_salary;
        $job_post->phone_contract = $request->phone_contract;
        $job_post->save();
        Session::flash('success','Job Post Added Successfully');
        return redirect()->route('job_posts.index'); 
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
        $job_post = JobPost::find($id);
        $id = $job_post->id;
         $branches = Branch::all();
        $job_titles = JobTitle::all();
        $districts = District::all();
        $organizations = Organization::all();
        $countries = Country::all();
        $cities = City::all();
        $organization_id = Organization::where('id',$job_post->Branch->organization_id)->first(); 
        $city_id = City::where('id',$job_post->District->city_id)->first(); 
        $country_id = Country::where('id',$job_post->District->City->country_id)->first();  
        return view('admin.pages.job_posts.job_post_details', compact('job_post','branches','job_titles','districts','organizations','countries','cities','city_id','country_id','organization_id'));
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
        $job_post = JobPost::find($id);
        $job_post->subject = $request->subject;
        $job_post->district_id = $request->district_id;
        $job_post->breif = $request->breif;
        $job_post->status = $request->status;
        $job_post->email_contract = $request->email_contract;
        $job_post->job_title_id = $request->job_title_id;
        $job_post->branch_id = $request->branch_id;
        $job_post->address = $request->address;
        $job_post->experince = $request->experince;
        $job_post->expected_salary = $request->expected_salary;
        $job_post->phone_contract = $request->phone_contract;
        $job_post->save();
        Session::flash('success','Job Post Updated Successfully');
        return redirect()->route('job_posts.index'); 
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
