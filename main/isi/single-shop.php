<?php

// jika tidak ada session tidak boleh melakukan transaksi

require_once('../../fungsi/function.php');

require_once('../section/header.php');

$id_produk = $_GET['id_produk'];

$data_produk = dataProdukTertentu($id_produk);

?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $data_produk['nama_produk']; ?></strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../../assets/img/produk/<?php echo $data_produk['nama_gambar']; ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="text-black"><?php echo $data_produk['nama_produk']; ?></h2>
                <h5><?php echo $data_produk['nama_kategori']; ?></h5>
                <p class="mb-4">
                    <?php echo nl2br($data_produk['deskripsi']);  ?>
                </p>
                <p class="text-dark">Spesifikasi</p>
                <p>
                    Kondisi :<?php echo $data_produk['kondisi']; ?>
                    <br>
                    Bahan : <?php echo $data_produk['bahan']; ?>
                    <br>
                    Ukuran : <?php echo $data_produk['ukuran']; ?>
                    <br>
                    Warna : <?php echo $data_produk['warna']; ?>
                    <br>
                </p>
                <p>Semua Barang hanya tersedia 1 stok</p>
                <p><strong class="text-primary h4">RP <?php echo $data_produk['harga']; ?></strong></p>
                <?php
                if (isset($_SESSION['id_session_login'])) { ?>

                    <?php
                    $hasil_stok = $data_produk['stok'];
                    if ($hasil_stok > 0) { ?>

                        <p><a href="../isi/tambah-transaksi.php?id_produk=<?php echo $data_produk['id_produk']; ?>" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

                    <?php } else { ?>

                        <a class="btn btn-danger btn-xs text-light">Habis</a>
                        <br>

                    <?php } ?>


                <?php } else { ?>
                    <p>Silahkan Login terlebih dahulu untuk melanjutkan transaksi dengan <a href="../isi/login.php">klik ini</a></p>
                <?php } ?>

                <br>
                <p><a href="../isi/home.php" class="buy-now btn btn-sm btn-primary">Kembali</a></p>

            </div>
        </div>
    </div>
</div>



<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>