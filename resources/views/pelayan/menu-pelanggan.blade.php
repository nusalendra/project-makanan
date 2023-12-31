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
            <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;"
                    class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
            <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                    class="fa fa-bars"></i></span>
            <div class="w3-container">
                <h1><b>Menu Paket Sushi</b></h1>
                <div class="w3-section w3-bottombar w3-padding-16">
                    <span class="w3-margin-right">Filter:</span>
                    <button class="w3-button w3-black">ALL</button>
                    <a href="/homepage"><button class="w3-button w3-white"><i
                                class="fa fa-cutlery w3-margin-right"></i>Paket Sushi</button></a>
                    <a href="/pagealacarte"><button class="w3-button w3-white w3-hide-small"><i
                                class="fa fa-cutlery w3-margin-right"></i>Ala Carte Sushi</button></a>
                    <a href="/pageminuman"><button class="w3-button w3-white w3-hide-small"><i
                                class="fa fa fa-glass w3-margin-right"></i>Minuman</button></a>
                </div>
            </div>
        </header>

        <!-- MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">WARNING!</h5>
                    </div>
                    <div class="modal-body">
                        <h4><b>Menu Sudah Anda Pilih</b></h4><br>
                        <h4>Selanjutnya menu dapat anda lihat dan tambah jumlah di halaman keranjang </h4>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDMODAL -->

        <!-- First Photo Grid-->
        @foreach ($tambahmakanan as $tambahmakanan)
            <form method="POST" action="/tambah-keranjang" enctype="multipart/form-data">
                @csrf
                <div class="w3-third w3-container w3-margin-bottom">
                    <input type="hidden" name="tambahMakananId" value="{{ $tambahmakanan->id }}" />
                    <input type="hidden" name="harga" value="{{ $tambahmakanan->harga }}" />
                    <input type="hidden" name="menu" value="{{ $tambahmakanan->nama_prdk }}" />
                    <div><img class="rounded-circle mt-5" width="100px"
                            src="{{ asset('makanan/' . $tambahmakanan->images) }}" style="width:100%"></div>
                    <div class="w3-container w3-white" style="padding: 20px;">
                        <p><b>{{ $tambahmakanan->nama_prdk }}</b></p>
                        <p>{{ $tambahmakanan->komposisi }}</p>
                        <p>Rp {{ $tambahmakanan->harga }}</p>
                        <div class="w3-row-padding w3-center">
                            <button type="submit" class="button button3">
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
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

    <script>
        function fun_remove() {
            var element = document.getElementById("id_dropdown");
            element.remove(element.selectedIndex);
        }
    </script>

    <script>
        $('.select2').select2();
    </script>

    <script>
        $(document).ready(function() {
            $(".harga").change(function() {
                var id = $(".harga").val()


                $.ajax({
                    type: 'get',
                    url: '/harga/' + id,
                    success: function(response) {
                        $(".hargafinal").val(response.makanan.harga)
                        $(".harganow").val(response.makanan.harga)
                        $(".namaproduk").val(response.makanan.nama_prdk)
                    }
                });

            });
        });
    </script>

</body>

</html>
