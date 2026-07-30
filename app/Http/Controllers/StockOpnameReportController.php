<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockOpname;
use Barryvdh\DomPDF\Facade\Pdf;

class StockOpnameReportController extends Controller
{
    public function report(Request $request)
    {
        $tanggal = $request->tanggal;

        $stockOpnames = StockOpname::with([
            'barang',
            'bagian',
        ])
        ->whereDate('created_at', $tanggal)
        ->get();

        $pdf = Pdf::loadView(
            'pdf.stock-opname',
            compact(
                'stockOpnames',
                'tanggal'
            )
        );

        return $pdf->stream(
            "stock-opname-$tanggal.pdf"
        );
    }
}
