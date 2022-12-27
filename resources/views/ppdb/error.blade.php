@extends('main')

@section('content')
<div class="container">
    <div class="wrapper mt-5">
        <div class="d-flex align-items-start justify-content-between">
            <img src="{{asset('assets/img/error.jpg')}}" alt="" srcset="" width="300">
            <center><br><br>
                <h3>Anda tidak diperbolehkan mengakses halaman ini.</h3>
                <div class="tombol">
                    <a href="{{route('dashboard')}}" class="btn btn-primary">Kembali</a>
                </div>
            </center>
        </div>
    </div>

    {{-- href="{{route('todo.index')}}" --}}

@endsection