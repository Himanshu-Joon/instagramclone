@extends('layout.form')        
@section('title','Registration Form')

@section('heading')
<h3>Instagram Clone</h3>
@endsection

@section('content')

        <div class="mt-1" >
            <p class="text-muted">Sign Up to see photos and videos of your friends</p>
        </div>
        <div class="mt-2">
            <form class="form-group ms-5" method="POST" action="{{ route('register') }}">
                @csrf
            <div class="mb-2 w-75 ms-5">
                <input type="text" class="form-control @error('name') border-danger @enderror" placeholder="Full Name" name="name">
            </div>
            @error('name')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror
            
            <div class="mb-2 w-75 ms-5">
                <input type="username" class="form-control @error('username') border-danger @enderror" placeholder="Username" name="username">
            </div>
            @error('username')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-2 w-75 ms-5">
                <input type="email" class="form-control @error('email') border-danger @enderror" placeholder="Email Address" name="email">
            </div>
            @error('email')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-2 w-75 ms-5">
                <input type="password" class="form-control @error('password') border-danger @enderror" placeholder="Password" name="password">
            </div>
            @error('password')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-2 w-75 ms-5">
                <input type="submit" class="form-control btn-primary" placeholder="Submit">
            </div>

            </form>
        </div>
            <div class="pb-2 text-center">
            <small class="text-muted text-center ms-1">By signing up, you agree to our Terms , Data Policy and Cookies Policy </small>
            </div>  
@endsection
 
@section('last')
<p class="pt-2 pb-2">Have an Account?<a class="text-primary text-decoration-none" href="{{ route('login')}}"> Log In</a></p>
@endsection
