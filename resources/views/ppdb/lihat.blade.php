@extends('main')

@section('content')

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

    <div class="row" style="margin-top: 20px; margin-right: 20px;">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-bodyx">
                    <div class="rounded shadow p-1 bg-dark"></div><br>
                    <p style="margin-left: 20px; font-weight:bold">Bukti Pembayaran {{$detailUser->nama}}</p>
                    <img src="{{asset('assets/img/' . $pem->foto_pembayaran)}}" width="500px" alt="">
                          {{-- @foreach($item as $it)
                          <img src="{{asset('img/'.$it->foto_pembayaran)}}" width="500px" alt="">
                            <p>Nama Bank : {{ $it->nama_bank }}</p>
                            <p>Nama Pemilik : {{ $it->nama_pemilik }}</p>
                            <p>Nominal : {{ $it->nominal }}</p>
                          @endforeach --}}
                          <div class="=ml-md-2">
                            <a href="{{'/dashboard/pembayaran'}}"><i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endif

{{-- admin penutup --}}

@endsection
