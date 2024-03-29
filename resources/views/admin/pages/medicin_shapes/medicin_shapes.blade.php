@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Medicin Shapes List :</h1>
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
                        <a href="{{ route('medicin_shapes.create') }}" class="btn  btn-outline-primary">Add</a>
                     </div>
                     {{-- search --}}
                     <div class="col mb-3">
                        <form method="get" class="form-inline" action="{{url('admin/medicin_shapes')}}"
                           style="margin-left: 45%;">
                           <input class=" form-control form-control-solid w-250px ps-15" name="search" type="text"
                              placeholder="Search Medicin shapes" required>
                           <button type="submit" class="btn btn-light-primary me-3"><i
                                 class="fa fa-search"></i></button>
                           <a href="{{url('admin/medicin_shapes')}}" class="btn btn-light-primary me-3"
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
                              <th style="text-align:center;">Name</th>
                              <th style="text-align:center;">Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($medicin_shapes as $index=>$medicin_shape)
                           <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{ $medicin_shape->name }}</td>
                              <td>
                                 <div class="btn-icon-list">
                                    <form action="{{route('medicin_shapes.destroy',$medicin_shape->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <a href="{{route('medicin_shapes.edit',$medicin_shape->id)}}" class="btn btn-info"><i
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