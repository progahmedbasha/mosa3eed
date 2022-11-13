<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimelinePost;
use App\Models\PostLike;
use App\Models\User;
use App\Models\PostComment;
use Illuminate\Support\Facades\Auth;
class TimelinePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $post_timelines = TimelinePost::withCount('PostLike')->withCount('PostComment')->paginate(20);
      return view('admin.pages.post_timelines.post_timelines', compact('post_timelines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.post_timelines.post_timeline_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new TimelinePost;
        $post->user_id = Auth::user()->id;
        $post->post = $request->post;
            if (request()->photo){
                $filename = time().'.'.request()->photo->getClientOriginalExtension();
                request()->photo->move(public_path('data/timeline_posts'), $filename);
                $post->photo=$filename;
            }
        $post->save();
        return redirect()->route('timeline_posts.index')->with('success', 'Post Added Successfully');
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
        $timeline_post = TimelinePost::find($id);
        $user_types = User::get();
        return view('admin.pages.post_timelines.post_timeline_details', compact('timeline_post','user_types'));
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
        $timeline_post = TimelinePost::find($id);
        $timeline_post->update(['status' => $request->status]);
        return redirect()->route('timeline_posts.index')->with('success', 'Status Changed Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TimelinePost::find($id);
        $post->delete();
        return redirect()->route('timeline_posts.index')->with('success','Post Deleted Successfully');
    }
     public function post_like($id)
    {
        $post_likes = PostLike::where('timeline_post_id', $id)->paginate(20);
        $post_name = TimelinePost::where('id', $id)->first();
        return view('admin.pages.post_timelines.post_likes_show', compact('post_likes','post_name'));
    }
    public function post_comment($id)
    {
        $post_comments = PostComment::where('timeline_post_id', $id)->paginate(20);
        $post_name = TimelinePost::where('id', $id)->first();
        return view('admin.pages.post_timelines.post_comments_show', compact('post_comments','post_name'));
    }
        public function comment_status_change(Request $request, $id)
    {
        $post_comments = PostComment::find($id);
        $post_comments->update(['status'=> $request->status]);
        return redirect()->back()->with('success', 'Status Changed Successfully');  
    }
}
