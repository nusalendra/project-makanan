<!DOCTYPE html>
<html>
<head>
<title>Landing Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("/asset/images/sushi_2.jpg");
  min-height: 75%;
}

.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: #f44336; 
  color: white; 
  border: 2px solid black;
}

.button1:hover {
  background-color: black;
  color: white;
}

.menu {
  display: none;
}

.container {
        display: flex;
        background: #393646;
        align-items: center;
        justify-content: center
      }
      img {
        max-width: 100%
      }
      .image {
        flex-basis: 40%
      }
      .text {
        font-size: 20px;
        color: white;
        padding-left: 20px;
      }

      .container2 {
        display: flex;
        background: #393646;
        align-items: center;
        justify-content: center
      }
      img {
        max-width: 100%
      }
      .image2 {
        flex-basis: 40%
      }
      .text2 {
        font-size: 20px;
        color: white;
        padding-left: 20px;
      }

</style>
</head>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-red">HOME</a>
    </div>
    <div class="w3-col s4">
      <a href="#menu" class="w3-button w3-block w3-red">MENU</a>
    </div>
    <div class="w3-col s5">
      <a href="#where" class="w3-button w3-block w3-red">LOCATION</a>
    </div>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Open from 6am to 5pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:40px">SELAMAT DATANG DI WEBSITE<br>SUSHI KEY</span>
    <p><a href="/homepage" class="button button1">ORDER!</a></p>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-white w3-large">

<!-- About Container -->
<div class="w3-container" id="where">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">LOKASI OUTLET</span></h5>
    <div class="container">
      <div class="image">
        <img src="asset/images/outlet.jpeg">
      </div>
      <div class="text">
        <h5>Jl. Raya Canggu, Kerobokan, Kec. Kuta Utara, Kabupaten Badung, Bali 80361</h5>
      </div>
    </div>
    <br>
    <div class="container2">
      <div class="image2">
        <img src="asset/images/outlet2.jpeg">
      </div>
      <div class="text2">
        <h5>Jl. Raya Nyuh Kuning, MAS, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571</h5>
      </div>
    </div>
    
  </div>
</div>

