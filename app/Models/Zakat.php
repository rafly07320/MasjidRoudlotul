<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_zakat',
        'kepala_keluarga',
        'alamat',
        'jumlah_jiwa',
        'total_zakat',
    ]; 
}
