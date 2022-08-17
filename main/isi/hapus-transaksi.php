<?php

require_once('../../fungsi/function.php');

session_start();

$id_transaksi = $_GET['id_transaksi'];

$hapus_transaksi = hapusDataTransaksi($id_transaksi);

if ($hapus_transaksi > 0) {
    echo "
    <script>
    alert('data berhasil dihapus dari keranjang');
     document.location.href = '../isi/cart.php';
 </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
     document.location.href = '../isi/cart.php';
 </script>
    ";
}
