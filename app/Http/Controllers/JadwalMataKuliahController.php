<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMataKuliah;

class JadwalMataKuliahController extends Controller
{
    public function index()
    {
        $jadwalMataKuliahs = JadwalMataKuliah::all();
        return response()->json($jadwalMataKuliahs);
    }

    public function show($id)
    {
        $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
        return response()->json($jadwalMataKuliah);
    }

    public function store(Request $request)
    {
        $jadwalMataKuliah = JadwalMataKuliah::create($request->all());
        return response()->json($jadwalMataKuliah, 201);
    }

    public function update(Request $request, $id)
    {
        $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
        $jadwalMataKuliah->update($request->all());
        return response()->json($jadwalMataKuliah, 200);
    }

    public function destroy($id)
    {
        $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
        $jadwalMataKuliah->delete();
        return response()->json(null, 204);
    }
}
