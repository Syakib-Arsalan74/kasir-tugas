<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    function index(Request $request)
    {
        return view('pengguna');
    }
}
