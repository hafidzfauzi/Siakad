<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Mahasiswa::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:mahasiswas'
        ]);

        $mahasiswa = Mahasiswa::create($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Mahasiswa created successfully.',
            'data' => $mahasiswa
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return response()->json([
            'status' => true,
            'data' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id
        ]);

        $mahasiswa->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Mahasiswa updated successfully.',
            'data' => $mahasiswa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Mahasiswa deleted successfully.'
        ]);
    }
}
