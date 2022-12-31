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
    ];
}
