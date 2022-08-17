<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_produk = generate_id_produk();

$id_gallery = generate_id_produk_gallery();

$kategori_produk = semuaDataKategoriProduk();


if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (tambahDataProduk($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil ditambah!');
    				document.location.href = '../isi/produk.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal ditambah!');
        			document.location.href = '../isi/produk.php';
        		</script>
        ";
    }
}


?>

<h2>Tambah Produk</h2>

<br>

<div class="row">

    <div class="col-8">


        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">

                <label for="id_produk">ID Produk</label>
                <input type="text" name="id_produk" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $id_produk; ?>">

                <br>
                <label for="id_gallery">ID Gallery</label>
                <input type="text" name="id_gallery" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $id_gallery; ?>">

                <br>
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" name="nama_produk" class="form-control" id="exampleFormControlInput1" required>

                <br>
                <label for="id_kategori">Kategori</label>
                <select name="kategori" class="form-control">

                    <option value="#">Pilih kategori</option>
                    <?php foreach ($kategori_produk as $hasil) { ?>
                        <option value="<?php echo $hasil['id_kategori_produk']; ?>"><?php echo $hasil['nama_kategori']; ?></option>
                    <?php } ?>

                </select>

                <br>
                <label for="exampleFormControlInput1">kondisi</label>
                <input type="text" name="kondisi" class="form-control" id="exampleFormControlInput1" required>

                <br>
                <label for="exampleFormControlInput1">bahan</label>
                <input type="text" name="bahan" class="form-control" id="exampleFormControlInput1" required>

                <br>
                <label for="exampleFormControlInput1">ukuran</label>
                <input type="text" name="ukuran" class="form-control" id="exampleFormControlInput1" required>

                <br>
                <label for="exampleFormControlInput1">warna</label>
                <input type="text" name="warna" class="form-control" id="exampleFormControlInput1" required>

                <br>
                <label for="exampleFormControlInput1">Harga</label>
                <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" required>

                <br>

                <label for="exampleFormControlInput1">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" required></textarea>

                <br>
                <label for="exampleFormControlInput1">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" required>


                <br>
                <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

                <br>
                <button type="submit" name="submit" id="button" class="btn btn-primary">tambah</button>

                <a href="../isi/produk.php" class="btn btn-primary">batal</a>

            </div>

        </form>


    </div>

</div>



</div>
</div>

<?php require_once('../section/footer.php');
?>