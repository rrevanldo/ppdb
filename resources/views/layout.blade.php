<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPDB SMK Wikrama Bogor</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
    <link href="{{asset('assets/img/Logo.png')}}" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    {{-- @if (Auth::check()) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" id="demo1Navbar">
        <a class="navbar-brand" href=""><img src="{{asset('assets/img/Logo.png')}}" alt="" height="30px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#jurusan">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentangkami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimoni">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#hubungikami">Hubungi Kami</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">{{Auth::user()->nama}}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    {{-- @endif --}}

    <div class="container mt-5">
        @yield('content')
    </div>

    <hr>

    <!-- Site footer -->
    <footer class="site-footer" id="hubungikami">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
                <a href="#"><img src="{{asset('assets/img/wk.png')}}" alt="footer-logo" width="120" class="ml-2"></a>
            </div>
  
            <div class="col-xs-6 col-md-3">
              <h6>TAUTAN</h6>
              <ul class="footer-links" style="list-style-type:none;">
                <li style="list-style-type:none;"><a href="#beranda" class="active">Beranda</a></li>
                <li style="list-style-type:none;"><a href="#jurusan">Jurusan</a></li>
                <li style="list-style-type:none;"><a href="#tentangkami">Tentang Kami</a></li>
                <li style="list-style-type:none;"><a href="#testimoni">Testimoni</a></li>
                <li style="list-style-type:none;"><a href="#hubungikami">Hubungi Kami</a></li>
                <li style="list-style-type:none;"><a href="/login">Login</a></li>
              </ul>
            </div>
  
            <div class="col-xs-6 col-md-3">
              <h6>KONTAK SEKOLAH</h6>
              <ul class="footer-links" style="list-style-type:none;">
                    <li style="list-style-type:none;" class="font-weight-bold">0251-8242411</li>
                    <li style="list-style-type:none;">Alamat<br />
                        Jl. Raya Wangun<br />
                        Kelurahan Sindangsari <br />
                        Bogor Timur 16720</li>
              </ul>
            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              {{-- <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
           <a href="#">Scanfcode</a>.
              </p> --}}
              <small class="text-secondary">Copyright &copy; <script>
                    document.write(new Date().getFullYear())

                </script> BY Revan Rionaldo</small class="text-secondary">  
            </div>
  
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons" style="list-style-type:none;">
                <li style="list-style-type:none;"><a href="https://www.linkedin.com/school/smkwikramabogor/mycompany/" target="_blank" style="background-color: #fdd818; color: #333"><i class="fab fa-instagram"></i></a></li>
                <li style="list-style-type:none;"><a href="https://www.instagram.com/smkwikrama/" target="_blank" style="background-color: #fdd818; color: #333"><i class="fab fa-linkedin"></i></a></li>  
              </ul>
            </div>
          </div>
        </div>
  </footer>
  
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
