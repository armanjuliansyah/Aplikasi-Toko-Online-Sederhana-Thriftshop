<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jml_gallery = jumlahProdukGallery();

?>

<h2>Manajemen Data Galeri</h2>
<p>Jumlah data ada <?php echo $jml_gallery['jumlah']; ?></p>

<a class="btn btn-info" href="../isi/gallery.php">segarkan</a>

<br><br>

<br>

<table class="table">
    <thead class="thead-info">
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Id gallery</th>
            <th scope="col">Produk Id</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $batas = 5;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $jumlah_data = $jml_gallery['jumlah'];
        $total_halaman = ceil($jumlah_data / $batas);
        $data_gallery  = SemuaDataFoto($halaman_awal, $batas);

        $no = $halaman_awal + 1;
        $no = 1;
        foreach ($data_gallery as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_gallery']; ?></td>
                <td><?php echo $hasil['produk_id']; ?></td>
                <td><?php echo $hasil['nama_gambar']; ?></td>
                <td><?php echo $hasil['waktu_ubah']; ?></td>
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
                                        echo "href='../isi/gallery.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/gallery.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/gallery.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>

</div>
</div>

<?php

require_once('../section/footer.php');

?>