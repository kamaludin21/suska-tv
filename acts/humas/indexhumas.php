<?php
session_start();
require '../../config/function.php';
if (!isset($_SESSION["login"]) || $_SESSION["login"] != true) {
echo "<script> window.location.href='../index.php'; </script>";
exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Suska TV | Humas</title>
        <!-- Favicon-->
        <link rel="icon" href="../../iconz.ico" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="../../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="../../assets/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. -->
        <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />
    </head>
    <body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-teal">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                </div>
                </div>
            </div>
            <p>Sedang Proses...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="javascript:void(0);">
                        <img src="../../images/suskatv.png" width="160" alt="User" style="margin-top: -16px;"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Tasks -->
                        <li class="dropdown pull-right">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <div class="msg pull-left" style="margin: 3.4px 3px 0 0;"><?= $_SESSION["nama"]; ?> </div><i class="material-icons"> account_circle</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="../profil/indexprofil.php"><i class="material-icons">person</i>Profil</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="../profil/indexprofil.php?profilcase=profilcase&task=edit"><i class="material-icons">edit</i>Edit Profil</a></li>
                                <li><a href="../profil/indexprofil.php?profilcase=profilcase&task=password"><i class="material-icons">lock</i>Ubah Password</a></li>
                                <li role="seperator" class="divider"></li>
                                <li><a href="../beranda/logout.php"><i class="material-icons">power_settings_new</i>Keluar</a></li>
                            </ul>
                        </li>
                        <!-- #END# Tasks -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info" style="background: url(../../images/bg-img5.jpg);">
                    <div class="image">
                        <?php
                        $idlogin = $_SESSION["id"];
                        $data = query ("SELECT * FROM user WHERE id=$idlogin")[0];
                        ?>
                        <img src="../../images/profil/<?= $data["gambar"]; ?>" width="68" height="68" alt="User" />
                    </div>
                    <div class="info-container" style="margin-top: -14px;">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION["nama"]; ?></div>
                        <div class="email">Kru - <?= $_SESSION["divisi"]; ?></div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header" style="font-size:13px;">
                            MENU NAVIGASI
                        </li>
                        <li >
                            <a href="../index.php">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <!-- Profil menu sidebar -->
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">account_circle</i>
                                <span>Profil</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../profil/indexprofil.php">Lihat profil</a>
                                </li>
                                <li>
                                    <a href="../profil/indexprofil.php?profilcase=profilcase&task=password">Ubah password</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">group</i>
                                <span>Kru</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../kru/indexkru.php">Tugas</a>
                                </li>
                                <li>
                                    <a href="../kru/indexkru.php?kru=akunkru">Data Kru</a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($_SESSION['divisi'] == 'produksi') { ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">camera</i>
                                <span>Produksi</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../produksi/indexproduksi.php">Program</a>
                                </li>
                                
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=jadwal">Jadwal Produksi</a>
                                </li>
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=kegliputan">Kegiatan Liputan</a>
                                </li>
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=laporan">Laporan</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if ($_SESSION['divisi'] == 'admin') { ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">camera</i>
                                <span>Produksi</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../produksi/indexproduksi.php">Program</a>
                                </li>
                                
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=jadwal">Jadwal Produksi</a>
                                </li>
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=kegliputan">Kegiatan Liputan</a>
                                </li>
                                <li>
                                    <a href="../produksi/indexproduksi.php?produksi=laporan">Laporan</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if ($_SESSION['divisi'] == 'humas') { ?>
                        <li class="active">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">public</i>
                                <span>Humas & Administrasi</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="indexhumas.php">Kelola Surat</a>
                                </li>
                                <li>
                                    <a href="indexhumas.php?humas=publikasi">Daftar Publikasi</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>

                        <?php if ($_SESSION['divisi'] == 'admin') { ?>
                        <li class="active">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">public</i>
                                <span>Humas & Administrasi</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="indexhumas.php">Kelola Surat</a>
                                </li>
                                <li>
                                    <a href="indexhumas.php?humas=publikasi">Daftar Publikasi</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        
                    </div>
                    <!-- #Menu -->
                    <!-- Footer -->
                    <div class="legal">
                        <div class="copyright">
                            &copy; 2017 <a href="javascript:void(0);">SUSKA TV | Management</a>
                        </div>
                    </div>
                    <!-- #Footer -->
                </aside>
                <!-- #END# Left Sidebar -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <!-- Body content main -->
                    <?php
                    $humas = @$_GET['humascase'];
                    switch ($humas) {
                    default:
                    include 'humascase/main.php';
                    break;
                    }
                    ?>
                    <!-- #END# Body Main Content -->
                </div>
            </section>
            <!-- Jquery Core Js -->
            <script src="../../assets/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap Core Js -->
            <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>
            <!-- Select Plugin Js -->
            <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
            <!-- Slimscroll Plugin Js -->
            <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
            <!-- Waves Effect Plugin Js -->
            <script src="../../assets/plugins/node-waves/waves.js"></script>
            <!-- Jquery DataTable Plugin Js -->
            <script src="../../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
            <script src="../../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
            <script src="../../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
            <!-- Custom Js -->
            <script src="../../assets/js/admin.js"></script>
            <script src="../../assets/js/pages/tables/jquery-datatable.js"></script>
            <!-- Demo Js -->
            <script src="../../assets/js/demo.js"></script>
        </body>
    </html>