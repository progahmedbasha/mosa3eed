<style>
    .modal-backdrop {
        z-index: 5 !important;
    }
</style>
<div style="text-align: center">
    <ul class="sidebar navbar-nav" style="margin-left: 84%">

        {{-- <h1>TimeLine : </h1> --}}
        <br>
        <hr>
        <h6 style="text-align: center;font-size:2rem;color:white;">Ads :</h6>
        <div style="text-align: center">
            <div class="row">
                <div class="col mb-3">
                    <a class="btn btn-warning" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">Add
                    </a>
                </div>
                {{-- modal --}}
                <!-- add modal -->
                <!-- Modal effects -->
                <div class="modal" id="modaldemo8">
                    <div class="modal-dialog modal-dialog-centered" style="" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Create New Add</h6><button aria-label="Close" class="close"
                                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body" style="text-align: left;">
                                            <form method="POST" action="" enctype="multipart/form-data"
                                                class="parsley-style-1" name="selectForm2" novalidate="">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="inputName">Title</label>
                                                        <input class="form-control" value="{{old('title')}}"
                                                            name="title" placeholder="Title">
                                                        @error('title')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="inputName">Link</label>
                                                        <input class="form-control" placeholder="Link"
                                                            value="{{old('link')}}" name="link">
                                                        @error('link')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                    <label for="inputName">Photo</label>
                                                    <div class="form-group col-md-6">
                                                        <input type="file" class="custom-file-input"
                                                            id="validatedCustomFile" value="{{old('photo')}}"
                                                            name="photo">
                                                        <label class="custom-file-label"
                                                            for="validatedCustomFile">Choose file...</label>
                                                        <div class="invalid-feedback">Example invalid custom file
                                                            feedback</div>
                                                    </div>
                                                </div>
                                                </div>
                                                <br>
                                                <div class="mg-t-30">
                                                    <button class="btn btn-info" type="submit">اضافة </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal effects-->
                {{-- modal --}}
            </div>

            <div class="clo mb-3">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>