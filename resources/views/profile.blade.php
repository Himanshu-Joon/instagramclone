@extends('layout.app')

@section('title','User profile')

@section('content')

<div class="row justify-content-md-center gx-2">
<div class="col-md-3 mt-5 me-4 w-25">
@foreach($profiles as $profile)
<img class="rounded-circle img-fluid" width="250px" src="{{ asset('storage/pics/'.$profile->profile_pic) }}">

</div>

<div class="col-3 mt-5 ms-3">
<div class="row ms-2">


 <div class="col-xxl-3 mt-1 pt-2 pb-2"><span class="lead">{{$profile->username}}</span>
    @can('update',$profile) 
       <button class="ps-2 pe-2 pt-1 ms-4 border-outline-black bg-transparent rounded-2">
       <a href=" {{route('editprofile',$profile->username)}}" class="text-dark text-decoration-none ps-1 pe-1">
           Edit Profile
       </a></button>
    @endcan
 </div>   
 <div class="col-xxl-3 mt-1 pt-2 pb-2"><span class="h5">{{$profile->posts}} </span><small>Posts</small><span class="ms-4 h5">{{$profile->followers}} </span><small><a class="text-decoration-none text-dark" href="{{route('followers',$profile->id)}}"> Followers</a></small><span class="ms-4 h5">{{$profile->following}} </span><small><a class="text-decoration-none text-dark" href="{{route('following',$profile->id)}}"> Following</a></small></div>   
 <div class="col-xxl-3 mt-1 pt-2 pb-2"><span class="h5">{{$profile->name}}</span></div> 
 <div class="col-xxl-3 mt-1 pt-2 pb-2"><span class="h5">{{$profile->bio}}</span></div> 
 @endforeach

</div>

</div>


</div>

<hr class="text-muted mt-5 ms-5 me-5">

<div class="row row-cols-3 justify-content-center">
@foreach($posts as $post)
<div class="col-3 rounded-1 pt-2 ms-1" width=""><img src="{{ asset('storage/pics/'.$post->image)}}" class="img-fluid h-100 w-100"></div>

@endforeach
</div>
@endsection