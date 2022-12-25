<style>
    .image-area {
        position: relative;
        width: 28%;
        background: #333;
    }

    .reviews-members .media .img {
        border-radius: 0px;
        height: 85px;
        width: 128px;
    }

    .image-area .img {
        max-width: 100%;
        height: auto;
    }

    .remove-image {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        font: 700 21px/20px sans-serif;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
    }

    .remove-image:hover {
        background: #E54E4E;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
    }

    .remove-image:active {
        background: #E54E4E;
        top: -10px;
        right: -11px;
    }
</style>
<div class="modal" id="ModalEdit{{ $post_timeline->id }}">
    <div class="modal-dialog modal-dialog-centered" style="" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> Edit Post</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div id="alertpost{{ $post_timeline->id }}" class="alert alert-success" style="display:none;">
                <strong>Success: </strong>Image have been Deleted !
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body" style="text-align: left;">
                            <form method="POST" action="{{route('branch_admin_timeline_posts.update',$post_timeline->id)}}"
                                enctype="multipart/form-data" class="parsley-style-1" name="selectForm2" novalidate="">
                                @csrf
                                @method('patch')
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputName">Post</label>
                                        <textarea class="form-control" aria-label="With textarea"
                                            value="{{old('post')}}" name="post">{{ $post_timeline->post }}</textarea>
                                        @error('post')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputName">Photo</label>
                                        <div class="col">
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
                                @if(!empty($post_timeline->photo))
                                <div id="branch_block2">
                                    <div class="image-area" id="post{{$post_timeline->id}}">
                                        <img class="img" src="{{url('/data/timeline_posts')}}/{{$post_timeline->photo }}"
                                            alt="Preview">
                                        <a class="remove-image"
                                            onclick="mypostFunction(post{{$post_timeline->id}} , inputpost{{$post_timeline->id}} , alertpost{{$post_timeline->id}} )"
                                            style="display: inline;">&#215;</a>
                                    </div>
                                </div>
                                <input type="hidden" id="inputpost{{ $post_timeline->id }}" name="img_delete">
                                @endif
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
<script>
    function mypostFunction(id , inputpost,alertpost) {
        $(id).hide(500);
        $(alertpost).show(500);
        $(inputpost).val("1");
        }
</script>