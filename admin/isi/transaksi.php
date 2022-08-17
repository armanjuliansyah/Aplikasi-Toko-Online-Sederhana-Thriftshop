<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jumlah_data_transaksi = jumlahTransaksiProduk();

$data_transaksi = tampilDataTransaksi();


// if (isset($_POST["submit"])) {
//     // cek apakah data berhasil di ubah atau tidak
//     // ubah satu satu
//     if (ubahDataTransaksi($_POST) > 0) {
//         echo "
//         <script>
//         alert('data berhasil diubah');
//         alert('silahkan check menu nota atau menu transaksi');
//         document.location.href = '../isi/transaksi.php';
//     </script>
//     ";
//     } else {
//         echo "
//             <script>
//             alert('data gagal diubah');
//             document.location.href = '../isi/transaksi.php';
//         </script>
//     ";
//     }
// }

?>

<h2>Manajemen Data transaksi</h2>
<p>Jumlah data ada <?php echo $jumlah_data_transaksi['jumlah']; ?></p>
<p>konfirmasi selesai apabila transaksi user berasangkutan telah terpenuhi</p>
<a class="btn btn-info" href="../isi/transaksi.php">segarkan</a>
<br><br>


<br>

<table class="table table-bordered" id="example1">
    <thead>
        <tr style="background:#DFF0D8;color:#333;">
            <th> No</th>
            <th>ID User</th>
            <th> Nama Costumer</th>
            <th> Jumlah</th>
            <th> Status</th>
            <th> keterangan</th>
            <th> Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $no = 1;

        foreach ($data_transaksi as $hasil) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $hasil['id user']; ?></td>
                <td><?php echo $hasil['nama user']; ?></td>
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

                <td>

                    <form method="POST" action="../isi/transaksi-ubah.php?transaksi=ubah-data">

                        <input type="hidden" name="id_user" value="<?php echo $hasil['id user']; ?>" class="form-control">

                        <select name="status_produk" class="form-control">
                            <option value="<?php echo $hasil['status']; ?>"><?php echo $hasil['status']; ?></option>
                            <option value="berhasil">berhasil</option>
                            <option value="gagal">gagal</option>
                        </select>
                        <br>

                </td>

                <td>
                    <a class="btn btn-primary" href="../isi/detail-user-transaksi.php?id_user=<?php echo $hasil['id user']; ?>">Detail</a>
                    <button type="submit" class="btn btn-info">Ubah</button>
                    </form>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>

</div>
</div>

<?php

require_once('../section/footer.php');

?>