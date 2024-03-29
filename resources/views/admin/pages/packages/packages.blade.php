@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Package List :</h1>
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
                        <a href="{{ route('packages.create') }}" class="btn  btn-outline-primary">Add</a>
                     </div>
                     {{-- search --}}
                     <div class="col mb-3">
                        <form method="get" class="form-inline" action="{{url('admin/packages')}}"
                           style="margin-left: 45%;">
                           <input class=" form-control form-control-solid w-250px ps-15" name="search" type="text"
                              placeholder="Search packages" required>
                           <button type="submit" class="btn btn-light-primary me-3"><i
                                 class="fa fa-search"></i></button>
                           <a href="{{url('admin/packages')}}" class="btn btn-light-primary me-3"
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
                  <div class="table-responsive" style="text-align:center;">
                     <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                           <tr>
                              <th style="width:21px;" style="text-align:center;">#</th>
                              <th style="text-align:center;">Subject</th>
                              <th style="text-align:center;">UUser Type</th>
                              <th style="text-align:center;">price</th>
                              <th style="text-align:center;">Days</th>
                              <th style="text-align:center;">Offer</th>
                              <th style="text-align:center;">Status</th>
                              <th style="text-align:center;">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($packages as $index=>$package)
                           <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $package->subject }}</td>
                              <td>{{ $package->UserType->type }}</td>
                              <td>{{ $package->price }}</td>
                              <td>{{ $package->number_days}}</td>
                              <td>{{ $package->offer }}</td>
                              <td>{{ $package->status }}</td>
                              <td>
                                 <div class="btn-icon-list">
                                    <form action="{{route('packages.destroy',$package->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <a href="packages/{{$package->id}}/edit" class="btn btn-info"><i
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
      <hr>
   </div>
</div>
</div>
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
@endsection