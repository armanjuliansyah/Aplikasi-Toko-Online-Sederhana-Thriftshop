<?php

session_start();

if (isset($_SESSION['id_session_login_admin'])) {

    unset($_SESSION['id_session_login_admin']);
}
// session_destroy();

echo '<script>alert("Anda Telah Logout");window.location="../isi/login.php"</script>';
exit();
