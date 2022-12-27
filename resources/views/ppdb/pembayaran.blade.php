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
                                                <h4>Pembayaran</h4>
                                            </div>
                            
                                            <div class="kanan" style="margin-left: 825px;">
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
    <h5>Pembayaran</h5>
    <p class="text-secondary">Silahkan upload bukti bayar Anda di form berikut</p>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <div class="row" style="margin-top: 20px; margin-right: 20px;">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-bodyx">
                    <div class="rounded shadow p-1 bg-dark"></div><br>
                    <form action="{{route('dashboard.pembayaran.change')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h5 style="margin-left:15px; color:purple;">Form Pembayaran</h5><br><br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <select name="nama_bank" class="select2 form-control w-100 ml-0" onchange='checkvalue(this.value)' >
                                    <option name="nama_bank" hidden disabled selected>--Pilih Bank--</option>
                                    <option name="nama_bank" value="PT BANK RAKYAT INDONESIA">PT BANK RAKYAT INDONESIA</option>
                                    <option name="nama_bank" value="PT BANK MANDIRI">PT BANK MANDIRI</option>
                                    <option name="nama_bank" value="PT BANK NEGARA INDONESIA">PT BANK NEGARA INDONESIA</option>
                                    <option name="nama_bank" value="others">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="other_text" style="display: none">
                            <div class="form-group">
                                <label for="nama_bank_text">Nama Bank atau Dompet digital</label>
                                <input type="text" name="nama_bank_text" id="nama_bank_text" class="form-control"
                                    placeholder="Masukkan Nama Bank atau Dompet digital">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_pemilik">Nama Pemilik Rekening</label>
                                <input id="nama_pemilik" type="text" name="nama_pemilik" class="form-control"
                                    required="required" data-error="Firstname is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input id="rupiah" type="text" name="nominal" class="form-control"
                                    required="required" data-error="Firstname is required.">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <div class="form-group mb-3">
                                        <label for="image_upload">Foto</label>
                                        <input type="file" name="foto_pembayaran" class="form-control" id="foto_pembayaran">
                                    </div>
                                        <button type="submit" class="btn btn text-white btn-lg" align="right" style="background-color: #02225B; align: right;">Upload Bukti Pembayaran</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

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
                                                <h4>Verifikasi Pembayaran</h4>
                                            </div>
                            
                                            <div class="kanan" style="margin-left: 600px;">
                                                <p class="text-secondary">Dashboard / Verifikasi Pembayaran</p>
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
<br>

    <table class="table" style="background-color: #FFFDE3">
        <thead>
          <tr>
            <th scope="col-md-1 text-white">No</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Nama</th>
            <th scope="col">Bukti Pembayaran</th>
            <th scope="col">Detail Pendaftaran</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>2</td>
            <td>Revan</td>
            <td>Lihat</td>
            <td>Detail</td>
            <td>Tolak</td>
          </tr>
        </tbody>
      </table>

@endif

{{-- admin penutup --}}

<script>
 var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

</script>

@endsection