<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPerbaikan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class LaporanController extends Controller
{
    // Tampilkan daftar laporan
    public function index(Request $request)
    {
        $query = PengajuanPerbaikan::with('barang');

        // Filter berdasarkan tanggal jika ada
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $laporan = $query->latest()->get();

        // Kirim data ke view
        return view('laporan.index', compact('laporan'));
    }

    // Export ke PDF
    public function export(Request $request)
    {
        $query = PengajuanPerbaikan::with('barang');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = Carbon::parse($request->start_date)->startOfDay();
            $endDate = Carbon::parse($request->end_date)->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $laporan = $query->latest()->get();

        $pdf = PDF::loadView('laporan.pdf', compact('laporan', 'request'));

        $fileName = 'laporan_pengajuan_perbaikan_' . now()->format('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($fileName);
    }
}