<!-- Menu Container -->
<div class="w3-container" id="menu">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE MENU</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
        <div class="w3-col s6 tablink">Eat</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
        <div class="w3-col s6 tablink">Drink</div>
      </a>
    </div>

    <div id="Eat" class="w3-container menu w3-padding-48 w3-card">
      <h5>Crabby Fry Roll (31K)</h5>
      <p class="w3-text-grey">Crabstick, creamcheese, avo, cucumber top with mentai sauce, mayo, sesame seeds</p><br>
    
      <h5>Shrimp Fry Roll (36K)</h5>
      <p class="w3-text-grey">Shrimp tempura, avo, cucumber top with mentai sauce, eel sauce, tobiko </p><br>
    
      <h5>Salmon Fry Roll (43K)</h5>
      <p class="w3-text-grey">Grill salmon, avo, cucumber top with mayo, cheese mayo, eel sauce </p><br>
    
      <h5>Chicken Fry Roll (31K)</h5>
      <p class="w3-text-grey">Grill chicken, avo, cucumber top with mayo, teriyaki, chicken floes</p><br>
    
      <h5>Dory Fry Roll (32K)</h5>
      <p class="w3-text-grey">Dory, avo, cucumber top with spicy mayo, eel sauce, green onion </p><br>

      <h5>Tuna Fry Roll (31K)</h5>
      <p class="w3-text-grey">Grill tuna, avo, cucumber, top with spicy cheese mayo, green onion </p><br>

      <h5>Tofu Fry Roll (28K)</h5>
      <p class="w3-text-grey">Tofu teriyaki, carrot, cucumber, avo, top with spicy mayo, teriyaki sauce</p><br>

      <h5>Mushroom Fry Roll (30K)</h5>
      <p class="w3-text-grey">Mushroom, carrot, avo cucumber, top with eel sauce, green onion</p><br>

      <h5>Salmon Roll (32K)</h5>
      <p class="w3-text-grey">Salmon tempura, avocado, cucumber, top with mayo and sesame seeds</p><br>

      <h5>Spicy Salmon Roll (33K)</h5>
      <p class="w3-text-grey">Salmon tempura, avo, cucumber, top with spicy mayo, mayo, and eel sauce</p><br>

      <h5>Creamy & Spicy salmon (37K)</h5>
      <p class="w3-text-grey">Salmon tempura, creamcheese, avo, top with spicy mayo and crunchy potato</p><br>

      <h5>Salmon Crab Crunch (38K)</h5>
      <p class="w3-text-grey">Salmon tempura, avo, cucumber, crab tempura, top with mayo, crab tempura, cheese mayo & eel sauce</p><br>

      <h5>Salmon & Veggie Roll (35K)</h5>
      <p class="w3-text-grey">Salmon tempura, carrot, avo, cucumber, top with mayo, eel sauce, and green onion</p><br>

      <h5>Crabby Salmon Roll (40K)</h5>
      <p class="w3-text-grey">Salmon tempura, cucumber, creamcheese, top with crabstick, mayo, cheese mayo, eel sauce and sesame seeds</p><br>

      <h5>Salmond Mentai Roll (42K)</h5>
      <p class="w3-text-grey">Salmon tempura, creamcheese, avo, cucumber, top with mentai sauce, avo mayo, and tobiko</p><br>

      <h5>Tuna Roll (22K)</h5>
      <p class="w3-text-grey">Tuna, avo, cucumber. (Choose: Grill tuna / Tuna tempura)</p><br>

      <h5>Tuna Mayo Roll (23K)</h5>
      <p class="w3-text-grey">Tuna, avo, cucumber top with mayo. (Choose: Grill tuna / Tuna tempura)</p><br>
      
      <h5>Spicy Tuna Roll (23K)</h5>
      <p class="w3-text-grey">Tuna, avo, cucumber top with spicy mayo. (Choose: Grill tuna / Tuna tempura)</p><br>

      <h5>Tuna Crunch Roll (25K)</h5>
      <p class="w3-text-grey">Tuna, avo, cucumber top with mayo and crunchy flakes. (Choose: Grill tuna / Tuna tempura)</p><br>
      
      <h5>Spicy Tuna Crunch (25K)</h5>
      <p class="w3-text-grey">Tuna, avo, cucumber top with spicy mayo and crunchy flakes. (Choose: Grill tuna / Tuna tempura)</p><br>

      <h5>Sweet & Creamy Tuna (29K)</h5>
      <p class="w3-text-grey">Tuna tempura, avo, creamcheese, top with mayo and eel sauce</p><br>

      <h5>King Tuna Roll (32K)</h5>
      <p class="w3-text-grey">Tuna tempura, creamcheese, avo, cucumber, top with crabstick, mayo, tobiko, and eel sauce</p><br>

      <h5>Combo Tuna Salmon (41K)</h5>
      <p class="w3-text-grey">Tuna & salmon, avo cucumber, top with sesame seeds, mentai sauce, eel sauce, crunchy potato, green onion</p><br>

      <h5>Cucumber Roll (10K)</h5>
      <p class="w3-text-grey">Cucumber roll in rice and seaweed sheet</p><br>

      <h5>Avocado Roll (14K)</h5>
      <p class="w3-text-grey">Avocado roll in rice and seaweed sheet</p><br>

      <h5>Avo Cucumber Roll (16K)</h5>
      <p class="w3-text-grey">Avocado & cucumber roll in rice and seaweed sheet</p><br>

      <h5>Avo Mango Roll (16K)</h5>
      <p class="w3-text-grey">Avocado, mango, cucumber</p><br>

      <h5>Teriyaki Tofu Roll (22K)</h5>
      <p class="w3-text-grey">Teriyaki tofu, carrot, cucumber, avocado, top with spicy mayo and teriyaki sauce</p><br>

      <h5>Mushroom Roll (24K)</h5>
      <p class="w3-text-grey">Sautee mushroom, carrot, cucumber, avocado, top with toasted sesame seeds</p><br>

      <h5>Crunchy Eggplant (19K)</h5>
      <p class="w3-text-grey">Eggplant tempura, avocado, cucumber, top with mayo, crunchy flakes, and eel sauce</p><br>

      <h5>Tamago Roll (19K)</h5>
      <p class="w3-text-grey">Egg omellete, avocado, cucumber, top with sesame seeds and eel sauce</p><br>

      <h5>Mushi Mushi Roll (30K)</h5>
      <p class="w3-text-grey">Mushroom, eggplant, cucumber, top with avocado, sesame seeds, spicy mayo, and eel sauce</p><br>

      <h5>Chicken Roll (20K)</h5>
      <p class="w3-text-grey">Chicken, avo, cucumber. (Choose: grill chicken / chicken katsu)</p><br>

      <h5>Chicken Mayo / Spicy (21K)</h5>
      <p class="w3-text-grey">Chicken, avo, cucumber mayo / spicy mayo. (Choose: grill chicken / chicken katsu)</p><br>

      <h5>Chicken Crunch / Spicy (23K)</h5>
      <p class="w3-text-grey">Chicken, avo, cucumber, crunchy flakes, mayo / spicy mayo. (Choose: grill chicken / chicken katsu)</p><br>
    
      <h5>Chic & Chic Roll (25K)</h5>
      <p class="w3-text-grey">Chicken katsu, cucumber, avocado, top with mayo, teriyaki sauce, and chicken floss</p><br>

      <h5>Chicken Teriyaki (25K)</h5>
      <p class="w3-text-grey">Grill chicken in teriyaki sauce, cucumber, avo, top with spicy mayo, eel sauce, sesame seed</p><br>

      <h5>California Roll (17K)</h5>
      <p class="w3-text-grey">Crabstick, avocado, cucumber, sesame seeds</p><br>

      <h5>California Mayo / Spicy (18K)</h5>
      <p class="w3-text-grey">California roll top with mayo / spicy mayo</p><br>

      <h5>California Crunch (20K)</h5>
      <p class="w3-text-grey">California roll top with mayo and crunchy flakes</p><br>  

      <h5>California Spicy Crunch (20K)</h5>
      <p class="w3-text-grey">California roll top with spicy mayo and crunchy flakes</p><br>  

      <h5>Special California (22K)</h5>
      <p class="w3-text-grey">Crabstick, avocado, cucumber, tobiko</p><br>  

      <h5>Crab Queen Roll (26K)</h5>
      <p class="w3-text-grey">Crab tempura, avo, creamscheese, top with tobiko, mayo, and eel sauce</p><br>  

      <h5>Cheesy Crab Roll (24K)</h5>
      <p class="w3-text-grey">Crabstick, creamsheese, cucumber, avo, top with cheese mayo and cheddar</p><br> 

      <h5>Crab Tempura Roll (19K)</h5>
      <p class="w3-text-grey">Crab tempura, avocado, cucumber</p><br> 

      <h5>Crab Tempura Mayo / Spicy (20K)</h5>
      <p class="w3-text-grey">Crab tempura roll top with mayo / spicy mayo</p><br> 

      <h5>Crab Tempura Crunch / Spicy (22K)</h5>
      <p class="w3-text-grey">Crab tempura roll top with crunchy flakes and mayo / spicy mayo</p><br> 

      <h5>Dory Roll (23K)</h5>
      <p class="w3-text-grey">Dory tempura, avo, cucumber</p><br> 

      <h5>Dory Mayo Roll (24K)</h5>
      <p class="w3-text-grey">Dory tempura roll top with mayo</p><br> 

      <h5>Spicy Dory Roll (24K)</h5>
      <p class="w3-text-grey">Dory tempura roll top with mayo and crunchy flakes</p><br> 

      <h5>Dory Crunch Roll (26K)</h5>
      <p class="w3-text-grey">Dory tempura roll top with mayo and crunchy flakes</p><br> 

      <h5>Spicy Dory Crunch (26K)</h5>
      <p class="w3-text-grey">Dory tempura roll top with spicy mayo and crunchy flakes</p><br>
      
      <h5>Special Shrimp Roll (32K)</h5>
      <p class="w3-text-grey">Shrimp tempura, crabstick, creamcheese, avo, top with tobiko, mayo, and eel sauce</p><br> 

      <h5>Eggy Shrimp Roll (27K)</h5>
      <p class="w3-text-grey">Shrimp tempura, avo, cucumber, top with egg, carrot, teriyaki sauce, and mentai sauce</p><br> 

      <h5>Sea Roll (30K)</h5>
      <p class="w3-text-grey">Shrimp & dory tempura, avo, cucumber, top with mayo, cheese mayo, eel sauce, and sesame seeds</p><br> 

      <h5>Doryko Roll (38K)</h5>
      <p class="w3-text-grey">Dory tempura, creamcheese, avo, cucumber top with tobiko and mayo</p><br> 

      <h5>Dory Crap Roll (30K)</h5>
      <p class="w3-text-grey">Dory tempura, creamcheese, avo, top with crabstick, mayo and mentai sauce</p><br> 

      <h5>Shrimp Tempura Roll (23K)</h5>
      <p class="w3-text-grey">Shrimp tempura, avocado, cucumber</p><br> 

      <h5>Shrimp Tempura Mayo (24K)</h5>
      <p class="w3-text-grey">Shrimp tempura roll top with mayo</p><br>
      
      <h5>Spicy Shrimp Tempura (24K)</h5>
      <p class="w3-text-grey">Shrimp tempura roll top with spicy mayo</p><br> 

      <h5>Shrimp Tempura Crunch (26K)</h5>
      <p class="w3-text-grey">Shrimp tempura roll top with mayo and crunchy flakes</p><br> 

      <h5>Spicy Shrimp Crunch (26K)</h5>
      <p class="w3-text-grey">Shrimp tempura roll top with spicy mayo and crunchy flakes</p><br> 

    </div>

    <div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
      <h5>Coffee</h5>
      <p class="w3-text-grey">Regular coffee 2.50</p><br>
    
      <h5>Chocolato</h5>
      <p class="w3-text-grey">Chocolate espresso with milk 4.50</p><br>
    
      <h5>Corretto</h5>
      <p class="w3-text-grey">Whiskey and coffee 5.00</p><br>
    
      <h5>Iced tea</h5>
      <p class="w3-text-grey">Hot tea, except not hot 3.00</p><br>
    
      <h5>Soda</h5>
      <p class="w3-text-grey">Coke, Sprite, Fanta, etc. 2.50</p>
    </div>  
  </div>
</div>

<!-- Contact/Area Container -->


<!-- End page content -->
</div>

<!-- Footer -->

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
