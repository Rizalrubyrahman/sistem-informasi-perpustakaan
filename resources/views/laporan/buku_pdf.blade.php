<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Laporan Data Buku</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <h1 class="text-center">Laporan Data Buku</h1>
        <div class="table-responsive mt-4">
            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td class="text-center">{{ $data->kode_buku }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->pengarang }}</td>
                            <td>{{ $data->penerbit }}</td>
                            <td class="text-center">{{ $data->tahun }}</td>
                            <td class="text-center">{{ $data->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>