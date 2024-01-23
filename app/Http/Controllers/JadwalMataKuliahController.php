<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\JadwalMataKuliah;

class JadwalMataKuliahController extends Controller
{
    public function index()
    {
        $jadwalMataKuliahs = JadwalMataKuliah::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $jadwalMataKuliahs
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        try {
            $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $jadwalMataKuliah
            ], Response::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        try {
            $jadwalMataKuliah = JadwalMataKuliah::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data created successfully',
                'data' => $jadwalMataKuliah
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create data',
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
            $jadwalMataKuliah->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data updated successfully',
                'data' => $jadwalMataKuliah
            ], Response::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update data',
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $jadwalMataKuliah = JadwalMataKuliah::findOrFail($id);
            $jadwalMataKuliah->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data deleted successfully',
                'data' => null
            ], Response::HTTP_NO_CONTENT);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
                'data' => null
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete data',
                'data' => null
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
