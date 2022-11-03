@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container" id="kt_content_container">
   <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
      <!--begin::Heading-->
      <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Orders List</h1>
      <!--end::Heading-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
         <li class="breadcrumb-item text-muted">
            <a href="../../demo3/dist/index.html" class="text-muted">Home</a>
         </li>
         <li class="breadcrumb-item text-muted">Applications</li>
         <li class="breadcrumb-item text-muted">Order</li>
         <li class="breadcrumb-item text-dark">Orders List</li>
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
               <form method="get" class="form-inline" action="{{url('admin/sale_page')}}">
                  <input class="form-control form-control-solid w-250px ps-15" name="search" type="text" placeholder="Search Orers" required>
            </div>
            <!--end::Search-->
         </div>
         <!--begin::Card title-->
         <!--begin::Card toolbar-->
         <div class="card-toolbar">
         <!--begin::Toolbar-->
         <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
         <button type="submit" class="btn btn-light-primary me-3"><i class="fa fa-search"></i></button>
         <a href="{{url('admin/sale_page')}}" class="btn btn-light-primary me-3" style="margin-top:0px;"><i class="fa fa-times"></i></a>
         </form>
         {{-- paginate --}}
         <a href="{{route('sale_page.create')}}" class="btn btn-primary">Add</a>
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
                  <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Bill Number: activate to sort column ascending" style="width: 165.203px;">Bill Number</th>
						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 165.203px;">User</th>
                        <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Items: activate to sort column ascending" style="width: 165.203px;">Items</th>
						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Total Price: activate to sort column ascending" style="width: 165.203px;">Total Price</th>
						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 165.203px;">Status</th>
                  						<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table" rowspan="1" colspan="1" aria-label="Date - Time: activate to sort column ascending" style="width: 165.203px;">Date - Time</th>
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
                       <td>
							<a href="{{route('sale_page.show',$sale_bill->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$sale_bill->bill_number}}</a>
						</td>

                         <td>
							<a href="{{route('sale_page.show',$sale_bill->id)}}" class="text-gray-600 text-hover-primary mb-1">{{$sale_bill->User->name}}</a>
						</td>
                        <td>
                            <a href="{{route('sale_page.show',$sale_bill->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$sale_bill->sale_bill_product_count}}</a>
                        </td>
                        <td>
                            <?php
                                $total = 0;
                                foreach ($sale_bill->SaleBillProduct as $key => $val) {
                                        $total += $val->qty * $val->price;
                                    }
                                //  echo $total;
                            ?>
                            {{$total}}
                        </td> 
                        
                        <td>
                           <a href="{{route('sale_page.show',$sale_bill->id)}}" class="text-gray-600 text-hover-primary mb-1">{{$sale_bill->status}}</a>
                        </td>
                         <td>
                           <a href="{{route('sale_page.show',$sale_bill->id)}}" class="text-gray-600 text-hover-primary mb-1">{{$sale_bill->created_at}}</a>
                        </td>
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
								<a href="{{route('sale_page.show',$sale_bill->id)}}" class="menu-link px-3">View</a>
                              </div>
                              <!--end::Menu item-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <form action="{{route('sale_page.destroy',$sale_bill->id)}} " method="POST">
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