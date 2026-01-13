@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary m-0">
            <i class="fas fa-box-open me-2"></i> Daftar Barang
        </h3>
        <div>
            <a href="{{ route('barang.export') }}" class="btn btn-primary shadow-sm px-4 me-2">
                <i class="fas fa-file-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('barang.create') }}" class="btn btn-success shadow-sm px-4">
                <i class="fas fa-plus-circle me-2"></i> Tambah Barang
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" style="width: 60px;">ID</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th class="text-center" style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $index => $barang)
                        <tr>
                            <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->kode_barang }}</td>
                            <td>{{ $barang->kategori }}</td>
                            <td>{{ $barang->lokasi }}</td>
                            <td class="text-center">
                                <a href="{{ route('barang.edit', $barang->id) }}" 
                                   class="btn btn-warning btn-sm shadow-sm me-1">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle me-1"></i> Belum ada data barang
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
