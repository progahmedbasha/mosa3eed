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
        <h6 style="text-align: center;font-size:2rem;color:white;background: dimgrey;">Ads :</h6>
        <div style="text-align: center">
            <div class="row">
                <div class="col mb-3">
                    <a class="btn btn-warning" data-effect="effect-sign" data-toggle="modal" href="#modaldemo8">Create Ad
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
                                            <form method="POST" action="{{route('ads.store')}}"
                                                enctype="multipart/form-data" class="parsley-style-1" name="selectForm2"
                                                novalidate="">
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
                                                        <div class="col">
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
                                                    <button class="btn btn-info" type="submit">Save</button>
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
                @foreach ($ads as $ad)
                <table class="table">

                    <tbody>
                        <tr>
                            <td style="font-weight: bold;color:lavender;">{{ $ad->title }}</td>
                            <td>
                                <div class="dropdown" style="margin-left: 112px;">
                                    <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" style="color:aliceblue;"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" style="padding: 3px 14px!important"
                                                href="organizations/{{$ad->id}}/edit"><i class="fas fa-eye"></i> View &
                                                Edit
                                            </a></li>

                                        <li>
                                            <form action="{{route('organizations.destroy',$ad->id)}} " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="channels-card-image-btn">
                                                    <button class="dropdown-item"
                                                        style="background: transparent;border: 0;padding: 0px 14px!important"
                                                        data-kt-customer-table-filter="delete_row"><i
                                                            class="fas fa-trash"></i>
                                                        Delete</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- <p>{{ dsdsdasdasdsd }}</p> --}}
                <div class="card-body" style="padding-bottom: 0px;;padding-top: 0px;">
                    @if(!empty($ad->photo))
                    <a href="{{ $ad->link }}">
                    <img src="{{url('/data/org_ads')}}/{{$ad->photo }}" style="height:81px;width:151px;padding:inherit;padding-bottom: 9px;padding-top: 0px;margin-top: -23px;margin-right: 41px;"
                        alt="Norway">
                        </a>
                    @else
                    <a href="{{ $ad->link }}">
                    <img src="{{url('/data/error.png')}}"  alt="Norway" style="height:81px;width:151px;padding:inherit;padding-bottom: 9px;padding-top: 0px;margin-top: -23px;margin-right: 41px;">
                        </a>
                    @endif
                </div>

                @endforeach

            </div>
        </div>
    </ul>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script> --}}