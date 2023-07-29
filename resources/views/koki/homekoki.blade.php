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
    <title>KOKI PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>KOKI PAGE</b></h4>
    <p class="w3-text-white">Welcome to koki page!</p>
  </div>
  <div class="w3-bar-block">
    <a href="/koki" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-book fa-fw w3-margin-right"></i>DAFTAR ORDERAN ONLINE</a> 
    <a href="/kokioffline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>DAFTAR ORDERAN OFFLINE</a> 
    <a href="/orderselesaikoki" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-shopping-basket w3-margin-right"></i>ORDERAN SELESAI</a> 
    <a href="/loginkoki" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

<header id="">

    <div class="w3-container">
    <h1><b>Tabel Daftar Orderan Online</b></h1>
    <table class="table">
    <tr>
    <th>ID order</th>
    <th>Tanggal</th>
    <th>Pesanan</th>
    <th>Qty</th>
  </tr>
  @foreach($tambahmakanan as $tambahmakanan)
  <tr>
    <td>{{$tambahmakanan->id}}</td>
    <td>{{$tambahmakanan->created_at}}</td>
    <td>{{$tambahmakanan->nama_prdk}}</td>
    <td>{{$tambahmakanan->qty}}</td>
  </tr>
  @endforeach
    </table>
    </div>
  </header>

  <!-- First Photo Grid-->
  

</body>
</html>