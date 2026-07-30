<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterStock;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanStockController extends Controller
{
    public function pdf(Request $request)
    {
        $query = MasterStock::with(['barang','bagian']);

        if ($request->filled('bagian_id')) {
            $query->where('bagian_id', $request->bagian_id);
        }

        if ($request->filled('barang_id')) {
            $query->where('barang_id', $request->barang_id);
        }

        if ($request->filled('tanggal_awal')) {
            $query->whereDate('updated_at', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('updated_at', '<=', $request->tanggal_akhir);
        }

        $stocks = $query->get();

        $pdf = Pdf::loadView('pdf.laporan-stock', compact('stocks'));

        return $pdf->download('laporan-stock.pdf');
    }
}
