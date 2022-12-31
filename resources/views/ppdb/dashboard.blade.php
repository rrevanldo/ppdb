@extends('main')

@section('content')

{{-- user pembuka --}}
@if (Auth::user()->role == 'user')
        <div class="container">
            <div class=" text-center mt-5 ">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="card mt-2 mx-auto bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <div class="controls">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="kiri">
                                                    <h4>Student</h4>
                                                </div>
                                
                                                <div class="kanan" style="margin-left: 875px;">
                                                    <p>Dashboard</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row" style="margin-top: 20px; margin-right: 20px;">
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-bodyx">
                                                        <i class="fa-solid fa-minus"  style="font-size: 60px; margin-right: 875px;"></i>
                                                        <h5 style="margin-right: 875px; margin-bottom: 20px;">Hi,</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>

        <div class="justify">
            <i style="font-size: 35px;"  class="fa-solid fa-minus"></i>
        </div>

        <div class="dustify">
        <h5>Hi, {{ Auth::user()->nama }}!</h5>
            <p class="text-secondary">Selamat Datang</p>
        </div>

        @if (Session::get('successUploadBayar'))
        <div class="alert alert-success">
            {{ Session::get('successUploadBayar') }}
        </div>
        @endif
@endif

{{-- user penutup --}}


{{-- admin pembuka --}}

@if (Auth::user()->role == 'admin')
    <div class="container">
        <div class=" text-center mt-5 ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card mt-2 mx-auto bg-light">
                        <div class="card-body bg-light">
                            <div class="container">
                                <div class="controls">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="kiri">
                                                <h4>Admin</h4>
                                            </div>
                            
                                            <div class="kanan" style="margin-left: 875px;">
                                                <p>Dashboard</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row" style="margin-top: 20px; margin-right: 20px;">
                                        <div class="col-lg-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-bodyx">
                                                    <i class="fa-solid fa-minus"  style="font-size: 60px; margin-right: 875px;"></i>
                                                    <h5 style="margin-right: 875px; margin-bottom: 20px;">Hi,</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

    <div class="justify">
        <i style="font-size: 35px;"  class="fa-solid fa-minus"></i>
    </div>

    <div class="dustify">
    <h5>Hi, {{ Auth::user()->nama }}!</h5>
        <p class="text-secondary">Selamat Datang</p>
    </div>

    {{-- @elseif($item->status == 1)
            <div class="alert alert-primary">Pembayaran sudah verifikasi, silahkan untuk melanjutkan proses selanjutnya</div>
    @elseif($item->status == 0)
            <div class="alert alert-warning">Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya</div>
    @endif --}}

@endif

{{-- admin penutup --}}

@endsection
