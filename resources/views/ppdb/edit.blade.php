@extends('layout')
 
@section('content')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <h4 class="mb-3">Edit Formulir Pendaftaran</h4>
    <div class="p-4 border m-auto bg-light">
    <form method="post" action="{{ route('update',$data->NoDaftar) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nama" class="mb-2">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="NamaLengkap" value="{{$data->NamaLengkap}}">
        </div>
        <div class="form-group mt-3">
            <label class="mb-2">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JK" id="male" value="Laki-Laki" {{ $data->JK == 'Laki-Laki' ? 'checked' : ''}}>
                <label class="form-check-label" for="male">
                    Laki-Laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JK" id="female" value="Perempuan" {{ $data->JK == 'Perempuan' ? 'checked' : ''}}>
                <label class="form-check-label" for="female">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="alamat" class="mb-2">Alamat</label>
            <textarea class="form-control" id="alamat" name="AlamatLengkap" rows="3">{{$data->AlamatLengkap}}</textarea>
        </div>
        <div class="form-group mt-3">
            <label for="agama" class="mb-2">Agama</label>
            <select class="form-control" id="agama" name="Agama">
                <option value="Islam" {{ $data->Agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                <option value="Kristen Protestan" {{ $data->Agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
                <option value="Katolik" {{ $data->Agama == 'Katolik' ? 'selected' : ''}}>Katolik</option>
                <option value="Hindu" {{ $data->Agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                <option value="Budha" {{ $data->Agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                <option value="Khonghuchu" {{ $data->Agama == 'Khonghuchu' ? 'selected' : ''}}>Khonghuchu</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="asalSMP" class="mb-2">Asal SMP</label>
            <input type="text" class="form-control" id="asalSMP" name="AsalSMP" value="{{$data->AsalSMP}}">
        </div>
        <div class="form-group mt-3">
            <label for="jurusan" class="mb-2">Jurusan</label>
            <select class="form-control" id="jurusan" name="Jurusan">
                <option value="Rekayasa Perangkat Lunak" {{ $data->Jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : ''}}>Rekayasa Perangkat Lunak</option>
                <option value="Tata Boga" {{ $data->Jurusan == 'Tata Boga' ? 'selected' : ''}}>Tata Boga</option>
                <option value="Tata Busana" {{ $data->Jurusan == 'Tata Busana' ? 'selected' : ''}}>Tata Busana</option>
                <option value="Multimedia" {{ $data->Jurusan == 'Multimedia' ? 'selected' : ''}}>Multimedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
    </form>
    </div>
@endsection