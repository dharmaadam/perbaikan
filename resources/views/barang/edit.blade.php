@extends('layouts.app')

@section('content')
<h2>Edit Barang</h2>
<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ $barang->kategori }}" class="form-control" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
