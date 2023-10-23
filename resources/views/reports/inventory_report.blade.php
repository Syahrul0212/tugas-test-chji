<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
    <style>
        /* Atur CSS sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Inventory Report</h2>
    <h3>PT. Chang Jui Fang Indonesia</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->nama_barang }}</td>
                    <td>{{ $inventory->jumlah }}</td>
                    <td>{{ $inventory->tanggal_masuk }}</td>
                    <td>{{ $inventory->tanggal_keluar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
