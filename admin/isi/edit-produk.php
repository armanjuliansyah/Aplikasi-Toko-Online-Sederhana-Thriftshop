<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');


$id_produk = $_GET['id_produk'];
$data_kategori = semuaDataKategoriProduk();

$data_produk = dataProdukTertentu($id_produk);

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (ubahDataProduk($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/produk.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data sebagian telah diubah!');
                    alert('silahkan dicheck perubahan');
        			document.location.href = '../isi/produk.php';
        		</script>
        ";
    }
}


?>

<h2>Edit Produk</h2>

<br>

<div class="row">

    <div class="col-8">


        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">

                <input type="hidden" name="id_produk" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['id_produk']; ?>">

                <input type="hidden" name="id_gallery" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['id_gallery']; ?>">

                <br>
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" name="nama_produk" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['nama_produk']; ?>">

                <br>
                <label for="exampleFormControlInput1">kondisi</label>
                <input type="text" name="kondisi" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['kondisi']; ?>">

                <br>
                <label for="exampleFormControlInput1">bahan</label>
                <input type="text" name="bahan" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['bahan']; ?>">

                <br>
                <label for="exampleFormControlInput1">ukuran</label>
                <input type="text" name="ukuran" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['ukuran']; ?>">

                <br>
                <label for="exampleFormControlInput1">warna</label>
                <input type="text" name="warna" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['warna']; ?>">

                <br>
                <label for="exampleFormControlInput1">Harga</label>
                <input type="number" name="harga" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_produk['harga']; ?>">

                <br>

                <label for="exampleFormControlInput1">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" required placeholder="<?php echo $data_produk['deskripsi']; ?>"><?php echo $data_produk['deskripsi']; ?></textarea>

                <br>
                <label for="exampleFormControlInput1">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" required value="<?php echo $data_produk['stok']; ?>">

                <br>
                <select name="kategori" class="form-control">

                    <option value="<?php echo $data_produk['id_kategori_produk']; ?>"><?php echo $data_produk['nama_kategori']; ?></option>
                    <?php foreach ($data_kategori as $hasil) { ?>
                        <option value="<?php echo $hasil['id_kategori_produk']; ?>"><?php echo $hasil['nama_kategori']; ?></option>
                    <?php } ?>

                </select>

                <br>
                <label for="exampleFormControlInput2">Gambar</label>
                <input type="text" name="gambar" class="form-control" id="gambar" readonly required value="<?php echo $data_produk['nama_gambar']; ?>">

                <br>
                <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

                <br>
                <button type="submit" name="submit" id="button" class="btn btn-primary">ubah</button>

                <a href="../isi/produk.php" class="btn btn-primary">batal</a>

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