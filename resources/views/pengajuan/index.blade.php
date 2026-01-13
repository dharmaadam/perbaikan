@extends('layouts.app') <!-- kalau kamu punya layout utama -->
@section('content')

<div class="container mt-4">
    <h2>Daftar Pengajuan Perbaikan Barang</h2>

    <!-- Tampilkan pesan sukses kalau ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol tambah data -->
    <a href="{{ route('pengajuanperbaikan.create') }}" class="btn btn-primary mb-3">
        + Tambah Pengajuan
    </a>

    <!-- Tabel daftar pengajuan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Nama Pengaju</th>
                <th>Deskripsi Kerusakan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengajuans as $pengajuan)
                <tr>
                    <td>{{ $pengajuan->id }}</td>
                    <td>{{ $pengajuan->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $pengajuan->nama_pengaju }}</td>
                    <td>{{ $pengajuan->deskripsi_kerusakan }}</td>
                    <td>{{ $pengajuan->status }}</td>
                    <td>
                        <a href="{{ route('pengajuanperbaikan.edit', $pengajuan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengajuanperbaikan.destroy', $pengajuan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada pengajuan perbaikan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
