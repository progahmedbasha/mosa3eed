<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JobTitle\StoreRequest;
use App\Models\JobTitle;
use Session;
class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job_titles = JobTitle::whenSearch($request->search)->paginate(50);
        return view('admin.pages.job_titles.job_titles', compact('job_titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.job_titles.job_title_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        // return $request;
        $job_title = new JobTitle();
        $job_title
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $job_title->related_to = $request->related_to;
        $job_title->save();
        Session::flash('success','Job Title Added Successfully');
        return redirect()->route('job_titles.index');  
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
        $job_title = JobTitle::find($id);
        return view('admin.pages.job_titles.job_title_details', compact('job_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $job_title = JobTitle::find($id);
        $job_title
        ->setTranslation('name', 'en', $request->input('name_en'))
        ->setTranslation('name', 'ar', $request->input('name_ar')) ;
        $job_title->related_to = $request->related_to;
        $job_title->save();
        Session::flash('success','Job Title Added Successfully');
        return redirect()->route('job_titles.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_title = JobTitle::find($id);
        $job_title->delete();
        Session::flash('success','Job Title Deleted Successfully');
        return redirect()->route('job_titles.index');
    }
}