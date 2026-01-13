@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"> Daftar Pengajuan Perbaikan Barang</h2>
        <div>
            <a href="{{ route('pengajuanperbaikan.export') }}" class="btn btn-success shadow-sm me-2">
                <i class="fas fa-file-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('pengajuanperbaikan.create') }}" class="btn btn-primary shadow-sm">
                + Tambah Pengajuan
            </a>
        </div>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width:5%">ID</th>
                        <th style="width:15%">Nama Barang</th>
                        <th style="width:12%">Nama Pengaju</th>
                        <th style="width:8%">Departemen</th>
                        <th style="width:15%">Teknisi</th>
                        <th style="width:15%">Deskripsi Kerusakan</th>
                        <th style="width:8%">Status</th>
                        <th style="width:22%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuans as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->id }}</td>
                            <td>{{ $pengajuan->barang->nama_barang ?? '-' }}</td>
                            <td>{{ $pengajuan->nama_pengaju }}</td>
                            <td>{{ $pengajuan->departemen ?? '-' }}</td>
                            <td>{{ $pengajuan->technician->name ?? '-' }}</td>
                            <td>{{ $pengajuan->deskripsi_kerusakan }}</td>
                            <td>
                                @if($pengajuan->status === 'Menunggu')
                                    <span class="badge bg-warning text-dark">{{ $pengajuan->status }}</span>
                                @elseif($pengajuan->status === 'Diproses')
                                    <span class="badge bg-info text-dark">{{ $pengajuan->status }}</span>
                                @elseif($pengajuan->status === 'Selesai')
                                    <span class="badge bg-success">{{ $pengajuan->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $pengajuan->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('pengajuanperbaikan.edit', $pengajuan->id) }}"
                                   class="btn btn-sm btn-outline-warning me-1">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('pengajuanperbaikan.destroy', $pengajuan->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">🗑 Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Belum ada pengajuan perbaikan 🙏
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
