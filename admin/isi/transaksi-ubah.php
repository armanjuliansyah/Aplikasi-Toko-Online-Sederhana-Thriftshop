<?php

require_once('../../fungsi/function.php');

if (!empty($_GET['transaksi'])) {

    $id_user = $_POST['id_user'];
    $status  = htmlentities($_POST['status_produk']);

    // $transaksi_produk = ubahDataTransaksi($id_user, $status);

    $transaksi_produk = ubahDataTransaksi($id_user, $status);

    if ($transaksi_produk < 0) {
        echo "
        <script>
        alert('data berhasil diubah');
        alert('silahkan check menu nota atau menu transaksi');
        document.location.href = '../isi/transaksi.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('silahkan check menu nota apakah sudah benar?');
        document.location.href = '../isi/transaksi.php';
    </script>
    ";
    }
}
