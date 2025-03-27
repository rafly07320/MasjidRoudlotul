<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Zakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Laporan Zakat</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jumlah Zakat</th>
                <th>Uang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zakats as $index => $zakat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($zakat->tgl_zakat)->format('d-m-Y') }}</td>
                    <td>{{ $zakat->nama }}</td>
                    <td>{{ $zakat->alamat }}</td>
                    <td>{{ number_format($zakat->jumlah_zakat, 2) }} kg</td>
                    <td>{{ formatRupiah($zakat->harga_per_zakat) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>REKAPITULASI</h2>
    <table>
        <tr>
            <th>Jumlah Jiwa</th>
            <th>{{ $total_jiwa }}</th>
        </tr>
        <tr>
            <th>Total Zakat (Kg)</th>
            <th>{{ $total_jumlah_zakat }} kg</th>
        </tr>

        <tr>
            <th>Jumlah Uang</th>
            <th>{{ formatRupiah($total_uang) }}</th>
        </tr>
    </table>
</body>

</html>
