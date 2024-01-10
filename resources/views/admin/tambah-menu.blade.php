<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <title>Halaman Tambah Menu Makanan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="asset/images/logo2.jpg">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        /* \Set the width of the sidebar to 120px */
        .w3-sidebar {
            width: 120px;
            background: #222;
        }

        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        #main {
            margin-left: 120px
        }

        /* Remove margins from "page content" on small screens */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0
            }
        }

        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid red !important;
            border-radius: 0px !important;
        }
    </style>
</head>

<body class="w3-white">

    <!-- About Section -->
    <div class="w3-content w3-justify w3-text-black" id="about">
        <h2 class="w3-text-light-black">Tambah Menu</h2>
        <hr style="width:240px" class="w3-opacity">

        <header class="w3-container">
            <div class="modal-body">
                <form action="/addmakanan" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Pilih Kategori</label>
                        <select name="kategori" class="form-control select2 @error('kategori') is-invalid @enderror"
                            name="kategori" value="{{ old('kategori') }}" required autocomplete="" autofocus />>
                        <option></option>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        </select>
                        @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">No Produk</label>
                        <input id="exampleInputEmail1" type="number" placeholder=""
                            class="form-control @error('no_produk') is-invalid @enderror" name="no_produk"
                            value="{{ old('no_produk') }}" required autocomplete="" autofocus />
                        @error('no_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input id="exampleInputEmail1" type="" placeholder=""
                            class="form-control @error('nama_prdk') is-invalid @enderror" name="nama_prdk"
                            value="{{ old('nama_prdk') }}" required autocomplete="" autofocus />
                        @error('nama_prdk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Komposisi</label>
                        <input id="exampleInputEmail1" type="" placeholder=""
                            class="form-control @error('komposisi') is-invalid @enderror" name="komposisi"
                            value="{{ old('komposisi') }}" required autocomplete="" autofocus />
                        @error('komposisi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kuota">Kuota Menu</label>
                        <input id="kuota" type="number" placeholder=""
                            class="form-control @error('kuota') is-invalid @enderror" name="kuota"
                            value="{{ old('kuota') }}" required autocomplete="" autofocus />
                        @error('kuota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input id="exampleInputEmail1" value="" type="" placeholder=""
                            class="form-control @error('harga') is-invalid @enderror" name="harga"
                            value="{{ old('harga') }}" required autocomplete="" autofocus />
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input name="images" type="file" class="@error('images') is-invalid @enderror" required
                            autocomplete="images" id="image" aria-describedby="emailHelp"
                            placeholder="Nama Blog" accept="image/gif, image/jpeg, image/png">
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w3-red">TAMBAH DATA</button>
                </form>
            </div>
        </header>
    </div>
    </div>

    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!-- Your custom script here -->
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
        $('.select2').select2();
    </script>

</body>

</html>
