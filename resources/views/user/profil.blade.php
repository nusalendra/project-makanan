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
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        .button {
            background-color: #4CAF50;
            /* Green */
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
            position: absolute;
            bottom: 10%;
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
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>SUSHI KEY</b></h4>
            <p class="w3-text-white">Welcome to Sushi Key!</p>
        </div>
        <div class="w3-bar-block">
            <a href="/homepage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-cutlery fa-fw w3-margin-right"></i>MENU</a>
            <a href="/profil" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-user fa-fw w3-margin-right"></i>PROFIL</a>
            <a href="/keranjang" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-cart-plus fa-fw w3-margin-right"></i>KERANJANG</a>
            <a href="/selesai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-shopping-basket fa-fw w3-margin-right"></i>SELESAI</a>
            <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
        </div>
        <div class="w3-panel w3-large">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">

        <header id="portfolio">
            <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;"
                    class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
            <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                    class="fa fa-bars"></i></span>
            <div class="w3-container">
                <form action="/ubahprofil/{{ $user->id }}" method="POST">
                    @csrf
                    <h1><b>PROFIL</b></h1>
                    <div class="w3-section w3-bottombar ">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="" class="form-control" id="" value="{{ $user->username }}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="" class="form-control" id="" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="" class="form-control" id="" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                        <input type="checkbox" onclick="myFunction()"> Show Password
                        <script>
                            function myFunction() {
                                var x = document.getElementById("pwd");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>

                    </div>
                    <div class="form-group">
                        <label for="tlp">Telepon:</label>
                        <input type="number" name="telepon" class="form-control" id="tlp" value="{{ $user->telepon }}">
                    </div>
                    <button type="submit" class="btn fa w3-blue">Simpan</button>
                </form>
            </div>
        </header>
</body>

</html>
