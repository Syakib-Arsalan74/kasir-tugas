<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        return view('kasirPanel.dashboard', ['pelanggan' => Pelanggan::count(), 'produk' => Product::count(), 'total' => Penjualan::count()]);
    }
}
