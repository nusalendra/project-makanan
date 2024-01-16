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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
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
    <title>ORDER PAGE</title>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>ORDER PAGE</b></h4>
            <p class="w3-text-white">Selamat Datang <strong>{{ $user->username }} !</strong></p>
            <p class="w3-text-white">Status Anda saat ini : <strong>{{ $user->role }}</strong></p>
        </div>
        <div class="w3-bar-block">
            <a href="/menu-pelanggan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>Menu</a>
            <a href="/keranjang-offline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>KERANJANG</a>
            <a href="/order-offline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>ORDER OFFLINE</a>
            <a href="/order-online" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>ORDER ONLINE</a>
            <a href="/order-selesai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-book fa-fw w3-margin-right"></i>ORDER SELESAI</a>
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
                        <p>Nomor Order : {{ $data->first()->pembayaran->nomor_order }}</p>
                        <p>Nama Pelanggan : {{ $data->first()->keranjang->user->name }}</p>
                        <p>Nomor Telepon : {{ $data->first()->keranjang->user->telepon }}</p>
                    </div>
                    <div class="w3-half">
                        <h2>Informasi Pesanan</h2>
                        @foreach ($data as $item)
                            <p>Pesanan : {{ $item->keranjang->menu }}</p>
                            <p>Jumlah Pesanan : {{ $item->keranjang->qty }} pcs</p>
                            <p>Total Harga Yang Dibayar : Rp.
                                {{ number_format($item->keranjang->qty * $item->keranjang->harga, 0, ',', '.') }}</p>
                            <br>
                        @endforeach
                    </div>
                </div>

                <div class="w3-row-padding">
                    <div class="w3-half">
                        <h2>Informasi Pembayaran</h2>
                        <p>Metode Pembayaran : {{ $data->first()->pembayaran->metode }}</p>
                        <p>ID Pembayaran : {{ $data->first()->pembayaran->id_pembayaran }}</p>
                        @if ($data->first() && $data->first()->pembayaran && $data->first()->pembayaran->ongkos_kirim)
                            <p style="color: red;"><b>Ongkos Kirim :
                                    {{ number_format($data->first()->pembayaran->ongkos_kirim, 0, ',', '.') }}</b>
                            </p>
                        @endif
                    </div>
                    <div class="w3-half">
                        <h2>Status</h2>
                        <p>Status Validasi Pembayaran : {{ $data->first()->pembayaran->status }}</p>
                        <p>Status Dapur : {{ $data->first()->keranjang->status }}</p>
                    </div>
                </div>
            </div>
            <div class="w3-row-padding w3-margin-top">
                <div class="w3-half" style="display: flex;">
                    <a href="/order-online" class="w3-button w3-white w3-hover-red w3-border"
                        style="text-decoration: none; margin-right: 5px;">Kembali</a>
                    <form action="/order-online/pesanan-diambil" method="POST">
                        @csrf
                        @foreach ($data as $item)
                            <input type="hidden" name="keranjangId[]" value="{{ $item->keranjang->id }}">
                        @endforeach
                        <button type="submit" class="w3-button w3-white w3-hover-orange w3-border">
                            Pesanan Sudah Diambil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!-- Your custom script here -->
    <script type="text/babel">
jQuery(document).ready(($) => {
  var qty = $(".qty").val("1")
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
            var qty = $(".qty").val()
            var id = $(".harganow").val()
            var jumlah = $(".qty").val()
            var total = id * jumlah
            $(".hargafinal").val(total)
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 0) {
                $input.val( val-1 ).change();
            } 
            var id = $(".harganow").val()
            var jumlah = $(".qty").val()
            var total = id * jumlah
            $(".hargafinal").val(total)
        });
    });
</script>

</body>

</html>
