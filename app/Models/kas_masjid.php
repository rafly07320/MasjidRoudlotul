<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kas_masjid extends Model
{
    use HasFactory;

    protected $table = 'kas_masjids';

    protected $fillable = [
        'id_user',
        'tanggal_kas',
        'jenis_kas',
        'jumlah_kas',
        'saldo_akhir',
        'deskripsi_kas',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
