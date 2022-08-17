<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');


$jml_kategori = jumlahKategoriProduk();


if (isset($_POST["cari"])) {
    $data_kategori = cariNamaKategoriProduk($_POST["keyword"]);
}

?>

<h2>Manajemen Data Kategori Produk</h2>
<p>Jumlah data ada <?php echo $jml_kategori['jumlah']; ?></p>

<a class="btn btn-primary" href="../isi/tambah-kategori.php">tambah</a>

<a class="btn btn-info" href="../isi/kategori-produk.php">segarkan</a>
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
            <th scope="col">Id Kategori</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $batas = 5;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $jumlah_data = $jml_kategori['jumlah'];
        $total_halaman = ceil($jumlah_data / $batas);
        $data_kategori  = semuaDataKategoriProdukSlider($halaman_awal, $batas);

        $no = $halaman_awal + 1;
        $no = 1;

        foreach ($data_kategori as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_kategori_produk']; ?></td>
                <td><?php echo $hasil['nama_kategori']; ?></td>
                <td>
                    <a class="btn btn-primary" href="../isi/edit-kategori.php?id_kategori=<?php echo $hasil['id_kategori_produk']; ?>">Edit</a>
                    <a class="btn btn-primary" href="../isi/hapus-kategori.php?id_kategori=<?php echo $hasil['id_kategori_produk']; ?>" onclick="javascript:return confirm('Hapus Data Kategori ?');">Hapus</a>
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
                                        echo "href='../isi/kategori-produk.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/kategori-produk.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/kategori-produk.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>