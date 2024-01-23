<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalMataKuliahController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PesertaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//matakuliah
Route::get('/matakuliah', [MataKuliahController::class, 'index']);
Route::get('/matakuliah/{id}', [MataKuliahController::class, 'show']);
Route::post('/matakuliah', [MataKuliahController::class, 'store']);
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update']);
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy']);

//dosen
Route::get('/dosen', [DosenController::class, 'index']);
Route::get('/dosen/{id}', [DosenController::class, 'show']);
Route::post('/dosen', [DosenController::class, 'store']);
Route::put('/dosen/{id}', [DosenController::class, 'update']);
Route::delete('/dosen/{id}', [DosenController::class, 'destroy']);

//mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

//jadwalmatakuliah
Route::get('/jadwalmatakuliah', [JadwalMataKuliahController::class, 'index']);
Route::get('/jadwalmatakuliah/{id}', [JadwalMataKuliahController::class, 'show']);
Route::post('/jadwalmatakuliah', [JadwalMataKuliahController::class, 'store']);
Route::put('/jadwalmatakuliah/{id}', [JadwalMataKuliahController::class, 'update']);
Route::delete('/jadwalmatakuliah/{id}', [JadwalMataKuliahController::class, 'destroy']);

//pengajar
Route::get('/pengajar', [PengajarController::class, 'index']);
Route::get('/pengajar/{id_dosen}/{id_jadwal}', [PengajarController::class, 'show']);
Route::post('/pengajar', [PengajarController::class, 'store']);
Route::put('/pengajar/{id_dosen}/{id_jadwal}', [PengajarController::class, 'update']);
Route::delete('/pengajar/{id_dosen}/{id_jadwal}', [PengajarController::class, 'destroy']);

//peserta
Route::get('/peserta', [PesertaController::class, 'index']);
Route::get('/peserta/{id_mahasiswa}/{id_jadwal}', [PesertaController::class, 'show']);
Route::post('/peserta', [PesertaController::class, 'store']);
Route::put('/peserta/{id_mahasiswa}/{id_jadwal}', [PesertaController::class, 'update']);
Route::delete('/peserta/{id_mahasiswa}/{id_jadwal}', [PesertaController::class, 'destroy']);
