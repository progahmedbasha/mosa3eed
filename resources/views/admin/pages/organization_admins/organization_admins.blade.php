@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">

         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Admins For s : ({{ $organization_name->name }}) </h1>
               </div>
            </div>

         </div>

         <div class="row">
            <div class="col mb-3" style="margin-bottom:-1rem!important;">
               <a href="{{ route('organization_admins_create',$id) }}" class="btn btn-primary">Add</a>
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
         @foreach ($organization_admins as $organization_admin)

         <div class="col-xl-3 col-sm-6 mb-3">
            {{-- <div class="card" style="width: 15rem;">
         <div class="channels-card-image">
            <div class="dropdown">
               <a  type="button" id="dropdownMenuButton1"
                  data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: 13px;margin-left: 220px;">
                  <i class="fas fa-ellipsis-v"></i>
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
               </ul>
            </div>
            <a href=" {{route('organization_admins.edit',$organization_admin->id)}} ">
            <img class="img-fluid" style="margin-top: 30px;margin-left: 83px;" src="{{url('/data/user_error.png')}}"
               alt="">
            </a>
            <div class="card-body">
               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                  card's
                  content.</p>
            </div>
         </div>
      </div> --}}
      <div class="channels-card">
         <div class="channels-card-image">
            @if(!empty($organization_admin->User->photo))
            <a href=" {{route('organization_admins.edit',$organization_admin->id)}} "><img
                  src="{{url('/data/admins')}}/{{$organization_admin->User->photo }}" class="img-fluid" alt=""></a>
            @else
            <a href=" {{route('organization_admins.edit',$organization_admin->id)}} "><img
                  src="{{url('/data/user_error.png')}}" class="img-fluid" alt=""></a>
            @endif

            <div class="channels-card-image-btn"><button type="button" class="btn btn-success btn-sm border-none">
                  {{ $organization_admin->Organization->name }}
               </button> <a href=" {{route('organization_admins_edit', ['id'	=> $organization_admin->user_id, 'org' => $organization_name->id])}} "
                  class="btn btn-warning btn-sm border-none"><i class="fas fa-eye"></i></a>
            </div>

         </div>
         <div class="channels-card-body">
            <div class="channels-title">
               <a href="#">{{ $organization_admin->User->name }} <span title="" data-placement="top"
                     data-toggle="tooltip" data-original-title="Verified"><i
                        class="fas fa-check-circle text-success"></i></span></a>
            </div>
            <div class="channels-view">
               {{-- {{ $organization_admin->UserType->type }} --}}
               <form action="{{route('organization_admins.destroy',$organization_admin->id)}} " method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="menu-link px-3" style="background: transparent;border: 0;"
                     data-kt-customer-table-filter="delete_row">{{ $organization_admin->type }}<i
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