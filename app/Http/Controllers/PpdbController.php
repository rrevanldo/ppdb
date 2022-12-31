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

     public function lihat($user_id)
     { 
        $detailUser = User::findOrFail($user_id);
        $pem = Pembayaran::where('user_id', $user_id)->first();
        return view('ppdb.lihat' , compact('pem', 'detailUser'));
     }

     public function detail($user_id)
     {
        $detailUser = User::findOrFail($user_id);
        return view('ppdb.detail', compact('detailUser'));
     }

     public function pembayaran()
     {
        // $users=User::all();
        $users = Pembayaran::with('user')->paginate(5);
        $item = Pembayaran::where('user_id', '=', Auth::user()->id)->first();
         return view('ppdb.pembayaran' , compact('item' , 'users'));
     }

     public function validasi($user_id){
   
        Pembayaran::where('user_id', '=', $user_id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('done', 'Berhasil Validasi');
    }

    public function tolak($user_id){
        Pembayaran::where('user_id', '=', $user_id)->update([
            'status' => 2,
        ]);
        return redirect()->back()->with('done', 'Permintaan Di tolak');
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
            return redirect('/login')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

     public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $users=User::all();
        return view('ppdb.index' , compact('users'));
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
            'no_hp_ayah' => 'required',
            'no_hp_ibu' => 'required',
        ]);

        Ppdb::create($request->all());

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->nisn),
        ]);

        return redirect()->route('print')->with('success', 'Data pendaftaran siswa berhasil dibuat!');
     }

     public function print()
    {
        $item = Ppdb::latest()->first();

        return view('ppdb.print' , compact('item'));
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
        $item = Pembayaran::where('user_id', '=', Auth::user()->id)->first();
        return view('ppdb.pembayaran', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */

     public function uploadPembayaran (Request $request)
     {
         $request->validate([
             'nama_bank' => 'required',
             'nama_pemilik' => 'required',
             'nominal' => 'required',
             'foto_pembayaran' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
             'nama_bank_text' => 'nullable',
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
 
         pembayaran::create([
             'nama_bank' => $request->nama_bank,
             'nama_pemilik' => $request->nama_pemilik,
             'nominal' => $request->nominal,
             'nama_bank_text' => $request->nama_bank_text,
             'foto_pembayaran' => $uploaded,
             'status' => 0,
             'user_id' => Auth::user()->id,
         ]);
 
         return redirect()->route('dashboard')->with('successUploadBayar', 'Pembayaran telah dilakukan silahkan menunggu admin untuk melakukan validasi');
     }

    public function update(Request $request, ppdb $ppdb)
    {
        $request->validate([
            'nama_bank' => 'required',
            'nama_pemilik' => 'required',
            'nominal' => 'required',
            'foto_pembayaran' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'nama_bank_text' => 'nullable',
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

          pembayaran::create([
            'nama_bank' => $request->nama_bank,
            'nama_pemilik' => $request->nama_pemilik,
            'nominal' => $request->nominal,
            'nama_bank_text' => $request->nama_bank_text,
            'foto_pembayaran' => $uploaded,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboard')->with('successUploadBayar', 'Pembayaran telah dilakukan silahkan menunggu admin untuk melakukan validasi');
        
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

       // $ppdb = Ppdb::with(['id'])->get();

        // // Count
        // $count_user = Ppdb::all()->count();
        // $count_all_peserta = Ppdb::all()->count();
        // $count_menunggu_peserta = Ppdb::where('status', 'MENUNGGU')->count();
        // $count_ditolak_peserta = Ppdb::where('status', 'DITOLAK')->count();
        // $count_diterima_peserta = Ppdb::where('status', 'DITERIMA')->count();
        

        // return view('pages.dashboard.index', compact(
        //     'items', 'count_user', 'count_all_peserta', 'count_menunggu_peserta',
        //     'count_ditolak_peserta', 'count_diterima_peserta'
        // ));

        // $users=User::where('id', Auth::user()->id)->first();

                // $data = Ppdb::create([
        //     'nisn' => $request->nisn,
        //     'jk' => $request->jk,
        //     'nama' => $request->nama,
        //     'asal_sekolah' => $request->asal_sekolah,
        //     'asal_sekolah_text' => $request->asal_sekolah_text,
        //     'email' => $request->email,
        //     'no_hp' => $request->no_hp,
        //     'no_hp_ayah' => $request->no_hp_ayah,
        //     'no_hp_ibu' => $request->no_hp_ibu,
        // ]);