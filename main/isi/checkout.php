<?php

require_once('../section/header.php');

require_once('../../fungsi/function.php');

$data_user = profile_user($_SESSION['id_session_login']);

$data_transaksi_produk = tampilDataTransaksi();

$jumlah_pembelian = hitungTransaksi($_SESSION['id_session_login']);


?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Detail Pembayaran</h2>
                <p>Check Data Anda terlebih dahulu</p>
                <div class="p-3 p-lg-5 border">

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">

                            <input type="hidden" class="form-control" name="id_user" id="id_user" readonly value="<?php echo $data_user['id_user']; ?>">
                            <br>

                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_user['nama']; ?>">

                            <br>
                            <label for="exampleFormControlInput2">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['alamat']; ?>">

                            <br>
                            <label for="exampleFormControlInput2">Nomor Hp</label>
                            <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['no_hp']; ?>">

                            <br>
                            <label for="exampleFormControlInput2">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['email']; ?>">

                            <br>
                            <p>Apabila ditemukkan kesalahan, silahkan atur ulang biodata anda pada icon setting atau dengan <a href="../isi/user-detail.php">Klik ini</a></p>


                        </div>

                    </form>


                </div>
            </div>
            <div class="col-md-6">


                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Pesanan</h2>
                        <div class="p-3 p-lg-9 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>

                                    <?php foreach ($data_transaksi_produk as $hasil_transaksi) {  ?>
                                        <tr>
                                            <td><?php echo $hasil_transaksi['produk']; ?> <strong class="mx-2">x</strong> <?php echo $hasil_transaksi['jumlah']; ?></td>
                                            <td><?php echo $hasil_transaksi['harga']; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Jumlah</strong></td>
                                        <td class="text-black font-weight-bold"><strong><?php echo $jumlah_pembelian['jumlah']; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Pembayaran</a></h3>

                                <div class="collapse" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0">Transfer dilakukan dengan bank Mandiri</p>
                                        <p>A.N Admin Get Up Thrift Shop - 2221788499997970 </p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Konfirmasi Pembayaran</a></h3>

                                <div class="collapse" id="collapsecheque">
                                    <div class="py-2">
                                        <p class="mb-0">Konfirmasi pembayaran dilakukan manual oleh admin selama proses 3 x 24 jam dengan mengirimkan bukti transfer ke nomor WhatsApp Berikut :
                                        </p>
                                        <p>Admin Get Up Thrift Shop : <a href="https://api.whatsapp.com/send?phone=081234567891">081234567891</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-5">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Lainnya</a></h3>

                                <div class="collapse" id="collapsepaypal">
                                    <div class="py-2">
                                        <p class="mb-0">Apabila kesusahan dalam melakukan pembayaran atau ada hal yang ingin ditanyakn silahkan menghubungi atau berkonsultasi dengan nomor WhatsAPP berikut: </p>
                                        <p>Admin Get Up Thrift Shop : <a href="https://api.whatsapp.com/send?phone=081234567891">081234567891</a></p>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Selesaikan Pesanan</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- </form> -->
    </div>
</div>

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>