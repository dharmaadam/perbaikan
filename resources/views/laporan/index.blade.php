@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Laporan Pengajuan Perbaikan</h2>

    <!-- Form Filter Tanggal -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('laporan.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                           value="{{ request('start_date') }}">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                           value="{{ request('end_date') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        🔍 Filter
                    </button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                        🔄 Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Data Laporan</h5>
                @if($laporan->count() > 0)
                    <a href="{{ route('laporan.export', request()->query()) }}" class="btn btn-success">
                        Export ke PDF
                    </a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Barang</th>
                            <th>Pengaju</th>
                            <th>Deskripsi Kerusakan</th>
                            <th>Status</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporan as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->barang->nama_barang ?? '-' }}</td>
                            <td>{{ $l->nama_pengaju }}</td>
                            <td>{{ $l->deskripsi_kerusakan }}</td>
                            <td>
                                @if($l->status === 'Menunggu')
                                    <span class="badge bg-warning text-dark">{{ $l->status }}</span>
                                @elseif($l->status === 'Diproses')
                                    <span class="badge bg-info text-dark">{{ $l->status }}</span>
                                @elseif($l->status === 'Selesai')
                                    <span class="badge bg-success">{{ $l->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $l->status }}</span>
                                @endif
                            </td>
                            <td>{{ $l->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Tidak ada data laporan untuk periode yang dipilih.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($laporan->count() > 0)
                <div class="mt-3">
                    <p class="text-muted">Total: {{ $laporan->count() }} pengajuan perbaikan</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
