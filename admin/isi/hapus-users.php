<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_user = $_GET['id_user'];;

// $data_informasi = HapusDataInformasiTertentu($id_informasi, $id_detail_informasi);

if (hapusDataUser($id_user) > 0) {
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = '../isi/users.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('data gagal dihapus!');
					document.location.href = '../isi/users.php';
				</script>
		";
}
