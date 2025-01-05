<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Artikel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'tanggal_artikel' => 'required|date',
            'deskripsi_artikel' => 'required|string',
            'foto_artikel' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::id();

        if ($request->hasFile('foto_artikel')) {
            $file = $request->file('foto_artikel');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Simpan file di folder storage/app/public/foto_artikels
            $file->storeAs('public/foto_artikels', $filename);
            // Simpan nama file di database
            $data['foto_artikel'] = $filename;
        }

        Artikel::create($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(string $judul_artikel)
    {
        $formattedTitle = str_replace('-', ' ', $judul_artikel);
        $artikel = Artikel::where('judul_artikel', $formattedTitle)->firstOrFail();
        $title = $artikel->judul_artikel;
        $otherArtikels = Artikel::where('id', '!=', $artikel->id)->latest()->take(5)->get();
        return view('admin.artikel.show', compact('artikel', 'title', 'otherArtikels'));
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
            'judul_artikel' => 'required|string|max:255',
            'tanggal_artikel' => 'required|date',
            'deskripsi_artikel' => 'required|string',
            'foto_artikel' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto_artikel')) {
            // Delete the old photo if it exists
            if ($artikel->foto_artikel) {
                Storage::delete('public/foto_artikels/' . $artikel->foto_artikel);
            }

            // Store the new photo
            $file = $request->file('foto_artikel');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto_artikels', $filename);
            $data['foto_artikel'] = $filename;
        } else {
            // If no new photo is uploaded, keep the existing photo
            $data['foto_artikel'] = $artikel->foto_artikel;
        }

        // Update the article with new data
        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Delete the photo
        if ($artikel->foto_artikel) {
            Storage::delete('public/foto_artikels/' . $artikel->foto_artikel);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
