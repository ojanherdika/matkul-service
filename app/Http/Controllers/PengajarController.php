<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use App\Models\Pengajar;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajars = Pengajar::with('dosen', 'jadwalMataKuliah.mataKuliah')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $pengajars
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        try {
            $pengajar = Pengajar::with('dosen', 'jadwalMataKuliah.mataKuliah')->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Data retrieved successfully',
                'data' => $pengajar
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
                'id_dosen' => 'required|exists:dosen,id_dosen',
                'id_jadwal' => 'required|exists:jadwalmatakuliah,id_jadwal',
            ]);

            $pengajar = Pengajar::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data created successfully',
                'data' => $pengajar
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
                'id_dosen' => 'required|exists:dosen,id_dosen',
                'id_jadwal' => 'required|exists:jadwalmatakuliah,id_jadwal',
            ]);

            $pengajar = Pengajar::findOrFail($id);
            $pengajar->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data updated successfully',
                'data' => $pengajar
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
            $pengajar = Pengajar::findOrFail($id);
            $pengajar->delete();
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
