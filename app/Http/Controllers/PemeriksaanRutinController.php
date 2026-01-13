<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanRutin;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PemeriksaanRutinController extends Controller
{
    //1. Tampilkan semua data
    public function index()
    {
        $pemeriksaans = PemeriksaanRutin::latest()->get();
        return view('pemeriksaanrutin.index', compact('pemeriksaans'));
    }

    //2. Form tambah data
    public function create()
    {
        $barangs = \App\Models\Barang::all();
        return view('pemeriksaanrutin.create', compact('barangs'));
    }

    //3. Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'status' => 'required|string',
            'software_status' => 'nullable|in:Bagus,Tidak',
            'software_keterangan' => 'nullable|string',
        ]);

        $barang = \App\Models\Barang::find($request->barang_id);

        PemeriksaanRutin::create([
            'barang_id' => $request->barang_id,
            'nama_barang' => $barang->nama_barang,
            'kode_barang' => $barang->kode_barang,
            'kategori' => $barang->kategori,
            'lokasi' => $barang->lokasi,
            'status' => $request->status,
            'software_status' => $request->software_status,
            'software_keterangan' => $request->software_keterangan,
            'hardware_status' => $request->hardware_status,
            'hardware_keterangan' => $request->hardware_keterangan,
        ]);

        return redirect()->route('pemeriksaanrutin.index')
                         ->with('success', 'Pemeriksaan rutin berhasil ditambahkan.');
    }

    //4. Form edit data
    public function edit($id)
    {
        $pemeriksaan = PemeriksaanRutin::findOrFail($id);
        return view('pemeriksaanrutin.edit', compact('pemeriksaan'));
    }

    //5. Update data
    public function update(Request $request, $id)
    {
        $pemeriksaan = PemeriksaanRutin::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'lokasi' => 'nullable|string|max:100',
            'status' => 'required|string',
            'software_status' => 'nullable|in:Bagus,Tidak',
            'software_keterangan' => 'nullable|string',
            'hardware_status' => 'nullable|in:Bagus,Tidak',
            'hardware_keterangan' => 'nullable|string',
        ]);

        $pemeriksaan->update($request->all());

        return redirect()->route('pemeriksaanrutin.index')
                         ->with('success', 'Pemeriksaan rutin berhasil diperbarui.');
    }

    //6. Hapus data
    public function destroy($id)
    {
        $pemeriksaan = PemeriksaanRutin::findOrFail($id);
        $pemeriksaan->delete();

        return redirect()->route('pemeriksaanrutin.index')
                         ->with('success', 'Pemeriksaan rutin berhasil dihapus.');
    }

    //7. Export PDF
    public function exportPDF()
    {
        $pemeriksaans = PemeriksaanRutin::with('barang')->get();

        $pdf = PDF::loadView('pemeriksaanrutin.pdf', compact('pemeriksaans'));

        return $pdf->download('daftar_pemeriksaan_rutin.pdf');
    }
}
