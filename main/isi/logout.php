<?php

session_start();

if (isset($_SESSION['id_session_login'])) {

    unset($_SESSION['id_session_login']);
}

echo '<script>alert("Anda Telah Logout");window.location="../isi/home.php"</script>';
exit();
