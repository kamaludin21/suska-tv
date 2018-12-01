<?php
require 'config/function.php';
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
            background-color: #2B2728;
            /* The image used */
            /*background-image: url('images/bg/bg5.jpg');
            background-size: cover;
            background-position: fixed;
            background-repeat: no-repeat;*/   
        }
    </style>
    <body class="fp-page bg">
        <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>SUSKA TV</b></a>
            <small>Satu Untuk Beragam Inspirasi</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Masukkan alamat email yang telah anda daftarkan. Kami akan mengirimkan alamat untuk reset password anda.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-blue waves-effect" type="submit">RESET PASSWORD SAYA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="index.php" class="btn btn-primary" style="color: #fff;">LOGIN</a>
                        
                    </div>
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
