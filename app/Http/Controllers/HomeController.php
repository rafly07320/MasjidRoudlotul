<?php

namespace App\Http\Controllers;

use App\Mail\ShodaqohFeedback;
use App\Models\Artikel;
use App\Models\kegiatan;
use App\Models\petugas_jumat;
use App\Models\shodaqoh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = kegiatan::with('user')->latest()->take(2)->get();
        $artikels = Artikel::with('user')->latest()->take(2)->get();
        $petugas_jumats = petugas_jumat::with('user')->get();
        return view('welcome', compact('kegiatans', 'artikels', 'petugas_jumats'));
    }

    public function getArtikel(){
        $artikels = Artikel::with('user')->latest()->get();
        return view('artikel', compact('artikels'));
    }

    public function getKegiatan(){
        $kegiatans = kegiatan::with('user')->latest()->get();
        return view('kegiatan', compact('kegiatans'));
    }

    public function getShodaqoh(){
        session()->all();
        return view('shodaqoh');
    }

    public function getKontak(){
        return view('kontak');
    }

    public function storeShodaqoh(Request $request)
    {
        try {
            $request->merge([
                'nominal_shodaqoh' => preg_replace('/[^0-9]/', '', $request->nominal_shodaqoh),
            ]);
            // Validate request inputs
            $request->validate([
                'nama_shodaqoh' => 'required|string|max:255',
                'email_shodaqoh' => 'required|email',
                'tanggal_shodaqoh' => 'required|date',
                'nominal_shodaqoh' => 'required|numeric|min:1|max:9999999999',
                'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validate image
            ]);


            $data = $request->all();

            // Handle file upload
            if ($request->hasFile('bukti_transfer')) {
                $file = $request->file('bukti_transfer');
                $path = $file->store('shodaqoh_bukti_transfer', 'public'); // store in 'storage/app/public/shodaqoh_bukti_transfer'
                $data['bukti_transfer'] = $path;
            }

            // Create new shodaqoh entry
            $shodaqoh = shodaqoh::create($data);

            Mail::to($request->email_shodaqoh)->send(new ShodaqohFeedback($shodaqoh));

            
            return redirect()->route('home.shodaqoh')->with('success', 'Shodaqoh successfully added!');
        } catch (\Exception $e) {
            // Catch any exceptions and redirect with error message
            return redirect()->route('home.shodaqoh')->with('error', 'Failed to add Shodaqoh. Error: ' . $e->getMessage());
        }
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
