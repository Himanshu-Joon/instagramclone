@extends('layout.form')

@section('title','Comment Form')



@section('content')
  
        <div class="w-75 mx-auto">
            <ul class="list-group text-left">
                @foreach($comments as $comment)
                @foreach($profiles as $profile)
                @if($profile->id === $comment->profile_id)
                <li class="list-group-item">
                  <div class="bg-light text-left p-1">

                   <img src="{{ asset('storage/pics/'.$profile->profile_pic) }}" class="img-fluid rounded-circle me-3 float-start" width="30px">
                   <span class="h5">{{ $profile->username }}</span>
                   @endif
                   @endforeach
                   <small class="float-end">{{ $comment->created_at }}</small>
                   </div>
                   {{ $comment->comment }}
                </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-2">
            <form class="form-group ms-5" method="POST" action="{{route('newcomment')}}">
             @csrf

            <div class="mb-2 w-75 ms-5">
             <textarea name="comment" placeholder="write your comment here" class="form-control" ></textarea>
            </div>

            @error('comment')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror

            <input type="hidden" name="post_id" value="{{$id}}">

            <div class="mb-2 w-75 ms-5 pb-3">
                <input type="submit" class="form-control btn-primary" placeholder="Submit">
            </div>

            </form>

        </div>
@endsection
