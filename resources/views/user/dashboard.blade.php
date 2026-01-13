@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body text-center">
            <h2 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}</h2>
            <p class="text-muted">Departemen: {{ auth()->user()->departemen ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection
