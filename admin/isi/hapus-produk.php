<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_produk = $_GET['id_produk'];

// $data_informasi = HapusDataInformasiTertentu($id_informasi, $id_detail_informasi);

if (hapusDataProduk($id_produk) > 0) {
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = '../isi/produk.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('data gagal dihapus!');
					document.location.href = '../isi/produk.php';
				</script>
		";
}
