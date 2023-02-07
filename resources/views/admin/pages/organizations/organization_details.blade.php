@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Organization</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>


		<form action="{{route('organizations.update',$organization->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Name :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Name En</label>
								<input type="text" class="form-control" placeholder="Name En"
									value="{{$organization->getTranslation('name', 'en')}}" name="name_en" required />
								@error('name_en')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Name Ar</label>
								<input type="text" class="form-control form-control-solid" placeholder="Name Ar"
									value="{{$organization->getTranslation('name', 'en')}}" name="name_ar">
								@error('name_ar')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputEmail4">Contact Email</label>
								<input type="email" class="form-control" id="inputEmail4" placeholder="Email"
									value="{{ $organization->email }}" name="email">
								@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Phone</label>
								<input type="text" class="form-control form-control-solid" placeholder="Phone"
									value="{{$organization->phone}}" name="phone">
								@error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>
			</div>
			<br>
			{{-- end of row --}}
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact Details :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Contact</label>
								<input type="text" class="form-control form-control-solid" placeholder="Contact"
									value="{{$organization->contact_name}}" name="contact_name">
								@error('contact_name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Bio</label>
								<input type="text" class="form-control form-control-solid" placeholder="Bio"
									value="{{$organization->bio}}" name="bio">
								@error('bio')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Type</label>
								<select class="form-control" name="type">
									<option value="{{ $organization->type }}">{{ $organization->type }}</option>
									<option value="Pharmacy">Pharmacy</option>
									<option value="Store">Store</option>
								</select>
								@error('type')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Verified Status</label>
								<select class="form-control" name="status">
									<option value="{{ $organization->status }}">{{ $organization->status }}</option>
									<option value="Verified">Verified</option>
									<option value="Not Verified">Not Verified</option>
								</select>
								@error('status')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-globe"></i> Address :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Country</label>
								<select id="country-dd" class="form-control" name="country_id">
									<option {{($country_id=$country_id)? 'selected' : '' }}> {{$country_id->name}}
									</option>
									@foreach ($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>
								@error('country_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">City</label>
								<select id="city-dd" class="form-control" name="city_id">
									<option {{($city_id=$city_id)? 'selected' : '' }}> {{$city_id->name}}</option>
									@foreach ($cities as $city)
									<option value="{{$city->id}}" {{(old('city_id')==$city->id)? 'selected':''}}>{{
										$city->name }}</option>
									@endforeach
								</select>
								@error('city_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">District</label>
								<select id="state-dd" class="form-control" name="district_id">
									<option value="{{ $organization->district_id }}">
										{{ $organization->District->name }}
									</option>
									@foreach ($districts as $district)
									<option value="{{$district->id}}">{{ $district->name }}</option>
									@endforeach
								</select>
								@error('district_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Address</label>
								<input type="text" class="form-control form-control-solid" placeholder="Address"
									value="{{$organization->address}}" name="address">
								@error('address')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>

			</div>
			<br>
			{{-- photo row --}}
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-image"></i> Photo :</h6>
								<hr>
							</div>
							<div class="col">
								<label class="form-label" for="customFile">Photo</label>
								<input type="file" class="form-control" id="customFile"  name="photo"/>
							</div>
						</div>
					</div>
				</div>

			</div>
			<br>
			<button type="submit" class="btn btn-primary">Save</button>
		</form>

		{{--div for show photo --}}
		<br>
		<div class="row">
			<div class="col-xl-12 mb-30">
				<div class="card card-statistics h-100">
					<div class="card-body">
						@if(!empty($organization->photo))
						<img src="{{url('/data/organizations')}}/{{$organization->photo }}" class="w3-round"
							width="200px" alt="Norway">
						@else
						<img src="{{url('/data/error.png')}}" class="w3-round" width="200px" alt="Norway">
						@endif
					</div>
				</div>
			</div>
		</div>
		{{--div for show photo --}}
		<hr>

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