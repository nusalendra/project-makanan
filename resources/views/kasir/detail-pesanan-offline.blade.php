<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        .button {
            background-color: #FFFFFF;
            /* Green */
            border: 0.5 px;
            color: black;
            padding: 10px 22px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 6px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button3 {
            background-color: white;
            color: black;
            border: 2px solid #f44336;
        }

        .button3:hover {
            background-color: #f44336;
            color: white;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <title>ADMIN PAGE</title>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>ADMIN PAGE</b></h4>
            <p class="w3-text-white">Welcome to admin page!</p>
        </div>
    </nav>
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>ADMIN PAGE</b></h4>
            <p class="w3-text-white">Welcome to admin page!</p>
        </div>
        <div class="w3-bar-block">
            <a href="/kasir-offline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>KASIR OFFLINE</a>
            <a href="/kasir-online" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>KASIR ONLINE</a>
            <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">
        <div class="w3-container">
            <h3><b>DETAIL PESANAN</b></h3>
            <div class="w3-section w3-bottombar w3-padding-13">
            </div>
            <div class="w3-container">
                <div class="w3-row-padding">
                    <div class="w3-half">
                        <h2>Informasi Pelanggan</h2>
                        <p>Nomor Order : {{ $data->first()->pembeli->nomor_order }}</p>
                        <p>Nama Pelanggan : {{ $data->first()->pembeli->nama }}</p>
                    </div>
                    <div class="w3-half">
                        <h2>Informasi Pesanan</h2>
                        @php
                            $totalSemuaPesanan = 0; // Inisialisasi variabel totalSemuaPesanan
                        @endphp
                        @foreach ($data as $item)
                            <p>Pesanan : {{ $item->pesananOffline->menu }}</p>
                            <p>Jumlah Pesanan : {{ $item->pesananOffline->qty }} pcs</p>
                            <p>Total Harga Yang Dibayar : Rp.
                                {{ number_format($item->pesananOffline->qty * $item->pesananOffline->harga, 0, ',', '.') }}
                            </p>
                            <br>
                            @php
                                $totalSemuaPesanan += $item->pesananOffline->qty * $item->pesananOffline->harga;
                            @endphp
                        @endforeach

                        <p style="color: red;"><b>Total Harga Semua Pesanan : Rp.
                                {{ number_format($totalSemuaPesanan, 0, ',', '.') }}</b></p>
                    </div>
                </div>

                <div class="w3-row-padding">
                    <div class="w3-half">
                        <h2>Status</h2>
                        <p>Status Validasi Pembayaran : {{ $data->first()->pembeli->status_pembayaran }}</p>
                        <p>Status Dapur : {{ $data->first()->pesananOffline->status_pesanan }}</p>
                    </div>
                </div>
            </div>
            <div class="w3-row-padding w3-margin-top">
                <div class="w3-half" style="display: flex;">
                    <a href="/kasir-offline" class="w3-button w3-white w3-hover-red w3-border"
                        style="text-decoration: none; margin-right: 5px;">Kembali</a>
                    <form action="/kasir-offline/pembayaran/{{ $data->first()->pembeli->id }}" method="POST">
                        @csrf
                        @foreach ($data as $item)
                            <input type="hidden" name="pesananOfflineId[]" value="{{ $item->pesananOffline->id }}">
                        @endforeach
                        <button type="button" class="w3-button w3-white w3-hover-orange w3-border" data-toggle="modal"
                            data-target="#modal-bayar">
                            Pembayaran
                        </button>

                        <div class="modal fade" id="modal-bayar" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content" style="width: 200%;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="font-weight: bold;">Form Pembayaran Pembeli</h4>
                                        <br>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="total_harga_semua_pesanan">Total Harga Semua Pesanan</label>
                                            <input id="total_harga_semua_pesanan" type="" placeholder=""
                                                class="form-control" name="total_harga_semua_pesanan"
                                                value="Rp. {{ number_format($data->first()->pembeli->total_harga_semua_pesanan, 0, ',', '.') }}"
                                                disabled />

                                        </div>
                                        <div class="form-group">
                                            <label for="uang_dibayarkan">Uang Yang Dibayarkan</label>
                                            <input id="uang_dibayarkan" type="number" class="form-control"
                                                name="uang_dibayarkan" />
                                        </div>

                                        <div class="form-group">
                                            <label for="kembalian">Kembalian</label>
                                            <input id="kembalian" type="text" placeholder="" class="form-control"
                                                name="kembalian" value="Rp. 0" disabled />
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myModal1">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Mendapatkan nilai total harga semua pesanan dari PHP ke JavaScript
            var totalHargaSemuaPesanan = {{ $data->first()->pembeli->total_harga_semua_pesanan }};

            // Mendengarkan perubahan pada input uang_dibayarkan
            $('#uang_dibayarkan').on('input', function() {
                // Mendapatkan nilai uang_dibayarkan
                var uangDibayarkan = $(this).val();

                // Menghitung kembalian
                var kembalian = uangDibayarkan - totalHargaSemuaPesanan;

                // Memperbarui nilai pada input kembalian
                $('#kembalian').val('Rp. ' + kembalian.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));

            });
        });
    </script>
</body>

</html>
