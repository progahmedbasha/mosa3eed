@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container" id="kt_content_container">
   <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
      <!--begin::Heading-->
      <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Post Likes</h1>
      <!--end::Heading-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
         <li class="breadcrumb-item text-muted">
            <a href="../../demo3/dist/index.html" class="text-muted">Home</a>
         </li>
         <li class="breadcrumb-item text-muted">Applications</li>
         <li class="breadcrumb-item text-muted">Post</li>
         <li class="breadcrumb-item text-dark">Post Likes</li>
      </ul>
      <!--end::Breadcrumb-->
   </div>
   <!--begin::Card-->
   <div class="card">
      <!--begin::Card header-->
      <div class="card-header border-0 pt-6">
         <!--begin::Card title-->
         <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <h1>Users has Liked Post: ({{$post_name->subject}})  </h1>
               {{-- <form method="get" class="form-inline" action="{{url('admin/packages')}}">
                  <input class="form-control form-control-solid w-250px ps-15" name="search" type="text" placeholder="Search Posts" required>
            </div>
            <!--end::Search-->
         </div>
         <!--begin::Card title-->
         <!--begin::Card toolbar-->
         <div class="card-toolbar">
         <!--begin::Toolbar-->
         <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
         <button type="submit" class="btn btn-light-primary me-3"><i class="fa fa-search"></i></button>
         <a href="{{url('admin/packages')}}" class="btn btn-light-primary me-3" style="margin-top:0px;"><i class="fa fa-times"></i></a>
         </form> --}}
         {{-- paginate --}}
         {{-- <a href="{{route('packages.create')}}" class="btn btn-primary">Add</a> --}}
         <!--end::Add customer-->
         </div>
         <!--end::Toolbar-->
         </div>
         <!--end::Card toolbar-->
      </div>
      <!--end::Card header-->
      <!--begin::Card body-->
      <div class="card-body pt-0">
         @if(Session::has('success'))
            <script>
            toastr.success(" {{ Session::get('success') }} ");
            </script>
         @endif
         <!--begin::Table-->
         <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
               <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_customers_table" role="grid">
                  <!--begin::Table head-->
                  <thead>
                     <!--begin::Table row-->
                     <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0" role="row">
                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=" " style="width: 29.25px;">
                           <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                           </div>
                        </th>
                  <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165.203px;">User</th>
					<!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="fw-bold text-gray-600">
                       @foreach($post_likes as $index=>$post_like)		
                     <tr class="odd">
                        <!--begin::Checkbox-->
                        <td>
                           <div class="form-check form-check-sm form-check-custom form-check-solid">
                              <input class="form-check-input" type="checkbox" value="1">
                           </div>
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::Name=-->
                       <td>
							<a href="packages/{{$post_like->id}}/edit" class="text-gray-800 text-hover-primary mb-1">{{ $post_like->User->name }}</a>
						</td>
                 
                                            </tr>
                     @endforeach
                  </tbody>
                  <!--end::Table body-->
               </table>
               {{ $post_likes->links() }}
            </div>
            <!--end::Table-->
         </div>
         <!--end::Card body-->
      </div>
      <!--end::Card-->
      <!--end::Modal - Customers - Add-->
      <!--end::Modals-->
   </div>
   <!--end::Container-->
</div>
@endsection