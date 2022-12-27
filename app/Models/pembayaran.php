<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_bank', 
        'nama_pemilik', 
        'nominal', 
        'nama_bank_text',
        'foto_pembayaran',
    ];
}
