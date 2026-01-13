<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengajuan Perbaikan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header-info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .no-data {
            text-align: center;
            padding: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Laporan Pengajuan Perbaikan</h1>

    <div class="header-info">
        @if($request->filled('start_date') && $request->filled('end_date'))
            <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($request->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($request->end_date)->format('d/m/Y') }}</p>
        @else
            <p><strong>Periode:</strong> Semua Data</p>
        @endif
        <p><strong>Total Data:</strong> {{ $laporan->count() }} pengajuan perbaikan</p>
        <p><strong>Dicetak pada:</strong> {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    @if($laporan->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori Barang</th>
                    <th>Nama Pengaju</th>
                    <th>Deskripsi Kerusakan</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diupdate</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->barang->kategori ?? '-' }}</td>
                    <td>{{ $item->nama_pengaju }}</td>
                    <td>{{ $item->deskripsi_kerusakan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->updated_at->format('d/m/Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            <p>Tidak ada data laporan untuk periode yang dipilih.</p>
        </div>
    @endif

    <div class="footer">
        <p>Dicetak oleh Sistem Pengajuan Perbaikan Barang</p>
    </div>
</body>
</html>
