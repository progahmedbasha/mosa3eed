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
            <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Key</label>
                     <input type="text" class="form-control" placeholder="Key" value="{{old('key')}}"
                        name="key" required />
                     @error('key')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputEmail4">Value</label>
                     <input type="text" class="form-control" id="inputEmail4" placeholder="Value"
                        value="{{old('value')}}" name="value">
                     @error('value')
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