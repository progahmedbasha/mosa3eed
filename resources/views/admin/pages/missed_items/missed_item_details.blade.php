@extends('admin.layouts.master')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container" id="kt_content_container">

						<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Missed Item</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-dot fw-bold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="#" class="text-muted">Home</a>
									</li>
									<li class="breadcrumb-item text-muted">Applications</li>
									<li class="breadcrumb-item text-muted">Missed Items</li>
									<li class="breadcrumb-item text-dark">Missed Item Add</li>
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
									<div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive">
                                    

<br>
							<div >
								<span class="fs-2x fw-bolder text-gray-800">Form Missed Item</span>
							</div>

                  <form action="{{route('missed_items.update',$missed_item->id)}}" method="post" enctype="multipart/form-data">
                     @csrf
                    @method('patch')
								 <div class="row gx-10 mb-5">
														<!--begin::Col-->
														<div class="col-lg-6">
														<!--begin::Input group-->
															<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">User</label>
															<div class="mb-5">
																<select  id="country-dd" class="form-control"style="padding: 10px;" name="user_id">
                                                                    <option value="{{$missed_item->user_id}}" {{($missed_item->user_id == $missed_item->user_id)? 'selected' : '' }}>{{$missed_item->User->name}}</option>
																	@foreach ($users as $user)
																	<option value="{{$user->id}}" {{(old('organization_id')==$user->id)? 'selected':''}}>{{$user->name}}</option>
																	@endforeach
																</select>
																@error('user_id')
																<div class="alert alert-danger">{{ $message }}</div>
																@enderror   														
															</div>
													<!--begin::Input group-->
													<!--begin::Input group-->
															<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Medicins</label>
															<div class="mb-5">
																<select  id="country-dd" class="form-control"style="padding: 10px;" name="medicin_id">
                                                                    <option value="{{$missed_item->medicin_id}}" {{($missed_item->medicin_id == $missed_item->medicin_id)? 'selected' : '' }}>{{$missed_item->Medicin->name}}</option>
																	@foreach ($medicins as $medicin)
																	<option value="{{$medicin->id}}" {{(old('medicin_id')==$medicin->id)? 'selected':''}}>{{$medicin->name}}</option>
																	@endforeach
																</select>
																@error('medicin_id')
																<div class="alert alert-danger">{{ $message }}</div>
																@enderror   														
															</div>
													<!--begin::Input group-->
													<!--begin::Input group-->
															<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Notes</label>
															<div class="mb-5">
                                                                 <textarea class="form-control" aria-label="With textarea" value="{{$missed_item->notes}}" name="notes">{{$missed_item->notes}}</textarea> 
                                                                @error('notes')
																<div class="alert alert-danger">{{ $message }}</div>
																@enderror   														
															</div>
													<!--begin::Input group-->

                                                    </div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-lg-6">
                                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Branches</label>															<!--begin::Input group-->
															<div class="mb-5">
																<select  id="country-dd" class="form-control"style="padding: 10px;" name="branch_id">
                                                                    <option value="{{$missed_item->branch_id}}" {{($missed_item->branch_id == $missed_item->branch_id)? 'selected' : '' }}>{{$missed_item->Branch->name}}</option>
																	@foreach ($branches as $branch)
																	<option value="{{$branch->id}}" {{(old('branch_id')==$branch->id)? 'selected':''}}>{{$branch->name}}</option>
																	@endforeach
																</select>
																@error('branch_id')
																<div class="alert alert-danger">{{ $message }}</div>
																@enderror   		
                                                            </div>
															<!--begin::Input group-->
															<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
															<div class="mb-5">
                                                                    <select class="form-control"style="padding: 10px;" name="status">
                                                                        <option value="{{$missed_item->status}}" {{($missed_item->status == $missed_item->status)? 'selected' : '' }}>{{$missed_item->status}}</option>
                                                                        <option value="Active">Active</option>
                                                                        <option value="Not Active">Not Active</option>
																	</select>																
                                                                @error('status')
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
							
						<!--end::Container-->
					</div>


@endsection