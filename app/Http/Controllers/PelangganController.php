<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasirPanel.pelanggan', ['pelanggans' => Pelanggan::search()->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPelanggan(Request $request)
    {
        $data = $request->validate([
            'namaPelanggan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'noTelp' => 'required|max:15',
        ]);
        Pelanggan::create($data);
        return redirect()->route('pelanggan')->with('status', 'Data Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelangganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPelanggan(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePelanggan(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPelanggan(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan')->with('status', 'Data Pelanggan Berhasil Dihapus');
    }
}
