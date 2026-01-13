@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Welcome Card -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body text-center">
            <h2 class="fw-bold">Selamat Datang, {{ Auth::user()->name }}</h2>
            <p class="text-muted">Anda login sebagai <strong>Admin</strong></p>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row">
        <!-- Pengajuan Perbaikan -->
        <div class="col-md-6">
            <div class="card text-center shadow" style="background: linear-gradient(135deg, #28a745, #20c997); color:white; border-radius:15px; border:none;">
                <div class="card-body">
                    <i class="fas fa-tools fa-2x mb-2"></i>
                    <h5>Pengajuan Perbaikan</h5>
                    <h1>{{ $totalPengajuan }}</h1>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="col-md-6">
            <div class="card text-center shadow" style="background: linear-gradient(135deg, #ffc107, #fd7e14); color:white; border-radius:15px; border:none;">
                <div class="card-body">
                    <i class="fas fa-clock fa-2x mb-2"></i>
                    <h5>Pending</h5>
                    <h1>{{ $pendingPengajuan }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
