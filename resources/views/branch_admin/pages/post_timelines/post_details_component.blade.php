<div class="modal" id="modaldemo10">
    <div class="modal-dialog modal-dialog-centered" style="" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Edit Post</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: left;">
                            <form method="POST" action="{{route('timeline_posts.store')}}" enctype="multipart/form-data"
                                class="parsley-style-1" name="selectForm2" novalidate="">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputName">User</label>
                                        <select id="country-dd" class="form-control" name="user_id">
                                            <option value="">Select Users</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}" {{(old('user_id')==$user->id)?
                                                'selected':''}}>{{$user->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputName">Post</label>
                                        <textarea class="form-control" aria-label="With textarea"
                                            value="{{old('post')}}" name="post">{{$post_timeline->post}}</textarea>
                                        @error('post')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputName">Photo</label>
                                        <div class="form-group col-md-6">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                value="{{old('photo')}}" name="photo">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose
                                                file...</label>
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