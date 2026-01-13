@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Pemeriksaan Rutin</h2>

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
    <form action="{{ route('pemeriksaanrutin.update', $pemeriksaan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang', $pemeriksaan->nama_barang) }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $pemeriksaan->lokasi) }}">
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Software</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="software_status" id="software_bagus" value="Bagus" {{ old('software_status', $pemeriksaan->software_status) == 'Bagus' ? 'checked' : '' }}>
                        <label class="form-check-label" for="software_bagus">Bagus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="software_status" id="software_tidak" value="Tidak" {{ old('software_status', $pemeriksaan->software_status) == 'Tidak' ? 'checked' : '' }}>
                        <label class="form-check-label" for="software_tidak">Tidak</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="software_keterangan" class="form-label">Penjelasan</label>
                    <textarea name="software_keterangan" id="software_keterangan" class="form-control" rows="3">{{ old('software_keterangan', $pemeriksaan->software_keterangan) }}</textarea>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Hardware</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hardware_status" id="hardware_bagus" value="Bagus" {{ old('hardware_status', $pemeriksaan->hardware_status) == 'Bagus' ? 'checked' : '' }}>
                        <label class="form-check-label" for="hardware_bagus">Bagus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hardware_status" id="hardware_tidak" value="Tidak" {{ old('hardware_status', $pemeriksaan->hardware_status) == 'Tidak' ? 'checked' : '' }}>
                        <label class="form-check-label" for="hardware_tidak">Tidak</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="hardware_keterangan" class="form-label">Penjelasan</label>
                    <textarea name="hardware_keterangan" id="hardware_keterangan" class="form-control" rows="3">{{ old('hardware_keterangan', $pemeriksaan->hardware_keterangan) }}</textarea>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Baik" {{ old('status', $pemeriksaan->status) == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ old('status', $pemeriksaan->status) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                <option value="Perlu Perbaikan" {{ old('status', $pemeriksaan->status) == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pemeriksaanrutin.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
