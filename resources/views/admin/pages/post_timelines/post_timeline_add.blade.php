@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Post</h1>
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
               <h5 class="card-title">Form Post</h5>
            </div>
            <form action="{{route('timeline_posts.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">User</label>
                     <select id="country-dd" class="form-control" name="user_id">
                        <option value="">Select Users</option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}" {{(old('user_id')==$user->id)? 'selected':''}}>{{$user->name}}
                        </option>
                        @endforeach
                     </select>
                     @error('user_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6" style="margin-top:24px;">
                     <input type="file" class="custom-file-input" id="validatedCustomFile" value="{{old('photo')}}"
                        name="photo">
                     <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                     <div class="invalid-feedback">Example invalid custom file feedback</div>
                  </div>
               </div>
               <br>
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Post</label>
                     <textarea class="form-control" aria-label="With textarea" value="{{old('post')}}"
                        name="post"></textarea>
                     @error('post')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
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
@endsection