<?php

if (!isset($_SESSION['id_session_login'])) {
    header("Location:../isi/session-login.php");
}
