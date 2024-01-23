<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $primaryKey = 'id_matakuliah';
    protected $fillable = ['nama_matakuliah', 'sks'];

    // Definisi relasi one-to-many dengan JadwalMataKuliah
    public function jadwalMataKuliahs()
    {
        return $this->hasMany(JadwalMataKuliah::class, 'id_matakuliah');
    }
}
