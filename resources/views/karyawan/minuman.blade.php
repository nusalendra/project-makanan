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
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <a href="/homekaryawan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i class="fa fa-area-chart fa-fw w3-margin-right"></i>DASHBOARD</a> 
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cutlery fa-fw w3-margin-right"></i>MAKANAN</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>PESANAN</a>
    <a href="simpan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-check fa-fw w3-margin-right"></i>SIMPAN</a>
    <a href="/loginkaryawan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
    <h1><b>Tampilan Input Data Minuman</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filter:</span> 
      <a href="/datamakanan"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Makanan</button></a>
      <a href="/dataminuman"><button class="w3-button w3-white w3-hide-small"><i class="fa fa-glass w3-margin-right"></i>Minuman</button></a>
      <a href="/datasnack"><button class="w3-button w3-white"><i class="fa fa-cutlery w3-margin-right"></i>Snack</button></a>
    </div>

  <!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="asset\images\es teh.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Teh</b></p>
        <form id='myform' method='POST' class='quantity' action='#'>
          <input type='button' value='-' class='qtyminus minus' field='quantity' />
          <input type='text' name='quantity' value='0' class='qty' />
          <input type='button' value='+' class='qtyplus plus' field='quantity' />
        </form>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="asset\images\es jeruk.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Jeruk</b></p>
        <form id='myform' method='POST' class='quantity' action='#'>
          <input type='button' value='-' class='qtyminus minus' field='quantity' />
          <input type='text' name='quantity' value='0' class='qty' />
          <input type='button' value='+' class='qtyplus plus' field='quantity' />
        </form>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="asset\images\es coklat.jpg" alt="" style="width:100%">
      <div class="w3-container w3-white">
        <p><b>Es Coklat</b></p>
        <form id='myform' method='POST' class='quantity' action='#'>
          <input type='button' value='-' class='qtyminus minus' field='quantity' />
          <input type='text' name='quantity' value='0' class='qty' />
          <input type='button' value='+' class='qtyplus plus' field='quantity' />
        </form>
      </div>
    </div>
    <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
     <h1>Order</h1>
     <form action="" method="">
      {{csrf_field()}}
     <div class="form-group">
              <label for="exampleInputEmail1">Customer</label>
              <input name=""type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
      </div>
     </form>
     <div class="w3-section w3-bottombar w3-padding-5">
    </div>
      </div>
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
</body>
</html>