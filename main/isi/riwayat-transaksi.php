<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

// jika hasil statusnya masih ditangguh maka nanti ja

// jika hasilnya statusnya masih lancar masuk ke nota

$data_transaksi_produk = tampilDataTransaksiUser($_SESSION['id_session_login']);
$jumlah_data_transaksi = count($data_transaksi_produk);
?>



<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Proses Transaksi</strong></div>
        </div>
    </div>
</div>

<?php if ($jumlah_data_transaksi == 0) { ?>
    <div class="site-section">
        <div class="container">
            <h2>Belum ada proses transaksi</h2>
            <p>Apabila tidak muncul Mungkin transaksi anda gagal atau bermasalah</p>
            <p>Silahkan hubungin admin dengan nomor yang ada pada halaman <a href="../isi/about.php">Ini</a> </p>
            <p>Kembali <a href="../isi/shop.php">Belanja</a></p>

        </div>
    </div>
<?php } else { ?>
    <div class="site-section">
        <div class="container">
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
                                    <th class="product-remove">Status</th>
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
                                            <?php echo $hasil['id transaksi']; ?>
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
                                        <td>
                                            <?php
                                            $hasil_status = $hasil['status'];
                                            if ($hasil_status == 'berhasil') { ?>
                                                <a class="btn btn-success btn-xs"><?php echo $hasil_status; ?></a>
                                            <?php } elseif ($hasil_status == 'pending') { ?>
                                                <a class="btn btn-warning btn-xs"><?php echo $hasil_status; ?></a>
                                            <?php } else { ?>
                                                <a class="btn btn-danger btn-xs"><?php echo $hasil_status; ?></a>
                                            <?php } ?>
                                        </td>
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
        </div>
    </div>
<?php } ?>





<?php require_once('../section/footer.php'); ?>