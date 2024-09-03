<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shodaqoh extends Model
{
    use HasFactory;
    
    protected $table = 'shodaqohs';

    protected $fillable = [
        'nama_shodaqoh',
        'tanggal_shodaqoh',
        'nominal_shodaqoh',
        'bukti_transfer',
    ];
}
