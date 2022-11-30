@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-title">
            <h6>Admins List :</h6>
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
                    <div class="col mb-3">
                        <a href="" class="btn  btn-outline-primary">Add</a>
                    </div>

                </div>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <strong>Success: </strong>{{ Session::get('success') }}
                </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>photo</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>


                            <tr>
                                <td>2/td>
                                <td>wwww</td>
                                <td>ww</td>
                                <td>ww</td>
                                <td>
                                    <img src="" class="rounded-circle" width="40px" alt="">

                                    <img src="{{url('/images/error.png')}}" class="rounded-circle" width="40px">
                                </td>
                                <td>
                                    <div class="btn-icon-list">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>

                        </tbody>


                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
<hr>

@endsection