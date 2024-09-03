<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = kegiatan::with('user')->latest()->take(2)->get();
        $artikels = Artikel::with('user')->latest()->take(2)->get();
        return view('welcome', compact('kegiatans', 'artikels'));
    }

    public function getArtikel(){
        $artikels = Artikel::with('user')->latest()->get();
        return view('artikel', compact('artikels'));
    }

    public function getKegiatan(){
        $kegiatans = kegiatan::with('user')->latest()->get();
        return view('kegiatan', compact('kegiatans'));
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
