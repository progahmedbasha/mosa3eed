@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container" id="kt_content_container">
   <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
      <!--begin::Heading-->
      <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Setting List</h1>
      <!--end::Heading-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
         <li class="breadcrumb-item text-muted">
            <a href="{{route('dashboard')}}" class="text-muted">Home</a>
         </li>
         <li class="breadcrumb-item text-muted">Applications</li>
         <li class="breadcrumb-item text-muted">Settings</li>
         <li class="breadcrumb-item text-dark">Setting List</li>
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
               <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
               <!--end::Svg Icon-->
               {{-- paginate --}}
               <form method="get" class="form-inline" action="{{url('admin/settings')}}">
                  <input class="form-control form-control-solid w-250px ps-15" name="search" type="text" placeholder="Search Settings" required>
                  {{-- <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" name="search" placeholder="Search Customers"> --}}
            </div>
            <!--end::Search-->
         </div>
         <!--begin::Card title-->
         <!--begin::Card toolbar-->
         <div class="card-toolbar">
         <!--begin::Toolbar-->
         <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
         <button type="submit" class="btn btn-light-primary me-3"><i class="fa fa-search"></i></button>
         <a href="{{url('admin/settings')}}" class="btn btn-light-primary me-3" style="margin-top:0px;"><i class="fa fa-times"></i></a>
         </form>
         {{-- paginate --}}
         <!--begin::Add customer-->
         {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Customer</button>
         --}}
         <a href="{{route('settings.create')}}" class="btn btn-primary">Add</a>
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
                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label="
                           " style="width: 29.25px;">
                           <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                              <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1">
                           </div>
                        </th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Key: activate to sort column ascending" style="width: 125px;">Key</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Value: activate to sort column ascending" style="width: 165.203px;">Value</th>
                        <th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 79.625px;">Actions</th>
                     </tr>
                     <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="fw-bold text-gray-600">
                     @foreach($settings as $index=>$setting)	
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
                           <a href="settings/{{$setting->id}}/edit" class="text-gray-800 text-hover-primary mb-1">{{ $setting->key }}</a>
                        </td>
                        <!--end::Name=-->
                        <!--begin::Email=-->
                        <td>
                           <a href="settings/{{$setting->id}}/edit" class="text-gray-600 text-hover-primary mb-1">{{ $setting->value }}</a>
                        </td>
                        <!--end::Email=-->
                        <!--begin::Action=-->
                        <td class="text-end">
                           <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                              Actions
                           </a>
                           <!--begin::Menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <a href="settings/{{$setting->id}}/edit" class="menu-link px-3">View</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 {{-- <a href="institution_admins/{{$item->id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a> --}}
                                 <form action="{{route('settings.destroy',$setting->id)}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="menu-link px-3" style="background: transparent;border: 0;" data-kt-customer-table-filter="delete_row">Delete</button>
                                 </form>
                              </div>
                              <!--end::Menu item-->
                           </div>
                           <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                     </tr>
                     @endforeach
                  </tbody>
                  <!--end::Table body-->
               </table>
              
                  {{ $settings->links() }}
             
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