<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kasirPanel.product', ['products' => Product::search()->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProduk(Request $request)
    {
        // Validasi
        $data = $request->validate([
            'namaProduk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambarProduk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = time() . '_' . $request->gambarProduk->getClientOriginalName();

        $path = $request->file('gambarProduk')->storeAs('imgs', $fileName);

        $product = new Product();
        $product->gambarProduk = $path;
        $product->harga = $data['harga'];
        $product->stok = $data['stok'];
        $product->namaProduk = $data['namaProduk'];
        $product->save();

        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProduk(Product $product)
    {
        $data = Product::where('id', $product->id)->first();
        return view('kasirPanel.editProduct', ['produk' => $data,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProduk(Request $request, $product)
    {
        $data = Product::where('id', $product)->firstOrFail();
        $valideData = $request->validate([
            'namaProduk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);
        $data->update($valideData);
        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyProduk(Product $product)
    {
        $product->delete();
        return redirect()->route('product')->with('status', 'Produk berhasil dihapus');
    }
}
