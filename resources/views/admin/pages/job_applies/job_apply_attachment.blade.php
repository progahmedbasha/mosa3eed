@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container" id="kt_content_container">
               <div
                  class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0"
                  data-kt-swapper="true" data-kt-swapper-mode="prepend"
                  data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                  <!--begin::Heading-->
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">List Of Employee</h1>
                  <!--end::Heading-->
                  <!--begin::Breadcrumb-->
                  <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
                     <li class="breadcrumb-item text-muted">
                        <a href="../../demo3/dist/index.html" class="text-muted">Home</a>
                     </li>
                     <li class="breadcrumb-item text-muted">Applications</li>
                     <li class="breadcrumb-item text-muted">Employee</li>
                     <li class="breadcrumb-item text-dark">Employee List</li>
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

                           {{-- paginate --}}
                           {{-- <a href="{{route('job_applies.create')}}" class="btn btn-primary">Add</a> --}}
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

                        <h5 class="card-title">Attached File For User : ({{$apply_job->User->name}})</h5>

                        <iframe src="{{url('/data/organizations')}}/{{$apply_job->cv_attachment }}" frameborder="0"
                           height="800px" width="100%"></iframe>


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
         </div>
      </div>
   </div>
   @endsection