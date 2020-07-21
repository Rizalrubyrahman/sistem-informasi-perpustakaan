<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Laporan Data Transaksi</title>
    <style>
        h1{
            text-align: center;
        }
        .center{
            text-align: center;
        }
        table{
            margin:auto;
        }
    </style>
</head>
<body>
        <h1>Laporan Data Transaksi</h1>
        <table border="1">
            <thead>
                <tr>
                    <th class="center">Kode Transaksi</th>
                    <th>Nama</th>
                    <th>Buku</th>
                    <th class="center">Tanggal Pinjam</th>
                    <th class="center">Tanggal Kembali</th>
                    <th class="center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td class="center">{{ $data->kode_transaksi }}</td>
                        <td>{{ $data->anggota->nama }}</td>
                        <td>{{ $data->buku->judul }}</td>
                        <td class="center">{{ date('d-m-yy', strtotime($data->tanggal_pinjam)) }}</td>
                        <td class="center">{{ date('d-m-yy', strtotime($data->tanggal_kembali)) }}</td>
                        <td class="center">
                            @if ($data->status == 'Pinjam')
                                <label>Pinjam</label>
                            @else
                                <label>Kembali</label>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>
</html>