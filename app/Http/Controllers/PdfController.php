<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Dompdf\facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF () {
        $data = [];
        $pdf = PDF::loadView('createPdf', $data);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('Data-Penjualan.pdf');
    }
}
