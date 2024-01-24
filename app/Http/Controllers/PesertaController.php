<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::with('mahasiswa', 'jadwalMataKuliah.mataKuliah')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $pesertas
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        try {
            $peserta = Peserta::with('mahasiswa', 'jadwalMataKuliah.mataKuliah')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $peserta
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
            $this->validate($request, [
                'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
                'id_jadwal' => 'required|exists:jadwalmatakuliah,id_jadwal',
            ]);

            $peserta = Peserta::create($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Data created successfully',
                'data' => $peserta
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'data' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
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
            $this->validate($request, [
                'id_mahasiswa' => 'required|exists:mahasiswa,id_mahasiswa',
                'id_jadwal' => 'required|exists:jadwalmatakuliah,id_jadwal',
            ]);
            $peserta = Peserta::findOrFail($id);
            $peserta->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data updated successfully',
                'data' => $peserta
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'data' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
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
            $peserta = Peserta::findOrFail($id);
            $peserta->delete();
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
