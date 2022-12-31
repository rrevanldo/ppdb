@extends('layout')

@section('content')
@if (Session::get('notAllowed'))
        <div class="alert alert-danger">
            {{ Session::get('notAllowed') }}
        </div>
    @endif
<br><br><div class="rounded shadow p-5 bg-white" id="beranda">
            <div class="beranda">
                <div class="container">
                    <h2 class="inih2">PPDB TP 2023-2024<br>SMK Wikrama Bogor</h2>
                    <p class="inip">Ayo! segera daftarkan dirimu ke SMK Wikrama dengan cara klik <b>PENDAFTARAN PPDB</b> dibawah
                        ini!
                        <br><strong>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.</strong></p><br>
                    <a href="/register" class="btn btn-info text-black btn-lg" align="left">Pendaftaran PPDB</a>
                </div><br><br>
                <hr />

                <div class="pt-0 position-relative pull-top mb-5" id="jumbotron-card">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mt-0 text-center">
                                <h5>MOTTO</h5>
                                <p>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlaqul Karimah</p>
                            </div>

                            <div class="col-lg-4 col-md-6 mt-0 text-center">
                                <h5>AFIRMASI</h5>
                                <p>Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri</p>
                            </div>

                            <div class="col-lg-4 col-md-6 mt-0 text-center">
                                <h5>ATITUDE</h5>
                                <p>Aku ada lingkunganku <br> bahagia</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    <br>
<br>


    <div class="mt-0 padding-bottom-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="jurusan">
        <div class="related mt-sm-5 mt-3 mb-sm-5 mb-3 px-5">
            <h2>Jurusan</h2><hr>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/rpl.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">PPLG</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Pengembangan Perangkat Lunak dan Gim</h4>
                <strong>Keunggulan</strong> <br> Desktop Programming, Web Programming, Mobile Programming, Bussiness
                Analyst, Database Administration.
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/tkj.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">TJKT</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Teknik Jaringan Komputer dan Telekomunikasi</h4>
                <strong>Keunggulan</strong> <br> Kompetensi keahlian Teknik Komputer dan Jaringan sudah memiliki sertifikasi
                internasional seperti CNAP <br> (Cisco Networking Academy Program) dan MCNA (Mikrotik Certified Network
                Associate).
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/dkv.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">DKV</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Desain Komunikasi Visual</h4>
                <strong>Keunggulan</strong> <br> Lulusan dapat memiliki kesempatan kerja yang luas dibidang periklanan, production house, radio & televisi <br> studio foto, percetakan grafis, corporate brand identity, penerbit majalan/Koran, dll.
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/pmn.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">PMN</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Pemasaran</h4>
                <strong>Keunggulan</strong> <br> Kompetensi keahlian Bisnis Daring dan Pemasaran memiliki kompetensi yang mirip dengan program Multimedia <br> dan Perkantoran. Lulusan program ini diharuskan mampu membuat foto produk, desain, copy writing, dll.
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/mplb.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">MPLB</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Manajemen Perkantoran Lembaga Bisnis</h4>
                <strong>Keunggulan</strong> <br> Kompetensi keahlian Otomatisasi dan Tata Kelola Perkantoran/Administrasi Perkantoran memiliki keunggulan dibidang prestasi peserta didik seperti juara II lomba keterampilan siswa bidang lomba sekretaris tingkat provinsi tahun 2016 dan juara I lomba olimpiade sekretaris tingkat nasional tahun 2017
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/tbg.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">TBG</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Tata boga</h4>
                <strong>Keunggulan</strong> <br> Siswa jurusan Tata Boga mampu bekerja diberbagai bidang jasa boga seperti restoran, hotel, <br> rumah sakit, katering sesuai dengan minat dan bakat yang telah dipelajari.
            </div><br>
            <div class="rounded shadow p-5 bg-white">
                <img src="{{asset('assets/img/htl.jpg')}}" alt="" height="130px" align="right">
                <h5 class="font-weight-bold" style="color: #02225B;">HTL</h5>
                <h4 style="color: #0E0E0E; font-weight: 600;">Perhotelan</h4>
                <strong>Keunggulan</strong>  <br> Siswa jurusan Perhotelan akan mampu bekerja di departemen yang ada di hotel dengan kompetensi yang mereka pelajari.
            </div><br>
        </div>
    </div>

        <h2 id="tentangkami">Tentang Kami</h2><hr>
        <div class="rounded shadow p-5 bg-white">
            <img src="{{asset('assets/img/gedung.jpg')}}" alt="" height="200px" align="right">
            <div class="text">
                    <h5 class="font-weight-bold" style="color: #fdd818">SMK Unggul dan Berprestasi Nasional</h5>
                    <p>SMK Wikrama Bogor Satu dari 20 SMK Penerima Penghargaan <br> 
                    "SMK Unggul dan Berprestasi" di Indonesia dari KEMENDIKBUD</p>
                    <h5 class="font-weight-bold" style="color: #fdd818;">Pembelajaran Tatap Muka Terbatas</h5>
                    <p>SMK Wikrama selalu menerapkan protokol kesehatan dengan ketat, <br> jadi kamu gak perlu khawatir lagi !</p>
            </div>
        </div><br>

        <h2 id="testimoni">Testimoni</h2><hr>
        <div class="rounded shadow p-5 bg-white">
                <span class="year">2000</span>
                <span class="name">Akhmad Munito</span>
                <p>Maju Terus Wikrama, dengan sekolah di Wikrama saya dibekali ilmu yg sangat bermanfaat dan akhlakul karimah bisa langsung bisa bersaing ke dunia kerja di era modern ini</p>
              <p class="major">Administrasi Perkantoran (APK)</p>
        </div><br>
        <div class="rounded shadow p-5 bg-white">
            <span class="year">2011</span>
            <span class="name">Lutfi Hakim</span>
            <p>SMK Wikrama bukan hanya menjadikan siswanya untuk masuk ke dunia kerja, melainkan melebihi dari apa yang dibutuhkan di dunia kerja pada umumnya.</p>
          <p class="major">Rekayasa Perangkat Lunak (RPL)</p>
        </div><br>
        <div class="rounded shadow p-5 bg-white">
            <span class="year">2016</span>
            <span class="name">Kamaludin</span>
            <p>Menerapkan sistem pembelajaran yang baik, efektif dan berbasis TI yang sangat memudahkan siswa.</p>
          <p class="major">Rekayasa Perangkat Lunak (RPL)</p>
        </div><br>
@endsection
