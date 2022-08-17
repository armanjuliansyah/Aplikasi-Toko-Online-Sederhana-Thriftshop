<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');


$temp_data_nota = dataNotaTertentu($_SESSION['id_session_login']);
$jumlah_user_nota = count($temp_data_nota);

$jumlah_data_nota = jumlahNotaTransaksiProduk();

// jika hasil statusnya masih ditangguh maka nanti ja

// jika hasilnya statusnya masih lancar masuk ke nota
?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Riwayat Transaksi</strong></div>
        </div>
    </div>
</div>

<?php if ($jumlah_user_nota == 0) { ?>
    <div class="site-section">
        <div class="container">
            <h2>Belum ada nota transaksi</h2>

            <p>Apabila ada kendala, silahkan hubungin admin dengan nomor yang ada pada halaman <a href="../isi/about.php">Ini</a> </p>
            <p>Kembali <a href="../isi/shop.php">Belanja</a></p>

        </div>
    </div>
<?php } else { ?>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">

                <p>Keterangan : </p>
                <p>Untuk Print nota sesuai dengan nomor id nota dengan barang yang telah diproses atau ditransaksi</p>
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Nomor</th>
                                <th class="product-thumbnail">ID Nota</th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-total">Status</th>
                                <th class="product-total">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            $batas = 5;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $jumlah_data = $jumlah_data_nota['jumlah'];
                            $total_halaman = ceil($jumlah_data / $batas);
                            $data_nota = limitDataNotaTertentu($_SESSION['id_session_login'], $halaman_awal, $batas);

                            $no = $halaman_awal + 1;

                            foreach ($data_nota as $hasil) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?php echo $hasil['id nota']; ?>
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
                                    <td>
                                        <a class="btn btn-success btn-xs">Berhasil</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-xs" href="../isi/print_nota.php?id_nota=<?php echo $hasil['id nota'] ?>&id_user=<?php echo $_SESSION['id_session_login']; ?>">
                                            Print
                                        </a>
                                    </td>
                                </tr>

                            <?php

                                $no++;
                            }
                            ?>


                        </tbody>
                    </table>

                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                                            echo "href='../isi/nota-pembelian.php?halaman=$previous'";
                                                        } ?>>Previous</a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="../isi/nota-pembelian.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                            echo "href='../isi/nota-pembelian.php?halaman=$next'";
                                                        } ?>>Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>

            </div>
        </div>
    </div>

<?php } ?>
<?php require_once('../section/footer.php'); ?>