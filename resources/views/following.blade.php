@extends('layout.app')
@section('title','Following Page')
@section('content')

<div class="mt-5 justify-content-center bg-white p-4 w-50 shadow-lg mx-auto rounded-2">
    <ul class="list-group pt-3">
      @foreach($followings as $following)
      @foreach($profiles as $profile)
      @if($profile->id === $following->following)
        <li class="list-group-item"><img src="{{ asset('storage/pics/'.$profile->profile_pic) }}" class="img-fluid rounded-circle me-3" width="50px" >
          <span class="h5">{{ $profile->username }}</span>
          <form action="{{ route('unfollow',$following->following) }}" method="post" class="float-end">
              @csrf
              @method('DELETE')
              <button type="submit" name="unfollow" class="btn-primary mt-3 ms-3 rounded-2" value="unfollow">Unfollow</button>
          </form>
        </li>
      @endif
      @endforeach
      @endforeach
    </ul>



</div>

@endsection