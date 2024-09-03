<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'id_user',
        'judul_kegiatan',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'deskripsi_kegiatan',
        'foto_kegiatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
