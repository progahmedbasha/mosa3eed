<?php

namespace App\Http\Controllers\OrganizationAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationDashboard\PostTimeline\PostTimelineRequest;
use App\Models\TimelinePost;
use App\Models\PostLike;
use App\Models\User;
use App\Models\Ad;
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
        $ads = Ad::all();
        $users = User::all();
        return view('organization.pages.post_timelines.post_timelines', compact('post_timelines','ads','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('organization_id', Auth::user()->organization_id)->get();
        return view('organization.pages.post_timelines.post_timeline_add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTimelineRequest $request)
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
        return redirect()->route('organization_timeline_posts.index')->with('success', 'Post Added Successfully');
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
        // $timeline_post = TimelinePost::find($id);
        // $users = User::where('organization_id', Auth::user()->organization_id)->get();
        // return view('organization.pages.post_timelines.post_timeline_details', compact('timeline_post','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostTimelineRequest $request, $id)
    {
        $timeline_post = TimelinePost::find($id);
        if($request->img_delete ==1)
        {
            $timeline_post->photo = null;
            $timeline_post->save();
        }
        $timeline_post->user_id = Auth::user()->id;
            $timeline_post->post = $request->post;
        if (request()->photo){
            $filename = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('data/timeline_posts'), $filename);
            $timeline_post->photo=$filename;
        }
        $timeline_post->save();
        return redirect()->route('organization_timeline_posts.index')->with('success', 'Status Changed Successfully');  
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
        return redirect()->route('organization_timeline_posts.index')->with('success','Post Deleted Successfully');
    }
     public function post_like($id)
    {
        $post_likes = PostLike::where('timeline_post_id', $id)->paginate(20);
        $post_name = TimelinePost::where('id', $id)->first();
        return view('organization.pages.post_timelines.post_likes_show', compact('post_likes','post_name'));
    }
     public function change_comment_satus(Request $request)
    {
        $post_comments = PostComment::where('id', $request->new_id)->first();
         if($request->has('active')){
            if($post_comments->status =='Active')
            {
                $post_comments->update(['status' => 'Not Active']);
                return response()->json(['status' => true, 'result' => $post_comments]);
            }
              if($post_comments->status =='Not Active')
            {
                $post_comments->update(['status' =>'Active']);
                return response()->json(['status' => true, 'result' => $post_comments]);
            }
        }
            
        
    }  
    
        public function add_comment_ajax(Request $request)
    {
        // return $request;
        $post_comments = new PostComment();
        $post_comments->user_id = Auth::user()->id; 
        $post_comments->timeline_post_id = $request->id;
        $post_comments->comment = $request->input_id;
        $post_comments->status = "Active";
        $post_comments->save();
        $html = view('organization.pages.post_timelines.div_show_comment_ajax', compact('post_comments'))->render();
        return response()->json(['status' => true, 'result' => $html]);
    }
}
