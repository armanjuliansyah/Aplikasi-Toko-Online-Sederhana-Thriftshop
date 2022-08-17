<?php


require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../isi/auth-check.php');

// $id_produk = $_GET['id_produk'];

// $id_user = $_SESSION['id_session_login'];

// $transaksi_produk = tambahDataTransaksi($id_produk, $id_user);


$data_transaksi_produk = tampilDataTransaksiUser($_SESSION['id_session_login']);
$check_data_transaksi = count($data_transaksi_produk);

$jumlah_pembelian = hitungTransaksi($_SESSION['id_session_login']);


?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
    </div>
</div>

<?php if ($check_data_transaksi == 0) { ?>

    <div class="site-section">
        <div class="container">
            <h2>Keranjang Masih Kosong</h2>
            <p>Kembali <a href="../isi/shop.php">Belanja</a></p>
            <p>Belum login ? <a href="../isi/login.php">Klik ini</a></p>
        </div>
    </div>


<?php } else { ?>
    <div class="site-section">
        <div class="container">

            <p> Noted: Apabila ada barang pilihan anda tidak ada di daftar keranjang atau transaksi dikarenakan barang pilihan anda <b class="text-danger">telah habis</b> atau <b class="text-danger">telah terjual</b> dengan kondisi stok terakhir</p>
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Nomor</th>
                                    <th class="product-thumbnail">ID Transaksi</th>
                                    <th class="product-thumbnail">User</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_transaksi_produk as $hasil) { ?>

                                    <tr>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <?php if ($hasil['stok'] > 0) { ?>
                                                <?php echo $hasil['id transaksi']; ?>
                                            <?php } else { ?>
                                                <?php hapusDataTransaksi($hasil['id transaksi']); ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php echo $hasil['nama user']; ?>
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="../../assets/img/produk/<?php echo $hasil['nama gambar']; ?>" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"> <?php echo $hasil['produk']; ?></h2>
                                        </td>
                                        <td> <?php echo $hasil['harga']; ?></td>
                                        <td>
                                            <?php echo $hasil['jumlah']; ?>

                                        </td>
                                        <td> <?php echo $hasil['harga']; ?></td>
                                        <td><a href="../isi/hapus-transaksi.php?id_transaksi=<?php echo $hasil['id transaksi']; ?>" class="btn btn-primary btn-sm">X</a></td>
                                    </tr>

                                <?php

                                    $no++;
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Total Pembelian</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"><?php echo $jumlah_pembelian['jumlah']; ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Lanjutkan Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>