<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['nama_dosen', 'bidang_kajian'];

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class, 'id_dosen');
    }
}
