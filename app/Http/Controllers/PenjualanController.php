<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use Symfony\Component\HttpFoundation\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasirPanel.penjualan', ['penjualan' => Penjualan::all(), 'pelanggans' => Pelanggan::all(), 'user' => Auth::user()->username, 'produks' => Product::all()]);
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
    public function store(StorePenjualanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPenjualan(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePenjualan(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPenjualan(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan')->with('success', 'Penjualan berhasil dihapus');
    }
}
