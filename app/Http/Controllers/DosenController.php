<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return response()->json($dosens);
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return response()->json($dosen);
    }

    public function store(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen, 200);
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return response()->json(null, 204);
    }
}
