@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">

			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Container-->
				<div class="container" id="kt_content_container">

					<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0"
						data-kt-swapper="true" data-kt-swapper-mode="prepend"
						data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
						<!--begin::Heading-->
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New City</h1>
						<!--end::Heading-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
							<li class="breadcrumb-item text-muted">
								<a href="../../demo3/dist/index.html" class="text-muted">Home</a>
							</li>
							<li class="breadcrumb-item text-muted">Applications</li>
							<li class="breadcrumb-item text-muted">Cities</li>
							<li class="breadcrumb-item text-dark">City Add</li>
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
									<div>
										<span class="fs-2x fw-bolder text-gray-800">Form City</span>
									</div>

									<form action="{{route('districts.store')}}" method="post"
										enctype="multipart/form-data">
										@csrf

										<div class="row gx-10 mb-5">
											<!--begin::Col-->
											<div class="col-lg-6">
												<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Name
													En</label>
												<!--begin::Input group-->
												<div class="mb-5">
													<input type="text" class="form-control form-control-solid"
														placeholder="Name En" value="{{old('name_en')}}" name="name_en">
													@error('name_en')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<label
													class="form-label fs-6 fw-bolder text-gray-700 mb-3">Country</label>
												<div class="mb-5">
													<select id="country-dd" class="form-control" name="country_id">
														<option value="">Select Country</option>
														@foreach ($countries as $data)
														<option value="{{$data->id}}">
															{{$data->name}}
														</option>
														@endforeach
													</select>
												</div>
												<!--end::Input group-->

											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6">
												<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Name
													Ar</label>
												<!--begin::Input group-->
												<div class="mb-5">
													<input type="text" class="form-control form-control-solid"
														placeholder="Name Ar" value="{{old('name_ar')}}" name="name_ar">
													@error('name_ar')
													<div class="alert alert-danger">{{ $message }}</div>
													@enderror
												</div>
												<!--begin::Input group-->
												<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">City</label>
												<div class="mb-5">
													<select id="city-dd" class="form-control" name="city_id">
													</select>
												</div>
												<!--end::Input group-->

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
											<div id="kt_customers_export_close"
												class="btn btn-icon btn-sm btn-active-icon-primary">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
												<span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
															rx="1" transform="rotate(-45 6 17.3137)" fill="black">
														</rect>
														<rect x="7.41422" y="6" width="16" height="2" rx="1"
															transform="rotate(45 7.41422 6)" fill="black"></rect>
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
											<form id="kt_customers_export_form"
												class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
												<!--begin::Input group-->
												<div class="fv-row mb-10 fv-plugins-icon-container">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Select Date
														Range:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input class="form-control form-control-solid flatpickr-input"
														placeholder="Pick a date" name="date" type="hidden"><input
														class="form-control form-control-solid form-control input"
														placeholder="Pick a date" tabindex="0" type="text"
														readonly="readonly">
													<!--end::Input-->
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="fv-row mb-10">
													<!--begin::Label-->
													<label class="fs-5 fw-bold form-label mb-5">Select Export
														Format:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select data-control="select2" data-placeholder="Select a format"
														data-hide-search="true" name="format"
														class="form-select form-select-solid select2-hidden-accessible"
														data-select2-id="select2-data-13-xm76" tabindex="-1"
														aria-hidden="true">
														<option value="excell" data-select2-id="select2-data-15-u3st">
															Excel</option>
														<option value="pdf">PDF</option>
														<option value="cvs">CVS</option>
														<option value="zip">ZIP</option>
													</select><span
														class="select2 select2-container select2-container--bootstrap5"
														dir="ltr" data-select2-id="select2-data-14-ayn2"
														style="width: 100%;"><span class="selection"><span
																class="select2-selection select2-selection--single form-select form-select-solid"
																role="combobox" aria-haspopup="true"
																aria-expanded="false" tabindex="0" aria-disabled="false"
																aria-labelledby="select2-format-0f-container"
																aria-controls="select2-format-0f-container"><span
																	class="select2-selection__rendered"
																	id="select2-format-0f-container" role="textbox"
																	aria-readonly="true" title="Excel">Excel</span><span
																	class="select2-selection__arrow"
																	role="presentation"><b
																		role="presentation"></b></span></span></span><span
															class="dropdown-wrapper" aria-hidden="true"></span></span>
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
														<label
															class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="1"
																checked="checked" name="payment_type">
															<span
																class="form-check-label text-gray-600 fw-bold">All</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label
															class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="2"
																checked="checked" name="payment_type">
															<span
																class="form-check-label text-gray-600 fw-bold">Visa</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label
															class="form-check form-check-custom form-check-sm form-check-solid mb-3">
															<input class="form-check-input" type="checkbox" value="3"
																name="payment_type">
															<span
																class="form-check-label text-gray-600 fw-bold">Mastercard</span>
														</label>
														<!--end::Radio button-->
														<!--begin::Radio button-->
														<label
															class="form-check form-check-custom form-check-sm form-check-solid">
															<input class="form-check-input" type="checkbox" value="4"
																name="payment_type">
															<span
																class="form-check-label text-gray-600 fw-bold">American
																Express</span>
														</label>
														<!--end::Radio button-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Row-->
												<!--begin::Actions-->
												<div class="text-center">
													<button type="reset" id="kt_customers_export_cancel"
														class="btn btn-light me-3">Discard</button>
													<button type="submit" id="kt_customers_export_submit"
														class="btn btn-primary">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
															<span
																class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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

				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function () {
          $('#country-dd').on('change', function () {
              var idCountry = this.value;
              $("#city-dd").html('');
              $.ajax({
                  url: "{{route('fetch_city')}}",
                  type: "POST",
                  data: {
                      city_id: idCountry,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                console.log(result.cities);

                      $('#city-dd').html('<option value="">Select City</option>');
                      $.each(result.cities, function (key, value) {
                          $("#city-dd").append('<option value="' + value
                              .id + '">' + value.name_en + '</option>');
                      });
                      // $('#city-dd').html('<option value="">Select City</option>');
                  },
                  
              });
          });
                  $('#city-dd').on('change', function () {
                      var idcity = this.value;
                      $("#state-dd").html('');
                      
                      $.ajax({
                          url: "{{route('fetchdistrict')}}",
                          type: "POST",
                          
                          data: {
                              city_id: idcity,
                              _token: '{{csrf_token()}}'
                          },
                          dataType: 'json',
                          success: function (result) {
                           var locate = {!! json_encode(app()->getLocale()) !!};
                        console.log(result.districts);

                              $('#state-dd').html('<option value="">Select City</option>');
                              $.each(result.districts, function (key, value) {
                                  $("#state-dd").append('<option value="' + value
                                      .id + '">' + value.name[locate]+ '</option>');
                              });
                              // $('#city-dd').html('<option value="">Select City</option>');
                          },
                          
                      });
                  });
      });
		</script>
		@endsection