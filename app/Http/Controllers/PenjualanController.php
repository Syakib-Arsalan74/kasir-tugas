<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePenjualanRequest;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasirPanel.penjualan', ['penjualan' => Penjualan::all(), 'pelanggans' => Pelanggan::all(), 'user' => Auth::user(), 'produks' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPenjualan()
    {
        return view('kasirPanel.tambahPenjualan',  ['penjualan' => Penjualan::all(), 'pelanggans' => Pelanggan::all(), 'user' => Auth::user(), 'produks' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'user_id' => 'required|exists:users,id',
            'totalHarga' => 'required',
            // 'produk' => 'required|array',
            // 'produk.*.id' => 'required|exists:products,id',
            // 'produk.*.jumlah' => 'required|integer|min:1',
            // 'produk.*.subtotal' => 'required|numeric',
        ]);

        $penjualan = Penjualan::create([
            'totalHarga' => $request->totalHarga,
            'pelanggan_id' => $request->pelanggan_id,
            'user_id' => $request->user_id,
        ]);

        // foreach ($request->produk as $item) {
        //     DetailPenjualan::create([
        //         'penjualan_id' => $penjualan->id,
        //         'product_id' => $item['id'],
        //         'jumlah' => $item['jumlah'],
        //         'subtotal' => $item['subtotal'],
        //     ]);
        // }

        return redirect()->back()->with('status', 'Transaksi berhasil disimpan!');
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
