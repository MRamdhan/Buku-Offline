<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> REPORTS </title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }


    </style>

</head>

<body>

    <div style="width: 95%; margin: 0 auto;">
        <div style="width: 50%; float: left;">
            <h1>REPORTS</h1>
        </div>
    </div>

    <table style="position: relative; top: 50px;">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Harga Buku</th>
                <th>Banyak Buku</th>
                <th>Total Harga</th>
                <th>Uang</th>
                <th>Kembalian</th>
                <th>Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detailtransaksi as $item)
                <tr>
                    <td data-column="First Name">{{ $item->buku->judul }}</td>
                    <td data-column="Last Name">{{ number_format($item->buku->harga, 3, ',', '.') }}</td>
                    <td data-column="Last Name">{{ $item->qty }}</td>
                    <td data-column="Last Name">{{ number_format($item->qty * $item->buku->harga, 3, '.', ',') }}</td>
                    <td data-column="Last Name">{{ number_format($item->input_pembayaran, 3, '.', ',') }}</td>
                    <td data-column="Last Name">{{ number_format($item->input_pembayaran - ($item->qty * $item->buku->harga), 3, ',', '.') }}</td>
                    <td data-column="Last Name">{{ $item->transaksi->code}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>