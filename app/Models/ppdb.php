<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppdb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn', 
        'jk', 
        'nama', 
        'asal_sekolah',
        'asal_sekolah_text',
        'email',
        'no_hp',
        'no_hp_ayah', 
        'no_hp_ibu', 
        'pilih_referensi',
        'nama_pegawai_wikrama',
        'nama_siswa',
        'rayon',
        'nama_alumni', 
        'tahun_lulus_alumni', 
        'nama_guru_smp',
        'nama_smp',
        'referensi_no_seleksi',
        'referensi_nama_siswa',
        'referensi_sosmed', 
        'referensi_langsung',
    ];
}
