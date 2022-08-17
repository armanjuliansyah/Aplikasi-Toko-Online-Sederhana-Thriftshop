<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jumlah_user   = jumlahUser();


?>

<h2>Manajemen Data User</h2>
<p>Jumlah data ada <?php echo $jumlah_user['jumlah']; ?></p>



<a class="btn btn-info" href="../isi/users.php">segarkan</a>
<br><br>


<form class="form-inline" action="" method="POST">
    <input type="text" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="cari">Search</button>
</form>

<br>

<table class="table">
    <thead class="thead-info">
        <tr>
            <th scope="col">Nomor</th>
            <th style="width: -20px;" scope="col">ID User</th>
            <th scope="col">Waktu Buat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        // page nomor atau limit tampilan
        $batas = 5;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $jumlah_data = $jumlah_user['jumlah'];
        $total_halaman = ceil($jumlah_data / $batas);
        $data_user = tampilDataUser($halaman_awal, $batas);

        $no = $halaman_awal + 1;

        // page untuk mencari data
        if (isset($_POST["cari"])) {
            $data_user = cariDataUser($_POST["keyword"]);
        }


        foreach ($data_user as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_user']; ?></td>
                <td><?php echo $hasil['waktu_ubah']; ?></td>
                <td>
                    <a class="btn btn-danger btn-sm" href="../isi/hapus-users.php?id_user=<?php echo $hasil['id_user']; ?>" onclick="javascript:return confirm('Hapus Data User ?');">hapus</a>

                    <a class="btn btn-info btn-sm" href="../isi/detail-user.php?id_user=<?php echo $hasil['id_user']; ?>">detail</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='../isi/users.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/users.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/users.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>s