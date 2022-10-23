<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobPost;
use App\Models\ApplyJob;
class JobApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $job_applies = ApplyJob::WhereHas('JobPost' , function($q) use($search) {
                $q->Where('subject', 'like', '%' .$search. '%');})
                ->orWhereHas('User' , function($q) use($search) {
                $q->where('email',$search)->orWhere('name', 'like', '%' .$search. '%')->orWhere('phone', 'like', '%' .$search. '%');})
                ->paginate(20);
        return view('admin.pages.job_applies.job_applies', compact('job_applies'));
    }

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
        $apply_job = ApplyJob::find($id);
        $apply_job->delete();
        return redirect()->route('job_applies.index')->with('success', 'Apply Job Deleted Successfully');

    }
       public function get_attacment($id)
    {
        $apply_job = ApplyJob::find($id);
        return view('admin.pages.job_applies.job_apply_attachment', compact('apply_job'));    }
}
