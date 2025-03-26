<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_zakat',
        'nama',
        'harga_per_zakat',
        'harga_total',
        'alamat',
        'jumlah_zakat',
    ]; 
}
