@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Organization Details :</h1>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
               <div class="card-body">
                  <div class="row" style="display: contents;">
                     <h5 class="card-title">
                        <a href=" {{route('organizations.edit',$organization->id)}}"><i class="fas fa-edit"></i>
                           Edit
                        </a>
                     </h5>
                  </div>
                  <div class="form-row">
                     {{-- <h6>here</h6> --}}
                     <div class="reviews-members" style="width: 95%;">
                        <div class="media">
                           <a href="#"><img class="mr-3" src="/data/error.png" alt="Generic placeholder image"></a>
                           <div class="media-body">
                              <div class="reviews-members-header">
                                 <h6 class="mb-1"><a class="text-black">{{ $organization->name }} </a> <small
                                       class="text-gray">({{ $organization->type }})</small></h6>
                              </div>
                              <hr>
                              <div class="reviews-members-body">
                                 <div class="row" style="padding-bottom: 8px;">
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i
                                                class="fas fa-envelope fa-fw"></i>
                                             <span>Email : {{ $organization->email }}</span></a>
                                       </p>
                                    </div>
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i class="fas fa-phone"></i>
                                             <span>Phone : {{ $organization->phone }}</span></a>
                                       </p>
                                    </div>

                                 </div>
                                 <div class="row" style="padding-bottom: 8px;">
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i class="fas fa-list"></i>
                                             <span>Contact : {{ $organization->contact_name }}</span></a>
                                       </p>
                                    </div>
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i class="fas fa-globe"></i>
                                             <span>Address : {{ $organization->District->City->Country->name }} ,
                                                {{ $organization->District->City->name }} ,
                                                {{ $organization->District->name }}</span></a>
                                       </p>
                                    </div>
                                 </div>
                                 <div class="row" style="padding-bottom: 8px;">
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i class="fas fa-list"></i>
                                             <span>Verify Status : {{ $organization->status }}</span></a>
                                       </p>
                                    </div>
                                    <div class="col">
                                       <p class="mb-0"><a href="#" class="text-dark"><i class="fas fa-globe"></i>
                                             <span>Bio : {{ $organization->bio }}</span></a>
                                       </p>
                                    </div>
                                 </div>
                                 <br>
                                 <div class="reviews-members-header">
                                    <h6 class="mb-1"><a class="text-black">Owner : {{ $owner->User->name }} </a> </h6>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                     {{-- <h6>here</h6> --}}
                  </div>

               </div>
            </div>
         </div>
      </div>
      {{--div for show branches --}}
      <br>
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Branches :</h1>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
               <div class="card-body">
                  <div class="row">
                     <div class="col mb-3">
                        <a href="{{ route('branch_add',$organization->id) }}" class="btn  btn-outline-primary">Add</a>
                     </div>
                  </div>
                  <div class="table-responsive" style="text-align:center;">
                     <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                           <tr>
                              <th style="width:21px;" style="text-align:center;">#</th>
                              <th style="text-align:center;">Branch Name</th>
                              <th style="text-align:center;">Organization</th>
                              <th style="text-align:center;">Email</th>
                              <th style="text-align:center;">Address</th>
                              <th style="text-align:center;">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($branchs as $index=>$branch)
                           <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $branch->name }}</td>
                              <td>{{ $branch->Organization->name }}</td>
                              <td>{{ $branch->email}}</td>
                              <td>{{ $branch->address}}</td>
                              <td>
                                 <div class="btn-icon-list">
                                    <form action="{{route('branchs.destroy',$branch->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <a href="{{route('branchs.edit',$branch->id)}}" class="btn btn-info"><i
                                             class="fa fa-edit"></i></a>
                                       <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{--div for show branches --}}
      {{--div for show admins --}}
      <br>
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Admins :</h1>
               </div>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col mb-3" style="margin-bottom:-1rem!important;">
               <a href="{{ route('organization_admins_create',$organization->id) }}" class="btn btn-primary">Add</a>
            </div>
         </div>
      </div>
      <div class="row">
         @if($organization_admins->isEmpty())
         <h6 style="margin: auto;">Organization Not has Admins</h6>
         {{-- <hr> --}}
         @endif
         {{-- // --}}
         @foreach ($organization_admins as $organization_admin)
         <div class="col-xl-3 col-sm-6 mb-3">
            <div class="channels-card">
               <div class="channels-card-image">
                  @if(!empty($organization_admin->User->photo))
                  <a href=" {{route('organization_admins.edit',$organization_admin->id)}} "><img
                        src="{{url('/data/admins')}}/{{$organization_admin->User->photo }}" class="img-fluid"
                        alt=""></a>
                  @else
                  <a href=" {{route('organization_admins.edit',$organization_admin->id)}} "><img
                        src="{{url('/data/user_error.png')}}" class="img-fluid" alt=""></a>
                  @endif
                  <div class="channels-card-image-btn"><button type="button" class="btn btn-success btn-sm border-none">
                        {{ $organization_admin->Organization->name }}
                     </button> <a href=" {{route('organization_admins.edit',$organization_admin->id)}} "
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
      </div>
      {{--div for show Branch Admin --}}
      <br>
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Branch Admins :</h1>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="row">
         <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
               <div class="card-body">

                  <div class="row">
                     <div class="col mb-3">
                        {{-- <a href="{{ route('employees.create') }}" class="btn btn-outline-primary">Add</a> --}}
                     </div>
                  </div>
                  <div class="table-responsive" style="text-align:center;">
                     <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                           <tr>
                              <th style="width:21px;" style="text-align:center;">#</th>
                              <th style="text-align:center;">Name</th>
                              <th style="text-align:center;">Phone</th>
                              <th style="text-align:center;">Organization</th>
                              <th style="text-align:center;">Branch</th>
                              <th style="text-align:center;">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($branch_admins as $index=>$branch_admin)
                           <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $branch_admin->User->name }}</td>
                              <td>{{ $branch_admin->User->phone}}</td>
                              <td>{{ $branch_admin->Organization->name }}</td>
                              <td>{{ $branch_admin->Branch->name}}</td>
                              <td>
                                 <div class="btn-icon-list">
                                    <form action="{{route('branch_admins.destroy',$branch_admin->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <a href="{{route('branch_admin_edit',['org' => $branch_admin->organization_id , 'branch' => $branch_admin->branch_id ,'id' =>$branch_admin->user_id ])}}" class="btn btn-info"><i
                                             class="fa fa-edit"></i></a>

                                       <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{--div for show employees --}}
   </div>
   @endsection