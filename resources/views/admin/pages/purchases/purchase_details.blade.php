@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Purchase</h1>
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
                     <h5 class="card-title">Form Purchase</h5>
                  </div>
                  <form action="{{route('purchases.update',$purchase->id)}}" method="post"
                     enctype="multipart/form-data">
                     @csrf
                     @method('patch')
                     <div class="form-row">
                        <div class="col">
                           <label for="inputName">Organization</label>
                           <select id="country-dd" class="form-control" name="organization_id">
                              @foreach ($organizations as $org)
                              <option value="">Select Organization</option>
                              <option value="{{$purchase->organization_id}}" {{($purchase->organization_id ==
                                 $org->id)? 'selected' : '' }}>{{$purchase->Organization->name}}
                              </option>
                              @endforeach
                           </select>
                           @error('organization_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputName">Branch</label>
                           <select id="country-dd" class="form-control" name="branch_id">
                              <option value="">Select Branch</option>
                              @foreach ($branches as $branch)
                              <option value="{{$purchase->branch_id}}" {{($purchase->branch_id == $branch->id)?
                                 'selected' : '' }}>{{$purchase->Branch->name}}</option>
                              @endforeach
                           </select>
                           @error('branch_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputName">Medicins</label>
                           <select id="country-dd" class="form-control" name="medicin_id">
                              <option value="">Select Medicins</option>
                              @foreach ($medicins as $medicin)
                              <option value="{{$medicin->id}}" {{($purchase->medicin_id==$medicin->id)?
                                 'selected':''}}>{{$medicin->name}}</option>
                              @endforeach
                           </select>
                           @error('medicin_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputName">Acd Custom Item</label>
                           <input type="text" class="form-control form-control-solid" placeholder="Acd Custom Item"
                              value="{{$purchase->acd}}" name="acd">
                           @error('acd')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputState">Type Of Measurement</label>
                           <input type="text" class="form-control form-control-solid" placeholder="Type Of Measurement"
                              value="{{$purchase->type_measurement}}" name="type_measurement">
                           @error('type_measurement')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputState">Due Date</label>
                           <input type="date" class="form-control form-control-solid" placeholder="Due Date"
                              value="{{$purchase->due_date}}" name="due_date">
                           @error('to')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputState">Qty</label>
                           <input type="text" class="form-control form-control-solid" placeholder="qty"
                              value="{{$purchase->qty}}" name="qty">
                           @error('qty')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputState">Price</label>
                           <input type="text" class="form-control form-control-solid" placeholder="Price"
                              value="{{$price->price}}" name="price">
                           @error('price')
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
   </div>
</div>
</div>
@endsection