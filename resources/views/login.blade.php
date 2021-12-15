@extends('layout.form')

@section('title','Login Form')

@section('heading')
<h3>Instagram Clone</h3>
@endsection

@section('content')
        <div class="mt-1" >
            <p class="text-muted">Log In to see photos and videos of your friends</p>
        </div>
        <div class="mt-2">
            <form class="form-group ms-5" method="POST" action="{{ route('login')}}">
             @csrf

             @if(session('failed'))
            <div class="bg-danger text-white w-75 ms-5 rounded-2 p-2 mb-1">
                {{session('failed')}}
            </div>
            @endif

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

            <div class="mb-2 w-75 ms-5 pb-3">
                <input type="submit" class="form-control btn-primary" placeholder="Submit">
            </div>

            </form>

        </div>
@endsection
@section('last')
<span class="pt-2 pb-2">Don't have an Account?<a class="text-primary text-decoration-none" href="{{route('register')}}"> Sign Up</a></span>
@endsection