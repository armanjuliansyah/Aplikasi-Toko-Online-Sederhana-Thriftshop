<?php

$server_name = "localhost";
$username_server = "root";
$password_server = "";
$database_name = "thriftShop";


$db = mysqli_connect($server_name, $username_server, $password_server, $database_name);

if (!$db) {
    die("koneksi gagal : " . mysqli_connect_error());
    exit();
}
