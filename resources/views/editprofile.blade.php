@extends('layout.form')        
@section('title','Edit Profile')

@section('heading')

        <span class="float-end h3">
            <a href="{{route('profile')}}" class="text-decoration-none bg-info rounded-3 text-white mb-5">skip</a>
        </span>

<h3>Complete Your Profile</h3>


@endsection

@section('content')
      
        <div class="mt-1">
            <p class="text-muted">Fill In the details to make your profile complete</p>
        </div>
 
        

        <div class="mt-2">
        @foreach($profiles as $profile)
            <form class="ms-5" method="POST" action="{{ route('update',$profile->username) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')    
            
                
            <div class="mb-2 w-75 ms-5">
                <input type="text" class="form-control @error('name') border-danger @enderror" value="{{ $profile->name }}" name="name">
            </div>
            
            <div class="mb-2 w-75 ms-5">
                <input type="username" class="form-control @error('username') border-danger @enderror" value="{{ $profile->username }}" name="username">
            </div>

            <div class="mb-2 w-75 ms-5">
                <input type="email" class="form-control @error('email') border-danger @enderror" value="{{ $profile->email }}" name="email">
            </div> 

            
            <div class="mb-2 w-75 ms-5">
                <textarea class="form-control textarea @error('bio') border-danger @enderror" placeholder="Write Bio" name="bio">{{ $profile->bio }}</textarea>
            </div>

            <div class="mb-2 w-75 ms-5">
                <input type="text" class="form-control @error('gender') border-danger @enderror" placeholder="Male Female Other" value="{{ $profile->gender }}" name="gender">
            </div>
            @endforeach
            
            <div class="mb-2 d-flex justify-content-center">
                <label for="profile" class="form-control border-light text-primary">Profile Pic</label>
                <input type="file" class="form-control me-5" name="profile_pic">
            </div>

            <div class="mb-2 w-75 ms-5">
                <input type="submit" class="form-control btn-primary" placeholder="Submit">
            </div>

            </form>
        </div>
            <div class="pb-2 text-center">
            <small class="text-muted text-center">By signing up, you agree to our Terms , Data Policy and Cookies Policy </small>
            </div>  
@endsection

