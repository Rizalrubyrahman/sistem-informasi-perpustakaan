<!DOCTYPE html>
<html>
<head>
	<title>Laporan Transaksi</title>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		img{
			height: 100px;
			width: 100px;
			margin-left: 70px;
			
		}
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #666;
            text-shadow: 1px 1px 0px #fff;
            background: #eaebec;
            border: #ccc 1px solid;
            font-size: 12px;
        }
        
        table th {
            padding: 10px 20px;
            border-left:1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            background: #ededed;
        }
        
        table th:first-child{  
            border-left:none;  
        }
        
        table tr {
            text-align: center;
            padding-left: 10px;
        }
        
        table td:first-child {
            text-align: left;
            padding-left: 10px;
            border-left: 0;
        }
        
        table td {
            padding: 10px 20px;
            border-top: 1px solid #ffffff;
            border-bottom: 1px solid #e0e0e0;
            border-left: 1px solid #e0e0e0;
            background: #fafafa;
            background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
            background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
        }
        table tr:last-child td {
            border-bottom: 0;
        }
        
        table tr:last-child td:first-child {
            -moz-border-radius-bottomleft: 3px;
            -webkit-border-bottom-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        
        table tr:last-child td:last-child {
            -moz-border-radius-bottomright: 3px;
            -webkit-border-bottom-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }
        
        table tr:hover td {
            background: #f2f2f2;
            background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
            background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
        }
        .badge-warning{
            background-color: #ffc107;
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            color: #212529;
        }
        .badge-success{ 
            background-color: #28a745;
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            color: #fff;
        }
	</style>
</head>
<body>
	<div style="width: 950px;">	
		<img src="assets/img/smk.jpg">
        <h2 style="margin-left:170px; margin-top: -90px;">Perpustakaan SMKN 1 CIlamaya Wetan</h2>
    </div>
    <div style="margin-top:100px;">
        <hr style="margin-top: -100px;">
    <h1 style="text-align:center; margin-top:50px;">Laporan Data Transaksi</h1>
    </div>
    <table style="margin-top: 50px;">
        <thead>
            <tr>
                <th style="text-align: center">Kode Transaksi</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th style="text-align: center">Tanggal Pinjam</th>
                <th style="text-align: center">Tanggal Kembali</th>
                <th style="text-align: center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td style="text-align: center">{{ $data->kode_transaksi }}</td>
                    <td>{{ $data->anggota->nama }}</td>
                    <td>{{ $data->buku->judul }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($data->tanggal_pinjam)->format('d-m-Y') }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($data->tanggal_kembali)->format('d-m-Y') }}</td>
                    @if ($data->status == 'Pinjam')
                        <td><span class="badge-warning">Pinjam</span></td>
                    @else
                        <td><span class="badge-success">Kembali</span></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>