<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jumlah_data_nota  = jumlahNotaTransaksiProduk();

?>

<h2>Manajemen Data Nota</h2>
<p>Jumlah data ada <?php echo $jumlah_data_nota['jumlah']; ?></p>
<a class="btn btn-info" href="../isi/nota.php">segarkan</a>
<br><br>

<form class="form-inline" action="" method="POST">
    <input type="text" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="cari">Search</button>
</form>

<br>


<table class="table table-bordered" id="example1">
    <thead>
        <tr style="background:#DFF0D8;color:#333;">
            <th> No</th>
            <th>ID Nota</th>
            <th> ID Barang</th>
            <th> Nama Barang</th>
            <th> ID Costumer</th>
            <th> Nama Costumer</th>
            <th style="width:10%;"> Jumlah</th>
            <th style="width:10%;"> Harga</th>
            <th style="width:10%;"> Total</th>
            <th> Kasir</th>
            <th> Tanggal</th>
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

        $jumlah_data = limitDataNota();
        $total_halaman = ceil($jumlah_data / $batas);
        $data_nota = semuaDataNota($halaman_awal, $batas);

        $no = $halaman_awal + 1;

        // page untuk mencari data
        if (isset($_POST["cari"])) {
            $data_nota = cariDataNota($_POST["keyword"]);
        }


        foreach ($data_nota as $hasil) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $hasil['id nota']; ?></td>
                <td><?php echo $hasil['id produk']; ?></td>
                <td><?php echo substr($hasil['produk'], 0, 9)  ?></td>
                <td><?php echo $hasil['id user']; ?></td>
                <td><?php echo $hasil['nama user']; ?></td>
                <td><?php echo $hasil['jumlah']; ?></td>
                <td><?php echo $hasil['harga']; ?></td>
                <td><?php echo $hasil['total']; ?></td>
                <td><?php echo $hasil['admin']; ?></td>
                <td><?php echo $hasil['tanggal buat']; ?></td>
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
                                        echo "href='../isi/nota.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/nota.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/nota.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>