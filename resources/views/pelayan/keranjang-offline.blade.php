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
            <p class="w3-text-white">Welcome to order page!</p>
        </div>
    </nav>
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>ORDER PAGE</b></h4>
            <p class="w3-text-white">Welcome to order page!</p>
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

        <header id="portfolio">
            <form action="/checkout-pembeli" method="POST">
                {{ csrf_field() }}
                <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;"
                        class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
                <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                        class="fa fa-bars"></i></span>
                <div class="w3-container">
                    <h1><b>KERANJANG</b></h1>
                    <div class="w3-section w3-bottombar ">
                    </div>
                    <div class="w3-row-padding">
                        <table class="table">
                            <tr>
                                <th>Pesanan</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Total Harga per Menu</th>
                                <th>Hapus Pesanan</th>
                            </tr>
                            <?php
                            $totalHargaSemuaPesanan = 0;
                            ?>
                            @foreach ($pesananOffline as $k => $item)
                                <input type="hidden" name="pesananOfflineId[]" value="{{ $item->id }}">
                                <tr id="row_{{ $item->id }}">
                                    <td>{{ $item->menu }}</td>
                                    <td>
                                        <span class="harga_per_satuan">Rp. {{ $item->harga }}</span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="cols-sm-10">
                                                <div class="quantity">
                                                    <input type='button' value='-' class='qtyminus minus'
                                                        field='qty' />
                                                    <input type='text' id="qtyinput" name='qty[]'
                                                        value="{{ $item->qty }}" class='qty'
                                                        data-rowid="{{ $item->id }}" />
                                                    <input type='button' value='+' class='qtyplus plus'
                                                        field='qty' />
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total_harga">Rp. {{ $item->qty * $item->harga }}</td>
                                    <?php
                                    $totalHargaSemuaPesanan += $item->qty * $item->harga;
                                    ?>
                                    <td style="text-align: center;">
                                        <a href="/keranjang-offline/delete/{{ $item->id }}" style="color: red;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="table">
                        <tr>
                            <h3 id="totalhHarga">Total Harga Semua Pesanan <b>Rp. {{ $totalHargaSemuaPesanan }}</b>
                            </h3>
                            <h3>Jika Status Sudah Selesai Silahkan Klik Button Pembayaran Selesai Untuk Menyelesaikan
                                Tahap
                                Akhir Pembelian</h3>
                            <button type="button" class="btn btn-default btn-lg w3-red" data-toggle="modal"
                                data-target="#myModal1">Checkout</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content" style="width: 200%;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="font-weight: bold;">Checkout Pesanan Pembeli</h4><br>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Nama Pembeli</label>
                                    <input id="nama" type="" placeholder=""
                                        class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" required autocomplete="" autofocus />
                                    @error('')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
        </header>
    </div>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!-- Your custom script here -->
    <script>
        $(document).ready(function() {

            //Ketika elemen class sembunyi di klik maka elemen class gambar sembunyi
            $('.sembunyi').click(function() {
                //Sembunyikan elemen class gambar
                $('.table').hide();
            });
        });
    </script>
    <script type="text/babel">
 jQuery(document).ready(($) => {
         $('.quantity').on('click', '.plus', function(e) {
             let $input = $(this).prev('input.qty');
             let val = parseInt($input.val());
             $input.val( val+1 ).change();
         });
  
         $('.quantity').on('click', '.minus', 
             function(e) {
             let $input = $(this).next('input.qty');
             var val = parseInt($input.val());
             if (val > 0) {
                 $input.val( val-1 ).change();
             } 
         });
     });
 </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan event listener untuk setiap tombol +/- pada setiap baris
            document.querySelectorAll('.qtyplus, .qtyminus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var rowId = this.closest('tr').querySelector('.qty').getAttribute('data-rowid');
                    var qtyInput = document.querySelector('#row_' + rowId + ' .qty');
                    var qty = parseInt(qtyInput.value, 10);

                    // Periksa apakah tombol yang diklik adalah tombol plus atau minus
                    if (this.classList.contains('qtyplus')) {
                        qty += 1;
                    } else if (this.classList.contains('qtyminus') && qty > 0) {
                        qty -= 1;
                    }

                    var hargaPerSatuan = parseFloat(document.querySelector('#row_' + rowId +
                            ' .harga_per_satuan').innerText.replace('Rp.', '').replace(',', '')
                        .trim());
                    var totalHarga = qty * hargaPerSatuan;
                    document.querySelector('#row_' + rowId + ' .total_harga').innerText = 'Rp.' +
                        totalHarga
                        .toFixed(0);

                    // Hitung total harga semua pesanan dan perbarui elemen <h3>
                    updateTotalHarga();
                });
            });

            // Fungsi untuk menghitung total harga semua pesanan
            function updateTotalHarga() {
                var totalHargaSemuaPesanan = 0;
                document.querySelectorAll('.total_harga').forEach(function(element) {
                    // Mengambil nilai teks dari elemen
                    var nilaiTeks = element.innerText;

                    // Menghilangkan 'Rp.' dan mengonversi ke nilai numerik
                    var hargaItem = parseFloat(nilaiTeks.replace('Rp.', '').replace(',', '').trim());

                    if (!isNaN(hargaItem)) {
                        totalHargaSemuaPesanan += hargaItem;
                    } else {
                        console.error('Nilai total_harga pada elemen', element, 'tidak valid.');
                    }
                });

                console.log('totalHargaSemuaPesanan:', totalHargaSemuaPesanan);

                document.querySelector('#totalhHarga b').innerText = 'Rp. ' + totalHargaSemuaPesanan.toFixed(0);
            }
        });
    </script>
</body>

</html>
