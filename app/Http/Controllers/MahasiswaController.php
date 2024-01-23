<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json($mahasiswas);
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa);
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json($mahasiswa, 200);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(null, 204);
    }
}
