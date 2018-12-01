<?php
require 'config/function.php';

if(isset($_POST["kirim"])) {
    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('Silahkan Login untuk Melanjutkan!');
                window.location.href='index.php';
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Suska TV | Daftar</title>
        <!-- Favicon-->
        <link rel="icon" href="iconz.ico" type="image/x-icon">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
        
        <!-- Custom Css -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <style type="text/css">
        .bg {
            /*background-color: #292F36;
            *//* The image used */
            /*background-image: url('images/bg/bg5.jpg');
            background-size: cover;
            background-position: fixed;
            background-repeat: no-repeat;*/ 
            background-image: url('images/bg/bg4.jpg');
            background-size: cover;
            background-position: fixed;
            background-repeat: no-repeat;  
        }
    </style>
    <body class="signup-page bg" style="max-width: 700px;">
        <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);" class="col-blue-grey"><b>SUSKA TV</b></a>
            <small>Satu Untuk Beragam Inspirasi</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="" method="POST">
                    <div class="msg" >
                        <b style="font-size: 24px;">Registrasi Akun Baru</b>
                    </div>

                    <div class="row clearfix">
                    <div class="col-sm-6">
                        <label>Nama Lengkap</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">accessibility</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap anda" autofocus autocomplete="off" required>
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Username</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="username" class="form-control" minlength="4" placeholder="Username digunakan sebagai login">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row clearfix">
                    <div class="col-sm-6">
                        <label>Email</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" name="email" class="form-control" placeholder="Pastikan anda memasukkan email aktif">
                        </div>
                    </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Nomor Handphone</label>
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">contacts</i>
                        </span>
                        <div class="form-line">
                            <input type="number" name="nohp" class="form-control" placeholder="Pastikan nomor yang aktif">
                        </div>
                    </div>
                    </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Jenis Kelamin</h2>
                            <div class="demo-radio-button">
                                <input name="jk" value="lk" type="radio" class="with-gap" id="radio_3">
                                <label for="radio_3" >Laki-laki</label>
                                <input name="jk" value="pr" type="radio" id="radio_4" class="with-gap">
                                <label for="radio_4" >Perempuan</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Tanggal Lahir</h2>
                            <div class="form-group form-float">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    <div class="form-line">
                                        <input type="date" name="tgl" id="date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                    <div class="col-sm-6">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" minlength="6" placeholder="Masukkan password" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Ulangi password" required>
                            </div>
                        </div>
                    </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit" name="kirim" >DAFTAR</button>
                    <a href="index.php" class="btn btn-block btn-lg bg-green waves-effect">LOGIN</a>

                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="assets/plugins/node-waves/waves.js"></script>

        <!-- Validation Plugin Js -->
        <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- API Google reCaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- Custom Js -->
        <script src="assets/js/admin.js"></script>
        <script src="assets/js/pages/examples/sign-up.js"></script>
    </body>

    </html>
