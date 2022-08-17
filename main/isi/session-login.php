<?php

session_start();
session_destroy();
echo '<script>alert("Anda belum login");window.location="../isi/home.php"</script>';
exit();
