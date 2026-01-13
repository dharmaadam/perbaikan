<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Perbaikan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e1f5fe);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
        }
        .form-title {
            font-weight: 700;
            color: #0077b6;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background: #0077b6;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
        }
        .btn-custom:hover {
            background: #023e8a;
        }
    </style>
</head>
<body>

<div class="form-card">
    <h2 class="form-title">Form Pengajuan Perbaikan Barang</h2>
    <form action="{{ route('pengajuanperbaikan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_unit" class="form-label">Nama Unit</label>
            <input type="text" name="nama_unit" id="nama_unit" class="form-control" placeholder="Contoh: Unit Radiologi" required>
        </div>

        <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <select name="barang" id="barang" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Kerusakan</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Tuliskan detail kerusakan..." required></textarea>
        </div>

        <button type="submit" class="btn btn-custom w-100">Kirim Pengajuan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
