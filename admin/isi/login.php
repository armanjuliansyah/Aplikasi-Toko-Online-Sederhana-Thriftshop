<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

if (isset($_POST["submit"])) {

    $check = checkLoginAdmin($_POST);

    // Mengecek pengguna
    if ($check > 0) {
        $row = simpanLogin($_POST);

        // var_dump($row);
        // die();
        // Membuat session
        session_start();

        $_SESSION['id_session_login_admin'] = $row['id_user'];

        echo "
        		<script>
        			alert('berhasil login');
        			document.location.href = '../isi/beranda.php';
        		</script>
        ";
    } else {
        echo "
        <script>
            alert('gagal login');
            document.location.href = '../isi/login.php';
        </script>
";
    }
}


?>

<div class="card " style="margin-left:520px; margin-top:140px; width: 30rem;">

    <div class="card-body">
        <h5 class="card-title">Login Admin</h5>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="masukkan username">

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" id="password" placeholder="masukkan password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>




<?php require_once('../section/footer.php'); ?>