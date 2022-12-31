@extends('main')

@section('content')

<style>
    body {
        background-color: #00aced;
        }
</style>

<div class="container">
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        @if (Session::get('success'))
                        <div class="alert alert-success w-75">
                            {{ Session::get('success') }}
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
                        {{-- {{ route('print',$ppdb->nodaftar) }} --}}
                        {{-- {{ route('store') }} --}}
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            
                            <h3 align="center" class="landing py-3 "><b>Form Pendaftaran PPDB</b></h3>
                            <p  align="center" class="py-0">SMK Wikrama Bogor TP. 2023-2024</p>
                            <hr>

                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">NISN</label>
                                            <input id="form_name" type="number" name="nisn" class="form-control"
                                                required="required" data-error="Firstname is required." placeholder="Masukan NISN">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Jenis Kelamin</label>
                                            <select name="jk" class="form-control w-100" id="jk" value="" >
                                                <option name="jk" hidden="">--Jenis Kelamin--</option>
                                                <option name="jk" value="perempuan">Perempuan</option>
                                                <option name="jk" value="laki-laki">Laki-Laki</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Nama</label>
                                            <input id="form_name" type="text" name="nama" class="form-control"
                                                required="required" data-error="Firstname is required." placeholder="Masukan Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Asal Sekolah</label>
                                            <select name="asal_sekolah" class="select2 form-control w-100 ml-0" onchange='checkvalue(this.value)' >
                                                <option name="asal_sekolah" hidden disabled selected>--Pilih Asal Sekolah--</option>
                                                <option name="asal_sekolah" value="SMPN 1 Bogor">SMPN 1 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 2 Bogor">SMPN 2 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 3 Bogor">SMPN 3 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 4 Bogor">SMPN 4 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 5 Bogor">SMPN 5 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 6 Bogor">SMPN 6 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 7 Bogor">SMPN 7 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 8 Bogor">SMPN 8 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 9 Bogor">SMPN 9 Bogor</option>
                                                <option name="asal_sekolah" value="SMPN 10 Bogor">SMPN 10 Bogor</option>
                                                <option name="asal_sekolah" value="others">LAINNYA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="other_text" style="display: none">
                                        <div class="form-group">
                                            <label for="asal_sekolah_text">Nama Sekolah</label>
                                            <input type="text" name="asal_sekolah_text" id="asal_sekolah_text" class="form-control"
                                                placeholder="Masukkan Asal Sekolah">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">Email</label>
                                            <input id="form_name" type="text" name="email" class="form-control"
                                                required="required" data-error="Firstname is required." placeholder="Masukkan Email Aktif" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telp">Nomor Handphone</label>
                                            <input type="number" name="no_hp" id="telp" class="form-control"
                                                placeholder="Contoh : 08--------" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telp-ayah">Nomor HP Ayah</label>
                                            <input type="number" name="no_hp_ayah" class="form-control" id="telp-ayah"
                                                placeholder="Contoh : 08--------" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telp-ibu">Nomor HP Ibu</label>
                                            <input type="number" name="no_hp_ibu" class="form-control" id="telp-ibu"
                                                placeholder="Contoh : 08--------" required>
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><br>
                                            <button type="submit" id="contactus-submit" class="btn-success btn-lg btn">Submit</button> &nbsp; &nbsp; &nbsp;
                                            <span>Sudah Punya akun? Klik <a class="logres" href="/login" style="text-decoration: underline;">Login</a></span> &nbsp; &nbsp; &nbsp;
                                            <a href="/" class="btn-dark btn-lg btn">Cancel</a>
                                            </div>
                                        </div><br><br>
                                        {{-- <span>Sudah Punya akun? Klik <a class="logres" href="/login" style="text-decoration: underline;">Login</a></span> --}}
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
</div>

<script>
    function checkvalue(val) {
        if (val === "others") {
            document.getElementById('other_text').style.display = 'block';
        } else {
            document.getElementById('other_text').style.display = 'none';
        }
    }

    $(document).ready(function () {
        $('.select2').select2();
    });

    function tampil_referensi() {

        if (document.getElementById("pilih_referensi").value == "pegawai") {
            document.getElementById("referensi_pegawai").style.display = "block";
        } else {
            document.getElementById("referensi_pegawai").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "siswa") {
            document.getElementById("referensi_siswa").style.display = "block";
        } else {
            document.getElementById("referensi_siswa").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "alumni") {
            document.getElementById("referensi_alumni").style.display = "block";
        } else {
            document.getElementById("referensi_alumni").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "guru_smp") {
            document.getElementById("referensi_guru_smp").style.display = "block";
        } else {
            document.getElementById("referensi_guru_smp").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "calon_siswa") {
            document.getElementById("referensi_calon_siswa").style.display = "block";
        } else {
            document.getElementById("referensi_calon_siswa").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "sosial_media") {
            document.getElementById("referensi_sosmed").style.display = "block";
        } else {
            document.getElementById("referensi_sosmed").style.display = "none";
        }

        if (document.getElementById("pilih_referensi").value == "referensi_langsung") {
            document.getElementById("referensi_langsung").style.display = "block";
        } else {
            document.getElementById("referensi_langsung").style.display = "none";
        }
    }

</script>
@endsection