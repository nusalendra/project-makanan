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
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-cutlery fa-fw w3-margin-right"></i>MENU</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>ABOUT</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
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

<header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Menu Minuman</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <a href="/homepage"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Paket Sushi</button></a>
      <a href="/pagealacarte"><button class="w3-button w3-white w3-hide-small"><i class="fa fa-cutlery w3-margin-right"></i>Ala Carte Sushi</button></a>
      <a href="/pageminuman"><button class="w3-button w3-white w3-hide-small"><i class="fa fa fa-glass w3-margin-right"></i>Minuman</button></a>
    </div>
    </div>
  </header>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Orderan</h4>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
          {{csrf_field()}}
          <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input name=""type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
           </div>
           <div class="form-group">
              <label for="exampleInputEmail1">No HP</label>
              <input name=""type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
           </div>
           <div class="form-group">
                 <label for="exampleInputEmail1">Pilih Lokasi Resto</label>
                 <select class="selectpicker form-control" name="">
                 <option>Sushi Key Ubud, Jl. Raya Nyuh Kuning, MAS, Kecamatan Ubud, Kabupaten Gianyar, Bali</option>
                 <option>Sushi Key Canggu, Jl. Raya Canggu, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bal</option>
                 </select>
            </div>
        </form>
        </div>
      
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Bayar</button>
          </div>
       
      </div>
    </div>
  </div>

  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="asset\images\es teh.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Teh</b></p>
        <p>Teh segar dengan gula dan es batu</p>
        <p>Rp 5.000,00</p>
        <button class="button button3"><i class="fa fa-plus"></i></button>
        <button class="button button3"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="asset\images\es jeruk.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Jeruk</b></p>
        <p>Jeruk segar murni dengan gula dan es batu</p>
        <p>Rp 5.000,00</p>
        <button class="button button3"><i class="fa fa-plus"></i></button>
        <button class="button button3"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="asset\images\es coklat.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Coklat</b></p>
        <p>Es susu coklat manis</p>
        <p>Rp 7.000,00</p>
        <button class="button button3"><i class="fa fa-plus"></i></button>
        <button class="button button3"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="w3-row-padding">
    <table class="table">
        <tr>
        <th>Nama</th>
        <th>Qty</th> 
        <th>Harga</th> 
        </tr>
    <table class="table">
        <tr>
        <th>Total</th>
        <th>Qty</th> 
        <th>Harga</th> 
        </tr>
      </div>
    </div>
    <div class="w3-container">
    <button class="buttonbtm button3">Order</button>
    </div>
    </div>
    
</body>
</html>