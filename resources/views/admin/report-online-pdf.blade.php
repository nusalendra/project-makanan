<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <style>
        tr th {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        tr td {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">LAPORAN PESANAN ONLINE</h2>
    <!-- Tabel data pesanan -->
    <table border="1px" style="margin-left: auto; margin-right: auto;">
        <thead>
            <tr>
                <th rowspan="1">Tangal Pemesanan</th>
                <th rowspan="1">Nomor Order</th>
                <th rowspan="1">Menu</th>
                <th rowspan="1">Harga</th>
                <th rowspan="1">Qty</th>
                <th rowspan="1">Total Harga Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjang as $item)
                <tr>
                    <td>{{ $item->created_at->format('d-m-Y / H:i:s') }}</td>
                    <td>
                        @foreach ($item->pembayaran as $pembayaran)
                            {{ $pembayaran->nomor_order }}
                        @endforeach
                    </td>
                    <td>{{ $item->menu }}</td>
                    <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->qty * $item->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="5"><b>Total Harga Semua Pesanan</b></td>
                <td><b>Rp. {{ number_format($totalHargaSemuaPesanan, 0, ',', '.') }}</b></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
