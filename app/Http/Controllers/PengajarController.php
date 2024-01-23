<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajars = Pengajar::all();
        return response()->json($pengajars);
    }

    public function show($id_dosen, $id_jadwal)
    {
        $pengajar = Pengajar::where(['id_dosen' => $id_dosen, 'id_jadwal' => $id_jadwal])->first();
        return response()->json($pengajar);
    }

    public function store(Request $request)
    {
        $pengajar = Pengajar::create($request->all());
        return response()->json($pengajar, 201);
    }

    public function update(Request $request, $id_dosen, $id_jadwal)
    {
        $pengajar = Pengajar::where(['id_dosen' => $id_dosen, 'id_jadwal' => $id_jadwal])->first();
        $pengajar->update($request->all());
        return response()->json($pengajar, 200);
    }

    public function destroy($id_dosen, $id_jadwal)
    {
        $pengajar = Pengajar::where(['id_dosen' => $id_dosen, 'id_jadwal' => $id_jadwal])->first();
        $pengajar->delete();
        return response()->json(null, 204);
    }
}
