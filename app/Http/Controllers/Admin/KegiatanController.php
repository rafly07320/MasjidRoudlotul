<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = kegiatan::with('user')->get();
        return view('admin.kegiatan.index', compact('kegiatans'));
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
            'judul_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required|string',
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::id();

        if ($request->hasFile('foto_kegiatan')) {
            $file = $request->file('foto_kegiatan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_kegiatans', $filename);
            $data['foto_kegiatan'] = $filename;
        }

        kegiatan::create($data);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $judul_kegiatan)
    {
        // Format judul_kegiatan untuk mencocokkan dengan judul di database
        $formattedTitle = str_replace('-', ' ', $judul_kegiatan);

        // Cari kegiatan berdasarkan judul yang diformat
        $kegiatan = Kegiatan::where('judul_kegiatan', $formattedTitle)->firstOrFail();

        $title = $kegiatan->judul_kegiatan;
        $otherKegiatans = Kegiatan::where('id', '!=', $kegiatan->id)->latest()->take(5)->get();

        return view('admin.kegiatan.show', compact('kegiatan', 'title', 'otherKegiatans'));
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
            'judul_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'waktu_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required|string',
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kegiatan = kegiatan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto_kegiatan')) {
            $file = $request->file('foto_kegiatan');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_kegiatans', $filename);
            $data['foto_kegiatan'] = $filename;
        }

        $kegiatan->update($data);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = kegiatan::findOrFail($id);

        if ($kegiatan->foto_kegiatan) {
            Storage::delete('public/foto_kegiatans/' . $kegiatan->foto_kegiatan);
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
