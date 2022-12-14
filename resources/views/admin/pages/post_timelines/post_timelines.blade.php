{{-- @include('admin.pages.post_timelines.right_nav') --}}

@extends('admin.layouts.master')
@section('content')
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

                   @include('admin.pages.post_timelines.ads_modal_component')

                  <div class="box mb-3 single-video-comment-tabs">
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="retro-comments-tab" data-toggle="tab" href="#retro-comments"
                              role="tab" aria-controls="retro" aria-selected="false">Posts</a>
                        </li>
                        {{-- <li class="nav-item">
                           <a class="nav-link" id="disqus-comments-tab" data-toggle="tab" href="#disqus-comments"
                              role="tab" aria-controls="disqus" aria-selected="true">Disqus Comments</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="facebook-comments-tab" data-toggle="tab" href="#facebook-comments"
                              role="tab" aria-controls="facebook" aria-selected="false">Facebook Comments</a>
                        </li> --}}
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane fade" id="disqus-comments" role="tabpanel"
                           aria-labelledby="disqus-comments-tab">
                           <h1>Soon...</h1>
                        </div>
                        <div class="tab-pane fade" id="facebook-comments" role="tabpanel"
                           aria-labelledby="facebook-comments-tab">
                           <h1>Soon...</h1>
                        </div>
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
                                       <textarea rows="1" placeholder="Add a public post..."
                                          class="form-control"></textarea>
                                    </div>
                                    <div class="form-members-footer text-right mt-2">
                                       {{-- <b class="float-left">12,725 Comments
                                       </b> --}}
                                       <button class="btn btn-outline-danger btn-sm" type="button">CANCEL</button>
                                       <button class="btn btn-danger btn-sm" type="button">COMMENT</button>
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
                                 @endif <div class="media-body">
                                    <div class="reviews-members-header">
                                       <h6 class="mb-1"><a class="text-black" href="#">{{ $post_timeline->User->name }}
                                          </a> <small
                                             class="text-gray">{{ $post_timeline->User->Organization->name }}</small>
                                       </h6>
                                       {{-- dropdown --}}
                                       <div class="dropdown" style="margin-left: 100%; margin-top: -3%;">
                                          <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                             style="color:black;" aria-expanded="false">
                                             <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                             <li><a class="dropdown-item" style="padding: 3px 14px!important"
                                                   href="timeline_posts/{{$post_timeline->id}}/edit"><i
                                                      class="fas fa-eye"></i> View &
                                                   Edit
                                                </a></li>
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
                                    </div>
                                    <div class="reviews-members-footer">
                                       <a class="total-like" href="post_like/{{$post_timeline->id}}"><i
                                             class="fas fa-thumbs-up"></i>
                                          {{$post_timeline->post_like_count}}</a> <a class="total-like"
                                          href="post_comments/{{$post_timeline->id}}"><i class="fas fa-comments"></i>
                                          {{$post_timeline->post_comment_count}}</a>
                                          <a class="total-like" onclick="myFunction({{$post_timeline->id}})">comments <i class="fas fa-chevron-circle-down"></i></a>
                                       
                                    </div>
                                    <div class="reviews-members-footer"  id="{{$post_timeline->id}}">
                                       <h1>ss</h1>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           {{-- <div class="reviews-members">
                              <div class="media">
                                 <a href="#"><img alt="Generic placeholder image" src="img/s3.png" class="mr-3"></a>
                                 <div class="media-body">
                                    <div class="reviews-members-header">
                                       <h6 class="mb-1"><a href="#" class="text-black">Gurdeep Osahan </a> <small
                                             class="text-gray">2 months ago</small></h6>
                                    </div>
                                    <div class="reviews-members-body">
                                       <p>Was here impromptu in their first week, reacthe last order. Even though they
                                          had Chefs in their open kitchen they weren’t flexible to dish out few more
                                          items.</p>
                                    </div>
                                    <div class="reviews-members-footer">
                                       <a href="#" class="total-like"><i class="fas fa-thumbs-up"></i> 123</a> <a
                                          href="#" class="total-like"><i class="fas fa-thumbs-down"></i> 02</a>
                                       <span class="total-like-user-main ml-2" dir="rtl">
                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan"
                                             href="#"><img alt="Generic placeholder image" src="img/s5.png"
                                                class="total-like-user"></a>
                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan"
                                             href="#"><img alt="Generic placeholder image" src="img/s6.png"
                                                class="total-like-user"></a>
                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan"
                                             href="#"><img alt="Generic placeholder image" src="img/s7.png"
                                                class="total-like-user"></a>
                                          <a data-toggle="tooltip" data-placement="top" title="Gurdeep Osahan"
                                             href="#"><img alt="Generic placeholder image" src="img/s8.png"
                                                class="total-like-user"></a>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="single-video-right">
                  <div class="row">
                     <div class="col-md-12">
                      
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                 Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                    Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                    Close</a>
                              </div>
                           </div>
                           <button class="btn btn-danger btn-sm" data-toggle="modal" href="#modaldemo8" type="button">Create Ad</button>
                           {{-- <a class="btn btn-warning" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">Create Ad
                           </a> --}}
                        </div><br>
                     </div>
                     <div class="col-md-12">
                       
                        @foreach ($ads as $ad)
                        @if ($ad->photo !==null)
                        <div class="video-card video-card-list">
                           <div class="video-card-image">
                              <a class="play-icon" href="#"><i class="fas fa-eye"></i></a>
                              <a href="{{ $ad->link }}"><img class="img-fluid" src="{{url('/data/org_ads')}}/{{$ad->photo }}" alt=""></a>
                              {{-- <div class="time">3:50</div> --}}
                           </div>
                           <div class="video-card-body">
                              <div class="btn-group float-right right-action">
                                 <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="organizations/{{$ad->id}}/edit"><i class="fa fa-edit"></i> &nbsp; Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                       Viewed</a>
                                       <form action="{{route('organizations.destroy',$ad->id)}} " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="channels-card-image-btn">
                                                    <button class="dropdown-item"
                                                        style="background: transparent;border: 0;padding: 0px 14px!important"
                                                        data-kt-customer-table-filter="delete_row"><i
                                                            class="fas fa-trash"></i>
                                                        &nbsp;&nbsp; Delete</button>
                                                </div>
                                            </form>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                       Close</a>
                                 </div>
                              </div>
                              <div class="video-title">
                                 <a href="#">Here are many variati of passages of Lorem</a>
                              </div>
                              <div class="video-page text-success">
                                 Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                    data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                              </div>
                           </div>
                        </div>
                        @else
                        <div class="adblock mt-0">
                           <div class="btn-group float-right right-action">
                                 <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="organizations/{{$ad->id}}/edit"><i class="fa fa-edit"></i> &nbsp; Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                       Viewed</a>
                                       <form action="{{route('organizations.destroy',$ad->id)}} " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="channels-card-image-btn">
                                                    <button class="dropdown-item"
                                                        style="background: transparent;border: 0;padding: 0px 14px!important"
                                                        data-kt-customer-table-filter="delete_row"><i
                                                            class="fas fa-trash"></i>
                                                        &nbsp;&nbsp; Delete</button>
                                                </div>
                                            </form>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                       Close</a>
                                 </div>
                              </div>
                           <div class="img">
                              Google AdSense<br>
                              336 x 280
                           </div>
                        </div>
                        @endif
                        @endforeach

                       
                        {{-- <div class="video-card video-card-list">
                           <div class="video-card-image">
                              <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid" src="img/v1.png" alt=""></a>
                              <div class="time">3:50</div>
                           </div>
                           <div class="video-card-body">
                              <div class="btn-group float-right right-action">
                                 <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                       Rated</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                       Viewed</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                       Close</a>
                                 </div>
                              </div>
                              <div class="video-title">
                                 <a href="#">Here are many variati of passages of Lorem</a>
                              </div>
                              <div class="video-page text-success">
                                 Education <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                    data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                              </div>
                           </div>
                        </div> --}}

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>




      <hr>
      <script type="text/javascript">
         $(document).ready(function () {
        $('#datatable').dataTable(
         {
            paging: false,
             info: false,
            scrollX: false,
            searching: false,
         }
        );
        
    });
      </script>
      <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
      </script>



   </div>

</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
function myFunction(id) {
 
  var x = document.getElementById(id);
  console.log(x);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
@endsection