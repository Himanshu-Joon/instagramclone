@extends('layout.app')

@section('title','Search Results')

@section('content')

<div class="mt-5 justify-content-center bg-white p-4 w-50 shadow-lg mx-auto rounded-2">
    <ul class="list-group pt-3">
      @foreach($profiles as $profile)
        <li class="list-group-item"><img src="{{ asset('storage/pics/'.$profile->profile_pic) }}" class="img-fluid rounded-circle me-3" width="50px" >
            
            <span class="h5 pe-2">{{ $profile->name }}</span> |   
            <span class="h5 ps-2">{{ $profile->username }}</span>
                
        </li>
      @endforeach
    </ul>



</div>



@endsection