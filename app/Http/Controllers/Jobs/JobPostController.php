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
        $search = $request->search;
         $job_posts = JobPost::whenSearch($request->search)->orWhereHas('Organization' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->orWhereHas('Branch' , function($q) use($search) {
                $q->where('phone_1',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->orWhereHas('District' , function($q) use($search) {
                $q->where('name',$search);})
                ->orWhereHas('JobTitle' , function($q) use($search) {
                $q->where('related_to',$search)->orWhere('name', 'like', '%' .$search. '%');})
                ->paginate(20);
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
        // first if condition for if title=others create first job title then create job post (save in two table)
        if (request()->job_title_id =="others"){
            $job_title = new JobTitle();
            $job_title
            ->setTranslation('name', 'en', $request->input('title_name_ar'))
            ->setTranslation('name', 'ar', $request->input('title_name_ar')) ;
            $job_title->related_to = $request->related_to;
            $job_title->save();

                $job_post = new JobPost();
                $job_post->subject = $request->subject;
                $job_post->job_title_id = $job_title->id;
                $job_post->organization_id = $request->organization_id;
                $job_post->breif = $request->breif;
                $job_post->status = $request->status;
                $job_post->email_contract = $request->email_contract;
                // second if condition for if select branch choose branch id ,else save district and address
                if (request()->branch_id !==null){
                    $job_post->branch_id = $request->branch_id;
                }else {
                    $job_post->district_id = $request->district_id;
                    $job_post->address = $request->address;
                }
                $job_post->experince = $request->experince;
                $job_post->expected_salary = $request->expected_salary;
                $job_post->phone_contract = $request->phone_contract;
                $job_post->save();
                Session::flash('success','Job Post Added Successfully');
                return redirect()->route('job_posts.index'); 
        }
        // else for if request  have title save in one table only
        else {
             $job_post = new JobPost();
                $job_post->subject = $request->subject;
                $job_post->job_title_id = $request->job_title_id;
                $job_post->organization_id = $request->organization_id;
                $job_post->breif = $request->breif;
                $job_post->status = $request->status;
                $job_post->email_contract = $request->email_contract;
                // second if condition for if select branch choose branch id ,else save district and address
                if (request()->branch_id !==null){
                    $job_post->branch_id = $request->branch_id;
                }else {
                    $job_post->district_id = $request->district_id;
                    $job_post->address = $request->address;
                }
                $job_post->experince = $request->experince;
                $job_post->expected_salary = $request->expected_salary;
                $job_post->phone_contract = $request->phone_contract;
                $job_post->save();
                Session::flash('success','Job Post Added Successfully');
                return redirect()->route('job_posts.index'); 
        }
    
        ////////////////
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
        $organization_id = Organization::where('id',$job_post->organization_id)->first(); 
        if($job_post->branch_id !==null){
        $branch_id = Branch::where('id',$job_post->branch_id)->first(); 
        }
        else {
            $branch_id = "";
        }
         // 
         if($job_post->district_id !==null){ 
            $city_id = City::where('id',$job_post->District->city_id)->first(); 
         }
         else {
            $city_id = "";
         }
         //
         if($job_post->district_id !==null){ 
        $country_id = Country::where('id',$job_post->District->City->country_id)->first();
         }
         else {
            $country_id = "";
         }  
        return view('admin.pages.job_posts.job_post_details', compact('job_post','branches','job_titles','districts','organizations','countries','cities','organization_id','branch_id','city_id','country_id'));
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
        // $job_post = JobPost::find($id);
              // first if condition for if title=others create first job title then create job post (save in two table)
        if (request()->job_title_id =="others"){
            $job_title = new JobTitle();
            $job_title
            ->setTranslation('name', 'en', $request->input('title_name_ar'))
            ->setTranslation('name', 'ar', $request->input('title_name_ar')) ;
            $job_title->related_to = $request->related_to;
            $job_title->save();

                $job_post = JobPost::find($id);
                $job_post->subject = $request->subject;
                $job_post->job_title_id = $job_title->id;
                $job_post->organization_id = $request->organization_id;
                $job_post->breif = $request->breif;
                $job_post->status = $request->status;
                $job_post->email_contract = $request->email_contract;
                // second if condition for if select branch choose branch id ,else save district and address
                if (request()->branch_id !==null){
                    $job_post->branch_id = $request->branch_id;
                }else {
                    $job_post->district_id = $request->district_id;
                    $job_post->address = $request->address;
                }
                $job_post->experince = $request->experince;
                $job_post->expected_salary = $request->expected_salary;
                $job_post->phone_contract = $request->phone_contract;
                $job_post->save();
                Session::flash('success','Job Post Added Successfully');
                return redirect()->route('job_posts.index'); 
        }
        // else for if request  have title save in one table only
        else {
             $job_post = JobPost::find($id);
                $job_post->subject = $request->subject;
                $job_post->job_title_id = $request->job_title_id;
                $job_post->organization_id = $request->organization_id;
                $job_post->breif = $request->breif;
                $job_post->status = $request->status;
                $job_post->email_contract = $request->email_contract;
                // second if condition for if select branch choose branch id ,else save district and address
                if (request()->branch_id !==null){
                    $job_post->branch_id = $request->branch_id;
                }else {
                    $job_post->district_id = $request->district_id;
                    $job_post->address = $request->address;
                }
                $job_post->experince = $request->experince;
                $job_post->expected_salary = $request->expected_salary;
                $job_post->phone_contract = $request->phone_contract;
                $job_post->save();
                Session::flash('success','Job Post Added Successfully');
                return redirect()->route('job_posts.index'); 
        }
    
        ////////////////

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $job_post)
    {
        $job_post->delete();
        return redirect()->route('job_posts.index')->with('success', 'Job Post Deleted Successfully');
    }
    public function fetch_branch(Request $request)
    {
        $branchs = Branch::where('id' ,$request->organization_id)->get();
        $html = view('admin.pages.job_posts.fetch_branch_ajax', compact('branchs'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
}
