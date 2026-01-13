@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Manajemen Teknisi</h3>
    <a href="{{ route('admin.teknisi.create') }}" class="btn btn-primary mb-3">+ Tambah Teknisi</a>
    <a href="{{ route('admin.teknisi.export') }}" class="btn btn-success mb-3 ms-2">
        <i class="fas fa-file-pdf me-1"></i> Export PDF
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Teknisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teknisis as $index => $teknisi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $teknisi->name }}</td>
                <td>
                    <a href="{{ route('admin.teknisi.edit', $teknisi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.teknisi.destroy', $teknisi->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
