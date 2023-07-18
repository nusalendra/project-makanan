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

</style>
<title>ORDER PAGE</title>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>ORDER PAGE</b></h4>
    <p class="w3-text-white">Welcome to order page!</p>
  </div>
</nav>
<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4><b>ORDER PAGE</b></h4>
    <p class="w3-text-white">Welcome to order page!</p>
  </div>
  <div class="w3-bar-block">
    <a href="orderoffline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>ORDER OFFLINE</a> 
    <a href="orderonline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-margin-right"></i>ORDER ONLINE</a>
    <a href="/keranjangoffline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cart-plus fa-fw w3-margin-right"></i>KERANJANG</a>
    <a href="/loginpelayan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
  </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px">
<div class="w3-container">
<div class="w3-row-padding">
<h1>Daftar Orderan Offline</h1>
    <table class="table">
        <tr>
        <th>Select</th>
        <th>Pesanan</th> 
        <th>Qty</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
        <th>Action</th>
        </tr>
        @foreach($orderoffline as $orderoffline)
        <tr>
          <td><div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="customCheck1" checked></td>
          <td>{{$orderoffline->pesanan}}</td>
          <td>{{$orderoffline->qty}}</td>
          <td>Rp.{{$orderoffline->harga}},00</td>
          <td>Rp.{{$orderoffline->harga * $orderoffline->qty}},00</td>
          <td>
          <a class="btn fa fa-trash w3-red" data-toggle="modal" data-target="#myModal"></a>
          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">WARNING!</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus pesanan?</p>
        </div>
        <div class="modal-footer">
         <a href="/hapusorderoffline/{{$orderoffline->id}}" class="btn btn-primary">Delete</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
        <a href="/prosesviewdataorderoffline/{{$orderoffline->id}}" class="btn fa fa-file-text w3-blue"></a>
          </td>
        </tr>
        @endforeach
</div>
</div>
</div>


 




 <!-- First Photo Grid-->
 
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

<script>
      function fun_remove() {
         var element = document.getElementById("id_dropdown");
         element.remove(element.selectedIndex);
      }
   </script>

</body>
</html>