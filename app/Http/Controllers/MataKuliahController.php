<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return response()->json($mataKuliahs);
    }

    public function show($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        return response()->json($mataKuliah);
    }

    public function store(Request $request)
    {
        $mataKuliah = MataKuliah::create($request->all());
        return response()->json($mataKuliah, 201);
    }

    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->update($request->all());
        return response()->json($mataKuliah, 200);
    }

    public function destroy($id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $mataKuliah->delete();
        return response()->json(null, 204);
    }
}
