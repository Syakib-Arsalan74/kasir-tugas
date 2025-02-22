<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    function viewDashboard()
    {
        return view('kasirPanel.dashboard');
    }

    function viewPenjualan()
    {
        return view('kasirPanel.penjualan');
    }

    function viewPengguna()
    {
        return view('kasirPanel.pengguna');
    }

    function viewPelanggan()
    {
        return view('kasirPanel.pelanggan');
    }

    function viewProduct()
    {
        return view('kasirPanel.product');
    }
}
