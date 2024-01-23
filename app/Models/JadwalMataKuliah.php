<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMataKuliah extends Model
{
    use HasFactory;
    protected $table = 'jadwalmatakuliah';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['hari', 'jam', 'id_matakuliah'];


    public function pengajars()
    {
        return $this->hasMany(Pengajar::class, 'id_jadwal');
    }


    public function mahasiswas()
    {
        return $this->belongsToMany(Mahasiswa::class, 'peserta', 'id_jadwal', 'id_mahasiswa');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matakuliah');
    }
}
