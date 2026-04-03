<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'judul',
        'deskripsi',
        'tanggal_pengaduan',
        'status',
        'foto'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'id_pengaduan');
    }

    public function histori()
    {
        return $this->hasMany(HistoriPengaduan::class, 'id_pengaduan');
    }
}