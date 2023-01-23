@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="top-category section-padding mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Organization List :</h1>
                    </div>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <button type="submit" data-effect="effect-sign" data-toggle="modal" href="#modaldemo9"
                                    class="btn btn-primary">Add</button>
                            </div>

                            @include('admin.pages.organizations.modal_add')
                            {{-- search --}}
                            <div class="col mb-3">
                                <form method="get" class="form-inline" action="{{url('admin/organizations')}}"
                                    style="margin-left: 45%;">
                                    <input class=" form-control form-control-solid w-250px ps-15" name="search"
                                        type="text" placeholder="Search organizations" required>
                                    <button type="submit" class="btn btn-light-primary me-3"><i
                                            class="fa fa-search"></i></button>
                                    <a href="{{url('admin/organizations')}}" class="btn btn-light-primary me-3"
                                        style="margin-top:0px;"><i class="fa fa-times"></i></a>
                                </form>
                            </div>
                            {{-- search --}}
                        </div>

                        @if(Session::has('success'))
                        <script>
                        toastr.success(" {{ Session::get('success') }} ");
                        </script>
                        @endif
                        <div class="row">

                            @foreach ($organizations as $organization )
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="video-card history-video">
                                    <div class="video-card-image">
                                        {{-- <a class="video-close" href="#"><i class="fas fa-times-circle"></i></a> --}}
                                        <div class="dropdown">
                                            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                                style="margin-top: 13px;margin-left: 92%; font-size: medium;">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item"
                                                        style="padding: 3px 14px!important; font-size:14px;"
                                                        href="organizations/{{$organization->id}}/edit"><i
                                                            class="fas fa-eye"></i>
                                                        View &
                                                        Edit
                                                    </a></li>
                                                <li><a class="dropdown-item"
                                                        style="padding: 0px 14px!important; font-size:14px;"
                                                        href="organization_branches/{{$organization->id}}"><i
                                                            class="fas fa-university"></i>
                                                        Branches</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        style="padding: 0px 14px!important; font-size:14px;"
                                                        href="org_admins/{{ $organization->id }}"><i
                                                            class="fas fa-user-circle"></i>
                                                        Admins</a>
                                                </li>


                                                <li>
                                                    <form action="{{route('organizations.destroy',$organization->id)}} "
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="channels-card-image-btn">
                                                            <button class="dropdown-item"
                                                                style="background: transparent;border: 0;padding: 0px 14px!important; font-size:14px;"
                                                                data-kt-customer-table-filter="delete_row"><i
                                                                    class="fas fa-trash"></i>
                                                                Delete</button>
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="organizations/{{$organization->id}}">
                                            @if(!empty($organization->photo))
                                            <img class="img-fluid"
                                                src="{{url('/data/organizations')}}/{{$organization->photo }}" alt=""
                                                style="height: 154px;">
                                            @else
                                            <img src="{{url('/data/error.png')}}" class="w3-round"
                                                style="height: 154px;" alt="Norway">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="video-title" style="text-align: center;">
                                            <a href="#">{{$organization->name }}</a>
                                        </div>
                                        <div class="video-page text-success" style="text-align: center;">
                                            {{$organization->type }} <a title="" data-placement="top"
                                                data-toggle="tooltip" href="#" data-original-title="Verified"><i
                                                    class="fas fa-check-circle text-success"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').dataTable({
        paging: false,
        info: false,
        scrollX: false,
        searching: false,
    });

});
</script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection