<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zakat;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;


class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakats = Zakat::orderBy('created_at', 'desc')->get();
        $total_jumlah_zakat = Zakat::sum('jumlah_zakat');
        $total_jiwa = Zakat::get()->count();
        $total_uang = Zakat::sum('harga_per_zakat');
        return view('admin.zakat.index', compact('zakats','total_jumlah_zakat','total_jiwa','total_uang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.zakat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'total_zakat' => 'required|numeric|min:1',
                'harga_per_zakat' => 'nullable|numeric|min:0',
                'harga_total' => 'nullable|numeric|min:0',
                'jenis_zakat' => 'required|in:bawa_sendiri,beli_dari_masjid',
                'nama' => 'required|array|min:1',
                'nama.*' => 'required|string',
                'alamat' => 'required|array|min:1',
                'alamat.*' => 'required|string',
            ]);

            $totalZakat = $request->total_zakat;
            $jumlahMuzakki = count($request->nama);
            $zakatPerOrang = $totalZakat / max($jumlahMuzakki, 1);

            // Jika beli dari masjid, hitung total harga
            $hargaPerZakat = $request->jenis_zakat === 'beli_dari_masjid' ? 50000 : null;
            $hargaTotal = $hargaPerZakat ? $jumlahMuzakki * $hargaPerZakat : null;
            foreach ($request->nama as $index => $nama) {
                Zakat::create([
                    'tgl_zakat' => now(),
                    'nama' => $nama,
                    'alamat' => $request->alamat[$index] ?? 'Alamat tidak diketahui',
                    'jumlah_zakat' => $zakatPerOrang,
                    'jenis_zakat' => $request->jenis_zakat,
                    'harga_per_zakat' => $hargaPerZakat,
                    'harga_total' => $hargaTotal,
                ]);
            }

            return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil disimpan.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi: ' . $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'tgl_zakat' => 'required|date',
                'kepala_keluarga' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'jumlah_jiwa' => 'required|integer',
                'total_zakat' => 'required|numeric',
            ]);

            $zakat = Zakat::findOrFail($id);
            $zakat->update($request->all());

            return redirect()->back()->with('success', 'Data zakat berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi: ' . $e->getMessage()]);
        }
    }

    public function exportPdf()
    {
        $zakats = Zakat::all();
        $total_jumlah_zakat = Zakat::sum('jumlah_zakat');
        $total_jiwa = Zakat::get()->count();
        $total_uang = Zakat::sum('harga_per_zakat');

        $pdf = PDF::loadView('admin.zakat.pdf', compact('zakats','total_jumlah_zakat','total_jiwa','total_uang'))
        ->setPaper('F4', 'potrait');

        return $pdf->stream('laporan_zakat.pdf');
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zakat = Zakat::findOrFail($id);
        $zakat->delete();

        return redirect()->back()->with('success', 'Data zakat berhasil dihapus.');
    }
}
