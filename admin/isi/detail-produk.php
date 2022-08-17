<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');


$id_produk = $_GET['id_produk'];
$data_kategori = semuaDataKategoriProduk();

$data_produk = dataProdukTertentu($id_produk);

?>

<h2>Detail Produk</h2>

<br>

<div class="row">

    <div class=" col col-8">


        <form action="" method="POST">
            <div class="form-group">

                <label for="id_produk">ID Produk</label>
                <input type="text" name="id_produk" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['id_produk']; ?>">

                <br>
                <label for="id_produk">ID Gallery</label>
                <input type="text" name="id_gallery" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['id_gallery']; ?>">

                <br>
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" name="nama_produk" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['nama_produk']; ?>">

                <br>
                <label for="exampleFormControlInput1">kondisi</label>
                <input type="text" name="kondisi" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['kondisi']; ?>">

                <br>
                <label for="exampleFormControlInput1">bahan</label>
                <input type="text" name="bahan" class="form-control" readonly id="exampleFormControlInput1" required value="<?php echo $data_produk['bahan']; ?>">

                <br>
                <label for="exampleFormControlInput1">ukuran</label>
                <input type="text" name="ukuran" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_produk['ukuran']; ?>">

                <br>
                <label for="exampleFormControlInput1">warna</label>
                <input type="text" name="warna" class="form-control" readonly id="exampleFormControlInput1" required value="<?php echo $data_produk['warna']; ?>">

                <br>

                <label for="exampleFormControlInput1">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" required readonly placeholder="<?php echo $data_produk['deskripsi']; ?>"><?php echo $data_produk['deskripsi']; ?></textarea>

                <br>
                <label for="exampleFormControlInput1">Stok</label>
                <input type="number" readonly name="stok" class="form-control" id="stok" required value="<?php echo $data_produk['stok']; ?>">

                <br>
                <label for="exampleFormControlInput1">Kategori</label>
                <input type="text" readonly name="kategori" class="form-control" id="kategori" required value="<?php echo $data_produk['nama_kategori']; ?>">

                <br>
                <label for="exampleFormControlInput2">Gambar</label>
                <input type="text" readonly name="gambar" class="form-control" id="gambar" readonly required value="<?php echo $data_produk['nama_gambar']; ?>">

                <br>
                <a href="../isi/produk.php" class="btn btn-primary">kembali</a>

            </div>

        </form>


    </div>

    <div class="col col-4">

        <div class="text-center">
            <img src="../../assets/img/produk/<?php echo $data_produk['nama_gambar']; ?>" style="width: 400px; height:400px;" alt="foto-produk">
        </div>

    </div>

</div>



</div>
</div>

<?php require_once('../section/footer.php');
?>