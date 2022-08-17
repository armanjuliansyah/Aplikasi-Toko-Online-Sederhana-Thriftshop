<?php

// require_once('../../fungsi/function.php');

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$profile_admin = profile_admin();


?>

<h2>Hai,<?php echo $profile_admin['nama']; ?></h2>
<p>Selamat datang di dashboard admin Get UP Thrift Shop</p>
<p>Penglolaan Manajemen Pembelian dan Transaksi</p>

</div>
</div>

<?php

require_once('../section/footer.php');

?>