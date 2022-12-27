<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPDB SMK Wikrama Bogor</title>
    <link href="{{asset('assets/img/Logo.png')}}" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @if (Auth::check())
    <nav class="navbar navbar-expand-lg" style="background: #02225B">
        <a class="navbar-brand text-white" >PPDB 2023 - 2024</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">    
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><p class="mb-0 nav-user-name text-white">Hi, {{ Auth::user()->nama }} <i class="fa-solid fa-angle-down"></i></p></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                        @if (Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="{{route('dashboard.users')}}">
                            <i class="fas fa-server mr-2"></i>Data User
                        </a>
                        @endif
                        <a class="dropdown-item" href="{{route('index')}}">
                            <i class="fa fa-home mr-2"></i>Home
                        </a>
                        <a class="dropdown-item" href="{{route('dashboard.profile')}}">
                            <i class="fas fa-regular fa-user mr-2"></i>Profile
                        </a>
                        <a class="dropdown-item" href="{{route('dashboard')}}">
                            <i class="fa-solid fa-house-user mr-2"></i>Dashboard
                        </a>
                        <a class="dropdown-item" href="/dashboard/pembayaran">
                            <i class="fa-solid fa-money-bill mr-2"></i>Pembayaran
                        </a>
                        <a class="dropdown-item" href="/logout">
                            <i class="fas fa-power-off mr-2"></i>Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @endif

    {{-- konten tambahan di berbagai halaman --}}
    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://kmanadkat.github.io/navonscroll/navonscroll.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    {{-- <script src="{{asset('assets/js/navonscroll.js')}}"></script> --}}
</body>

</html>
