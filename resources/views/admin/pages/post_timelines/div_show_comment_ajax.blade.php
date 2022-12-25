@if(!empty($post_comments->User->photo))
<a href="timeline_posts/{{$post_comments->id}}/edit"><img src="{{url('/data/admins')}}/{{$post_comments->User->photo }}"
        class="mr-3" alt=""></a>
@else
<a href="timeline_posts/{{$post_comments->id}}/edit"><img src="{{url('/data/user_error.png')}}" class="mr-3"
        style="width: 36px; " alt=""></a>
@endif
{{-- div for show comments --}}
<div class="reviews-members-header" style="width:84%;margin-left: 9%;margin-top: -8%;">
    <h6 class="mb-1"><a class="text-black" href="#">{{ $post_comments->User->name }}
        </a>
        @if(!empty($post_comments->User->Organization->name))
        <small class="text-gray">{{ $post_comments->User->Organization->name }}</small>
        @else
        <small class="text-gray">Mosa3eed</small>
        @endif
        {{-- toggel button --}}
        <div class="dropdown" style="margin-left: 92%; margin-top: -3%;">
            <label class="switch">
                @if ($post_comments->status == "Active")
                <input type="checkbox" class="actives" checked value="0" name="active"
                    data-id="{{ $post_comments->id }}">
                @else
                <input type="checkbox" class="actives" value="1" name="active" data-id="{{ $post_comments->id }}">
                @endif

                <span class="slider round"></span>
            </label>
        </div>
        {{-- toggel button --}}
    </h6>

    <div class="reviews-members-body" style="width: 95%;">
        <p> {{ $post_comments->comment }}</p>
    </div>

</div>