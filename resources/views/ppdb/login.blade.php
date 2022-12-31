@extends('main')

@section('content')

<style>
  body {
      background-color: #00aced;
      }
</style>

@if (Session::get('fail'))
<div class="alert alert-danger">
    {{ Session::get('fail') }}
</div>
@endif
@if (Session::get('notAllowed'))
<div class="alert alert-danger">
    {{ Session::get('notAllowed') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
   <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
   </ul>
</div>
@endif
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::get('notAllowed'))
        <div class="alert alert-danger">
            {{ Session::get('notAllowed') }}
        </div>
    @endif
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <div class="container-fluid ps-md-0">
      <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
          <div class="login d-flex align-items-center py-5">
            <div class="container">
              <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto bg-white">
                  <h3 class="login-heading mb-4"><b>Login</b></h3>
                  <p>Masuk ke Akun PPDB-mu</p>
    
                  <!-- Sign In Form -->
                  <form method="POST" action="{{route('login.auth')}}">
                    @csrf
                    <div class="form-floating mb-3">
                      <span class="fa fa-user p-2"></span>
                      <label for="floatingInput">Email</label>
                      <input class="form-control" type="email" name="email" placeholder="Masukkan email terdaftar"> 
                    </div>
                    <div class="form-floating mb-3">
                      <span class="fa fa-lock p-2"></span>
                      <label for="floatingPassword">Password</label>
                      <input class="form-control password-field" type="password" name="password" placeholder="Masukkan password anda" id="password">
                      {{-- <span onclick="toggle('password')"><i class="fa fa-eye toggle-hide" onclick="myFunction(this)"></i> </span> --}}
                    </div>
    
                    <div class="d-grid">
                      <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
                    </div>
    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <script type="text/javascript">
      function toggle(id) {
          var x = document.getElementById(id);
          if (x.type === "password") {
              x.type = "text";
          } else {
              x.type = "password";
          }
      }

      function myFunction(show) {
          show.classList.toggle("fa-eye-slash");
      }
  </script> --}}

@endsection
