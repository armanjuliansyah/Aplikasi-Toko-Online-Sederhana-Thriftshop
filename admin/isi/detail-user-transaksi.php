<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_user = $_GET['id_user'];

$data_transaksi = tampilDataTransaksiTertentu($id_user);

$profile_user = profile_user($id_user);


?>

<h2>Detail User transaksi</h2>
<p>Transaksi user <?php echo $profile_user['nama']; ?></p>

<table class="table table-bordered" id="example1">
    <thead>
        <tr style="background:#DFF0D8;color:#333;">
            <th> No</th>
            <th>ID Transaksi</th>
            <th> ID Barang</th>
            <th> Nama Barang</th>
            <th> Nama Costumer</th>
            <th style="width:10%;"> Jumlah</th>
            <th style="width:10%;"> Harga</th>
            <th style="width:10%;"> Total</th>
            <th> Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no = 1;

        foreach ($data_transaksi as $hasil) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $hasil['id transaksi']; ?></td>
                <td><?php echo $hasil['id produk']; ?></td>
                <td><?php echo substr($hasil['produk'], 0, 10)  ?></td>
                <td><?php echo $hasil['nama user']; ?></td>
                <td><?php echo $hasil['jumlah']; ?></td>
                <td><?php echo $hasil['harga']; ?></td>
                <td><?php echo $hasil['total']; ?></td>
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
                <br>



            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>

<a href="../isi/transaksi.php" class="btn btn-primary">kembali</a>

</div>
</div>

<?php

require_once('../section/footer.php');

?>