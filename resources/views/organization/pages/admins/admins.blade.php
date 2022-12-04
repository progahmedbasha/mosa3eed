@extends('organization.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Admins List :</h1>
      </div>
   </div>

</div>

<div class="row">
   <div class="col mb-3" style="margin-bottom:-1rem!important;">
      <a href="{{ route('pharmacy_admins.create') }}" class="btn btn-primary">Add</a>
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
   @foreach ($users as $user)

   <div class="col-xl-3 col-sm-6 mb-3">
      <div class="channels-card">
         <div class="channels-card-image">
            @if(!empty($user->User->photo))
            <a href="{{route('organization_admin_edit', [ 'user_id' => $user->user_id , 'id' => $user->id] )}}"><img src="{{url('/data/admins')}}/{{$user->User->photo }}" class="img-fluid" alt=""></a>
            @else
            <a href="{{route('organization_admin_edit', [ 'user_id' => $user->user_id , 'id' => $user->id] )}}"><img src="{{url('/data/user_error.png')}}" class="img-fluid" alt=""></a>
            @endif
           
            <div class="channels-card-image-btn"><button type="button" class="btn btn-success btn-sm border-none"> {{ $user->Organization->name }}
               </button> <a href="{{route('organization_admin_edit', [ 'user_id' => $user->user_id , 'id' => $user->id] )}}" class="btn btn-warning btn-sm border-none"><i
                     class="fas fa-eye"></i></a>
            </div>
            
         </div>
         <div class="channels-card-body">
            <div class="channels-title">
               <a href="#">{{ $user->User->name }} <span title="" data-placement="top" data-toggle="tooltip"
                     data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
            </div>
            <div class="channels-view">
               {{-- {{ $user->UserType->type }} --}}
               <form action="{{route('pharmacy_admins.destroy',$user->user_id)}} " method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="menu-link px-3" style="background: transparent;border: 0;"
                     data-kt-customer-table-filter="delete_row">{{ $user->type }}<i
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

@endsection