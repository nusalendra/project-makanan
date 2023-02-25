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
    <title>KARYAWAN PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>KARYAWAN PAGE</b></h4>
    <p class="w3-text-white">Welcome to karyawan page!</p>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-book fa-fw w3-margin-right"></i>PEMESANAN</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i>RIWAYAT TRANSAKSI</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

<header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Tampilan Pemesanan</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <a href="/homepage"><button class="w3-button w3-white"><i class="fa fa-book w3-margin-right"></i>Pesanan Terakhir</button></a>
      <a href="/pagealacarte"><button class="w3-button w3-white w3-hide-small"><i class="fa fa-calendar-check-o w3-margin-right"></i>Riwayat Pemesanan</button></a>
    </div>
    </div>
  </header>

  <!-- First Photo Grid-->
  <div class="w3-row">
  <div class="w3-container">
   <div class="w3-section w3-padding-16">
     <a href="/formpemesanan"><button class="w3-button w3-red">Tambah Data</button></a> 
  </div>
  <table class="table">
  <tr>
        <th>Nama Pemesan</th>
        <th>No Handphone</th> 
        <th>Makanan</th> 
        <th>Harga</th>
        <th>Ket</th>
        <th>Cetak</th>
        <th>Delete</th>
  </tr>
  @foreach ($pemesanan as $pemesanan)
  <tr>
        <td>{{$pemesanan->nama_pmsn}}</td>
        <td>{{$pemesanan->no_hp}}</td>
        <td>{{$pemesanan->makanan}}</td>
        <td>{{$pemesanan->harga}}</td>
        <td>{{$pemesanan->ket}}</td>
        <td><a href=""><button class="btn btn-primary w3-blue">Cetak</button></a></td>
        <td><a href="/deletepemesanan/{{$pemesanan->id}}"><button class="btn btn-primary w3-red">Delete</button></a></td>
  @endforeach
  </tr> 
  </table>
  </div>

</body>
</html>