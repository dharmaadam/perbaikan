<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan Perbaikan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Daftar Pengajuan Perbaikan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Nama Pengaju</th>
                <th>Deskripsi Kerusakan</th>
                <th>Status</th>
                <th>Departemen</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuans as $pengajuan)
            <tr>
                <td>{{ $pengajuan->id }}</td>
                <td>{{ $pengajuan->barang->nama_barang ?? 'N/A' }}</td>
                <td>{{ $pengajuan->nama_pengaju }}</td>
                <td>{{ $pengajuan->deskripsi_kerusakan }}</td>
                <td>{{ $pengajuan->status }}</td>
                <td>{{ $pengajuan->departemen }}</td>
                <td>{{ $pengajuan->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
