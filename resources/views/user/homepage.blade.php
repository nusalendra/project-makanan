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
    <h4><b>SUSHI KEY</b></h4>
    <p class="w3-text-white">Welcome to Sushi Key!</p>
  </div>
  <div class="w3-bar-block">
    <a href="/menu" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-cutlery fa-fw w3-margin-right"></i>MENU</a> 
    <a href="/profil" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw w3-margin-right"></i>PROFIL</a> 
    <a href="/keranjang" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cart-plus fa-fw w3-margin-right"></i>KERANJANG</a>
    <a href="/selesai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-shopping-basket fa-fw w3-margin-right"></i>SELESAI</a>
    <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
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
    <h1><b>Menu Paket Sushi</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <button class="w3-button w3-black">ALL</button>
      <a href="/homepage"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Paket Sushi</button></a>
      <a href="/pagealacarte"><button class="w3-button w3-white w3-hide-small"><i class="fa fa-cutlery w3-margin-right"></i>Ala Carte Sushi</button></a>
      <a href="/pageminuman"><button class="w3-button w3-white w3-hide-small"><i class="fa fa fa-glass w3-margin-right"></i>Minuman</button></a>
    </div>
    </div>
  </header>

  <!-- MODAL --> 
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  @foreach($tambahmakanan as $tambahmakanan)
  <form method="POST" action="/addtoCart" enctype="multipart/form-data">
    @csrf
    <div class="w3-third w3-container w3-margin-bottom">
      <input type="hidden" name="idmakanan" value="{{$tambahmakanan->id}}"/>
      <input type="hidden" name="harga" value="{{$tambahmakanan->harga}}"/>
      <input type="hidden" name="menu" value="{{$tambahmakanan->nama_prdk}}"/>
      <div><img class="rounded-circle mt-5" width="100px" src="{{asset('makanan/'.$tambahmakanan->images)}}" style="width:100%"></div>
      <div class="w3-container w3-white">
      <p><b>{{$tambahmakanan->nama_prdk}}</b></p>
      <p>{{$tambahmakanan->komposisi}}</p>
      <p>Rp {{$tambahmakanan->harga}}</p>
      <div class="w3-row-padding w3-center">
    <button type="submit" class="button button3">
        Add to Chard
    </button>
    </div>
      </div>
    </div>
</form>
    @endforeach

    
    
    
  </div>
  </div>

<div id="output"></div>
<!-- Load Babel -->
<!-- v6 <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script> -->
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