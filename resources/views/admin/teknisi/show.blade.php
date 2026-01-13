@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Teknisi</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $teknisi->name }}</h5>
            <p class="card-text"><strong>Username:</strong> {{ $teknisi->username }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $teknisi->email }}</p>
            <p class="card-text"><strong>Role:</strong> {{ $teknisi->role }}</p>
            <p class="card-text"><strong>Departemen:</strong> {{ $teknisi->departemen }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $teknisi->phone }}</p>
            <p class="card-text"><strong>Tanggal Dibuat:</strong> {{ $teknisi->created_at->format('d-m-Y') }}</p>
        </div>
    </div>
    <a href="{{ route('admin.teknisi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
