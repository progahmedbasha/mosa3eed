@include('admin.pages.post_timelines.ads_modal_component')

<div class="col-md-4">
    <div class="single-video-right">
        <div class="row">
            <div class="col-md-12">

                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
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
                    <button class="btn btn-danger btn-sm" data-toggle="modal" href="#modaldemo8" type="button">Create
                        Ad</button>
                    {{-- <a class="btn btn-warning" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">Create Ad
                           </a> --}}
                </div><br>
            </div>
            <div class="col-md-12">

                @foreach ($ads as $ad)
                @if ($ad->title !=null)
                <div class="video-card video-card-list">
                    <div class="video-card-image">
                        <a class="play-icon" href="#"><i class="fas fa-eye"></i></a>
                        <a href="{{ $ad->link }}"><img class="img-fluid" src="{{url('/data/org_ads')}}/{{$ad->photo }}"
                                alt=""></a>
                    </div>
                    <div class="video-card-body">
                        <div class="btn-group float-right right-action">
                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                {{-- <a class="dropdown-item" href="organizations/{{$ad->id}}/edit"><i
                                    class="fa fa-edit"></i> &nbsp; Edit</a> --}}
                                <button class="dropdown-item" data-effect="effect-sign" data-toggle="modal"
                                    data-target="#ModalAddEdit{{ $ad->id }}" style="background: transparent;border: 0;"
                                    data-kt-customer-table-filter="delete_row"><i class="fas fa-edit"></i>
                                    Edit</button>

                                <form action="{{route('ads.destroy',$ad->id)}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="channels-card-image-btn">
                                        <button class="dropdown-item"
                                            style="background: transparent;border: 0;padding: 0px 14px!important"
                                            data-kt-customer-table-filter="delete_row"><i class="fas fa-trash"></i>
                                            &nbsp;&nbsp; Delete</button>
                                    </div>
                                </form>
                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                    Close</a>
                            </div>
                        </div>
                        @include('admin.pages.post_timelines.edit_ad_modal')

                        <div class="video-title">
                            <a href="#">{{ $ad->title }}</a>
                        </div>
                        <div class="video-page text-success">
                            Active <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                        </div>
                        <div class="video-view">
                            <i class="fas fa-calendar-alt"></i> {{ $ad->created_at }}
                        </div>
                    </div>
                </div>
                @else
                <div class="adblock mt-0" style="padding:0px 0px;">
                    <div class="btn-group float-right right-action" style="position: absolute;">
                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-ellipsis-v" aria-hidden="true" style="margin-left: 268px;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" data-effect="effect-sign" data-toggle="modal"
                                data-target="#ModalAddEdit{{ $ad->id }}" style="background: transparent;border: 0;"
                                data-kt-customer-table-filter="delete_row"><i class="fas fa-edit"></i>
                                Edit</button>
                            <form action="{{route('ads.destroy',$ad->id)}} " method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="channels-card-image-btn">
                                    <button class="dropdown-item"
                                        style="background: transparent;border: 0;padding: 0px 14px!important"
                                        data-kt-customer-table-filter="delete_row"><i class="fas fa-trash"></i>
                                        &nbsp;&nbsp; Delete</button>
                                </div>
                            </form>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp;
                                Close</a>
                        </div>
                    </div>
                     @include('admin.pages.post_timelines.edit_ad_modal_only_pic')
                    {{-- <div class="img"> --}}
                    <img src="{{url('/data/org_ads')}}/{{$ad->photo }}" style="height: 93px;width: 242px;">
                    {{-- Google AdSense<br>
                        336 x 280 --}}
                    {{-- </div> --}}
                </div>
                @endif
                @endforeach



            </div>
        </div>
    </div>
</div>