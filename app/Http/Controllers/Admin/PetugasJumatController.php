<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\petugas_jumat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PetugasJumatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumat = petugas_jumat::orderBy('created_at', 'desc')->get();
        return view('admin/jumat/index', compact('jumat'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_imam' => 'required|string',
            'tgl_petugas' => 'required|date',
            'nama_khotib' => 'required|string',
            'nama_badal' => 'required|string',
            'nama_muadzin' => 'required|string',
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::id();

        petugas_jumat::create($data);

        return redirect()->route('jumat.index')->with('success', 'Petugas Jumat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_imam' => 'required|string',
            'tgl_petugas' => 'required|date',
            'nama_khotib' => 'required|string',
            'nama_badal' => 'required|string',
            'nama_muadzin' => 'required|string',
        ]);

        $petugas_jumat = petugas_jumat::findOrFail($id);
        $data = $request->all();
        $data['id_user'] = Auth::id();
        $petugas_jumat->update($data);
        return redirect()->route('jumat.index')->with('success', 'Petugas Jumat berhasil update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas_jumat = petugas_jumat::findOrFail($id);
        $petugas_jumat->delete();
        return redirect()->route('jumat.index')->with('success', 'Petugas Jumat berhasil');
    }
}
