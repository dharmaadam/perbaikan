<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Teknisi</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Daftar Teknisi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Departemen</th>
                <th>Phone</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teknisis as $teknisi)
            <tr>
                <td>{{ $teknisi->id }}</td>
                <td>{{ $teknisi->name }}</td>
                <td>{{ $teknisi->username }}</td>
                <td>{{ $teknisi->email }}</td>
                <td>{{ $teknisi->role }}</td>
                <td>{{ $teknisi->departemen }}</td>
                <td>{{ $teknisi->phone }}</td>
                <td>{{ $teknisi->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
