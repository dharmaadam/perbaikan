@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h2>Edit Pengajuan Perbaikan</h2>

    <!-- Tampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('pengajuanperbaikan.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" 
                        {{ $barang->id == $pengajuan->barang_id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
            <input type="text" name="nama_pengaju" id="nama_pengaju" 
                   class="form-control" value="{{ $pengajuan->nama_pengaju }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_kerusakan" class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" id="deskripsi_kerusakan" class="form-control" rows="3" required>{{ $pengajuan->deskripsi_kerusakan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Menunggu" {{ $pengajuan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diproses" {{ $pengajuan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ $pengajuan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengajuanperbaikan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection
