<div>
                  @foreach($likes as $like)
                  @foreach($unlikes as $unlike)
                  @if($profile->id === $like->liked_by)
                  <form action="{{ route('unlike',$post->id) }}" method="post">
                        @csrf
                        
                        <button class="btn-primary btn-sm " type="submit" name="unlike" value="unlike"><span>{{ $post->unlikes }}</span> Unlike</button>
                                                
                        
                    </form> 
                    @elseif($profile->id === $unlike->unliked_by)
                    <form action="{{ route('like',$post->id) }}" method="post">
                        @csrf
                                           
                        <button class="btn-primary btn-sm" type="submit" name="like" value="like"><span>{{ $post->likes }}</span> Like</button>
                        
                    </form>
                    @else
                    <form action="{{ route('like',$post->id) }}" method="post">
                        @csrf
                                           
                        <button class="btn-primary btn-sm" type="submit" name="like" value="like"><span>{{ $post->likes }}</span> Like</button>
                        
                    </form>

                    <form action="{{ route('unlike',$post->id) }}" method="post">
                        @csrf
                        
                        <button class="btn-primary btn-sm " type="submit" name="unlike" value="unlike"><span>{{ $post->unlikes }}</span> Unlike</button>
                                                
                        
                    </form>
                    @endif
                    @endforeach
                    @endforeach
                </div>