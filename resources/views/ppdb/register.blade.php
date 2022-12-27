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
                                            <label>Pilih Referensi</label>
                                            <select name="pilih_referensi" class="form-control" id="pilih_referensi"
                                                onclick="tampil_referensi()" required>
                                                <option name="pilih_referensi" disabled hidden selected>Pilih Referensi</option>
                                                <option name="pilih_referensi" value="pegawai">Guru/Staf/Laboran/Pegawai Wikrama</option>
                                                <option name="pilih_referensi" value="siswa">Siswa SMK Wikrama</option>
                                                <option name="pilih_referensi" value="alumni">Alumni SMK Wikrama</option>
                                                <option name="pilih_referensi" value="guru_smp">Guru SMP</option>
                                                <option name="pilih_referensi" value="calon_siswa">Calon Siswa SMK Wikrama</option>
                                                <option name="pilih_referensi" value="sosial_media">Sosial Media</option>
                                                <option name="pilih_referensi" value="referensi_langsung">Referensi Langsung</option>
                                            </select>
                                    </div><br>
                                    <div class="row" id="referensi_pegawai" style="display:none;">
                                        <div class="col-sm-12"><br>
                                            <label><b>Referensi dari Guru/Staf/Laboran/Pegawai Wikrama</b></label>
                                            <br>
                                        </div>
                                        <div class="col-sm-12 mt-2"><br>
                                            <label>Nama Guru/Staf/Laboran/Pegawai Wikrama</label>
                                            <input type="text" class="form-control" name="nama_pegawai_wikrama"
                                                id="nama_pegawai_wikrama">
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_siswa" style="display:none;">
                                        <div class="col-sm-12"><br>
                                            <label><b>Referensi dari Siswa Wikrama</b></label>
                                            <br>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nama Siswa</label>
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa">
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label>Rayon</label>
                                            <select name="rayon" id="rayon" class="form-control">
                                                <option name="rayon" value="">Pilih Rayon</option>
                                                <option name="rayon" value="Cia 1">Ciawi 1</option>
                                                <option name="rayon" value="Cia 2">Ciawi 2</option>
                                                <option name="rayon" value="Cia 3">Ciawi 3</option>
                                                <option name="rayon" value="Cia 4">Ciawi 4</option>
                                                <option name="rayon" value="Cia 5">Ciawi 5</option>
                                                <option name="rayon" value="Cib 1">Cibedug 1</option>
                                                <option name="rayon" value="Cib 2">Cibedug 2</option>
                                                <option name="rayon" value="Cib 3">Cibedug 3</option>
                                                <option name="rayon" value="Cic 1">Cicurug 1</option>
                                                <option name="rayon" value="Cic 2">Cicurug 2</option>
                                                <option name="rayon" value="Cic 3">Cicurug 3</option>
                                                <option name="rayon" value="Cic 4">Cicurug 4</option>
                                                <option name="rayon" value="Cic 5">Cicurug 5</option>
                                                <option name="rayon" value="Cic 6">Cicurug 6</option>
                                                <option name="rayon" value="Cic 7">Cicurug 7</option>
                                                <option name="rayon" value="Cis 1">Cisarua 1</option>
                                                <option name="rayon" value="Cis 2">Cisarua 2</option>
                                                <option name="rayon" value="Cis 3">Cisarua 3</option>
                                                <option name="rayon" value="Cis 4">Cisarua 4</option>
                                                <option name="rayon" value="Cis 5">Cisarua 5</option>
                                                <option name="rayon" value="Cis 6">Cisarua 6</option>
                                                <option name="rayon" value="Suk 1">Sukasari 1</option>
                                                <option name="rayon" value="Suk 2">Sukasari 2</option>
                                                <option name="rayon" value="Taj 1">Tajur 1</option>
                                                <option name="rayon" value="Taj 2">Tajur 2</option>
                                                <option name="rayon" value="Taj 3">Tajur 3</option>
                                                <option name="rayon" value="Taj 4">Tajur 4</option>
                                                <option name="rayon" value="Taj 5">Tajur 5</option>
                                                <option name="rayon" value="Wik 1">Wikrama 1</option>
                                                <option name="rayon" value="Wik 2">Wikrama 2</option>
                                                <option name="rayon" value="Wik 3">Wikrama 3</option>
                                                <option name="rayon" value="Wik 4">Wikrama 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_alumni" style="display:none;">
                                        <div class="col-sm-12"><br>
                                            <label><b>Referensi dari Alumni Wikrama</b></label>
                                            <br>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nama Alumni</label>
                                            <input type="text" class="form-control" name="nama_alumni" id="nama_alumni">
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label>Tahun Lulus Alumni</label>
                                            <input type="number" class="form-control" name="tahun_lulus_alumni" id="tahun_lulus_alumni">
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_guru_smp" style="display:none;">
                                        <div class="col-sm-12"><br>
                                            <label><b>Referensi dari Guru SMP</b></label>
                                            <br>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nama Guru</label>
                                            <input type="text" class="form-control" name="nama_guru_smp" id="nama_guru_smp">
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label>Asal SMP</label>
                                            <input type="text" class="form-control" name="nama_smp" id="nama_smp" >
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_calon_siswa" style="display:none;">
                                        <div class="col-sm-12"><br>
                                            <label><b>Referensi dari Calon Peserta Didik</b></label>
                                            <br>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>No Seleksi</label>
                                            <input type="number" class="form-control" name="referensi_no_seleksi"
                                                id="referensi_no_seleksi" >
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <label>Nama Calon Peserta</label>
                                            <input type="text" class="form-control" name="referensi_nama_siswa"
                                                id="referensi_nama_siswa" >
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_sosmed" style="display:none;">
                                        <div class="col-sm-12">
                                            <!-- <label><b>Referensi Sosial Media</b></label>
                                            <br> -->
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="referensi_sosmed" id="referensi_sosmed" class="form-control"
                                                value="sosial_media">
                                        </div>
                                    </div>
                                    <div class="row align-items-start" id="referensi_langsung" style="display:none;">
                                        <div class="col-sm-12">
                                            <!-- <label><b>Referensi Langsung</b></label> -->
                                            <br>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="hidden" name="referensi_langsung" id="referensi_langsung" class="form-control"
                                                value="daftar_langsung">
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><br>
                                            <button type="submit" id="contactus-submit" class="btn-success btn-lg btn">Submit</button>
                                            <a href="/" class="btn-dark btn-lg btn">Cancel</a>
                                            </div>
                                        </div>
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