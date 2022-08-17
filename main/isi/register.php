<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

$id_user = generate_id_user();

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    echo "
    <script>
                alert('data telah ditambah!');
                alert('silahkan login');
                document.location.href = '../isi/login.php';
            </script>
    ";
    if (tambahDataUser($_POST) > 0) {
    } else {
        echo "
    	<script>
    				alert('data gagal diubah!');
    				document.location.href = '../isi/resgister.php';
    			</script>
    	";
    }
}


?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Daftar</a>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Daftar Akun</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                        <input type="text" class="form-control" name="id_user" id="id_user" readonly value="<?php echo $id_user; ?>">
                        <br>

                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" required>

                        <br>
                        <label for="exampleFormControlInput2">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput2" required>

                        <br>
                        <label for="exampleFormControlInput2">Nomor Hp</label>
                        <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" required>

                        <br>
                        <label for="exampleFormControlInput2">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" required>

                        <br>
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleFormControlInput1" required>

                        <br>
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" required>

                        <br>
                        <button type="submit" name="submit" id="button" class="btn btn-primary">simpan</button>

                        <a href="../isi/login.php" class="btn btn-primary">batal</a>

                        <p>Apakah sudah memiliki akun? silahkan login dengan <a href="../isi/login.php">klik ini</a></p>
                    </div>

                </form>

            </div>
        </div>


    </div>
    <!-- </form> -->
</div>
</div>

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>