<?php

session_start();

if ($_SESSION['id_session_login_admin']) {
} else {
    header("Location:../isi/login.php");
}
