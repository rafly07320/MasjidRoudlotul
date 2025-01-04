<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zakat;
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
        $total_zakat = Zakat::sum('total_zakat');
        $total_jiwa = Zakat::sum('jumlah_jiwa');
        return view('admin.zakat.index', compact('zakats','total_zakat','total_jiwa'));
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
        try {
            $request->validate([
                'tgl_zakat' => 'required|date',
                'kepala_keluarga' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'jumlah_jiwa' => 'required|integer',
                'total_zakat' => 'required|numeric',
            ]);


            Zakat::create($request->all());
            return redirect()->back()->with('success', 'Data zakat berhasil disimpan.');
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
