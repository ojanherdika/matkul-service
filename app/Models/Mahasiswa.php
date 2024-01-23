<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nama_mahasiswa', 'nim'];

    public function jadwalMataKuliahs()
    {
        return $this->belongsToMany(JadwalMataKuliah::class, 'peserta', 'id_mahasiswa', 'id_jadwal');
    }
}
