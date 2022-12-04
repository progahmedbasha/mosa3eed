@extends('organization.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Medicins List :</h1>
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
                  <a href="{{ route('organization_medicins.create') }}" class="btn  btn-outline-primary">Add</a>
               </div>
               {{-- search --}}
               <div class="col mb-3">
                  <form method="get" class="form-inline" action="{{url('admin/organization_medicins')}}" style="margin-left: 45%;">
                     <input class=" form-control form-control-solid w-250px ps-15" name="search" type="text"
                        placeholder="Search Medicin" required>
                     <button type="submit" class="btn btn-light-primary me-3"><i class="fa fa-search"></i></button>
                     <a href="{{url('admin/organization_medicins')}}" class="btn btn-light-primary me-3" style="margin-top:0px;"><i
                           class="fa fa-times"></i></a>
                  </form>
               </div>
               {{-- search --}}

            </div>
            @if(Session::has('success'))
            <script>
               toastr.success(" {{ Session::get('success') }} ");
            </script>
            @endif
            <div class="table-responsive">
               <table id="datatable" class="table table-striped table-bordered p-0">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Medicin Name</th>
                        <th>Barcode</th>
                        <th>Price</th>
                        <th>Action</th>

                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Medicin Name</th>
                        <th>Barcode</th>
                        <th>Price</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>

                     @foreach($medicins as $index=>$medicin)
                     <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $medicin->name }}</td>
                        <td>{{ $medicin->barcode }}</td>
                        <td>{{ $medicin->price }}</td>

                        <td>
                           <div class="btn-icon-list">
                              <form action="{{route('organization_medicins.destroy',$medicin->id)}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <a href="organization_medicins/{{$medicin->id}}/edit" class="btn btn-info"><i
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

@endsection