@extends('branch_admin.layouts.master')
@section('content')

<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="top-category section-padding mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Shift</h1>
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
                            <h5 class="card-title">Form Shift Add</h5>
                        </div>
                        <form action="{{route('shifts.update',$branch_shift->id)}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <input type="hidden" value="{{$branch_shift->branch_id}}" name="branch_id" />
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputName">Shift Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Shift Name"
                                        value="{{$branch_shift->name}}" name="shift_name" required />
                                    @error('shift_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputName">Days</label>
                                    <h4>Saturday :</h4>
                                    @if($shift_days[0]->day ="saturday")
                                    <input type="hidden" name="day[]" value="saturday">
                                    @else
                                    <input type="hidden" name="day[]" value="saturday">
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="inputName">Time From</label>
                                    @if($shift_days[0]->from !=null)
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[0]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="inputName">Time To</label>
                                    @if($shift_days[0]->to !=null)
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[0]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Sunday :</h4>
                                    @if(isset($shift_days[1]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[1]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="sunday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[1]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[1]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[1]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[1]->to}}" name="to[]">
                                    @else<input type="time" class="form-control form-control-solid"
                                        placeholder="Time To" value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Monday :</h4>
                                    @if(isset($shift_days[2]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[2]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="Monday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[2]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[2]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[2]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[2]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Tuesday :</h4>
                                    @if(isset($shift_days[3]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[3]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="Tuesday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[3]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[3]->from }}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[3]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[3]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Wednesday :</h4>
                                    @if(isset($shift_days[4]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[4]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="Wednesday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[4]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[4]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[4]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[4]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Thursday :</h4>
                                    @if(isset($shift_days[5]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[5]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="Thursday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[5]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[5]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[5]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[5]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <h4>Friday :</h4>
                                    @if(isset($shift_days[6]->day ))
                                    <input type="hidden" name="day[]" value="{{$shift_days[6]->day}}">
                                    @else
                                    <input type="hidden" name="day[]" value="Friday">
                                    @endif
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[6]->from ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{$shift_days[6]->from}}" name="from[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time From"
                                        value="{{old('from')}}" name="from[]">
                                    @endif
                                    @error('from')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    @if(isset($shift_days[6]->to ))
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{$shift_days[6]->to}}" name="to[]">
                                    @else
                                    <input type="time" class="form-control form-control-solid" placeholder="Time To"
                                        value="{{old('to')}}" name="to[]">
                                    @endif
                                    @error('to')
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