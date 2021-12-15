<!DOCTYPE html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light">
        
          <div class="row justify-content-md-center bg-white mt-0 pt-1 pb-1">
            <div class="col-3">
                <h3 class="text-dark pt-3"><a href="{{route('home')}}" class="text-decoration-none text-dark">Instagram Clone</a> </h3>
            </div>

            <div class="col-3 pt-2">
              <form action="{{ route('results') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control bg-light" name="query" placeholder="search name, username">
                     <button type="submit"><i class="far fa-search fa-lg ps-1 pe-1 pt-2"></i></button>
                  </div>
              </form>
            </div>

            
            <div class="col-2 d-flex ms-3">
              <div class=" mt-2 me-2">
                <span class="h5 pe-4"><a href="{{route('home')}}" class="text-dark"> <i class="fa fa-home fa-lg" aria-hidden="true"></i></a></span>
                <span class="h5 pe-3"><a href="{{route('post')}}" class="text-dark"> <i class="fa fa-plus-square-o fa-lg"></i></a></span>                  


                <div class="btn-group">
                    
                    <button class="btn btn-transparent dropdown-toggle rounded-circle" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <img src="{{ asset('storage/pics/images.png') }}" class="img-fluid rounded-circle" width="30px">

                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                      
                      <li><a class="dropdown-item text-decoration-none" href="{{ route('profile') }}">profile</a></li>
                      <li><a class="dropdown-item text-decoration-none" href="{{ route('post') }}">Post</a></li>
                      <li class="dropdown-item">
                          <form action="{{ route('logout') }}" method='POST'>
                             @csrf
                             <input type="submit" value="logout" class="w-100">
                          </form>
                      </li>
                    </ul>
                </div>
              </div>
                  
                   
            </div>

          </div>

@yield('content')
    </body>
</html>