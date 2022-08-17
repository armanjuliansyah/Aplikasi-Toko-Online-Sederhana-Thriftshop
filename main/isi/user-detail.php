<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../isi/auth-check.php');

$id_user = $_SESSION['id_session_login'];

$data_user = profile_user($id_user);
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak

    if (ubahProfileUser($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/user-detail.php';
    			</script>
    	";
    } else {
        echo "
    	<script>
    				alert('data gagal diubah!');
    				document.location.href = '../isi/home.php';
    			</script>
    	";
    }
}


?>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Detail User</a>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Detail Profile</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                        <input type="hidden" class="form-control" name="id_user" id="id_user" readonly value="<?php echo $data_user['id_user']; ?>">
                        <br>

                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_user['nama']; ?>">

                        <br>
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" name="username" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_user['username']; ?>">

                        <br>
                        <label for="password">Password</label>
                        <input type="password" title="enkripsi password" name="password" class="form-control" id="password" required value="<?php echo $data_user['password']; ?>">
                        <small id="info_password">silahkan langsung masukkan password baru apabila anda mau ganti password</small>

                        <br>
                        <br>
                        <label for="exampleFormControlInput2">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['alamat']; ?>">

                        <br>
                        <label for="exampleFormControlInput2">Nomor Hp</label>
                        <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['no_hp']; ?>">

                        <br>
                        <label for="exampleFormControlInput2">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['email']; ?>">

                        <br>
                        <button type="submit" name="submit" id="button" class="btn btn-primary">simpan</button>

                        <a href="../isi/home.php" class="btn btn-primary">batal</a>
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