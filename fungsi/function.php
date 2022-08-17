<?php

require('config.php');


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function checkLoginAdmin($data)
{
    global $db;
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $query = mysqli_query($db, "SELECT * FROM login
    WHERE username = '$username' AND password=md5('$password')
    AND id_user = 'ADMN'");

    $check = mysqli_num_rows($query);

    return $check;
}

function checkLoginUser($data)
{
    global $db;
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $query = mysqli_query($db, "SELECT * FROM login
    WHERE username = '$username' AND password=md5('$password')
    AND id_user LIKE '%USR%'");

    $check = mysqli_num_rows($query);

    return $check;
}

function simpanLogin($data)
{
    global $db;

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $query = "SELECT * FROM login
    WHERE username = '$username' AND password=md5('$password')";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}


function JumlahProduk()
{
    global $db;
    $query = "SELECT jumlah_produk() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function jumlahKategoriProduk()
{
    // global $db;

    // $query = "SELECT * FROM kategori_produk";

    // $result = mysqli_query($db, $query);

    // $check = mysqli_num_rows($result);

    // return $check;

    global $db;
    $query = "SELECT jumlah_kategori() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function jumlahTransaksiProdukUser($data)
{
    global $db;

    $query = "SELECT * FROM transaksi WHERE users_id = '$data'";

    $result = mysqli_query($db, $query);

    $check = mysqli_num_rows($result);

    return $check;
}

function jumlahTransaksiProduk()
{
    global $db;
    $query = "SELECT jumlah_transaksi() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function jumlahNotaTransaksiProduk()
{
    global $db;
    $query = "SELECT jumlah_nota() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function jumlahUser()
{
    global $db;
    $query = "SELECT jumlah_user() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function jumlahProdukGallery()
{
    global $db;
    $query = "SELECT jumlah_foto() AS jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}


function profile_admin()
{
    global $db;

    $query = "SELECT * FROM user
    WHERE id_user = 'ADMN'";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}



function generate_id_produk()
{
    global $db;

    $query = "SELECT * FROM produk ORDER BY id_produk DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_produk'], 2, 3);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'P00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'P0' . $tambah . '';
    } else {
        $ex = explode('P', $result['id_produk']);
        $no = (int) $ex[1] + 1;
        $format = 'P' . $no . '';
    }
    return $format;
}

function generate_id_kategori()
{
    global $db;

    $query = "SELECT * FROM kategori_produk ORDER BY id_kategori_produk DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_kategori_produk'], 2, 3);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'KP00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'KP0' . $tambah . '';
    } else {
        $ex = explode('KP', $result['id_kategori_produk']);
        $no = (int) $ex[1] + 1;
        $format = 'KP' . $no . '';
    }
    return $format;
}

function generate_id_pesan_transaksi()
{
    global $db;

    $query = "SELECT * FROM pesan_transaksi ORDER BY id_pesan DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_pesan'], 2, 3);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'PT00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'PT0' . $tambah . '';
    } else {
        $ex = explode('PT', $result['id_pesan']);
        $no = (int) $ex[1] + 1;
        $format = 'PT' . $no . '';
    }
    return $format;
}

function generate_id_produk_gallery()
{
    global $db;

    $query = "SELECT * FROM produk_gallery ORDER BY id_gallery DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_gallery'], 2, 3);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'PG00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'PG0' . $tambah . '';
    } else {
        $ex = explode('PG', $result['id_gallery']);
        $no = (int) $ex[1] + 1;
        $format = 'PG' . $no . '';
    }
    return $format;
}

function generate_id_transaksi()
{
    global $db;

    $query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_transaksi'], 2, 3);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = ' T00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = ' T0' . $tambah . '';
    } else {
        $ex = explode(' T', $result['id_transaksi']);
        $no = (int) $ex[1] + 1;
        $format = ' T' . $no . '';
    }
    return $format;
}

function generate_id_user()
{
    global $db;

    $query = "SELECT * FROM user
    ORDER BY id_user DESC";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_user'], 4, 5);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'USR00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'USR0' . $tambah . '';
    } else {
        $ex = explode('USR', $result['id_user']);
        $no = (int) $ex[1] + 1;
        $format = 'USR' . $no . '';
    }
    return $format;
}

function generate_id_nota()
{
    global $db;

    $query = "SELECT * FROM nota_transaksi ORDER BY id_nota DESC ;";

    $row = mysqli_query($db, $query);

    $result = mysqli_fetch_assoc($row);

    $urut = substr($result['id_nota'], 3, 4);
    $tambah = (int) $urut + 1;
    if (strlen($tambah) == 1) {
        $format = 'NT00' . $tambah . '';
    } else if (strlen($tambah) == 2) {
        $format = 'NT0' . $tambah . '';
    } else {
        $ex = explode('NT', $result['id_nota']);
        $no = (int) $ex[1] + 1;
        $format = 'NT' . $no . '';
    }
    return $format;
}


function tampilDataUser($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT * FROM user
              WHERE id_user LIKE '%USR%' 
              LIMIT $halaman_awal, $batas";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariDataUser($keyword)
{
    $query = "SELECT * FROM user
              WHERE id_user LIKE '%USR%'
            AND nama LIKE '%$keyword%'";

    return query($query);
}

function profile_user($data)
{
    global $db;

    $query = "SELECT usr.id_user as 'id user',
    lg.username as 'username',
    lg.password as 'pass',
    usr.*
    FROM login as lg
    INNER JOIN user usr on (lg.id_user = usr.id_user)
    WHERE usr.id_user = '$data'";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function hapusDataUser($id_user)
{
    global $db;


    $data_nota = dataNotaTertentu($id_user);

    foreach ($data_nota as $hasil) {

        $id_nota = $hasil['id nota'];


        $query = "CALL delete_data_nota('$id_nota')";
        mysqli_query($db, $query);
    }

    $data_transaksi = tampilDataTransaksiTertentu($id_user);

    foreach ($data_transaksi as $hasil) {

        $id_transaksi = $hasil['id transaksi'];



        $query = "CALL delete_data_transaksi('$id_transaksi')";
        mysqli_query($db, $query);
    }


    $query = "CALL delete_data_user('$id_user')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}



function semuaDataKategoriProduk()
{
    global $db;
    $query = "SELECT * FROM kategori_produk";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function semuaDataKategoriProdukSlider($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT * FROM kategori_produk
              LIMIT $halaman_awal, $batas";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariNamaKategoriProduk($keyword)
{
    $query = "SELECT * FROM kategori_produk
    WHERE nama_kategori
    LIKE '%$keyword%'";
    return query($query);
}

function detailDataKategoriProduk($data)
{
    global $db;

    $query = "SELECT * FROM kategori_produk
    WHERE id_kategori_produk = '$data'";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function hapusDataKategoriProduk($data)
{
    global $db;

    $query = "SELECT * FROM produk
             WHERE kategori_id = '$data'";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    foreach ($rows as $hasil) {
        $id_produk = $hasil['id_produk'];
        hapusDataNotaKategori($id_produk);
        hapusDataTransaksiKategori($id_produk);
        hapusDataProdukKategori($id_produk);
    }


    $query = "CALL delete_data_kategori_produk('$data')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function ubahDataKategoriProduk($data)
{
    global $db;

    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);



    $query = "CALL update_kategori_produk('$id_kategori','$nama_kategori')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambahDataKategoriProduk($data)
{
    global $db;


    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);

    $query = "CALL insert_data_kategori_produk('$id_kategori','$nama_kategori')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusDataProdukKategori($data)
{
    global $db;

    $temp_gallery = dataFotoTertentu($data);

    $gambar = $temp_gallery['nama_gambar'];

    if (file_exists('../../assets/img/produk/' . $gambar)) {
        unlink('../../assets/img/produk/' . $gambar);
    }


    $query = "CALL delete_data_gallery_produk('$data')";

    mysqli_query($db, $query);



    $query = "CALL delete_data_produk('$data')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function groupProduk($data, $halaman_awal, $batas)
{
    global $db;

    $query = "SELECT p.id_produk,
    pg.id_gallery,
    p.nama_produk,
    kp.id_kategori_produk,
    kp.nama_kategori,
    p.harga,
    p.kondisi,
    p.bahan,
    p.ukuran,
    p.warna,
    p.deskripsi,
    p.stok,
    pg.nama_gambar,
    p.waktu_ubah
    FROM produk as p
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE id_kategori_produk = '$data'
    LIMIT $halaman_awal, $batas ";

    $result = mysqli_query($db, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



function SemuaDataFoto($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT * FROM produk_gallery
     LIMIT $halaman_awal, $batas";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function dataFotoTertentu($id_produk)
{
    global $db;
    $query = "SELECT * FROM produk_gallery
    WHERE produk_id ='$id_produk'";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}



function tambahDataNota($id_user)
{
    global $db;
    $admin = "ADMN";
    $id_nota = generate_id_nota();


    $data_transaksi = tampilDataTransaksiTertentu($id_user);

    foreach ($data_transaksi as $hasil) {

        // $id_transaksi = $hasil['id transaksi'];
        $total_harga = $hasil['harga'];
        $bayar = $hasil['bayar'];
        $kembali = $hasil['kembali'];
        $produk_id = $hasil['id produk'];
        $jumlah = $hasil['jumlah'];



        $query = "CALL insert_data_nota('$id_nota','$id_user','$admin', $total_harga,$bayar,$kembali)";
        mysqli_query($db, $query);


        $query = "CALL insert_data_detail_nota('$produk_id','$id_nota', $jumlah)";
        mysqli_query($db, $query);



        $query = "CALL update_stok_produk('$produk_id')";
        mysqli_query($db, $query);
    }
    return mysqli_affected_rows($db);
}

function hapusDataNotaKategori($data)
{
    global $db;
    $query = "SELECT * FROM nota_detail_transaksi
    WHERE produk_id ='$data'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    foreach ($rows as $hasil) {

        $id_nota = $hasil['transaksi_nota'];


        $query = "CALL delete_data_nota('$id_nota')";

        mysqli_query($db, $query);
    }

    return mysqli_affected_rows($db);
}

function limitDataNota()
{
    global $db;
    $query = "SELECT
                nt.id_nota as 'id nota',
                p.id_produk as 'id produk',
                p.nama_produk as 'produk',
                pg.nama_gambar as 'nama gambar',
                kp.nama_kategori as 'kategori',
                deskripsi 'deskripsi',
                p.harga 'harga',
                ndt.jumlah 'jumlah',
                nt.total_harga 'total',
                nt.bayar 'bayar',
                nt.kembali 'kembali',
                usr.nama 'nama user',
                usr.email 'email user',
                usr.alamat 'almat user',
                usr.no_hp 'nomor hp user',
                admn.nama 'admin',
                admn.email 'email admin',
                admn.alamat 'almat admin',
                admn.no_hp 'nomor hp admin',
                nt.waktu_buat 'tanggal buat'
                FROM nota_transaksi as nt
                INNER JOIN user as usr ON (usr.id_user = nt.users_id)
                INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
                INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
                INNER JOIN produk p on (ndt.produk_id = p.id_produk)
                INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
                INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
                GROUP BY ndt.id ";
    $result = mysqli_query($db, $query);
    $jumlah_data = mysqli_num_rows($result);

    return $jumlah_data;
}

function semuaDataNota($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT
                nt.id_nota as 'id nota',
                p.id_produk as 'id produk',
                p.nama_produk as 'produk',
                pg.nama_gambar as 'nama gambar',
                kp.nama_kategori as 'kategori',
                deskripsi 'deskripsi',
                p.harga 'harga',
                ndt.jumlah 'jumlah',
                nt.total_harga 'total',
                nt.bayar 'bayar',
                nt.kembali 'kembali',
                usr.id_user 'id user',
                usr.nama 'nama user',
                usr.email 'email user',
                usr.alamat 'almat user',
                usr.no_hp 'nomor hp user',
                admn.nama 'admin',
                admn.email 'email admin',
                admn.alamat 'almat admin',
                admn.no_hp 'nomor hp admin',
                nt.waktu_buat 'tanggal buat'
                FROM nota_transaksi as nt
                INNER JOIN user as usr ON (usr.id_user = nt.users_id)
                INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
                INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
                INNER JOIN produk p on (ndt.produk_id = p.id_produk)
                INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
                INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
                GROUP BY ndt.id
                LIMIT $halaman_awal, $batas";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariDataNota($keyword)
{
    $query = "SELECT
    nt.id_nota as 'id nota',
    p.id_produk as 'id produk',
      p.nama_produk as 'produk',
      pg.nama_gambar as 'nama gambar',
      kp.nama_kategori as 'kategori',
      deskripsi 'deskripsi',
      p.harga 'harga',
      ndt.jumlah 'jumlah',
      nt.total_harga 'total',
      nt.bayar 'bayar',
      nt.kembali 'kembali',
       usr.nama 'nama user',
      usr.email 'email user',
       usr.alamat 'almat user',
      usr.no_hp 'nomor hp user',
       admn.nama 'admin',
      admn.email 'email admin',
       admn.alamat 'almat admin',
     admn.no_hp 'nomor hp admin',
      nt.waktu_buat 'tanggal buat'
    FROM nota_transaksi as nt
    INNER JOIN user as usr ON (usr.id_user = nt.users_id)
    INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
    INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
    INNER JOIN produk p on (ndt.produk_id = p.id_produk)
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE id_nota LIKE '%$keyword%' AND usr.nama LIKE '%$keyword%'";

    return query($query);
}

function dataNotaTertentu($id_user)
{
    global $db;

    $query = "SELECT
    nt.id_nota as 'id nota',
    p.id_produk as 'id produk',
      p.nama_produk as 'produk',
      pg.nama_gambar as 'nama gambar',
      kp.nama_kategori as 'kategori',
      deskripsi 'deskripsi',
      p.harga 'harga',
      ndt.jumlah 'jumlah',
      nt.total_harga 'total',
      nt.bayar 'bayar',
      nt.kembali 'kembali',
       usr.id_user 'id user',
       usr.nama 'nama user',
      usr.email 'email user',
       usr.alamat 'almat user',
      usr.no_hp 'nomor hp user',
       admn.nama 'admin',
      admn.email 'email admin',
       admn.alamat 'almat admin',
     admn.no_hp 'nomor hp admin',
      nt.waktu_buat 'tanggal buat'
    FROM nota_transaksi as nt
    INNER JOIN user as usr ON (usr.id_user = nt.users_id)
    INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
    INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
    INNER JOIN produk p on (ndt.produk_id = p.id_produk)
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE usr.id_user = '$id_user'
    GROUP BY ndt.id";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function limitDataNotaTertentu($id_user, $halaman_awal, $batas)
{
    global $db;
    $query = "SELECT
    nt.id_nota as 'id nota',
    p.id_produk as 'id produk',
      p.nama_produk as 'produk',
      pg.nama_gambar as 'nama gambar',
      kp.nama_kategori as 'kategori',
      deskripsi 'deskripsi',
      p.harga 'harga',
      ndt.jumlah 'jumlah',
      nt.total_harga 'total',
      nt.bayar 'bayar',
      nt.kembali 'kembali',
       usr.id_user 'id user',
       usr.nama 'nama user',
      usr.email 'email user',
       usr.alamat 'almat user',
      usr.no_hp 'nomor hp user',
       admn.nama 'admin',
      admn.email 'email admin',
       admn.alamat 'almat admin',
     admn.no_hp 'nomor hp admin',
      nt.waktu_buat 'tanggal buat'
    FROM nota_transaksi as nt
    INNER JOIN user as usr ON (usr.id_user = nt.users_id)
    INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
    INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
    INNER JOIN produk p on (ndt.produk_id = p.id_produk)
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE usr.id_user = '$id_user'
    GROUP BY ndt.id
    LIMIT $halaman_awal, $batas";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hitungNotaTransaksi($id_nota)
{
    global $db;

    $query = "SELECT data_pembayaran_nota('$id_nota') as jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function printDataNotaUser($id_nota)
{
    global $db;
    $query = "SELECT
            nt.id_nota as 'id nota',
            p.id_produk as 'id produk',
            p.nama_produk as 'produk',
            pg.nama_gambar as 'nama gambar',
            kp.nama_kategori as 'kategori',
            deskripsi 'deskripsi',
            p.harga 'harga',
            ndt.jumlah 'jumlah',
            nt.total_harga 'total',
            nt.bayar 'bayar',
            nt.kembali 'kembali',
            usr.id_user 'id user',
            usr.nama 'nama user',
            usr.email 'email user',
            usr.alamat 'almat user',
            usr.no_hp 'nomor hp user',
            admn.nama 'admin',
            admn.email 'email admin',
            admn.alamat 'almat admin',
            admn.no_hp 'nomor hp admin',
            nt.waktu_buat 'tanggal buat'
            FROM nota_transaksi as nt
            INNER JOIN user as usr ON (usr.id_user = nt.users_id)
            INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
            INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
            INNER JOIN produk p on (ndt.produk_id = p.id_produk)
            INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
            INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
            WHERE nt.id_nota = '$id_nota'
            GROUP BY ndt.id";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function semuaDataProduk($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT p.id_produk,
                pg.id_gallery,
                p.nama_produk,
                kp.nama_kategori,
                p.harga,
                p.kondisi,
                p.bahan,
                p.ukuran,
                p.warna,
                p.deskripsi,
                p.stok,
                pg.nama_gambar,
                p.waktu_ubah
            FROM produk as p
            INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
            INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
            LIMIT $halaman_awal, $batas ";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function sliderDataProduk()
{
    global $db;
    $query = "SELECT p.id_produk,
                pg.id_gallery,
                p.nama_produk,
                kp.nama_kategori,
                p.harga,
                p.kondisi,
                p.bahan,
                p.ukuran,
                p.warna,
                p.deskripsi,
                p.stok,
                pg.nama_gambar,
                p.waktu_ubah
            FROM produk as p
            INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
            INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cariDataProduk($keyword)
{
    $query = "SELECT p.id_produk,
            p.nama_produk,
            kp.nama_kategori,
            p.harga,
            p.kondisi,
            p.bahan,
            p.ukuran,
            p.warna,
            p.deskripsi,
            pg.nama_gambar,
            p.waktu_ubah
        FROM produk as p
        INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
        INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
        WHERE p.nama_produk LIKE '%$keyword%'";

    return query($query);
}

function dataProdukTertentu($data)
{
    global $db;

    $query = "SELECT p.id_produk,
    pg.id_gallery,
    p.nama_produk,
    kp.id_kategori_produk,
    kp.nama_kategori,
    p.harga,
    p.kondisi,
    p.bahan,
    p.ukuran,
    p.warna,
    p.deskripsi,
    p.stok,
    pg.nama_gambar,
    p.waktu_ubah
    FROM produk as p
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE p.id_produk = '$data'";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function ubahDataProduk($data)
{
    global $db;


    $id_produk = htmlspecialchars($data["id_produk"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = $data["harga"];
    $kondisi = htmlspecialchars($data["kondisi"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $ukuran = htmlspecialchars($data["ukuran"]);
    $warna = htmlspecialchars($data["warna"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = $data['stok'];
    $gambar = htmlspecialchars($data['gambar']);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];


    if ($file_name == null) {

        if ($deskripsi != null) {

            $query = "UPDATE produk
            SET nama_produk ='$nama_produk',
            harga='$harga',
            kategori_id = '$kategori',
            deskripsi='$deskripsi',
            ukuran='$ukuran',
            stok='$stok',
            warna ='$warna',
            kondisi = '$kondisi',
            bahan = '$bahan'
               
            WHERE id_produk = '$id_produk' ";

            $query = "CALL update_produk_with_desc('$id_produk','$nama_produk','$harga','$deskripsi','$kategori','$ukuran','$stok','$warna','$kondisi','$bahan')";
            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        } else {

            // $query = "UPDATE produk
            // SET nama_produk ='$nama_produk',
            // harga='$harga',
            // kategori_id = '$kategori',
            // ukuran='$ukuran',
            // stok='$stok',
            // warna ='$warna',
            // kondisi = '$kondisi',
            // bahan = '$bahan'
            // WHERE id_produk = '$id_produk' ";

            // mysqli_query($db, $query);

            $query = "CALL update_produk_no_desc('$id_produk','$nama_produk','$harga','$kategori','$ukuran','$stok','$warna','$kondisi','$bahan')";
            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        }
    } else {

        if ($deskripsi != null) {
            if (file_exists('../../assets/img/produk/' . $gambar)) {
                unlink('../../assets/img/produk/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/produk/' . $file_name . '');

            // $query = "UPDATE produk_gallery
            //       SET nama_gambar = '$file_name'
            //       WHERE id_gallery = '$id_gallery'";
            // mysqli_query($db, $query);

            $query = "CALL update_produk_gallery('$id_gallery','$file_name')";
            mysqli_query($db, $query);


            // $query = "UPDATE produk
            // SET nama_produk ='$nama_produk',
            //     harga='$harga',
            //     deskripsi='$deskripsi',
            //     kategori_id='$kategori',
            //     ukuran='$ukuran',
            //     stok='$stok',
            //     warna ='$warna',
            //     kondisi = '$kondisi',
            //     bahan = '$bahan'
            // WHERE id_produk = '$id_produk' ";

            // mysqli_query($db, $query);

            $query = "CALL update_produk_with_desc('$id_produk','$nama_produk','$harga','$deskripsi','$kategori','$ukuran','$stok','$warna','$kondisi','$bahan')";
            mysqli_query($db, $query);


            return mysqli_affected_rows($db);
        } else {
            if (file_exists('../../assets/img/produk/' . $gambar)) {
                unlink('../../assets/img/produk/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/produk/' . $file_name . '');

            // $query = "UPDATE produk_gallery
            //       SET nama_gambar = '$file_name'
            //       WHERE id_gallery = '$id_gallery'";
            // mysqli_query($db, $query);

            $query = "CALL update_produk_gallery('$id_gallery','$file_name')";
            mysqli_query($db, $query);

            // $query = "UPDATE produk
            // SET nama_produk ='$nama_produk',
            //     harga='$harga',
            //     kategori_id='$kategori',
            //     ukuran='$ukuran',
            //     stok='$stok',
            //     warna ='$warna',
            //     kondisi = '$kondisi',
            //     bahan = '$bahan'
            // WHERE id_produk = '$id_produk' ";

            // mysqli_query($db, $query);

            $query = "CALL update_produk_no_desc('$id_produk','$nama_produk','$harga','$kategori','$ukuran','$stok','$warna','$kondisi','$bahan')";
            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        }
    }
}


function tambahDataProduk($data)
{
    global $db;

    $id_produk = htmlspecialchars($data["id_produk"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = $data["harga"];
    $kondisi = htmlspecialchars($data["kondisi"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $ukuran = htmlspecialchars($data["ukuran"]);
    $warna = htmlspecialchars($data["warna"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = $data['stok'];

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];

    move_uploaded_file($file_temp_name, '../../assets/img/produk/' . $file_name . '');


    $query = "CALL insert_data_produk_gallery('$id_gallery','$id_produk','$file_name')";
    mysqli_query($db, $query);


    $query = "CALL insert_data_produk('$id_produk','$nama_produk','$harga','$deskripsi','$kategori','$ukuran','$stok','$warna','$kondisi','$bahan')";
    mysqli_query($db, $query);


    return mysqli_affected_rows($db);
}



function hapusDataProduk($id_produk)
{
    global $db;

    hapusDataNotaKategori($id_produk);
    hapusDataTransaksiKategori($id_produk);
    hapusDataProdukKategori($id_produk);

    return mysqli_affected_rows($db);
}



function tambahDataTransaksi($id_produk, $id_user)
{
    if ($id_produk != null) {
        global $db;

        $query_tampil_produk = "SELECT * FROM produk
        WHERE id_produk = '$id_produk'";

        $result_produk = mysqli_query($db, $query_tampil_produk);
        $row_produk = mysqli_fetch_array($result_produk, MYSQLI_ASSOC);


        $id_transaksi = generate_id_transaksi();
        $harga = $row_produk['harga'];
        $jumlah = 1;
        $total = $jumlah * $harga;
        $bayar = $total;
        $kembali = 0;

        $query = "CALL insert_data_transaksi('$id_transaksi','$id_user','$total','$bayar','$kembali')";

        mysqli_query($db, $query);


        $query = "CALL insert_data_detail_transaksi('$id_produk','$id_transaksi','$jumlah')";
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    } else {

        return 0;
    }
}


function hapusDataTransaksi($id_transaksi)
{
    global $db;

    $query = "CALL delete_data_transaksi('$id_transaksi')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function tampilDataTransaksi()
{
    global $db;

    $query = "SELECT
                t.id_transaksi as 'id transaksi',
                p.id_produk as 'id produk',
                p.nama_produk as 'produk',
                pg.nama_gambar as 'nama gambar',
                kp.nama_kategori as 'kategori',
                deskripsi 'deskripsi',
                p.harga 'harga',
                dt.jumlah 'jumlah',
                t.total_harga 'total',
                t.bayar 'bayar',
                t.kembali 'kembali',
                usr.nama 'nama user',
                usr.id_user 'id user',
                usr.email 'email user',
                usr.alamat 'almat user',
                usr.no_hp 'nomor hp user',
                t.status 'status',
                t.waktu_ubah 'tanggal'
            FROM transaksi as t
            INNER JOIN user as usr ON (usr.id_user = t.users_id)
            INNER JOIN detail_transaksi dt on (dt.transaksi_id = t.id_transaksi)
            INNER JOIN produk p on (dt.produk_id = p.id_produk)
            INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
            INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
            GROUP BY id_user";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tampilDataTransaksiUser($id_user)
{
    global $db;
    $query = "SELECT
            t.id_transaksi as 'id transaksi',
            p.id_produk as 'id produk',
            p.nama_produk as 'produk',
            pg.nama_gambar as 'nama gambar',
            kp.nama_kategori as 'kategori',
            deskripsi 'deskripsi',
            p.stok as 'stok',
            p.harga 'harga',
            dt.jumlah 'jumlah',
            t.total_harga 'total',
            t.bayar 'bayar',
            t.kembali 'kembali',
            usr.nama 'nama user',
            usr.id_user 'id user',
            usr.email 'email user',
            usr.alamat 'almat user',
            usr.no_hp 'nomor hp user',
            t.status 'status',
            t.waktu_ubah 'tanggal'
        FROM transaksi as t
        INNER JOIN user as usr ON (usr.id_user = t.users_id)
        INNER JOIN detail_transaksi dt on (dt.transaksi_id = t.id_transaksi)
        INNER JOIN produk p on (dt.produk_id = p.id_produk)
        INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
        INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
        WHERE usr.id_user ='$id_user'";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hitungTransaksi($id_user)
{
    global $db;

    $query = "SELECT jumlah_pembayaran('$id_user') as jumlah";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $row;
}

function tampilDataTransaksiTertentu($id_user)
{
    global $db;
    $query = "SELECT
            t.id_transaksi as 'id transaksi',
            p.id_produk as 'id produk',
            p.nama_produk as 'produk',
            pg.nama_gambar as 'nama gambar',
            kp.nama_kategori as 'kategori',
            deskripsi 'deskripsi',
            p.harga 'harga',
            dt.jumlah 'jumlah',
            t.total_harga 'total',
            t.bayar 'bayar',
            t.kembali 'kembali',
            usr.nama 'nama user',
            usr.id_user 'id user',
            usr.email 'email user',
            usr.alamat 'almat user',
            usr.no_hp 'nomor hp user',
            t.status 'status',
            t.waktu_ubah 'tanggal'
        FROM transaksi as t
        INNER JOIN user as usr ON (usr.id_user = t.users_id)
        INNER JOIN detail_transaksi dt on (dt.transaksi_id = t.id_transaksi)
        INNER JOIN produk p on (dt.produk_id = p.id_produk)
        INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
        INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
        WHERE t.users_id = '$id_user' ";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubahDataTransaksi($id_user, $status)
{

    global $db;

    $query = "CALL update_transaksi_status('$id_user','$status')";
    mysqli_query($db, $query);

    if ($status == 'berhasil') {

        tambahDataNota($id_user);

        $data_transaksi = tampilDataTransaksiTertentu($id_user);

        foreach ($data_transaksi as $hasil) {

            $id_transaksi = $hasil['id transaksi'];

            hapusDataTransaksi($id_transaksi);

            mysqli_query($db, $query);
        }
    } else {

        $data_transaksi = tampilDataTransaksiTertentu($id_user);

        foreach ($data_transaksi as $hasil) {

            $id_transaksi = $hasil['id transaksi'];

            hapusDataTransaksi($id_transaksi);

            mysqli_query($db, $query);
        }
    }

    return mysqli_affected_rows($db);
}



function hapusDataTransaksiKategori($data)
{
    global $db;
    $query = "SELECT * FROM detail_transaksi
    WHERE produk_id ='$data'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    foreach ($rows as $hasil) {

        $id_transaksi = $hasil['transaksi_id'];
        hapusDataTransaksi($id_transaksi);
    }

    return mysqli_affected_rows($db);
}



function ubahProfile($data)
{
    global $db;
    $id_user = "ADMN";

    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["nomor_hp"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];

    if ($file_name == null) {

        $query = "CALL update_user_no_picture('$id_user','$nama','$alamat','$no_hp','$email')";
        mysqli_query($db, $query);

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    } else {

        if (file_exists('../../assets/img/admin/' . $gambar)) {
            unlink('../../assets/img/admin/' . $gambar);
        }

        move_uploaded_file($file_temp_name, '../../assets/img/admin/' . $file_name . '');


        $query = "CALL update_user_with_picture('$id_user','$nama','$alamat','$no_hp','$email','$file_name')";
        mysqli_query($db, $query);


        return mysqli_affected_rows($db);
    }
}

function ubahProfileUser($data)
{
    global $db;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    $id_user = htmlspecialchars($data['id_user']);

    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["nomor_hp"]);
    $email = htmlspecialchars($data["email"]);


    $query = "CALL update_login('$id_user','$username','$password')";

    mysqli_query($db, $query);


    $query = "CALL update_user_no_picture('$id_user','$nama','$alamat','$no_hp','$email')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function tambahDataUser($data)
{
    global $db;
    $id_user = htmlspecialchars($data['id_user']);
    $roles = 2;


    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["nomor_hp"]);
    $email = htmlspecialchars($data["email"]);

    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);


    $query = "CALL insert_data_user('$id_user', '$nama','$alamat','$no_hp','$email','$roles')";
    mysqli_query($db, $query);


    $query = "CALL insert_data_login('$id_user','$username','$password')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
