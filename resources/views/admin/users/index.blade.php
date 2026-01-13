@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Manajemen User</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
    <a href="{{ route('admin.users.export') }}" class="btn btn-success mb-3 ms-2">
        <i class="fas fa-file-pdf me-1"></i> Export PDF
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Departemen</th>
                <th>Phone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->departemen }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
