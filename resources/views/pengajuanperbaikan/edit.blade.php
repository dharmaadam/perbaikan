@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Pengajuan Perbaikan</h2>

    <!-- Pesan error validasi -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('pengajuanperbaikan.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Pilih Barang -->
        <div class="mb-3">
            <label for="barang_id" class="form-label">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}" {{ $pengajuan->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Pengaju -->
        <div class="mb-3">
            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
            <input type="text" name="nama_pengaju" id="nama_pengaju" class="form-control"
                   value="{{ $pengajuan->nama_pengaju }}" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi_kerusakan" class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" id="deskripsi_kerusakan" class="form-control" rows="3" required>{{ $pengajuan->deskripsi_kerusakan }}</textarea>
        </div>

        @if(auth()->user()->role === 'admin')
        <!-- Pilih Teknisi -->
        <div class="mb-3">
            <label for="technician_id" class="form-label">Pilih Teknisi</label>
            <select name="technician_id" id="technician_id" class="form-control">
                <option value="">-- Pilih Teknisi --</option>
                @foreach($technicians as $technician)
                    <option value="{{ $technician->id }}" {{ $pengajuan->technician_id == $technician->id ? 'selected' : '' }}>
                        {{ $technician->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        <!-- Departemen (auto-filled from user) -->
        <div class="mb-3">
            <label for="departemen" class="form-label">Departemen</label>
            <input type="text" name="departemen" id="departemen" class="form-control"
                   value="{{ $pengajuan->departemen }}" readonly>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Menunggu" {{ $pengajuan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diproses" {{ $pengajuan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ $pengajuan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengajuanperbaikan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
