@extends('layout.app')

@section('title','Create Post')

@section('content')
    <div class="mt-5 bg-white shadow-lg rounded w-50 mx-auto">
        <div class="text-dark pt-5">
        
          <h3 class="text-center text-primary">Create Post</h3>
        
        </div>


        
        <form class="form-group ms-5" method="POST" action="{{ route('post')}}" enctype="multipart/form-data">
             @csrf

            <div class="mb-2 w-75 ms-5">
                <input type="file" class="form-control @error('image') border-danger @enderror" name="image">
            </div>
            @error('image')
            <div class="text-danger text-align-left mb-1 ms-1">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-2 w-75 ms-5">
                <input type="text" class="form-control @error('caption') border-danger @enderror" placeholder="Write Caption" name="caption">
            </div>
            @error('caption')
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





