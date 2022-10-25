<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\PostLike;
use App\Models\PostComment;
class PostTimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_timelines = JobPost::with('PostLike')->paginate(20);
      return view('admin.pages.post_timelines.post_timelines', compact('post_timelines'));
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
        //
    }
    public function post_like($id)
    {
        $post_likes = PostLike::where('job_post_id', $id)->paginate(20);
        $post_name = JobPost::where('id', $id)->first();
        return view('admin.pages.post_timelines.post_likes_show', compact('post_likes','post_name'));
    }
    public function post_comment($id)
    {
        $post_comments = PostComment::where('job_post_id', $id)->paginate(20);
        $post_name = JobPost::where('id', $id)->first();
        return view('admin.pages.post_timelines.post_comments_show', compact('post_comments','post_name'));
    }
        public function comment_status_change(Request $request, $id)
    {
        $post_comments = PostComment::find($id);
        $post_comments->update(['status'=> $request->status]);
        return redirect()->back()->with('success', 'Status Changed Successfully');  
    }
    
}
