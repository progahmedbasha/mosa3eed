@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="top-category section-padding mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Admins For Branches List :</h1>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col mb-3" style="margin-bottom:-1rem!important;">
                    <a href="{{ route('branch_admins_create',['org'	=> $org, 'branch' => $branch])}}" class="btn btn-primary">Add</a>
                </div>
            </div>
        </div>
        <hr>
        @if(Session::has('success'))
        <script>
        toastr.success(" {{ Session::get('success') }} ");
        </script>
        @endif
        <div class="row">
            {{-- // --}}
            @foreach ($admins as $admin)

            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="channels-card">
                    <div class="channels-card-image">
                        @if(!empty($admin->User->photo))
                        <a href="{{route('branch_admin_edit', ['org' => $org , 'branch' => $admin->branch_id ,'id' =>$admin->user_id ])}}"><img
                                src="{{url('/data/admins')}}/{{$admin->User->photo }}" class="img-fluid" alt=""></a>
                        @else
                        <a href="{{route('branch_admin_edit', ['org' => $org , 'branch' => $admin->branch_id ,'id' =>$admin->user_id ])}}"><img src="{{url('/data/user_error.png')}}"
                                class="img-fluid" alt=""></a>
                        @endif

                        <div class="channels-card-image-btn"><button type="button"
                                class="btn btn-success btn-sm border-none">
                                {{ $admin->Branch->Organization->name }}
                            </button> <a
                                href="{{route('branch_admin_edit', ['org' => $org , 'branch' => $admin->branch_id ,'id' =>$admin->user_id ])}}"
                                class="btn btn-warning btn-sm border-none"><i class="fas fa-eye"></i></a>
                        </div>

                    </div>
                    <div class="channels-card-body">
                        <div class="channels-title">
                            <a href="#">{{ $admin->User->name }} <span title="" data-placement="top"
                                    data-toggle="tooltip" data-original-title="Verified"><i
                                        class="fas fa-check-circle text-success"></i></span></a>
                        </div>
                        <div class="channels-view">
                            {{-- {{ $admin->User->UserType->type }} --}}
                            <form action="{{route('branch_admins.destroy',$admin->user_id)}} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="menu-link px-3" style="background: transparent;border: 0;"
                                    data-kt-customer-table-filter="delete_row">{{ $admin->User->UserType->type }} <i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- // --}}
        </div>
        <hr>
    </div>
</div>
</div>
@endsection