@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Teknisi</h3>
    <form action="{{ route('admin.teknisi.update', $teknisi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $teknisi->name }}" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $teknisi->username }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $teknisi->email }}" required>
        </div>
        <div class="mb-3">
            <label for="departemen" class="form-label">Departemen</label>
            <input type="text" class="form-control" id="departemen" name="departemen" value="{{ $teknisi->departemen }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $teknisi->phone }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.teknisi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
