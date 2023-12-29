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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
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

        .buttonbtm {
            position: absolute;
            bottom: 10%;
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
            text-align: left;
            padding: 6px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <title>USER PAGE</title>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>SUSHI KEY</b></h4>
            <p class="w3-text-white">Welcome to Sushi Key!</p>
        </div>
        <div class="w3-bar-block">
            <a href="/homepage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-cutlery fa-fw w3-margin-right"></i>MENU</a>
            <a href="/profil" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-user fa-fw w3-margin-right"></i>PROFIL</a>
            <a href="/keranjang" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-cart-plus fa-fw w3-margin-right"></i>KERANJANG</a>
            <a href="/selesai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-shopping-basket fa-fw w3-margin-right"></i>SELESAI</a>
            <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
        </div>
        <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <a href="https://www.instagram.com/sushikey.bali/" class="fa fa-instagram w3-hover-opacity"></a>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">

        <header id="portfolio">
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
                            <th>Detail Pesanan</th>
                            <th>Qty</th>
                            <th>Total Harga per Menu</th>
                            <th>Status</th>
                            <th>Edit QTY</th>
                            <th>Simpan</th>

                        </tr>
                        @foreach ($keranjang as $k => $item)
                            <td>{{ $item->menu }}</td>
                            <td>Rp.{{ $item->harga }},00</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp.{{ $item->qty * $item->harga }},00</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <form action="{{ route('editkeranjang', ['id' => $item->id]) }}" method="GET">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="quantity">
                                                <input type='button' value='-' class='qtyminus minus'
                                                    field='qty' />
                                                <input type='text' name='qty' value="{{ $item->qty }}"
                                                    class='qty' />
                                                <input type='button' value='+' class='qtyplus plus'
                                                    field='qty' />
                                            </div>
                                        </div>
                                    </div>
                            <td>
                                <div class="">
                                    <button type="submit" class="btn btn-primary w3-blue">SIMPAN</button>
                                </div>
                            </td>
                            </form>
                            </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="table">
                    <tr>
                        <h3>Total Harga <b> Rp. {{ $total_orderan->totalorderan }} ,00 </b></h3>
                        <h3>Jika Status Sudah Selesai Silahkan Klik Button Pembayaran Selesai Untuk Menyelesaikan Tahap
                            Akhir Pembelian</h3>
                        <button type="button" class="btn btn-default btn-lg w3-red" data-toggle="modal"
                            data-target="#myModal1">Checkout</button>
                </div>

            </div>
    </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content" style="width: 200%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-weight: bold;">Pastikan pesanan anda sudah sesuai sebelum
                        melakukan pembayaran</h4><br>
                    <h4>Silahkan melakukan transfer pada salah satu metode pembayaran yang anda pilih dengan nomor
                        pembayaran dibawah ini :</h4>
                    <li>OVO : 20202020</li>
                    <li>GOPAY : 3502139021390</li>
                </div>
                <div class="modal-body">
                    <h4><b>Pilih Metode Pembayaran & Isi ID Pembayaran</b></h4>
                    <form action="/addpembayaran" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Pilih Metode Pembayaran</label>
                            <select name="metode" class="form-control select2 @error('metode') is-invalid @enderror"
                                name="metode" value="{{ old('metode') }}" required autocomplete="" autofocus />>
                            <option></option>
                            <option value="OVO">OVO</option>
                            <option value="GOPAY">GOPAY</option>
                            </select>
                            @error('metode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <h4>Setelah anda sudah melakukan transfer pada salah satu metode pembayaran diatas, diharapkan
                            anda untuk mengisi ID Pembayaran dari E-Wallet anda pada input dibawah ini.</h4>
                        <h5 style="color: rgb(168, 4, 4); font-weight: bold;">Catatan : ID Pembayaran dapat anda lihat
                            pada struk pembayaran anda</h5>
                        <div class="form-group">
                            <input id="pembayaran_id" type="" placeholder=""
                                class="form-control @error('pembayaran_id') is-invalid @enderror" name="pembayaran_id"
                                required autocomplete="" autofocus />
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </tr>

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

</body>

</html>
