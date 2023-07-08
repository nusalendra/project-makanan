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
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
    <title>ADMIN PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>ADMIN PAGE</b></h4>
    <p class="w3-text-white">Welcome to admin page!</p>
  </div>
</nav>
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>ADMIN PAGE</b></h4>
    <p class="w3-text-white">Welcome to admin page!</p>
  </div>
  <div class="w3-bar-block">
    <a href="homeadmin" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-area-chart fa-fw w3-margin-right"></i>DATA MAKANAN</a> 
    <a href="tambahlokasi" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map-marker fa-fw w3-margin-right"></i>TAMBAH LOKASI</a> 
    <a href="tambahpegawai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-male fa-fw w3-margin-right"></i>TAMBAH DATA PEGAWAI</a>
    <a href="/loginkaryawan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
    <h1><b>Dashboard Admin</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <button class="w3-button w3-black">ALL</button>
      <a href="/homepage"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Makanan</button></a>
      <a href="/pageminuman"><button class="w3-button w3-white w3-hide-small"><i class="fa fa fa-glass w3-margin-right"></i>Minuman</button></a>
      <a href="/homepage"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Snack</button></a>
    </div>
    <a href="/tambahmakanan"><button class="w3-button w3-white">Tambah Data</button></a>
    <div class="w3-row">
    <table class="table">
        <tr>
        <th>Kategori</th>
        <th>No Produk</th>
        <th>Nama Produk</th> 
        <th>Harga</th>
        <th>Gambar</th>
        <th>Action</th> 
        </tr>
        @foreach ($tambahmakanan as $tambahmakanan)
        <tr>
        <td>{{$tambahmakanan->kategori}}</td>   
        <td>{{$tambahmakanan->no_produk}}</td> 
        <td>{{$tambahmakanan->nama_prdk}}</td> 
        <td>{{$tambahmakanan->harga}}</td> 
        <td><img src="{{asset('makanan/'.$tambahmakanan->images)}}" height="35px" width="35px"></td>
        <td>
        <label class="switch">
          <input type="checkbox" checked>
          <span class="slider round"></span>
        </label>
          <a href="/hapusmakanan/{{$tambahmakanan->id}}" class="btn fa fa-trash w3-red"></a>
          <a href="/prosesviewdatamakanan/{{$tambahmakanan->id}}" class="btn fa fa-edit w3-blue"></a>
        </td>
        </tr>
        @endforeach
      </div>

 <!-- First Photo Grid-->
 
</div> 

</body>
</html>