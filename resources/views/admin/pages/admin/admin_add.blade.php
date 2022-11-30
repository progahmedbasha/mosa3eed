@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New User</h1>
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
               <h5 class="card-title">Form Admin</h5>
            </div>
            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Name</label>
                     <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}"
                        name="name" required />
                     @error('name')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputEmail4">Email</label>
                     <input type="email" class="form-control" id="inputEmail4" placeholder="Email"
                        value="{{old('email')}}" name="email">
                     @error('email')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">Password</label>
                     <input type="password" class="form-control" id="inputPassword4" placeholder="Password"
                        value="{{old('password')}}" name="password">
                     @error('password')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputCity">Phone</label>
                     <input type="text" class="form-control" id="inputCity" value="{{old('phone')}}"
                        name="phone">
                     @error('phone')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputState">Organization</label>
                     <select id="inputState" class="form-control" name="user_type_id">
                        <option value="">Select Organization</option>
                        @foreach($organizations as $org)
                        <option value="{{$org->id}}" {{(old('organization_id')==$org->id)?
                        'selected':''}}>{{$org->name}}</option>
                        @endforeach
                     </select>
                     @error('organization_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputState">User Type</label>
                     <select id="inputState" class="form-control" name="user_type_id">
                        <option value="">Select User Type</option>
                        @foreach($user_types as $item)
                        <option value="{{$item->id}}" {{(old('institution_id')==$item->id)? 'selected':''}}
                        >{{$item->type}}</option>
                        @endforeach
                     </select>
                     @error('user_type_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputState">Country</label>
                     <select id="country-dd" class="form-control" name="user_type_id">
                        <option value="">Select Country</option>
                        @foreach ($countries as $data)
                        <option value="{{$data->id}}">
                           {{$data->name}}
                        </option>
                        @endforeach
                     </select>
                     @error('country_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputState">City</label>
                     <select id="city-dd" class="form-control" name="city_id">
                     </select>
                     @error('city_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputState">District</label>
                     <select id="state-dd" class="form-control" name="district_id">
                     </select>
                     @error('district_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6" style="margin-top:24px;">
                     <input type="file" class="custom-file-input" id="validatedCustomFile"
                        value="{{old('photo')}}" name="photo">
                     <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                     <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
               </div>
               <br>
               <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
</div>
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