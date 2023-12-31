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

        td,
        th {
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
            height: 300px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
    <title>ADMIN PAGE</title>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container">
            <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <h4><b>ADMIN PAGE</b></h4>
            <p class="w3-text-white">Selamat Datang <strong>{{ $user->username }} !</strong></p>
            <p class="w3-text-white">Status Anda saat ini : <strong>{{ $user->role }}</strong></p>
        </div>
        <div class="w3-bar-block">
            <a href="/dashboard" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-cube fa-fw w3-margin-right"></i>DASHBOARD</a>
            <a href="homeadmin" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-white"><i
                    class="fa fa-area-chart fa-fw w3-margin-right"></i>DATA MAKANAN</a>
            <a href="tambahpegawai" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-male fa-fw w3-margin-right"></i>DATA PEGAWAI</a>
            <a href="/datacust" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-group fa-fw w3-margin-right"></i>DATA CUSTOMER</a>
            <a href="/report-pesanan-online" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-folder fa-fw w3-margin-right"></i>REPORT ONLINE</a>
            <a href="/report-pesanan-offline" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-folder fa-fw w3-margin-right"></i>REPORT OFFLINE</a>
            <a href="/loginuser" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-sign-out fa-fw w3-margin-right"></i>LOGOUT</a>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">
        <div class="w3-container">


        </div>
        </header>
    </div>
    </div>

    <div class="w3-row" style="margin-left:320px">
        <h1><b>Data Customer Sushi Key</b></h1>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <td>Bagian</td>
                <th>Tanggal Pembuatan Akun</th>
                <th>Jam Pembuatan Akun</th>
            </tr>
            @foreach ($data_cust as $index => $cust)
                <?php
                $temp = explode(' ', $cust->created_at);
                ?>
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cust->name }}</td>
                    <td>{{ $cust->email }}</td>
                    <td>{{ $cust->role }}</td>
                    <td>{{ $cust->created_at->format('d-m-Y') }}</td>
                    <td>{{ $cust->created_at->format('H:i:s') }}</td>
                </tr>
            @endforeach
            </tr>

    </div>







    <!-- First Photo Grid-->

    </div>

</body>

</html>
