 {{-- div for show comments --}}
                                          <div class="reviews-members-header" style="width:84%">
                                             <h6 class="mb-1"><a class="text-black"
                                                   href="#">{{ $post_timeline->User->name }}
                                                </a>
                                                @if(!empty($comments->User->Organization->name))
                                                <small
                                                   class="text-gray">{{ $comments->User->Organization->name }}</small>
                                                @else
                                                <small class="text-gray">Mosa3eed</small>
                                                @endif
                                                {{-- toggel button --}}
                                                <div class="dropdown" style="margin-left: 92%; margin-top: -3%;">
                                                   <label class="switch">
                                                      @if ($comments->status == "Active")
                                                      <input type="checkbox" class="actives" checked value="0"
                                                         name="active" data-id="{{ $comments->id }}">
                                                      @else
                                                      <input type="checkbox" class="actives" value="1" name="active"
                                                         data-id="{{ $comments->id }}">
                                                      @endif

                                                      <span class="slider round"></span>
                                                   </label>
                                                </div>
                                                {{-- toggel button --}}
                                             </h6>

                                             <div class="reviews-members-body" style="width: 95%;">
                                                <p> {{ $comments->comment }}</p>
                                             </div>

                                          </div>
                                          {{-- div for show comments --}}