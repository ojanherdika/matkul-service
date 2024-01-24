<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    protected $table = 'pengajar';
    protected $primaryKey = 'id_pengajar';
    protected $fillable = ['id_dosen', 'id_jadwal'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function jadwalMataKuliah()
    {
        return $this->belongsTo(JadwalMataKuliah::class, 'id_jadwal');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matakuliah', 'id_matakuliah');
    }
}
