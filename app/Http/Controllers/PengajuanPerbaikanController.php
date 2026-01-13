<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPerbaikan;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanPerbaikanController extends Controller
{
    //1. Tampilkan semua data
    public function index()
    {
        $query = PengajuanPerbaikan::with('barang', 'technician');
        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }
        $pengajuans = $query->latest()->get();
        return view('pengajuanperbaikan.index', compact('pengajuans'));
    }

    //2. Form tambah data
    public function create()
    {
        $barangs = Barang::all();
        $technicians = User::where('role', 'teknisi')->get();
        return view('pengajuanperbaikan.create', compact('barangs', 'technicians'));
    }

    //3. Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_pengaju' => 'required|string|max:100',
            'deskripsi_kerusakan' => 'required|string',
        ]);

        PengajuanPerbaikan::create([
            'user_id' => Auth::id(),
            'barang_id' => $request->barang_id,
            'nama_pengaju' => $request->nama_pengaju,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'technician_id' => $request->technician_id,
            'status' => 'Menunggu',
            'departemen' => Auth::user()->departemen,
        ]);

    

        return redirect()->route('pengajuanperbaikan.index')
                         ->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    //4. Form edit data
    public function edit($id)
    {
        $pengajuan = PengajuanPerbaikan::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $pengajuan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $barangs = Barang::all();
        $technicians = User::where('role', 'teknisi')->get();
        return view('pengajuanperbaikan.edit', compact('pengajuan', 'barangs', 'technicians'));
    }

    //5. Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_pengaju' => 'required|string|max:100',
            'deskripsi_kerusakan' => 'required|string',
            'status' => 'required|string',
        ]);

        $pengajuan = PengajuanPerbaikan::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $pengajuan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $pengajuan->update([
            'barang_id' => $request->barang_id,
            'nama_pengaju' => $request->nama_pengaju,
            'deskripsi_kerusakan' => $request->deskripsi_kerusakan,
            'technician_id' => $request->technician_id,
            'status' => $request->status,
            'departemen' => $pengajuan->departemen, // Keep original department
        ]);

        return redirect()->route('pengajuanperbaikan.index')
                         ->with('success', 'Pengajuan berhasil diperbarui.');
    }

    //6. Hapus data
    public function destroy($id)
    {
        $pengajuan = PengajuanPerbaikan::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $pengajuan->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $pengajuan->delete();

        return redirect()->route('pengajuanperbaikan.index')
                         ->with('success', 'Pengajuan berhasil dihapus.');
    }

    //7. Export PDF
    public function exportPDF()
    {
        $query = PengajuanPerbaikan::with('barang', 'technician');
        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }
        $pengajuans = $query->latest()->get();
        $pdf = Pdf::loadView('pengajuanperbaikan.pdf', compact('pengajuans'));
        return $pdf->download('pengajuan_perbaikan.pdf');
    }
}
