<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Laporan Data Transaksi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <h1 class="text-center">Laporan Data Transaksi</h1>
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Kode Transaksi</th>
                        <th>Nama</th>
                        <th>Buku</th>
                        <th class="text-center">Tanggal Pinjam</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td class="text-center">{{ $data->kode_transaksi }}</td>
                            <td>{{ $data->anggota->nama }}</td>
                            <td>{{ $data->buku->judul }}</td>
                            <td class="text-center">{{ date('d-m-yy', strtotime($data->tanggal_pinjam)) }}</td>
                            <td class="text-center">{{ date('d-m-yy', strtotime($data->tanggal_kembali)) }}</td>
                            <td class="text-center">
                                @if ($data->status == 'Pinjam')
                                    <span class="badge badge-warning">Pinjam</span>
                                @else
                                    <span class="badge badge-success">Kembali</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>