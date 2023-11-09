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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


</style>
    <title>KASIR</title>
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
    <a href="/kasir" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-book fa-fw w3-margin-right"></i>KASIR OFFLINE</a> 
    <a href="/kasironline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-book fa-fw w3-margin-right"></i>KASIR ONLINE</a> 
    <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <a href="https://www.instagram.com/sushikey.bali/" class="fa fa-instagram w3-hover-opacity"></a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
    <h1><b>HALAMAN KASIR</b></h1>
    <div class="w3-section w3-bottombar ">
    </div>
    <h1><b>TABEL ORDERAN ONLINE</b></h1>
    <div class="w3-row-padding">
    <table class="table">
        <tr>
        <th>Nomor Pesanan</th>
        <th>Pesanan</th>
        <th>Harga Satuan</th>
        <th>Jumlah Pesanan (Qty)</th>
        <th>Harga Total per Menu</th>
        </tr>
        <?php $no = 0;?>
         @foreach($tambahmakanan as $tambahmakanan)
         <?php $no++ ;?>
        <tr>
        <td>{{$no}}</td>
        <td>{{$tambahmakanan->nama_prdk}}</td>
        <td>Rp.{{$tambahmakanan->harga}},00</td>
        <td>{{$tambahmakanan->qty}}</td>
        <td>Rp.{{$tambahmakanan->qty * $tambahmakanan->harga}},00</td>
        </tr>
        @endforeach
        </table>
</div>

<div class="w3-row-padding">
    <table class="table">
        <tr>
        <th>Nomor Pesanan</th>
        <th>Metode Pembayaran</th>
        </tr>
        <?php $no = 0;?>
        @foreach($pembayaran as $pembayaran)
         <?php $no++ ;?>
        <tr>
        <td>{{$no}}</td>
        <td>{{$pembayaran->metode}}</td>
        </tr>
        @endforeach
        </table>
</div>



</body>
</html>