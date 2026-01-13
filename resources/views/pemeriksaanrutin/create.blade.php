@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pemeriksaan Rutin</h2>

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
    <form action="{{ route('pemeriksaanrutin.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" data-kode="{{ $barang->kode_barang }}" data-kategori="{{ $barang->kategori }}" data-lokasi="{{ $barang->lokasi }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Barang</label>
            <input type="text" name="kategori" id="kategori" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Software</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="software_status" id="software_bagus" value="Bagus">
                        <label class="form-check-label" for="software_bagus">Bagus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="software_status" id="software_tidak" value="Tidak">
                        <label class="form-check-label" for="software_tidak">Tidak</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="software_keterangan" class="form-label">Penjelasan</label>
                    <textarea name="software_keterangan" id="software_keterangan" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Hardware</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hardware_status" id="hardware_bagus" value="Bagus">
                        <label class="form-check-label" for="hardware_bagus">Bagus</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hardware_status" id="hardware_tidak" value="Tidak">
                        <label class="form-check-label" for="hardware_tidak">Tidak</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="hardware_keterangan" class="form-label">Penjelasan</label>
                    <textarea name="hardware_keterangan" id="hardware_keterangan" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Baik">Baik</option>
                <option value="Rusak">Rusak</option>
                <option value="Perlu Perbaikan">Perlu Perbaikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pemeriksaanrutin.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <script>
        document.getElementById('barang_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('kode_barang').value = selectedOption.getAttribute('data-kode') || '';
            document.getElementById('kategori').value = selectedOption.getAttribute('data-kategori') || '';
            document.getElementById('lokasi').value = selectedOption.getAttribute('data-lokasi') || '';
        });
    </script>
</div>
@endsection
