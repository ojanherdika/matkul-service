<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_peserta';
    protected $table = 'peserta';
    protected $fillable = ['id_mahasiswa', 'id_jadwal'];

    // Definisi relasi many-to-one dengan Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    // Definisi relasi many-to-one dengan JadwalMataKuliah
    public function jadwalMataKuliah()
    {
        return $this->belongsTo(JadwalMataKuliah::class, 'id_jadwal');
    }
}
