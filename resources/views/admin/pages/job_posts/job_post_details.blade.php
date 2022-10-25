@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Container-->
<div class="container" id="kt_content_container">
<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
   <!--begin::Heading-->
   <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Job Post</h1>
   <!--end::Heading-->
   <!--begin::Breadcrumb-->
   <ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
      <li class="breadcrumb-item text-muted">
         <a href="#" class="text-muted">Home</a>
      </li>
      <li class="breadcrumb-item text-muted">Applications</li>
      <li class="breadcrumb-item text-muted">Job Posts</li>
      <li class="breadcrumb-item text-dark">Job Post Edit</li>
   </ul>
   <!--end::Breadcrumb-->
</div>
<!--begin::Card-->
<div class="card">
   <!--begin::Card header-->
   <!--end::Card header-->
   <!--begin::Card body-->
   <div class="card-body pt-0">
      <!--begin::Table-->
      <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
         <div class="table-responsive">
            <br>
            <div >
               <span class="fs-2x fw-bolder text-gray-800">Form Job Post</span>
            </div>
            <form action="{{route('job_posts.update',$job_post->id)}}" method="post" enctype="multipart/form-data">
              @method('patch')
               @csrf
               <div class="row gx-10 mb-5">
                  <!--begin::Col-->
                  <div class="col-lg-6">
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Subject</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Subject" value="{{$job_post->subject}}" name="subject">
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <div id="block" style="display: none";>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Title Name En</label>
                        <div class="mb-5">
                           <input type="text" class="form-control form-control-solid" placeholder="Title Name En" value="{{old('title_name_en')}}" name="title_name_en">
                           @error('title_name_en')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror   														
                        </div>
                     </div>   
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <div id="block3" style="display: none";>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Related To</label>
                     	<div class="mb-5">
                           <select class="form-control"style="padding: 10px;" name="related_to">
                                 <option value="">Select</option>
                                 <option value="Pharmacy">Pharmacy</option>
                                 <option value="Store">Store</option>
                              </select>
                              @error('related_to')
                                 <div class="alert alert-danger">{{ $message }}</div>
                              @enderror	
                        </div>
                     </div>   
                     <!--begin::Input group-->
                     <hr>
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Organization</label>															<!--begin::Input group-->
                     <div class="mb-5">
                        <select  id="organization" class="form-control organization_id"style="padding: 10px;" name="organization_id">
                           <option value="{{$job_post->organization_id}}"  {{($organization_id == $organization_id)? 'selected' : '' }}> {{$organization_id->name}}</option>
                           <option value="">----------------------------------------------------------</option>   
                           @foreach ($organizations as $organization)
                           <option value="{{$organization->id}}" {{(old('organization_id')==$organization->id)? 'selected':''}}>{{$organization->name}}</option>
                           @endforeach
                        </select>
                        @error('organization_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   		
                     </div>
                     <!--begin::Input group-->
                     
                        <div id="branch_block"  @if(!empty($job_post->branch_id)) style="display: none";  @endif >
                        <!--begin::Input group-->
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label>
                        <div class="mb-5">
                           <select  id="country-dd" class="form-control"style="padding: 10px;" name="country_id">
                              @if(!empty($country_id))
                                 <option  {{($country_id = $country_id)? 'selected' : '' }}> {{$country_id->name}}</option>
                              @endif
                              <option value="">----------------------------------------------------------</option>    
                                 @foreach ($countries as $item)
                                    <option value="{{$item->id}}" {{(old('country_id')==$country_id)? 'selected':''}}>{{$item->name}}</option>
                                 @endforeach
                           </select>
                           @error('country_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror   														
                        </div>
                        <!--begin::Input group-->
                        <!--begin::Input group-->
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">District</label>
                        <div class="mb-5">
                           <select  id="state-dd" class="form-control"style="padding: 10px;" name="district_id">
                           @if(!empty($job_post->district_id))
                              <option value="{{$job_post->district_id}}" {{($job_post->district_id == $job_post->district_id)? 'selected' : '' }}> {{$job_post->District->name}}</option>
                              <option value="">----------------------------------------------------------</option>
                                 @foreach ($districts as $district)
                                 <option value="{{$district->id}}" {{(old('distict_id')==$district->id)? 'selected':''}} > {{$district->name}} </option>
                                 @endforeach
                           @else
                           <option value="">Select District</option>
                                 @foreach ($districts as $district)
                                 <option value="{{$district->id}}" {{(old('distict_id')==$district->id)? 'selected':''}} > {{$district->name}} </option>
                                 @endforeach        
                           @endif

                           </select>
                           @error('qty')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror   														
                        </div>
                        <!--begin::Input group-->
                        </div>
                        
                     <hr>
					    <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Breif</label>
                     <div class="mb-5">
                        <textarea class="form-control" aria-label="With textarea" value="{{$job_post->breif}}" name="breif">{{$job_post->breif}}</textarea> 
                        @error('breif')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
					 		    <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                     <div class="mb-5">
						<select class="form-control"style="padding: 10px;" name="status">
                     <option value="{{ $job_post->status }}">{{ $job_post->status }}</option>
							<option value="">----------------------------------------------------------</option>
                     <option value="Active">Active</option>
							<option value="Not Active">Not Active</option>
						</select>
						@error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
					         <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Email Contract</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Email Contract" value="{{$job_post->email_contract}}" name="email_contract">
                        @error('email_contract')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                  </div>
                  <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-lg-6">
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Job Title</label>
                     <div class="mb-5">
                        <select  id="title-dd" class="form-control"style="padding: 10px;" name="job_title_id">
                           <option value="{{$job_post->job_title_id}}" {{($job_post->job_title_id == $job_post->job_title_id)? 'selected' : '' }}> {{$job_post->JobTitle->name}}</option>
                              @foreach ($job_titles as $job_title)
                              <option value="{{$job_title->id}}" {{(old('job_title_id')==$job_title->id)? 'selected':''}}>{{$job_title->name}}</option>
                              @endforeach
                           <option value="others" id="show">Others</option>
                        </select>
                        @error('job_title_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                     <div id="block2" style="display: none";>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Title Name Ar</label>
                        <div class="mb-5">
                           <input type="text" class="form-control form-control-solid" placeholder="Title Name Ar" value="{{old('title_name_ar')}}" name="title_name_ar">
                           @error('title_name_ar')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror   														
                        </div>
                     </div>   
                     <!--begin::Input group-->
                     <div id="block4" style="display: none";>
                        <br><br><br><br>
                     </div>
                     <hr>
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Branches</label>															<!--begin::Input group-->
                     <div class="mb-5">
                        <select  id="branch-dd" class="form-control"style="padding: 10px;" name="branch_id">
                        @if(!empty($job_post->branch_id))
                           <option value="{{$job_post->branch_id}}" {{($branch_id == $branch_id)? 'selected' : '' }}> {{$branch_id->name}}</option>
                        @endif   
                           <option value="">----------------------------------------------------------</option>   
                           @foreach ($branches as $branch)
                           <option value="{{$branch->id}}" {{(old('branch_id')==$branch->id)? 'selected':''}}>{{$branch->name}}</option>
                           @endforeach
                        </select>
                        @error('branch_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   		
                     </div>

                     <div id="branch_block2" @if(!empty($job_post->branch_id)) style="display: none"; @endif >
                     <!--begin::Input group-->
                     <!--begin::Input group-->												
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
                     <div class="mb-5">
                        <select  id="city-dd" class="form-control"style="padding: 10px;" name="city_id">
                           {{-- <option value="">Select City</option>
                           @foreach ($cities as $city)
                           <option value="{{$city->id}}" {{(old('city_id')==$city->id)? 'selected':''}}>{{$city->name}}</option>
                           @endforeach --}}
                           @if(!empty($city_id))
                                 <option  {{($city_id = $city_id)? 'selected' : '' }}> {{$city_id->name}}</option>
                              @endif
                              <option value="">----------------------------------------------------------</option>    
                                 @foreach ($cities as $city)
                                    <option value="{{$city->id}}" {{(old('country_id')==$city_id)? 'selected':''}}>{{$city->name}}</option>
                                 @endforeach
                        </select>
                        @error('due_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Address</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Address" value="{{$job_post->address}}" name="address">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                     </div>
                     <hr>
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Experience</label>
                     <div class="mb-5">
                        <textarea class="form-control" aria-label="With textarea" value="{{$job_post->experince}}" name="experince">{{$job_post->experince}}</textarea> 
                        @error('experince')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
					  	         <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Expected Salary</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Expected Salary" value="{{$job_post->expected_salary}}" name="expected_salary">
                        @error('expected_salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
					  	         <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Phone Contract</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Phone Contract" value="{{$job_post->phone_contract}}" name="phone_contract">
                        @error('phone_contract')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   														
                     </div>
                     <!--begin::Input group-->
                  </div>
                  <!--end::Col-->
               </div>

               <button type="submit" class="btn btn-primary">Save</button>
               <br><br>
            </form>
            <!--end::Table-->
         </div>
         <!--end::Card body-->
      </div>
      <!--end::Card-->
      <!--begin::Modals-->
      <!--begin::Modal - Customers - Add-->
      <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
         <!--begin::Modal dialog-->
      </div>
      <!--end::Modal - Customers - Add-->
      <!--begin::Modal - Adjust Balance-->
      <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
         <!--begin::Modal dialog-->
         <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
               <!--begin::Modal header-->
               <div class="modal-header">
                  <!--begin::Modal title-->
                  <h2 class="fw-bolder">Export Customers</h2>
                  <!--end::Modal title-->
                  <!--begin::Close-->
                  <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                     <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                     <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                           <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                           <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                     </span>
                     <!--end::Svg Icon-->
                  </div>
                  <!--end::Close-->
               </div>
               <!--end::Modal header-->
               <!--begin::Modal body-->
               <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                  <!--begin::Form-->
                  <form id="kt_customers_export_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                     <!--begin::Input group-->
                     <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold form-label mb-5">Select Date Range:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-solid flatpickr-input" placeholder="Pick a date" name="date" type="hidden"><input class="form-control form-control-solid form-control input" placeholder="Pick a date" tabindex="0" type="text" readonly="readonly">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold form-label mb-5">Select Export Format:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid select2-hidden-accessible" data-select2-id="select2-data-13-xm76" tabindex="-1" aria-hidden="true">
                           <option value="excell" data-select2-id="select2-data-15-u3st">Excel</option>
                           <option value="pdf">PDF</option>
                           <option value="cvs">CVS</option>
                           <option value="zip">ZIP</option>
                        </select>
                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-ayn2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-format-0f-container" aria-controls="select2-format-0f-container"><span class="select2-selection__rendered" id="select2-format-0f-container" role="textbox" aria-readonly="true" title="Excel">Excel</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Row-->
                     <div class="row fv-row mb-15">
                        <!--begin::Label-->
                        <label class="fs-5 fw-bold form-label mb-5">Payment Type:</label>
                        <!--end::Label-->
                        <!--begin::Radio group-->
                        <div class="d-flex flex-column">
                           <!--begin::Radio button-->
                           <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                           <input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type">
                           <span class="form-check-label text-gray-600 fw-bold">All</span>
                           </label>
                           <!--end::Radio button-->
                           <!--begin::Radio button-->
                           <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                           <input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type">
                           <span class="form-check-label text-gray-600 fw-bold">Visa</span>
                           </label>
                           <!--end::Radio button-->
                           <!--begin::Radio button-->
                           <label class="form-check form-check-custom form-check-sm form-check-solid mb-3">
                           <input class="form-check-input" type="checkbox" value="3" name="payment_type">
                           <span class="form-check-label text-gray-600 fw-bold">Mastercard</span>
                           </label>
                           <!--end::Radio button-->
                           <!--begin::Radio button-->
                           <label class="form-check form-check-custom form-check-sm form-check-solid">
                           <input class="form-check-input" type="checkbox" value="4" name="payment_type">
                           <span class="form-check-label text-gray-600 fw-bold">American Express</span>
                           </label>
                           <!--end::Radio button-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--end::Row-->
                     <!--begin::Actions-->
                     <div class="text-center">
                        <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                     </div>
                     <!--end::Actions-->
                     <div></div>
                  </form>
                  <!--end::Form-->
               </div>
               <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
         </div>
         <!--end::Modal dialog-->
      </div>
      <!--end::Modal - New Card-->
      <!--end::Modals-->
   </div>
   <!--end::Container-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
   // start show and hide input other title
   $("#title-dd").change(function(){
            if($("#title-dd").val() == "others")
               {
                  $("#block").show(500);
                  $("#block2").show(500);
                  $("#block3").show(500);
                  $("#block4").show(500);
               }
            else{
                  $("#block").hide(500);
                  $("#block2").hide(500);
                  $("#block3").hide(500);
                  $("#block4").hide(500);
               }   
      });
   // end show and hide input other title   
   // start show and hide branch block 
   $("#branch-dd").click(function(){
            if($("#branch-dd").val() == "")
               {
                  $("#branch_block").show(500);
                  $("#branch_block2").show(500);
               }
            else{
                  $("#branch_block").hide(500);
                  $("#branch_block2").hide(500);
               }   
      });
   // end show and hide branch block    
});

</script>
   {{-- component for fetch branch --}}
   @include('admin.pages.component.fetch_branch')

   {{-- component for fetch country+city+district --}}
   @include('admin.pages.component.country_city_district')
@endsection