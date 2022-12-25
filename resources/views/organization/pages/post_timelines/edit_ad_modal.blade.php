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
<div class="modal" id="ModalAddEdit{{ $ad->id }}">
    <div class=" modal-dialog modal-dialog-centered" style="" role="document">
    <div class="modal-content modal-content-demo">
        <div class="modal-header">
            <h6 class="modal-title"> Edit Add</h6><button aria-label="Close" class="close" data-dismiss="modal"
                type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div id="alertad{{$ad->id}}" class="alert alert-success" style="display:none;">
            <strong>Success: </strong>Image have been Deleted !
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: left;">
                        <form method="POST" action="{{route('org_ads.update',$ad->id)}}"
                            enctype="multipart/form-data" class="parsley-style-1" name="selectForm2" novalidate="">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputName">Title</label>
                                    <input class="form-control" value="{{$ad->title}}" name="title"
                                        placeholder="Title">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputName">Link</label>
                                    <input class="form-control" placeholder="Link" value="{{$ad->link}}" name="link">
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
                            {{-- <button id="test">dsa</button> --}}
                            @if(!empty($ad->photo))
                            <div id="branch_block2">
                                <div class="image-area" 
                                       id="ad{{$ad->id}}">
                                    <img class="img" src="{{url('/data/org_ads')}}/{{$ad->photo }}"
                                        alt="Preview">
                                    <a class="remove-image" onclick="mysFunction(ad{{$ad->id}} , inputad{{$ad->id}} , alertad{{$ad->id}} )" style="display: inline;">&#215;</a>
                                </div>
                            </div>
                            <input type="hidden" id="inputad{{ $ad->id }}" name="img_delete">
                            <br>
                            @endif
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

     function mysFunction(id , inputad,alertad) {
        console.log(id);

        $(id).hide(500);
         
        // var x = document.getElementById('imgad'+id);
        $(alertad).show(500);
       $(inputad).val("1");
        }
</script>