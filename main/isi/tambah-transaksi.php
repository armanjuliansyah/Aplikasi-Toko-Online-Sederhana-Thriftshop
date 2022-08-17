<?php

require_once('../../fungsi/function.php');

session_start();

$id_produk = $_GET['id_produk'];

$id_user = $_SESSION['id_session_login'];

$transaksi_produk = tambahDataTransaksi($id_produk, $id_user);

if ($transaksi_produk > 0) {
    echo "
    <script>
    alert('data berhasil ditambah');
    alert('silahkan check keranjang');
     document.location.href = '../isi/cart.php';
 </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal ditambah');
     document.location.href = '../isi/shop-all.php';
 </script>
    ";
}
