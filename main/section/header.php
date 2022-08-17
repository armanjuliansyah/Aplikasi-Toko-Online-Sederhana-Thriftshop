<?php
session_start();

require_once('../../fungsi/function.php');


if (isset($_SESSION['id_session_login'])) {
    $jumlah_transaksi = jumlahTransaksiProdukUser($_SESSION['id_session_login']);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GU-Thrift Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../../assets/css/aos.css">

    <link rel="stylesheet" href="../../assets/css/style-2.css">

</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <input type="text" readonly class="form-control border-0" placeholder="GETUP-TS">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="../isi/home.php" class="js-logo-clone">GetUP-TS</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">

                                <?php

                                if (isset($_SESSION['id_session_login'])) {

                                ?>
                                    <ul>
                                        <li><a href="../isi/user-detail.php"><span class="icon icon-settings"></span></a>
                                        </li>
                                        <li><a href="../isi/riwayat-transaksi.php"><span class="icon icon-list"></span></a></li>
                                        <li>
                                            <a href="../isi/cart.php" class="site-cart">
                                                <span class="icon icon-shopping_cart"></span>
                                                <span class="count"><?php echo $jumlah_transaksi; ?></span>
                                            </a>
                                        </li>
                                        <li><a href="../isi/nota-pembelian.php"><span class="icon icon-list-alt"></span></a>
                                        </li>
                                        <li>
                                            <a href="../../main/isi/logout.php"><span class="icon icon-arrow-left"></span></a>
                                        </li>
                                        <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                                        </li>
                                    </ul>

                                <?php } else { ?>
                                    <ul>
                                        <li><a href="../isi/login.php"><span class="icon icon-person"></span></a></li>
                                    </ul>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li><a href="../isi/home.php">Home</a></li>
                        <li><a href="../isi/about.php">About</a></li>
                        <li><a href="../isi/shop-all.php">Shop</a></li>
                    </ul>
                </div>
            </nav>
        </header>