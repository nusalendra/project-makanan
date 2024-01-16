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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> --}}
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
            background-color: #FFFFFF;
            /* Green */
            border: 0.5 px;
            color: black;
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

        /* Gaya dasar untuk container utama */
        .container {
            max-width: 1140px;
            /* Sesuaikan dengan lebar yang diinginkan */
            margin: 0 auto;
            /* Membuat container berada di tengah halaman */
            /* Ruang di sekitar konten */
        }

        /* Gaya dasar untuk elemen canvas */
        .canvas-container {
            margin-bottom: 20px;
            /* Ruang bawah di antara elemen canvas */
        }

        /* Gaya dasar untuk grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Dua kolom dengan lebar yang sama */
            gap: 20px;
            /* Ruang antara kolom */
        }

        /* Gaya dasar untuk elemen canvas dalam grid */
        .grid .canvas {
            width: 100%;
            /* Lebar penuh */
        }

        #tanggal {
            display: inline-block;
            padding: 10px;
            font-size: 16px;
            background-color: orangered;
            /* Warna latar belakang tombol */
            color: #fff;
            /* Warna teks tombol */
            border: none;
            cursor: pointer;
        }

        #inputTanggal[disabled] {
            color: #000;
            /* Warna teks input */
            background-color: #fff;
            /* Warna latar belakang input */
            border: 1px solid #ccc;
            /* Garis tepi input */
            padding: 5px;
            font-size: 16px;
        }

        #bulan {
            display: inline-block;
            padding: 10px;
            font-size: 16px;
            background-color: orangered;
            /* Warna latar belakang tombol */
            color: #fff;
            /* Warna teks tombol */
            border: none;
            cursor: pointer;
        }

        #inputBulan[disabled] {
            color: #000;
            /* Warna teks input */
            background-color: #fff;
            /* Warna latar belakang input */
            border: 1px solid #ccc;
            /* Garis tepi input */
            padding: 5px;
            font-size: 16px;
        }

        .well {
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .offline-box {
            background-color: #3498db;
            /* Warna biru */
            color: #ffffff;
            /* Warna teks putih */
        }

        .online-box {
            background-color: #3498db;
            /* Warna hijau */
            color: #ffffff;
            /* Warna teks putih */
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
            <h1><b>Dashboard</b></h1>
            <div class="w3-section w3-bottombar "></div>
            <div style="text-align: center">
                <h3 style="font-weight: bold">Filter Tanggal Pesanan Harian</h3>
                <div style="display: flex; justify-content: center">
                    <button id="tanggal">
                        Pilih Tanggal
                    </button>
                    <h4 style="margin-left: 5px; margin-right: 5px;">-</h4>
                    <input type="text" id="inputTanggal" name="inputTanggal" disabled style="text-align: center">
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="container-fluid">
                    <div class="row content" style="margin-top: 20px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="well offline-box">
                                    <h4 class="text-center" style="font-weight: bold;">Total Pendapatan Harian Offline
                                    </h4>
                                    <p id="totalPendapatanOffline" class="text-center">Rp. <span class="amount">0</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="well online-box">
                                    <h4 class="text-center" style="font-weight: bold;">Total Pendapatan Harian Online
                                    </h4>
                                    <p id="totalPendapatanOnline" class="text-center">Rp. <span class="amount">0</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <h3 style="font-weight: bold">Filter Pesanan Bulanan</h3>
                            <div style="display: flex; justify-content: center">
                                <button id="bulan">
                                    Pilih Bulan
                                </button>
                                <h4 style="margin-left: 5px; margin-right: 5px;">-</h4>
                                <input type="text" id="inputBulan" name="inputBulan" disabled
                                    style="text-align: center">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="well offline-box">
                                <h4 class="text-center" style="font-weight: bold;">Total Pendapatan Bulanan
                                </h4>
                                <p id="totalPendapatanBulanan" class="text-center">Rp. <span class="amount">0</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#tanggal", {
                    dateFormat: "d-m-Y", // Format tanggal yang diinginkan
                    onClose: function(selectedDates, dateStr, instance) {
                        document.getElementById('inputTanggal').value = dateStr;
                        // Menggunakan jQuery untuk mengirim nilai dateFormat ke server
                        var dateFormatValue = dateStr;
                        console.log(dateFormatValue);
                        $.ajax({
                            type: 'POST',
                            url: 'api/get-data-tanggal', // Sesuaikan dengan rute yang Anda buat di Laravel
                            data: {
                                filterTanggal: dateFormatValue
                            }, // Menggunakan nama parameter yang sesuai dengan yang diharapkan oleh controller
                            success: function(response) {
                                // console.log(response);
                                // console.log('Data berhasil dikirim ke server');
                                // console.log(response.totalPendapatanOffline);
                                // Menangkap respons dan menampilkan data di dalam elemen masing-masing
                                $('#totalPendapatanOffline').text(
                                    'Rp. ' + response
                                    .totalPendapatanOffline);
                                $('#totalPendapatanOnline').text(
                                    'Rp. ' + response
                                    .totalPendapatanOnline);
                            },
                            error: function(error) {
                                console.error('Gagal mengirim data ke server', error
                                    .responseText);
                            }
                        });
                    }
                });

                flatpickr("#bulan", {
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: true, //defaults to false
                            dateFormat: "m-Y", //defaults to "F Y"
                            altFormat: "F Y", //defaults to "F Y"
                            // theme: "dark" // defaults to "light"
                        })
                    ],
                    onClose: function(selectedDates, dateStr, instance) {
                        document.getElementById('inputBulan').value = dateStr;
                        // Menggunakan jQuery untuk mengirim nilai dateFormat ke server
                        var dateFormatValue = dateStr;
                        console.log(dateFormatValue);
                        $.ajax({
                            type: 'POST',
                            url: 'api/get-data-bulan', // Sesuaikan dengan rute yang Anda buat di Laravel
                            data: {
                                filterBulan: dateFormatValue
                            }, // Menggunakan nama parameter yang sesuai dengan yang diharapkan oleh controller
                            success: function(response) {
                                console.log(response);
                                // console.log('Data berhasil dikirim ke server');
                                // console.log(response.totalPendapatanBulanan);
                                // Menangkap respons dan menampilkan data di dalam elemen masing-masing
                                $('#totalPendapatanBulanan').text(
                                    'Rp. ' + response
                                    .totalPendapatanBulanan);
                            },
                            error: function(error) {
                                console.error('Gagal mengirim data ke server', error
                                    .responseText);
                            }
                        });
                    }
                });

            });
        </script>
</body>

</html>
