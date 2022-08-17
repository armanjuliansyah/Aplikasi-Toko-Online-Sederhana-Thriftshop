<?php

require_once('../../fungsi/function.php');

session_start();

// $id_transaksi = $_GET['id_transaksi'];

// $id_produk = $_GET['id_produk'];

// $id_user = $_SESSION['id_session_login'];

$id_user = $_GET['id_user'];

$nota_transaksi = tambahDataNota($id_user);

if ($nota_transaksi > 0) {
    echo "
    <script>
    alert('data berhasil ditambah');
    alert('silahkan check menu nota');
     document.location.href = '../isi/nota.php';
 </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal ditambah');
     document.location.href = '../isi/transaksi.php';
 </script>
    ";
}
