<?php
session_start();
require 'config/function.php';

        if (isset($_SESSION["login"])) {
            header("location: acts/index.php");
            exit;

        } if (isset($_POST["kirim"])) {
            global $conn;

            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            $result = mysqli_query ($conn, "SELECT * FROM user WHERE username ='$username'");
            // cek username
            if (mysqli_num_rows($result) === 1) {
                // cek password
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row["password"])) {
                    if ($row["status"] == 'Y') {

                        $_SESSION["login"] = true;
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["nama"] = $row["nama"];
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["divisi"] = $row["divisi"];
                        $idlogin = $_SESSION["id"];

                        header("location: acts/index.php");
                        exit;
                    } else { $error1 = true;
                    }
                }
            } $error = true;

        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Suska TV | Login</title>
        
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

        <!-- Sweetalert -->
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>
    <!-- style="" -->
    <style media="screen">
    .bg {
    /*background-color: #292F36;
*/
    
    background-image: url('images/bg/bg4.jpg');
    background-size: cover;
    background-position: fixed;
    background-repeat: no-repeat;
    

    /*background: #0f0c29;*/  /* fallback for old browsers */
    /*background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);*/  /* Chrome 10-25, Safari 5.1-6 */
    /*background: linear-gradient(to right, #24243e, #302b63, #0f0c29);*/ /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    </style>
    <body class="login-page bg">
        <div class="row clearfix" >
            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-12">
                <div class="login-box">
                    <div class="logo">
                        <a href="javascript:void(0);" class="col-blue-grey"><b>SUSKA TV</b></a>
                        <small class="col-blue-grey">Satu Untuk Beragam Inspirasi</small>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="sign_in" action="" method="POST">
                                <div class="msg">Masuk dengan akun anda</div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <?php if(isset($error) ) { ?>

                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Username atau Password salah!
                            </div>
                                <?php } if (isset($error1) ) { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Atau Akun Anda Non-Aktif
                            </div>
                                <?php } ?>
                                <!-- Google reCAPTCHA -->
                                <!-- <div class="form-group" style="padding-left: 10px;">
                                   
                                    <div class="g-recaptcha" data-sitekey="<?= $site_key; ?>"></div>
                                    
                                </div> -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-block btn-lg btn-primary waves-effect" type="submit"
                                        name="kirim">LOGIN</button>
                                    </div>
                                </div>
                                <div class="row m-t-15 m-b--20">
                                    <div class="col-xs-6">
                                        <a href="registrasi.php" class="col-blue-grey">DAFTAR!</a>
                                    </div>
                                    <div class="col-xs-6 align-right">
                                        <a href="forgotpassword.php" class="col-blue-grey">LUPA PASSWORD?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
        <script src="assets/js/pages/examples/sign-in.js"></script>

    </body>
</html>