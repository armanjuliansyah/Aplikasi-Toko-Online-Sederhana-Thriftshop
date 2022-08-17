<!-- 1. jarak awal dekatkan dengan garis -->
<!-- 2. ratakan antara closing dan nominal pembayaran dengan div colomun -->
<!-- 3. bold tulisan hitam pada nama costumer -->

<?php

require_once('../../fungsi/function.php');

$id_user = $_GET['id_user'];
$user = profile_user($id_user);

$admin = profile_admin();

$id_nota = $_GET['id_nota'];
$nota_user = printDataNotaUser($id_nota);
$detail_nota_user = hitungNotaTransaksi($id_nota);

$date_time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));

?>
<html>

<head>
    <title>print nota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style-2.css">
</head>

<body>
    <script>
        window.print();
    </script>

    <div class="container">
        <div class="header-title">
            <h2><b>INVOICE</b></h2>

            <div class="row">

                <div class="col-8">
                    <p>Nomor INV : INV/<?php echo date("Ymd"); ?>/<?php echo $id_nota; ?> </p>
                    <p>Tanggal : <?php echo $date_time->format("F j Y, H:i:s"); ?> </p>
                </div>

            </div>

        </div>

        <div class="header-nts">
            <br>
            <div class="row">

                <div class="col-8">
                    <b>
                        <p class="c">Customer</p>
                        <div class="sub-col-8">
                            <p>Nama : <?php echo $user['nama']; ?></p>
                            <p>Alamat Lengkap : <?php echo $user['alamat']; ?> </p>
                            <p>Nomor HP : <?php echo $user['no_hp']; ?> </p>
                        </div>
                    </b>
                </div>

                <div class="col col4">
                    <b>
                        <p class="t">Admin</p>
                        <div class="sub-col-8">
                            <p>Nama : <?php echo $admin['nama']; ?></p>
                            <p>Alamat Lengkap : <?php echo $admin['alamat']; ?> </p>
                            <p>Nomor HP : <?php echo $admin['no_hp']; ?> </p>
                        </div>
                    </b>
                </div>
            </div>
        </div>

        <div class="tengah">
            <table class="table table-bordered t1" style="border: 1px solid blue;">
                <thead>
                    <tr>
                        <div class="sub-table ">
                            <th scope="col" class="text-primary bg-light">No</th>
                            <th scope="col" class="text-primary bg-light">Nama Barang</th>
                            <th scope="col" class="text-primary bg-light">Qty</th>
                            <th scope="col" class="text-primary bg-light">Harga Satuan</th>
                            <th scope="col" class="text-primary bg-light">Total Harga</th>
                        </div>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($nota_user as $hasil) { ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td class="product-name">
                                <?php echo $hasil['produk']; ?>

                            </td>
                            <td>
                                <p>1</p>
                            </td>
                            <td> <?php echo $hasil['harga']; ?></td>
                            <td>
                                <?php echo $hasil['total']; ?>

                            </td>
                        </tr>

                    <?php $no++;
                    } ?>
                    <tr>
                        <td colspan="4" class="total bg-primary text-primary text-center">Total</td>
                        <td class="bg-primary text-primary">Rp.<?php echo number_format($detail_nota_user['jumlah']); ?></td>
                    </tr>
                </tbody>
            </table>

            </table>


            <div class="row">
                <div class="col-8">
                    <div class="sub-col-8">
                        <p>Terima kasih untuk kepercayaan dan kerjasamanya</p>
                    </div>
                </div>

                <div class="col col4">
                    <b>
                        <div class="sub-col-8">
                            <table style="float:right">
                                <tr>
                                    <td>Bayar </td>
                                    <td>Rp. <?php echo number_format($detail_nota_user['jumlah']); ?>,-</td>
                                </tr>
                                <tr>
                                    <td>Kembali </td>
                                    <td>Rp. <?php echo number_format(0); ?>,-</td>
                                </tr>
                                <tr>
                            </table>
                        </div>
                    </b>
                </div>
            </div>

        </div>


    </div>
</body>

</html>