<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\pembayaran;
use App\Models\User;
use App\Models\ppdb;
use Carbon\Carbon;
use PDF;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // if ($request->hasfile('foto_pembayaran')) {            
        //     $foto_pembayaran = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto_pembayaran')->getClientOriginalName());
        //     $request->file('foto_pembayaran')->move(public_path('images'), $foto_pembayaran);
        //      Uploads::create(
        //             [                        
        //                 'data_file' =>$foto_pembayaran
        //             ]
        //         );
        //     echo'Success';
        // }else{
        //     $uploaded = $image->getClientOriginalName();
        // }

     public function uploadPembayaran(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
            'nominal' => 'required',
            'foto_pembayaran' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'nama_bank_text' => 'nullable',
        ]);

        pembayaran::create([
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'nominal' => $request->nominal,
            'nama_bank_text' => $request->nama_bank_text,
            'foto_pembayaran' => $request->foto_pembayaran,
        ]);

        $image = $request->file('foto_pembayaran');
         $imgName = time().rand().'.'.$image->extension();
         if(!file_exists(public_path('/assets/img/'.$image->getClientOriginalName()))){
             $destinationPath = public_path('/assets/img/');
             $image->move($destinationPath, $imgName);
             $uploaded = $imgName;
         }else{
             $uploaded = $image->getClientOriginalName();
         }

        return redirect()->route('dashboard')->with('successUploadBayar', 'Pembayaran telah dilakukan silahkan menunggu admin untuk melakukan validasi');
    }

     public function changeProfile (Request $request)
     {
         $request->validate([
             'image_profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
         ]);
 
         $image = $request->file('image_profile');
         $imgName = time().rand().'.'.$image->extension();
         if(!file_exists(public_path('/assets/img/'.$image->getClientOriginalName()))){
             $destinationPath = public_path('/assets/img/');
             $image->move($destinationPath, $imgName);
             $uploaded = $imgName;
         }else{
             $uploaded = $image->getClientOriginalName();
         }
 
         User::where('id', Auth::user()->id)->update([
             'image_profile' => $uploaded
         ]);
 
         return redirect()->route('dashboard.profile')->with('successUploadImg', 'Foto Profile Berhasil diperbarui');
     }
 
     public function profileUpload()
     {
         return view('ppdb.upload-profile');
     }
 
     public function error()
     {
         return view('ppdb.error');
     }
 
     public function home()
     {
         return view('ppdb.index');
     }
 
     public function profile()
     {
         $users=User::where('id', Auth::user()->id)->first();
         return view('ppdb.profile' , compact('users'));
     }
 
     public function users()
     {
         $users=User::all();
         return view('ppdb.users' , compact('users'));
     }

     public function dashboard()
    {
        return view('ppdb.dashboard');
    }

     public function register()
     {
         return view('ppdb.register');
     }

     public function pembayaran()
     {
         return view('ppdb.pembayaran');
     }


     public function login()
     {
         return view('ppdb.login');
     }

     public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => "This email doesn't exists"
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('dashboard');
        } else {
            return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

     public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function print($id)
    {
        $ppdb = Ppdb::where('id', $id)->first();
        
        view()->share('ppdb',$ppdb);

        $send = [
            'ppdb' => $ppdb,
        ];

        $pdf = PDF::loadView('print', compact('ppdb'));

        return $pdf->download('form_pendaftaran.pdf');

        // return view('ppdb.print');
    }

    public function index()
    {
        //
        return view('ppdb.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $request->validate([
            'nisn' => 'required',
            'jk' => 'required',
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'asal_sekolah_text' => 'nullable',
            'email' => 'required',
            'no_hp' => 'required',
            'no_hp_ayah' => 'required|',
            'no_hp_ibu' => 'required|',
            'pilih_referensi' => 'required',
            'nama_pegawai_wikrama' => 'nullable',
            'nama_siswa' => 'nullable',
            'rayon' => 'nullable',
            'nama_alumni' => 'nullable',
            'tahun_lulus_alumni' => 'nullable',
            'nama_guru_smp' => 'nullable',
            'nama_smp' => 'nullable',
            'referensi_no_seleksi' => 'nullable',
            'referensi_nama_siswa' => 'nullable',
            'referensi_sosmed' => 'nullable',
            'referensi_langsung' => 'nullable',
        ]);

        // Ppdb::create($request->all());

        $ppdb = Ppdb::create([
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_sekolah_text' => $request->asal_sekolah_text,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'no_hp_ayah' => $request->no_hp_ayah,
            'no_hp_ibu' => $request->no_hp_ibu,
            'pilih_referensi' => $request->pilih_referensi,
            'nama_pegawai_wikrama' => $request->nama_pegawai_wikrama,
            'nama_siswa' => $request->nama_siswa,
            'rayon' => $request->rayon,
            'nama_alumni' => $request->nama_alumni,
            'tahun_lulus_alumni' => $request->tahun_lulus_alumni,
            'nama_guru_smp' => $request->nama_guru_smp,
            'nama_smp' => $request->nama_smp,
            'referensi_no_seleksi' => $request->referensi_no_seleksi,
            'referensi_nama_siswa' => $request->referensi_nama_siswa,
            'referensi_sosmed' => $request->referensi_sosmed,
            'referensi_langsung' => $request->referensi_langsung,
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nisn),
        ]);

        $id = $ppdb['id'];

        return redirect()->route('print', $id)->with('success', 'Data pendaftaran siswa berhasil dibuat!');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function edit(ppdb $ppdb)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ppdb $ppdb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function destroy(ppdb $ppdb)
    {
        //
    }
}

