@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container" id="kt_content_container">
   <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
      <!--begin::Heading-->
      <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Order : #{{$sale_number->bill_number}}</h1>
      <!--end::Heading-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
         <li class="breadcrumb-item text-muted">
            <a href="../../demo3/dist/index.html" class="text-muted">Home</a>
         </li>
         <li class="breadcrumb-item text-muted">Applications</li>
         <li class="breadcrumb-item text-muted">Order</li>
         <li class="breadcrumb-item text-dark">Order Items List</li>
      </ul>
      <!--end::Breadcrumb-->
   </div>
   <!--begin::Card-->
   <div class="card">
      <!--begin::Card header-->


   <br>
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
                  <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Medicin Name: activate to sort column ascending" style="width: 165.203px;">Medicin Name</th>
						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 165.203px;">Price</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 165.203px;">Qty</th>
						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 165.203px;">Total Price</th>
						<th class="text-end min-w-70px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 79.625px;">Actions</th></tr>
					<!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="fw-bold text-gray-600">
                       @foreach($sale_bills as $index=>$sale_bill)		
                     <tr class="odd">
                        <!--begin::Checkbox-->
                        <td>
                           <div class="form-check form-check-sm form-check-custom form-check-solid">
                              <input class="form-check-input" type="checkbox" value="1">
                           </div>
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::Name=-->
                       <td>{{$sale_bill->Medicin->name}}</td>

                         <td>{{$sale_bill->price}}</td>
                        <td>{{$sale_bill->qty}}</td>
                         <td>{{$sale_bill->total_cost}}</td>
                        
 
                        <!--end::Name=-->
                        <!--begin::Action=-->
                        <td class="text-end">
                           <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                              Actions
                              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                              <span class="svg-icon svg-icon-5 m-0">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </a>
                           <!--begin::Menu-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
								{{-- <a href="{{route('sale_page.show',$sale_bill->id)}}" class="menu-link px-3">View</a> --}}
                                <a href="{{route('item_edite', ['order'	=> $id, 'id' => $sale_bill->id] )}}" class="menu-link px-3">View</a>

                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <form action="{{route('order_item_delete',['order'	=> $id, 'id' => $sale_bill->id])}} " method="POST">
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
               <h1>Order Total : {{$sale_bills->sum('total_cost')}}</h1>
               {{ $sale_bills->links() }}
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