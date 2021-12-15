@extends('layout.app')

@section('title', 'Instagram Clone')

@section('content')

<div class="row justify-content-md-center mt-5">
    <div class="col-5 me-4"  width="200px">
        <div class="row">
            

              @foreach($posts as $post)
              @foreach($profiles as $profile)
              @if($profile->user_id === $post->profile_id)
            <div class="col-xxl-3 bg-white border-outline-light rounded-2 mt-2">
                <div class="bg-light mt-2">
                    <h5 class="mb-0 pt-1 pb-1 ps-1">
                        <img src="{{ asset('storage/pics/'.$profile->profile_pic) }}" width="50px" class="img-thumbnail me-3"><a class="text-decoration-none text-dark" href="{{ route('show',['id' => $profile->id , 'username' => $profile->username ]) }}"> {{$profile->username }} </a>
                    </h5>
                </div> 
                <img class="img-fluid w-100" src="{{ asset('storage/pics/'.$post->image) }}">
                <div class="bg-light pt-2 pb-2 mb-2">
                  <span class="h6 ps-2">{{$post->caption}}</span>
                </div>
                <span class="d-flex">
                
                    <form action="{{ route('like',$post->id) }}" method="post">
                        @csrf
                                           
                        <button class="btn-primary btn-sm" type="submit" name="like" value="like"><span>{{ $post->likes }}</span> Like</button>
                        
                    </form>

                    <form action="{{ route('unlike',$post->id) }}" method="post">
                        @csrf
                        
                        <button class="btn-primary btn-sm ms-2 me-2" type="submit" name="unlike" value="unlike"><span>{{ $post->unlikes }}</span> Unlike</button>
                                                
                        
                    </form>
                    <button class="btn-primary btn-sm"><span> {{ $post->comments }}<a class="text-white text-decoration-none" href="{{ route('add',$post->id) }}"> comment</a></span></button>
                    
                
                </span> 
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
        

    </div>

    <div class="col-3">
        <div class="row">
            <div class="col-xxl-3">
                <h4 class="text-muted">Suggestions For You</h4>
            </div>

            <div class="col-xxl-3">

              
              @foreach($profiles as $profile)
             
                <div class="row row-cols-3 mt-2 bg-white pt-1 pb-1">
                    <div class="col-3">
                        <img src="{{ asset('storage/pics/'.$profile->profile_pic)}}" alt="user" class="img-fluid">
                    </div>
                    <div class="col-3">
                        <p class="mt-3 ms-1"><a class="text-decoration-none text-dark" href="{{ route('show',['id' => $profile->id , 'username' => $profile->username ]) }}">{{ $profile->username }}</a></p>
                    </div>
                    <div class="col-3 d-flex">
                   
                    
                  
                     
                    @foreach($followers as $follow)             
                    @if($profile->id === $follow->profile_id and $follow->followed_by === auth()->user()->id)
                   
                    <form action="{{ route('unfollow',$profile->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" name="unfollow" class="btn-primary mt-3 ms-3 rounded-2" value="unfollow">UnFollow</button>
                        
                    </form>
                    @endif
                    @endforeach

                    @foreach($followings as $following)
                    @if($profile->id != $following->following and $following->profile_id != auth()->user()->id)
                     <form action="{{ route('follow',$profile->id) }}" method="post">
                        @csrf
                        <button type="submit" name="follow" class="btn-primary mt-3 ms-3 rounded-2" value="follow">F</button>
                        
                    </form> 
                    @endif
                    @endforeach
                    
                    </div>
                </div>
                
                @endforeach              
            </div>


        </div>
        
    </div>




</div>
@endsection 