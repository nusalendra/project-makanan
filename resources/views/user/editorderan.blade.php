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
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.button {
  background-color: #4CAF50; /* Green */
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
  position:absolute;
  bottom:10%;
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


</style>
    <title>USER PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>SUSHI UBUD CANGGU</b></h4>
    <p class="w3-text-white">Welcome to Sushi Ubud Canggu!</p>
  </div>
  <div class="w3-bar-block">
    <a href="/menu" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-cutlery fa-fw w3-margin-right"></i>MENU</a> 
    <a href="/profil" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>PROFIL</a> 
    <a href="/keranjang" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cart-plus fa-fw w3-margin-right"></i>KERANJANG</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
    <h1><b>Halaman Edit Data Lokasi Outlet</b></h1>
<form action="{{route('editorderan',['id'=>$orderan->id])}}" method="GET">
{{csrf_field()}}
<div class="form-group">
<label for="name" class="cols-sm-2 control-label">Pesanan</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <select name="pesanan"class="form-control" id="exampleFormControlSelect1" value="{{$orderan->pesanan}}">
                <option value="Sushi Roll + Es Teh">Sushi Roll + Es Teh</option>
                <option value="Sushi Original + Es Teh">Sushi Original + Es Teh</option>
                <option value="Sushi Sashimi + Es Teh">Sushi Sashimi + Es Teh</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="email" class="cols-sm-2 control-label">Qty</label>
    <div class="cols-sm-10">
        <div class="quantity">
        <input type='button' value='-' class='qtyminus minus' field='qty' />
        <input type='text' name='qty' value="{{$orderan->qty}}" class='qty'  />
        <input type='button' value='+' class='qtyplus plus' field='qty' />
        </div>
    </div>
</div>
    <label for="name" class="cols-sm-2 control-label">Harga</label>
    <div class="cols-sm-10">
        <div class="input-group">
            <select name="harga" class="form-control" id="exampleFormControlSelect1" value="{{$orderan->harga}}">
                <option value="25000">Rp 25.000,00</option>
                <option value="22000">Rp 22.000,00</option>
                <option value="23000">Rp 23.000,00</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w3-red">SIMPAN</button>
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

</body>
</html>