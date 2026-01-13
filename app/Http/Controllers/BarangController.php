<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BarangController extends Controller
{
    // 1. Tampilkan semua barang
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('barang.index', compact('barangs'));
    }

    //2. Form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    //3. Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|max:50|unique:barangs',
            'kategori'    => 'required|string|max:50',
            'lokasi'      => 'nullable|string|max:100',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil ditambahkan.');
    }

    //4. Form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    //5. Update barang
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang,' . $barang->id,
            'kategori'    => 'required|string|max:50',
            'lokasi'      => 'nullable|string|max:100',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil diperbarui.');
    }

    //6. Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')
                         ->with('success', 'Barang berhasil dihapus.');
    }
}
