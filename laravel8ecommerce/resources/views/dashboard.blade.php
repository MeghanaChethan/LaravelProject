
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor Management System in Laravel</title>
       
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  

</head>
<body>
    {{-- @guest --}}
    @auth
    <h1 class="mt-4 mb-5 text-center">Visitor Management System</h1>
    @yield('content')
    @else
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    {{-- <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    

    <header class="navbar nabbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a href="#" class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Webslesson</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
        data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
        area-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-nav">
    <div class="nav-item text-nowrap">
        {{-- <a href="#" class="nav-link px-3">Welcome, {{Auth::user()->email}}</a> --}}
        <a href="#" class="nav-link px-3">Welcome </a>

    </div>
</div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link {{Request::segment(1) == 'dashboard' ? 'active' : ''}}"
                            aria-current="page">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    @endauth
    {{-- @endguest --}}
    {{-- <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> --}}
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor Management System in Laravel</title>
   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <h1 class="mt-4 mb-5 text-center">Visitor Management System</h1>

    @yield('content')
    
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

</body>
</html> --}}