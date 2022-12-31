<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pendaftaran | {{ $item['id'] }} - {{ $item['nama'] }} </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />

</head>
<style>
    *{
        font-family: sans-serif;
    }
    body{
        margin: 0;
        padding: 0;
    }
    .header h5 {
        font-weight: bold;
    }
    .header p {
        font-size: 14px !important;
    }
    p{
        line-height: 8px;
    }
    main #bab {
        background-color: rgb(161, 161, 161);
        margin-top: 20px;
        font-size: 14px !important;
        font-weight: bold;
    }
    main #subab {
        font-size: 14px !important;
        font-weight: bold;
    }
    #link{
        color: rgb(55, 44, 218)
    }
    .satu table, .dua p, .dua li{
        font-size: 12px;
    }
    .satu table th {
        font-weight: bold;
        text-transform: uppercase
    }
    .satu table tr {
        line-height: 15px;
    }
    .logo img{
      width: 80px;
    }
</style>
<body>
    <header class="d-flex justify-content-start align-items-center">
        <div class="logo">
            <img src="{{ asset('assets/img/wk.png') }}" alt="" class="" width="120px">
        </div>
        <div class="px-4 header judul">
            <h6>PANITIA PENERIMAAN PESERTA DIDIK BARU <br> SMK WIKRAMA BOGOR TP 2023-2024</h6>          
            <p>Jl. Raya Wangun Kel. Sindangsari Kec. Bogor Timur Kota Bogor</p>
            <p>Website: http://smkwikrama.sch.id/ | Telepon : 02518242411</p>
        </div>
    </header>
    <hr style="height: 2px; opacity:1;" color="black">
    <div class="bukti text-center">
        <h6><b>TANDA BUKTI PENDAFTARAN</b></h6>
        <H6>SMK wikrama Bogor TP 2023-2024</H6>
    </div>
    <main>
        <div class="satu">
            <h6 id="bab">I. BIODATA CALON PESERTA DIDIK</h6>
            <table cellspacing="0" cellpadding="4">
               
                <tr>
                    <th width="50%">tanggal daftar</th>
                    <td>:</td>
                    <td>{{ $item['created_at']->format('j F, Y') }}</td>
                </tr>
                <tr>
                    <th width="50%">nomor seleksi</th>
                    <td>:</td>
                    <td>{{ $item['id'] }}</td>
                </tr>
                <tr>
                    <th width="50%">Nama lengkap</th>
                    <td>:</td>
                    <td>{{ $item['nama'] }}</td>
                </tr>   
                <tr>
                    <th width="50%">Nisn</th>
                    <td>:</td>
                    <td>{{ $item['nisn'] }}</td>
                </tr>
                <tr>
                    <th width="50%">asal sekolah</th>
                    <td>:</td>
                    <td>{{ $item['asal_sekolah'] }}</td>
                </tr>
                <tr>
                    <th width="50%">email</th>
                    <td>:</td>
                    <td>{{ $item['email'] }}</td>
                </tr>
                <tr>
                    <th width="50%">no hp</th>
                    <td>:</td>
                    <td>{{ $item['no_hp'] }}</td>
                </tr>
                <tr>
                    <th width="50%">no hp ayah</th>
                    <td>:</td>
                    <td>{{ $item['no_hp_ayah'] }}</td>
                </tr>
                <tr>
                    <th width="50%">no hp ibu</th>
                    <td>:</td>
                    <td>{{ $item['no_hp_ibu'] }}</td>
                </tr>
                
            </table>
        </div>
        <div class="dua">
            <h6 id="bab">II. INFORMASI DAN PERSYARATAN</h6>
            <h6 id="subab">A. Akun Anda</h6>
            <p>Akses <a href="{{route('login')}}" id="link">ppdb-smkwikrama/login</a>, login dengan menggunakan:</p>
            <p>Email:{{ $item['email'] }}</p>
            <p>Password:{{ $item['nisn'] }}</p>
            <p>Akun ini digunakan untuk mengecek status pendaftaran pada SIM PPDB SMK Wikrama Bogor.</p>
            <h6 id="subab">B. Biaya Seleksi</h6>
            <p>Pembayaran uang seleksi sebesar Rp. 200.000 melalui transfer bank:</p>
            <p>Bank BNI: 1234567890 A.N SMK Wikrama Sekolah.</p>
        </div>
    </main>

<script>
    window.print();
</script>
</body>
</html>