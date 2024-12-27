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
        try {
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

            // Ambil data request dan tambahkan id_user
            $data = $request->only(['tanggal_kas', 'jenis_kas', 'jumlah_kas', 'deskripsi_kas']);
            $data['id_user'] = $userId;

            // Ambil saldo akhir terakhir dari database
            $lastKasMasjid = kas_masjid::where('id_user', $userId)->orderBy('tanggal_kas', 'desc')->first();
            $currentSaldo = $lastKasMasjid ? $lastKasMasjid->saldo_akhir : 0;

            // Hitung saldo akhir baru
            $data['saldo_akhir'] = $request->jenis_kas === 'masuk'
                ? $currentSaldo + $request->jumlah_kas
                : $currentSaldo - $request->jumlah_kas;

            // Simpan data ke database
            kas_masjid::create($data);

            // Redirect jika berhasil
            return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Tangkap error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
        try {
            // Pastikan user sudah login
            $userId = Auth::id();
            if (!$userId) {
                return redirect()->back()->with('error', 'Anda harus login untuk mengubah data.');
            }

            // Validasi input
            $request->validate([
                'tanggal_kas' => 'required|date',
                'jenis_kas' => 'required|in:masuk,keluar', // Validasi enum
                'jumlah_kas' => 'required|numeric|min:1|max:9999999999',
                'deskripsi_kas' => 'nullable|string|max:65535', // Maksimal panjang untuk text
            ]);

            // Cari data kas berdasarkan ID
            $kasMasjid = kas_masjid::findOrFail($id);

            // Ambil saldo akhir terakhir dari database, kecuali data yang sedang diubah
            $lastKasMasjid = kas_masjid::where('id_user', $userId)
                ->where('id', '!=', $id)
                ->orderBy('tanggal_kas', 'desc')
                ->first();

            $currentSaldo = $lastKasMasjid ? $lastKasMasjid->saldo_akhir : 0;

            // Hitung saldo akhir baru berdasarkan perubahan data
            $newSaldo = $request->jenis_kas === 'masuk'
                ? $currentSaldo + $request->jumlah_kas
                : $currentSaldo - $request->jumlah_kas;

            // Update data kas masjid
            $kasMasjid->update([
                'tanggal_kas' => $request->tanggal_kas,
                'jenis_kas' => $request->jenis_kas,
                'jumlah_kas' => $request->jumlah_kas,
                'deskripsi_kas' => $request->deskripsi_kas,
                'saldo_akhir' => $newSaldo,
            ]);

            // Redirect jika berhasil
            return redirect()->route('kas.index')->with('success', 'Data kas berhasil diubah.');
        } catch (\Exception $e) {
            // Tangkap error
            return redirect()->back()->with('error ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kas = kas_masjid::findOrFail($id);

        $kas->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
