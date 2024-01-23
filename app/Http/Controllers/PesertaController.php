<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::all();
        return response()->json($pesertas);
    }

    public function show($id_mahasiswa, $id_jadwal)
    {
        $peserta = Peserta::where(['id_mahasiswa' => $id_mahasiswa, 'id_jadwal' => $id_jadwal])->first();
        return response()->json($peserta);
    }

    public function store(Request $request)
    {
        $peserta = Peserta::create($request->all());
        return response()->json($peserta, 201);
    }

    public function update(Request $request, $id_mahasiswa, $id_jadwal)
    {
        $peserta = Peserta::where(['id_mahasiswa' => $id_mahasiswa, 'id_jadwal' => $id_jadwal])->first();
        $peserta->update($request->all());
        return response()->json($peserta, 200);
    }

    public function destroy($id_mahasiswa, $id_jadwal)
    {
        $peserta = Peserta::where(['id_mahasiswa' => $id_mahasiswa, 'id_jadwal' => $id_jadwal])->first();
        $peserta->delete();
        return response()->json(null, 204);
    }
}
