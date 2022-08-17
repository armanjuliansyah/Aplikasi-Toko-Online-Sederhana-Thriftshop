<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_user = $_GET['id_user'];

$data_user = profile_user($id_user);


?>

<h2>Detail Profile</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">


        <label for="exampleFormControlInput1">ID User</label>
        <input type="text" name="id_user" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_user['id_user']; ?>">

        <br>
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" name="nama" readonly class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_user['nama']; ?>">

        <br>
        <label for="exampleFormControlInput2">Alamat</label>
        <input type="text" name="alamat" readonly class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['alamat']; ?>">

        <br>
        <label for="exampleFormControlInput2">Nomor Hp</label>
        <input type="text" name="nomor_hp" readonly class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['no_hp']; ?>">

        <br>
        <label for="exampleFormControlInput2">Email</label>
        <input type="email" name="email" readonly class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_user['email']; ?>">

        <br>

        <a href="../isi/users.php" class="btn btn-primary">kembali</a>
    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>