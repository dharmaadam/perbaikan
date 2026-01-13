<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemeriksaan Rutin</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Daftar Pemeriksaan Rutin</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Software Status</th>
                <th>Hardware Status</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemeriksaans as $pemeriksaan)
            <tr>
                <td>{{ $pemeriksaan->id }}</td>
                <td>{{ $pemeriksaan->nama_barang }}</td>
                <td>{{ $pemeriksaan->kode_barang }}</td>
                <td>{{ $pemeriksaan->kategori }}</td>
                <td>{{ $pemeriksaan->lokasi }}</td>
                <td>{{ $pemeriksaan->status }}</td>
                <td>{{ $pemeriksaan->software_status }}</td>
                <td>{{ $pemeriksaan->hardware_status }}</td>
                <td>{{ $pemeriksaan->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
