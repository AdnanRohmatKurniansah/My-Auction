<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Lelang</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 70%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="laporan" style="margin-top: 100px">
        <h2 style="display: flex; justify-content: center">Laporan lelang</h2>
        <div class="paper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Pemenang</th>
                        <th>Harga akhir</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)  
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->nama }}</td>
                            <td>{{ $item->masyarakat->nama_lengkap }}</td>
                            <td>Rp. {{ number_format($item->barang->harga_awal, 0, ',', '.') }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>