//  public function store(Request $request)
    //  {
    //      $request->validate([
    //         'password' => 'required|',
    //         'jk' => 'required|',
    //         'nama' => 'required|',
    //         'asal_sekolah' => 'required|',
    //         'asal_sekolah_text' => 'required|',
    //         'email' => 'required|',
    //         'no_hp' => 'required|',
    //         'no_hp_ayah' => 'required|',
    //         'no_hp_ibu' => 'required|',
    //         'pilih_referensi' => 'required|',
    //         'nama_pegawai_wikrama' => 'required|',
    //         'nama_siswa' => 'required|',
    //         'rayon' => 'required|',
    //         'nama_alumni' => 'required|',
    //         'tahun_lulus_alumni' => 'required|',
    //         'nama_guru_smp' => 'required|',
    //         'nama_smp' => 'required|',
    //         'referensi_no_seleksi' => 'required|',
    //         'referensi_nama_siswa' => 'required|',
    //         'referensi_sosmed' => 'required|',
    //         'referensi_langsung' => 'required|',
    //     ]);

    //     Ppdb::create([
    //         'password' => $request->password,
    //         'jk' => $request->jk,
    //         'nama' => $request->nama,
    //         'asal_sekolah' => $request->asal_sekolah,
    //         'asal_sekolah_text' => $request->asal_sekolah_text,
    //         'email' => $request->email,
    //         'no_hp' => $request->no_hp,
    //         'no_hp_ayah' => $request->no_hp_ayah,
    //         'no_hp_ibu' => $request->no_hp_ibu,
    //         'pilih_referensi' => $request->pilih_referensi,
    //         'nama_pegawai_wikrama' => $request->nama_pegawai_wikrama,
    //         'nama_siswa' => $request->nama_siswa,
    //         'rayon' => $request->rayon,
    //         'nama_alumni' => $request->nama_alumni,
    //         'tahun_lulus_alumni' => $request->tahun_lulus_alumni,
    //         'nama_guru_smp' => $request->nama_guru_smp,
    //         'nama_smp' => $request->nama_smp,
    //         'referensi_no_seleksi' => $request->referensi_no_seleksi,
    //         'referensi_nama_siswa' => $request->referensi_nama_siswa,
    //         'referensi_sosmed' => $request->referensi_sosmed,
    //         'referensi_langsung' => $request->referensi_langsung,
    //     ]);

    //     Ppdb::create($request->all());

    //     return redirect()->route('index')->with('success', 'Data pendaftaran siswa berhasil dibuat!');
    //  }