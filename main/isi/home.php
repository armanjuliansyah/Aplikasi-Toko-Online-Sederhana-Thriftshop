<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

$data_produk = sliderDataProduk();

?>

<div class="site-blocks-cover" style="background-image: url(../../assets/img/shop-temp/towfiqu-barbhuiya-xkArbdUcUeE-unsplash.jpg);" data-aos="fade">
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2">Temukan Pilihan Kebutuhan Anda terbaik</h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4">Memenuhi Kebutuhan anda sesuai trend masa kini</p>
                    <p>
                        <a href="../isi/shop-all.php" class="btn btn-sm btn-primary">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Produk tersedia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">

                    <?php foreach ($data_produk as $hasil_produk) { ?>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="../../assets/img/produk/<?php echo $hasil_produk['nama_gambar']; ?>" alt="Image placeholder" class="img-fluid" alt="fptp">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#"><?php echo $hasil_produk['nama_produk']; ?></a></h3>
                                    <p class="mb-0">Finding perfect <?php echo $hasil_produk['nama_kategori']; ?></p>
                                    <p class="text-primary font-weight-bold"><?php echo $hasil_produk['harga']; ?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('../section/footer.php'); ?>