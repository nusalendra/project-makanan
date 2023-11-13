<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
    <title>PELAYAN PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>PELAYAN PAGE</b></h4>
    <p class="w3-text-white">Welcome to pelayan page!</p>
  </div>
  <div class="w3-bar-block">
    <a href="orderonline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-book fa-fw w3-margin-right"></i>ORDER ONLINE</a> 
    <a href="orderoffline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>ORDER OFFLINE</a> 
    <a href="/loginpelayan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
    <h1><b>ORDERAN ONLINE</b></h1>
    <div class="w3-section w3-bottombar ">
    </div>
    <table>
  <tr>
    <th>ID order</th>
    <th>Pesanan</th>
    <th>Harga Satuan</th>
    <th>Jumlah Pesanan (Qty)</th>
    <th>Harga Total per Menu</th>
  </tr>
  <?php $no = 0;?>
  @foreach($keranjang as $tambahmakanan)
  <?php $no++ ;?>
  <tr>
     <td>{{$no}}</td>
     <td>{{$tambahmakanan->menu}}</td>
     <td>Rp.{{$tambahmakanan->harga}},00</td>
     <td>{{$tambahmakanan->qty}}</td>
     <td>Rp.{{$tambahmakanan->qty * $tambahmakanan->harga}},00</td>
    <td> </td>
  </tr>
  @endforeach
</table>
    <a href="/invoice"><button type="button" class="btn btn-default btn-lg w3-red">Checkout</button></a>

  <!-- First Photo Grid-->
  

</body>
</html>