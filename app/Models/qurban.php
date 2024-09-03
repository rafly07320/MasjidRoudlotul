<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qurban extends Model
{
    use HasFactory;

    protected $table = 'qurbans';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'nama_qurban',
        'alamat_qurban',
        'no_telp',
        'jenis_hewan',
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relasi ke model Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
