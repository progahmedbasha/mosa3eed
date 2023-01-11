@extends('admin.layouts.master')
@section('content')
<style>
   .switch {
   position: relative;
   display: inline-block;
   width: 29px;
   height: 17px;
   }
   .switch input {
   opacity: 0;
   width: 0;
   height: 0;
   }
   .slider {
   position: absolute;
   cursor: pointer;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background-color: #ccc;
   -webkit-transition: .4s;
   transition: .4s;
   }
   .slider:before {
   position: absolute;
   content: "";
   height: 15px;
   width: 16px;
   left: 4px;
   bottom: 1px;
   background-color: white;
   -webkit-transition: .4s;
   transition: .4s;
   }
   input:checked+.slider {
   background-color: #ff516b;
   }
   input:focus+.slider {
   box-shadow: 0 0 1px #ff516b;
   }
   input:checked+.slider:before {
   -webkit-transform: translateX(26px);
   -ms-transform: translateX(26px);
   transform: translateX(7px);
   }
   /* Rounded sliders */
   .slider.round {
   border-radius: 34px;
   }
   .slider.round:before {
   border-radius: 50%;
   }
</style>
{{-- --}}
<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="video-block section-padding">
         <div class="row">
            <div class="col-md-8">
               <div class="single-video-left">
                  <div class="single-video-title box mb-3">
                     <h2><a href="#">Post TimeLine List :</a></h2>
                  </div>
                  @include('admin.pages.post_timelines.add_post_component')
                  <div class="box mb-3 single-video-comment-tabs">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="retro-comments-tab" data-toggle="tab" href="#retro-comments"
                              role="tab" aria-controls="retro" aria-selected="false">Posts</a>
                        </li>
                        {{-- 
                        <li class="nav-item">
                           <a class="nav-link" id="disqus-comments-tab" data-toggle="tab" href="#disqus-comments"
                              role="tab" aria-controls="disqus" aria-selected="true">Disqus Comments</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="facebook-comments-tab" data-toggle="tab" href="#facebook-comments"
                              role="tab" aria-controls="facebook" aria-selected="false">Facebook Comments</a>
                        </li>
                        --}}
                     </ul>
                     <div class="tab-content">
                        {{-- 
                        <div class="tab-pane fade" id="disqus-comments" role="tabpanel"
                           aria-labelledby="disqus-comments-tab">
                           <h1>Soon...</h1>
                        </div>
                        --}}
                        {{-- 
                        <div class="tab-pane fade" id="facebook-comments" role="tabpanel"
                           aria-labelledby="facebook-comments-tab">
                           <h1>Soon...</h1>
                        </div>
                        --}}
                        <div class="tab-pane fade show active" id="retro-comments" role="tabpanel"
                           aria-labelledby="retro-comments-tab">
                           <div class="reviews-members pt-0">
                              <div class="media">
                                 @if(!empty(Auth::user()->photo))
                                 <a href="#"><img class="mr-3" src="{{url('/data/admins')}}/{{Auth::user()->photo }}"
                                    alt="Generic placeholder image"></a>
                                 @else
                                 <a href="#"><img class="mr-3" src="{{url('/data/error.png')}}"
                                    alt="Generic placeholder image"></a>
                                 @endif
                                 <div class="media-body">
                                    <div class="form-members-body">
                                       <input type="button" style="border:antiquewhite;height:35px;width:100%;"
                                          data-effect="effect-sign" data-toggle="modal" href="#modaldemo9"
                                          value="Add a public post...">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @foreach($post_timelines as $index=>$post_timeline)
                           <div class="reviews-members">
                              <div class="media">
                                 @if(!empty($post_timeline->User->photo))
                                 <a href="timeline_posts/{{$post_timeline->id}}/edit"><img
                                    src="{{url('/data/admins')}}/{{$post_timeline->User->photo }}" class="mr-3"
                                    alt=""></a>
                                 @else
                                 <a href="timeline_posts/{{$post_timeline->id}}/edit"><img
                                    src="{{url('/data/user_error.png')}}" class="mr-3" alt=""></a>
                                 @endif 
                                 <div class="media-body">
                                    <div class="reviews-members-header">
                                       <h6 class="mb-1"><a class="text-black" href="#">{{ $post_timeline->User->name }}
                                          </a> <small
                                             class="text-gray">Org name</small>
                                       </h6>
                                       {{-- dropdown --}}
                                       <div class="dropdown" style="margin-left: 100%; margin-top: -3%;">
                                          <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                             style="color:black;" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                             <button class="dropdown-item" data-effect="effect-sign" data-toggle="modal"
                                                data-target="#ModalEdit{{ $post_timeline->id }}"
                                                style="background: transparent;border: 0;padding: 0px 14px!important"
                                                data-kt-customer-table-filter="delete_row"><i class="fas fa-eye"></i>
                                             View & Edit</button>
                                             <li>
                                                <form action="{{route('timeline_posts.destroy',$post_timeline->id)}} "
                                                   method="POST">
                                                   @csrf
                                                   @method('DELETE')
                                                   <div class="channels-card-image-btn">
                                                      <button class="dropdown-item"
                                                         style="background: transparent;border: 0;padding: 0px 14px!important"
                                                         data-kt-customer-table-filter="delete_row"><i
                                                         class="fas fa-trash"></i>
                                                      Delete</button>
                                                   </div>
                                                </form>
                                             </li>
                                          </ul>
                                       </div>
                                       {{-- dropdown --}}
                                    </div>
                                    <div class="reviews-members-body">
                                       <p> {{ $post_timeline->post }}</p>
                                       <div>
                                          @if(!empty($post_timeline->photo))
                                          <img style="width: 36%; height:50%; padding-bottom:7px;border-radius:10px; "
                                             src="{{url('/data/timeline_posts')}}/{{$post_timeline->photo }}"
                                             class="img-fluid" alt="Responsive image">
                                          @endif
                                       </div>
                                    </div>
                                    <div class="reviews-members-footer">
                                       <a class="total-like" href="post_like/{{$post_timeline->id}}"><i
                                          class="fas fa-thumbs-up"></i>
                                       {{$post_timeline->post_like_count}}</a>
                                       <a class="total-like" onclick="myFunction({{$post_timeline->id}})"><i
                                          class="fas fa-comments"></i>
                                       {{$post_timeline->post_comment_count}}</i></a>
                                    </div>
                                    <br>
                                    @include('admin.pages.post_timelines.edit_post_modal')
                                    {{-- div for show comments --}}
                                    <div class="reviews-members-footer" style="display: none;"
                                       id="{{$post_timeline->id}}">
                                       <hr>
                                       {{-- 
                                       <h1>{{$comments->user_id}}</h1>
                                       --}}
                                       <div id="div{{ $post_timeline->id}}">
                                          @foreach ( $post_timeline->PostComment as $comments)
                                          <div class="media" >
                                             @if(!empty($comments->User->photo))
                                             <a href="timeline_posts/{{$comments->id}}/edit"><img
                                                src="{{url('/data/admins')}}/{{$comments->User->photo }}" class="mr-3"
                                                alt=""></a>
                                             @else
                                             <a href="timeline_posts/{{$post_timeline->id}}/edit"><img
                                                src="{{url('/data/user_error.png')}}" class="mr-3" style="width: 36px; "
                                                alt=""></a>
                                             @endif
                                             {{-- div for show comments --}}
                                             <div class="reviews-members-header"  style="width:84%">
                                                <h6 class="mb-1">
                                                   <a class="text-black"
                                                      href="#">{{ $post_timeline->User->name }}
                                                   </a>
                                                   @if(!empty($comments->User->Organization->name))
                                                   <small
                                                      class="text-gray">{{ $comments->User->Organization->name }}</small>
                                                   @else
                                                   <small class="text-gray">Mosa3eed</small>
                                                   @endif
                                                   {{-- toggel button --}}
                                                   <div class="dropdown" style="margin-left: 92%; margin-top: -3%;">
                                                      <label class="switch">
                                                      @if ($comments->status == "Active")
                                                      <input type="checkbox" class="actives" checked value="0"
                                                         name="active" data-id="{{ $comments->id }}">
                                                      @else
                                                      <input type="checkbox" class="actives" value="1" name="active"
                                                         data-id="{{ $comments->id }}">
                                                      @endif
                                                      <span class="slider round"></span>
                                                      </label>
                                                   </div>
                                                   {{-- toggel button --}}
                                                </h6>
                                                <div class="reviews-members-body" style="width: 95%;">
                                                   <p> {{ $comments->comment }}</p>
                                                </div>
                                             </div>
                                             {{-- div for show comments --}}
                                          </div>
                                          @endforeach
                                       </div>
                                       {{-- create comment --}}
                                       <div class="media-body" style="width: 83%;margin-left:9%;">
                                          <div class="form-members-body">
                                             <textarea rows="1" placeholder="Add a public comment..." value="{{old('comment_input')}}"
                                                class="form-control " id="inputadd{{ $post_timeline->id }}"></textarea>
                                             {{-- <input type="text" class="comment_input" id="inputadd{{ $post_timeline->id }}" > --}}
                                          </div>
                                          <div class="form-members-footer text-right mt-2">
                                             <button class="btn btn-outline-danger btn-sm" type="button">CANCEL</button>
                                             <button class="btn btn-danger btn-sm comment" onclick="commentFunction({{$post_timeline->id}} , inputadd{{$post_timeline->id}} ,div{{ $post_timeline->id}} )"  data-id="{{ $post_timeline->id }}" type="button">COMMENT</button>
                                          </div>
                                       </div>
                                       {{-- create comment --}}
                                    </div>
                                    {{-- div for show comments --}}
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @include('admin.pages.post_timelines.right_nav')
         </div>
      </div>
      <hr>
   </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
   function myFunction(id) {
   
   var x = document.getElementById(id);
   // console.log(x);
   if (x.style.display === "none") {
      x.style.display = "block";
   } else {
      x.style.display = "none";
   }
   }
   ////togle button
     $(document).ready(function(){
             //change status active
             $('.actives').on('click ', function (e) {
                 var active = $('.actives').val();
               //   var new_id = $('.new_id').val();
                  var new_id = $(this).attr('data-id');
                 $.ajax({
                     url: "{{route('change_comment_satus')}}",
                     type: "POST",
                     data: {
                         active: active,
                         new_id:new_id,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
                     if(response)
                        {
                           toastr.success(" Status Changed Succsesfilly ");
                        }
                     },
                 });
   
             });
   
   });
   ////add comment to post
     function commentFunction(id , inputad,div) {
      //   console.log(inputad);
                 var input_id = $(inputad).val();
                 $.ajax({
                     url: "{{route('add_comment_ajax')}}",
                     type: "POST",
                     data: {
                         id:id,
                         input_id:input_id,
                         _token: '{{csrf_token()}}'
                     },
                    success:function(response){
                     if(response)
                        {
                           $(div).append(response.result);
                           $(inputad).val("");
                           toastr.success(" Comment Added Successfuly ");
                        }
                     },
                 });
   
        }
   
</script>
@endsection