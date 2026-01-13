@extends('layouts.app') <!-- kalau kamu punya layout utama -->
@section('content')

<div class="container mt-4">
    <h2>Form Pengajuan Perbaikan Barang</h2>

    <!-- Tampilkan pesan sukses kalau ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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

    <!-- Form -->
    <form action="{{ route('pengajuanperbaikan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
            <input type="text" name="nama_pengaju" id="nama_pengaju" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_kerusakan" class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" id="deskripsi_kerusakan" class="form-control" rows="3" required></textarea>
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="mb-3">
            <label for="technician_id" class="form-label">Pilih Teknisi</label>
            <select name="technician_id" id="technician_id" class="form-control">
                <option value="">-- Pilih Teknisi --</option>
                @foreach($technicians as $technician)
                    <option value="{{ $technician->id }}">{{ $technician->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <!-- Departemen (auto-filled from user) -->
        <div class="mb-3">
            <label for="departemen" class="form-label">Departemen</label>
            <input type="text" name="departemen" id="departemen" class="form-control"
                   value="{{ auth()->user()->departemen }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
        <a href="{{ route('pengajuanperbaikan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection
