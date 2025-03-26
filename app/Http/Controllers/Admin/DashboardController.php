<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\kas_masjid;
use App\Models\kegiatan;
use App\Models\shodaqoh;
use App\Models\Zakat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saldo_terakhir = kas_masjid::orderBy('created_at', 'desc')->value('saldo_akhir') ?? 0;
        $total_shodaqohs = shodaqoh::sum('nominal_shodaqoh');
        // $total_zakat = Zakat::sum('total_zakat');
        // $total_jiwa = Zakat::sum('jumlah_jiwa');
        $artikels = Artikel::with('user')->orderBy('created_at', 'desc')->take(5)->get();
        $kegiatans = kegiatan::with('user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact('saldo_terakhir', 'total_shodaqohs',  'artikels', 'kegiatans'));



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
        //
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
