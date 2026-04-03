<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoriPengaduan extends Model
{
    use HasFactory;

    protected $table = 'histori_pengaduan';
    protected $primaryKey = 'id_histori';

    protected $fillable = [
        'id_pengaduan',
        'status',
        'keterangan',
        'tanggal_update'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
}