@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pemeriksaan Rutin</h2>

    <!-- Tampilkan pesan sukses kalau ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <div class="mb-3">
        <a href="{{ route('pemeriksaanrutin.create') }}" class="btn btn-primary">Tambah Pemeriksaan Rutin</a>
        <a href="{{ route('pemeriksaanrutin.export') }}" class="btn btn-success">Export PDF</a>
    </div>

    <!-- Tabel -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemeriksaans as $index => $pemeriksaan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pemeriksaan->nama_barang }}</td>
                <td>{{ $pemeriksaan->lokasi }}</td>
                <td>{{ $pemeriksaan->status }}</td>
                <td>
                    <a href="{{ route('pemeriksaanrutin.edit', $pemeriksaan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemeriksaanrutin.destroy', $pemeriksaan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data pemeriksaan rutin.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
