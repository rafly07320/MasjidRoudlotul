<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shodaqoh;
use Illuminate\Http\Request;

class ShodaqohController extends Controller
{
    public function index()
    {
        $shodaqohs = shodaqoh::orderBy('created_at', 'desc')->get();
        $total_shodaqohs = shodaqoh::sum('nominal_shodaqoh');
        return view('admin.shodaqoh.index', compact('shodaqohs','total_shodaqohs'));
    }

    public function store(Request $request)
    {
        try {
            $request->merge([
                'nominal_shodaqoh' => preg_replace('/[^0-9]/', '', $request->nominal_shodaqoh),
            ]);
            // Validate request inputs
            $request->validate([
                'nama_shodaqoh' => 'required|string|max:255',
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
            Shodaqoh::create($data);

            // Redirect on success
            return redirect()->back()->with('success', 'Shodaqoh successfully added!');
        } catch (\Exception $e) {
            // Catch any exceptions and redirect with error message
            return redirect()->back()->with('error', 'Failed to add Shodaqoh. Error: ' . $e->getMessage());
        }
    }

    public function show() {}
}
