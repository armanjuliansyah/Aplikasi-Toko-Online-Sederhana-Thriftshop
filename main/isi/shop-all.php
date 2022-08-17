<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');


$data_kategori = semuaDataKategoriProduk();

$jml_produk   = JumlahProduk();

// ketika user click produk dengan group tertentu maka akan menghasilkan data tertentu jua

?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black h5">Shop All</h2>
                        </div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Latest
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">

                                    <?php foreach ($data_kategori as $hasil_kategori) {
                                    ?>

                                        <a class="dropdown-item" href="../isi/shop.php?id_group=<?php echo $hasil_kategori['id_kategori_produk']; ?>"><?php echo $hasil_kategori['nama_kategori']; ?></a>
                                        <!-- <a class="dropdown-item" href="#">Women</a>
                                    <a class="dropdown-item" href="#">Children</a> -->

                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mb-5">

                    <?php

                    // page nomor atau limit tampilan group per produk
                    $batas = 5;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $jumlah_data = $jml_produk['jumlah'];;
                    $total_halaman = ceil($jumlah_data / $batas);
                    $data_group_produk = semuaDataProduk($halaman_awal, $batas);

                    $no = $halaman_awal + 1;
                    ?>


                    <?php foreach ($data_group_produk as $produk_hasil) { ?>
                        <div class="col-sm-6 col-lg-4 mb-4 " data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="../isi/single-shop.php?id_produk=<?php echo $produk_hasil['id_produk']; ?>"><img src="../../assets/img/produk/<?php echo $produk_hasil['nama_gambar']; ?>" alt="Image placeholder" class="img-fluid"></a>
                                </figure>

                                <div class="block-4-text p-4 ">
                                    <h3> <a href="../isi/single-shop.php?id_produk=<?php echo $produk_hasil['id_produk']; ?>"><?php echo $produk_hasil['nama_produk']; ?></a></h3>
                                    <p class="mb-0">Finding perfect <?php echo $produk_hasil['nama_kategori']; ?></p>
                                    <p class="text-primary font-weight-bold"><?php echo $produk_hasil['harga']; ?></p>

                                    <?php
                                    $hasil_stok = $produk_hasil['stok'];
                                    if ($hasil_stok > 0) { ?>
                                    <?php } else { ?>
                                        <a class="btn btn-danger btn-xs text-light">Habis</a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>


                    <?php } ?>





                    <!-- 
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="../isi/single-shop.php"><img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="../isi/single-shop.php">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="../isi/single-shop.php"><img src="images/cloth_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="../isi/single-shop.php">Polo Shirt</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="../isi/single-shop.php"><img src="images/cloth_3.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="../isi/single-shop.php">T-Shirt Mockup</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Tank Top</a></h3>
                                <p class="mb-0">Finding perfect t-shirt</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/cloth_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Polo Shirt</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/cloth_3.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">T-Shirt Mockup</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Tank Top</a></h3>
                                <p class="mb-0">Finding perfect t-shirt</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php"><img src="images/cloth_2.jpg" alt="Image placeholder" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php">Polo Shirt</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div> -->


                </div>
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman > 1) {
                                                        echo "href='../isi/shop-all.php?halaman=$previous'";
                                                    } ?>>Previous</a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                        ?>
                            <li class="page-item"><a class="page-link" href="../isi/shop-all.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        echo "href='../isi/shop-all.php?halaman=$next'";
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </nav>

            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                    <ul class="list-unstyled mb-0">

                        <?php foreach ($data_kategori as $hasil_kategori) {
                        ?>
                            <li class="mb-1"><a href="#" class="d-flex"><span><?php echo $hasil_kategori['nama_kategori']; ?></span> </a></li>

                            <!-- <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li> -->

                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>

<!-- End Footer -->