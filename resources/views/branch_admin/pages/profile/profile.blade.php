@extends('branch_admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Organization Profile</h1>
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
					<h5 class="card-title">Form Profile</h5>
				</div>
				<form action="{{route('branch_admin_profile.update',$user->id)}}" method="post"
					enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="form-row">
						<div class="col">
							<label for="inputName">Name</label>
							<input type="text" class="form-control form-control-solid" placeholder="Name"
								value="{{$user->name}}" name="name">
							@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputName">Email</label>
							<input type="text" class="form-control form-control-solid" placeholder="Phone"
								value="{{$user->phone}}" name="phone">
							@error('phone')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Email</label>
							<input type="text" class="form-control form-control-solid" placeholder="Email"
								value="{{$user->email}}" name="email">
							@error('email')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputName">Password</label>
							<input type="text" class="form-control form-control-solid" placeholder="Password"
								value="{{old('password')}}" name="password">
							@error('password')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">User Type</label>
							<select id="inputState" class="form-control" name="user_type_id">
								<option value="">Select Type</option>
								@foreach($user_types as $item)
								<option value="{{$item->id}}" {{($user->user_type_id==$item->id)? 'selected':''}}
									>{{$item->type}}</option>
								@endforeach
							</select>
							@error('user_type_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputName">Country</label>
							<select id="country-dd" class="form-control" name="country_id">
								<option {{($country_id=$country_id)? 'selected' : '' }}> {{$country_id->name}}</option>
								<option value="">Select Country</option>
								@foreach ($countries as $country)
								<option value="{{$country->id}}">
									{{$country->name}}
								</option>
								@endforeach
							</select>
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">City</label>
							<select id="city-dd" class="form-control"  name="city_id">
								<option {{($city_id=$city_id)? 'selected' : '' }}> {{$city_id->name}}</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="inputName">District</label>
							<select id="state-dd" class="form-control" name="district_id">
								<option value="{{$user->district_id}}" {{($user->district_id == $user->district_id)?
									'selected' : '' }}> {{$user->District->name}}</option>
							</select>
							@error('district_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Organization</label>
							<select id="inputState" class="form-control" name="organization_id">
								@foreach($organizations as $org)
								<option value="{{$org->id}}" {{(old('organization_id')==$org->id)? 'selected':''}}
									>{{$org->name}}</option>
								@endforeach
							</select>
							@error('organization_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<div class="form-group col-md-6" style="margin-top:24px;">
								<input type="file" class="custom-file-input" id="validatedCustomFile"
									value="{{old('photo')}}" name="photo">
								<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
								<div class="invalid-feedback">Example invalid custom file feedback</div>
							</div>
						</div>
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
{{--div for show photo --}}
<br>
<div class="row">
	<div class="col-xl-12 mb-30">
		<div class="card card-statistics h-100">
			<div class="card-body">
				@if(!empty($organization->photo))
				<img src="{{url('/data/organizations')}}/{{$organization->photo }}" class="w3-round" width="200px"
					alt="Norway">
				@else
				<img src="{{url('/data/error.png')}}" class="w3-round" width="200px" alt="Norway">
				@endif
			</div>
		</div>
	</div>
</div>
{{--div for show photo --}}
<hr>
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