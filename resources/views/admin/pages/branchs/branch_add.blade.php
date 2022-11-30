@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Branch</h1>
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
					<h5 class="card-title">Form Branch</h5>
				</div>
				<form action="{{route('branchs.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="col">
							<label for="inputName">Name En</label>
							<input type="text" class="form-control" placeholder="Name En" value="{{old('name_en')}}"
								name="name_en" required />
							@error('name_en')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Name Ar</label>
							<input type="text" class="form-control" placeholder="Name Ar" value="{{old('name_ar')}}"
								name="name_ar" required />
							@error('name_ar')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Phone 1</label>
							<input type="text" class="form-control" placeholder="Phone 1" value="{{old('phone_1')}}"
								name="phone_1" />
							@error('phone_1')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Phone 2</label>
							<input type="text" class="form-control" placeholder="Phone 2" value="{{old('phone_2')}}"
								name="phone_2" required />
							@error('phone_2')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Email</label>
							<input type="email" class="form-control" placeholder="Email" value="{{old('email')}}"
								name="email" />
							@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Organization</label>
							<select id="country-dd" class="form-control" name="organization_id">
								<option value="">Select Organization</option>
								@foreach ($organizations as $org)
								<option value="{{$org->id}}" {{(old('organization_id')==$org->id)?
									'selected':''}}>{{$org->name}}</option>
								@endforeach
							</select>
							@error('organization_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Country</label>
							<select id="country-dd" class="form-control" name="country_id">
								<option value="">Select Country</option>
								@foreach ($countries as $data)
								<option value="{{$data->id}}" {{(old('country_id')==$data->id)?
									'selected':''}}>{{$data->name_en}}</option>
								@endforeach
							</select>
							@error('country_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Cities</label>
							<select id="city-dd" class="form-control" name="city_id">
								<option value="">Select City</option>
								@foreach ($cities as $city)
								<option value="{{$city->id}}" {{(old('city_id')==$city->id)? 'selected':''}}>{{
									$city->name }}</option>
								@endforeach
							</select>
							@error('city_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Districts</label>
							<select id="state-dd" class="form-control" name="district_id">
								<option value="">Select District</option>
								@foreach ($districts as $district)
								<option value="{{$district->id}}" {{(old('city_id')==$district->id)? 'selected':''}}>{{
									$district->name }}</option>
								@endforeach
							</select>
							@error('district_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Address</label>
							<input type="text" class="form-control form-control-solid" placeholder="Address"
								value="{{old('address')}}" name="address">
							@error('address')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="form-group col-md-6" style="margin-top:24px;">
							<input type="file" class="custom-file-input" id="validatedCustomFile"
								value="{{old('photo')}}" name="photo">
							<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
							<div class="invalid-feedback">Example invalid custom file feedback</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<hr>

@endsection
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