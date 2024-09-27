<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\kas_masjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kas_masjid = kas_masjid::with('user')->get();
        return view('admin.kas_masjid.index', compact('kas_masjid'));
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
    // KasMasjidController.php

    // KasMasjidController.php

    public function store(Request $request)
    {
        // Pastikan user sudah login
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->with('error', 'Anda harus login untuk menambahkan data.');
        }

        // Validasi input
        $request->validate([
            'tanggal_kas' => 'required|date',
            'jenis_kas' => 'required|in:masuk,keluar', // Validasi enum
            'jumlah_kas' => 'required|numeric|min:1|max:9999999999',
            'deskripsi_kas' => 'nullable|string|max:65535', // Maksimal panjang untuk text
        ]);

        try {
            // Ambil semua data request dan tambahkan id_user
            $data = $request->only(['tanggal_kas', 'jenis_kas', 'jumlah_kas', 'deskripsi_kas']);
            $data['id_user'] = $userId;

            // Ambil saldo akhir terakhir dari database
            $lastKasMasjid = kas_masjid::where('id_user', $userId)->orderBy('tanggal_kas', 'desc')->first();
            $currentSaldo = $lastKasMasjid ? $lastKasMasjid->saldo_akhir : 0;

            // Hitung saldo akhir baru
            if ($request->jenis_kas === 'masuk') {
                $data['saldo_akhir'] = $currentSaldo + $request->jumlah_kas;
            } else {
                $data['saldo_akhir'] = $currentSaldo - $request->jumlah_kas;
            }

            // Simpan data ke database
            kas_masjid::create($data); // Perbaiki pemanggilan model

            // Redirect jika berhasil
            return redirect()->route('kas.index')->with('success', 'Kas masjid berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Jika ada error, tampilkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
