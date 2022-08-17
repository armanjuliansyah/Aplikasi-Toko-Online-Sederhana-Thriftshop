<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

if (isset($_POST["submit"])) {

    $check = checkLoginUser($_POST);

    // Mengecek pengguna
    if ($check > 0) {
        $row = simpanLogin($_POST);

        // var_dump($row);
        // die();
        // Membuat session

        $_SESSION['id_session_login'] = $row['id_user'];

        echo "
        		<script>
        			alert('berhasil login');
        			document.location.href = '../isi/home.php';
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


<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="#">Home</a> <span class="mx-2 mb-0">/</span> <a href="#">Login</a> <span class="mx-2 mb-0">/</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <br>
    <h2 class="h3 mb-3 text-black">Login</h2>
    <p>Masuk ke akun anda terlebih dahulu</p>
    <div class="p-3 p-lg-5 border">

        <form action="" method="POST">

            <div class="form-group row">
                <div class="col-md-12">
                    <form action="" method="POST"></form>

                    <label for="" class="text-black">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>

                    <br>
                    <label for="" class="text-black">Password</label>
                    <input type="password" class="form-control" id="password" name="password">

                    <br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    <br>
                    <br>
                    <p>Belum punya akun? coba daftar dengan <a href="../isi/register.php">Klik ini</a></p>


                </div>
            </div>

        </form>

    </div>
</div>
<!-- </form> -->
</div>
</div>

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>