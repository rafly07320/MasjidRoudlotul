<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas_jumat extends Model
{
    use HasFactory;

    protected $table = 'petugas_jumats';

    protected $fillable = [
        'id_user',
        'nama_petugas',
        'tgl_petugas',
        'nama_imam',
        'nama_khotib',
        'nama_muadzin',
        'nama_badal',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
