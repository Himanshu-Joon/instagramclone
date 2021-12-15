@extends('layout.app')
@section('title','Followers Page')
@section('content')

<div class="mt-5 justify-content-center bg-white p-4 w-50 shadow-lg mx-auto rounded-2">
    <ul class="list-group pt-3">
      @foreach($profiles as $profile)
      @foreach($followers as $follower)
      @if($profile->id === $follower->profile_id)
        <li class="list-group-item"><img src="{{ asset('storage/pics/'.$profile->profile_pic) }}" class="img-fluid rounded-circle me-3" width="50px" >
          <span class="h5">{{ $profile->username }}</span>
          <form action="{{ route('follow',$profile->id) }}" method="post" class="float-end">
            @csrf
            <button type="submit" name="follow" class="btn-primary mt-3 ms-3 rounded-2" value="follow">Follow</button>
          </form>
      @endif
      @endforeach
      @endforeach  
    </ul>



</div>

@endsection