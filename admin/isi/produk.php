<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jml_produk   = JumlahProduk();


?>

<h2>Manajemen Data Produk</h2>
<p>Jumlah data ada <?php echo $jml_produk['jumlah']; ?></p>


<a class="btn btn-primary" href="../isi/tambah-produk.php">tambah</a>

<a class="btn btn-info" href="../isi/produk.php">segarkan</a>
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
            <th style="width: -20px;" scope="col">ID Produk</th>
            <th style="width: -20px;" scope="col">Nama Produk</th>
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

        $jumlah_data = $jml_produk['jumlah'];
        $total_halaman = ceil($jumlah_data / $batas);
        $jml_produk = semuaDataProduk($halaman_awal, $batas);

        $no = $halaman_awal + 1;

        // page untuk mencari data
        if (isset($_POST["cari"])) {
            $jml_produk = cariDataProduk($_POST["keyword"]);
        }


        foreach ($jml_produk as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_produk']; ?></td>
                <td><?php echo $hasil['nama_produk']; ?></td>
                <td><?php echo $hasil['waktu_ubah']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="../isi/edit-produk.php?id_produk=<?php echo $hasil['id_produk']; ?>">edit</a>

                    <a class="btn btn-danger btn-sm" href="../isi/hapus-produk.php?id_produk=<?php echo $hasil['id_produk']; ?>" onclick="javascript:return confirm('Hapus Data Produk ?');">hapus</a>

                    <a class="btn btn-info btn-sm" href="../isi/detail-produk.php?id_produk=<?php echo $hasil['id_produk']; ?>">detail</a>

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
                                        echo "href='../isi/produk.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/produk.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/produk.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>