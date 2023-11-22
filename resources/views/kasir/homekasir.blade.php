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
    <h1><b>TABEL ORDERAN OFFLINE</b></h1>
    <div class="w3-row-padding">
    <table class="table">
        <tr>
        <th>Nama Pembeli</th> 
        <th>Pesanan</th>
        <th>Qty</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        </tr>
        @foreach($pemesananoffline as $pesanoffline)
        <tr>
        <td>{{$pesanoffline->nama_pembeli}}</td>
        <td>{{$pesanoffline->menu_offline}}</td>
        <td>{{$pesanoffline->qty_offline}}</td>
        <td>{{$pesanoffline->harga_offline}}</td>
        <td>{{($pesanoffline->qty_offline)*($pesanoffline->harga_offline)}}</td>
        </tr>
        @endforeach
        </table>
</div>

        <tr><h3>Total Harga <b> Rp{{$total_orderan->totalorderan}} ,00 </b></h3>
        <form method="post" action="/kembalian">		
{{csrf_field()}}	
			<input type="text" name="bil_1" class="bil" autocomplete="off" placeholder="Masukkan Uang Bayar" >
			<input type="text" readonly name="bil_2" class="bil" autocomplete="off" placeholder="Masukkan Total Belanja" value="{{$total_orderan->totalorderan}}">
			
			<button type="submit" class="btn btn-info">Hasil</button>								
		</form>
    <div class="w3-container">
      @if(session('info'))
      <div class="alert alert-info">
        {{session('info')}}
      </div>
      @endif
    </div>
        <a href="/invoicekasir"><button type="button" class="btn btn-default btn-lg w3-red" data-toggle="modal" data-target="#myModal1">Print Struk</button></a>

</body>
</html>