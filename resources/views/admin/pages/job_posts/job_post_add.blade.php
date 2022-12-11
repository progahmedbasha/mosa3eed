@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Job Post</h1>
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
               <h5 class="card-title">Form Job Post</h5>
            </div>
            <form action="{{route('job_posts.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="row gx-10 mb-5">
                  <!--begin::Col-->
                  <div class="col-lg-6">
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Subject</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Subject"
                           value="{{old('subject')}}" name="subject">
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <div id="block" style="display: none" ;>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Title Name En</label>
                        <div class="mb-5">
                           <input type="text" class="form-control form-control-solid" placeholder="Title Name En"
                              value="{{old('title_name_en')}}" name="title_name_en">
                           @error('title_name_en')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <div id="block3" style="display: none" ;>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Related To</label>
                        <div class="mb-5">
                           <select class="form-control"  name="related_to">
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
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Organization</label>
                     <!--begin::Input group-->
                     <div class="mb-5">
                        <select id="organization" class="form-control organization_id" 
                           name="organization_id">
                           <option value="">Select Organization</option>
                           @foreach ($organizations as $organization)
                           <option value="{{$organization->id}}" {{(old('organization_id')==$organization->id)?
                              'selected':''}}>{{$organization->name}}</option>
                           @endforeach
                        </select>
                        @error('organization_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <div id="branch_block">
                        <!--begin::Input group-->
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label>
                        <div class="mb-5">
                           <select id="country-dd" class="form-control"  name="country_id">
                              <option value="">Select Country</option>
                              @foreach ($countries as $country)
                              <option value="{{$country->id}}" {{(old('country_id')==$country->id)?
                                 'selected':''}}>{{$country->name}}</option>
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
                           <select id="state-dd" class="form-control"  name="district_id">
                              <option value="">Select District</option>
                              @foreach ($districts as $district)
                              <option value="{{$district->id}}" {{(old('district_id')==$district->id)?
                                 'selected':''}}>{{$district->name}}</option>
                              @endforeach
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
                        <textarea class="form-control" aria-label="With textarea" value="{{old('breif')}}"
                           name="breif"></textarea>
                        @error('breif')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                     <div class="mb-5">
                        <select class="form-control"  name="status">
                           <option value="">Select Status</option>
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
                        <input type="text" class="form-control form-control-solid" placeholder="Email Contract"
                           value="{{old('email_contract')}}" name="email_contract">
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
                        <select id="title-dd" class="form-control"  name="job_title_id">
                           <option value="">Select Job Title</option>
                           @foreach ($job_titles as $job_title)
                           <option value="{{$job_title->id}}" {{(old('job_title_id')==$job_title->id)?
                              'selected':''}}>{{$job_title->name}}</option>
                           @endforeach
                           <option value="others" id="show">Others</option>
                        </select>
                        @error('job_title_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <div id="block2" style="display: none" ;>
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Title Name Ar</label>
                        <div class="mb-5">
                           <input type="text" class="form-control form-control-solid" placeholder="Title Name Ar"
                              value="{{old('title_name_ar')}}" name="title_name_ar">
                           @error('title_name_ar')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <div id="block4" style="display: none" ;>
                        <br><br><br><br>
                     </div>
                     <hr>
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Branches</label>
                     <!--begin::Input group-->
                     <div class="mb-5">
                        <select id="branch-dd" class="form-control"  name="branch_id">
                           <option value="">Select Branches</option>
                           @foreach ($branches as $branch)
                           <option value="{{$branch->id}}" {{(old('branch_id')==$branch->id)?
                              'selected':''}}>{{$branch->name}}</option>
                           @endforeach
                        </select>
                        @error('branch_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     <div id="branch_block2">
                        <!--begin::Input group-->
                        <!--begin::Input group-->
                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
                        <div class="mb-5">
                           <select id="city-dd" class="form-control"  name="city_id">
                              <option value="">Select City</option>
                              @foreach ($cities as $city)
                              <option value="{{$city->id}}" {{(old('city_id')==$city->id)?
                                 'selected':''}}>{{$city->name}}</option>
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
                           <input type="text" class="form-control form-control-solid" placeholder="Address"
                              value="{{old('address')}}" name="address">
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
                        <textarea class="form-control" aria-label="With textarea" value="{{old('experince')}}"
                           name="experince"></textarea>
                        @error('experince')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Expected Salary</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Expected Salary"
                           value="{{old('expected_salary')}}" name="expected_salary">
                        @error('expected_salary')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <!--begin::Input group-->
                     <!--begin::Input group-->
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Phone Contract</label>
                     <div class="mb-5">
                        <input type="text" class="form-control form-control-solid" placeholder="Phone Contract"
                           value="{{old('phone_contract')}}" name="phone_contract">
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
         </div>
      </div>
   </div>
</div>
<hr>
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