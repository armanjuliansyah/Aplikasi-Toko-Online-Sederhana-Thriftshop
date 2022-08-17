-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 09:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriftshop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_gallery_produk` (IN `temp_id_produk` VARCHAR(100))  begin
       DELETE FROM produk_gallery
    WHERE produk_id= temp_id_produk;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_kategori_produk` (IN `temp_id_kategori` VARCHAR(100))  begin
       DELETE FROM kategori_produk
        WHERE id_kategori_produk = temp_id_kategori;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_nota` (IN `temp_id_nota` VARCHAR(100))  begin
       DELETE FROM nota_detail_transaksi WHERE transaksi_nota = temp_id_nota;

       DELETE FROM nota_transaksi WHERE id_nota= temp_id_nota;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_produk` (IN `temp_id_produk` VARCHAR(100))  begin
      DELETE FROM produk
    WHERE id_produk = temp_id_produk;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_transaksi` (IN `temp_id_transaksi` VARCHAR(100))  begin
       DELETE FROM detail_transaksi WHERE transaksi_id = temp_id_transaksi;

       DELETE FROM transaksi WHERE id_transaksi = temp_id_transaksi;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_data_user` (IN `temp_id_user` VARCHAR(100))  begin

      DELETE FROM login WHERE id_user = temp_id_user;

      DELETE FROM user WHERE id_user = temp_id_user;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_detail_nota` (IN `temp_produk_id` VARCHAR(100), IN `temp_id_transaksi` VARCHAR(100), IN `temp_jumlah` FLOAT)  begin

      INSERT INTO nota_detail_transaksi (produk_id, transaksi_nota, jumlah)
        VALUES (temp_produk_id,temp_id_transaksi,temp_jumlah);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_detail_transaksi` (IN `temp_produk_id` VARCHAR(100), IN `temp_id_transaksi` VARCHAR(100), IN `temp_jumlah` FLOAT)  begin

      INSERT INTO detail_transaksi (produk_id, transaksi_id, jumlah)
      VALUES (temp_produk_id,temp_id_transaksi, temp_jumlah);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_kategori_produk` (IN `temp_id_kategori_produk` VARCHAR(100), IN `temp_nama_kategori` VARCHAR(100))  begin
       INSERT INTO kategori_produk(id_kategori_produk, nama_kategori)
        VALUES (temp_id_kategori_produk,temp_nama_kategori);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_login` (IN `temp_id_user` VARCHAR(100), IN `temp_username` VARCHAR(100), IN `temp_password` VARCHAR(100))  begin
       INSERT INTO login (id_user, username, password)
        VALUES (temp_id_user,temp_username,md5(temp_password));
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_nota` (IN `temp_id_nota` VARCHAR(100), IN `temp_users_id` VARCHAR(100), IN `temp_admin_id` VARCHAR(100), IN `temp_total_harga` FLOAT, IN `temp_bayar` FLOAT, IN `temp_kembali` FLOAT)  begin

      INSERT INTO nota_transaksi (id_nota, users_id, admin_id,total_harga, bayar, kembali)
      VALUES (temp_id_nota,temp_users_id,temp_admin_id,temp_total_harga,temp_bayar,temp_kembali);

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_produk` (IN `temp_id_produk` VARCHAR(100), IN `temp_nama_produk` VARCHAR(100), IN `temp_harga` FLOAT, IN `temp_deskripsi` VARCHAR(100), IN `temp_kategori_id` VARCHAR(100), IN `temp_ukuran` VARCHAR(100), IN `temp_stok` FLOAT, IN `temp_warna` VARCHAR(100), IN `temp_kondisi` VARCHAR(100), IN `temp_bahan` VARCHAR(100))  begin
      INSERT INTO produk (id_produk, nama_produk, harga, deskripsi, kategori_id,
                          ukuran,stok,warna,kondisi,bahan)
     VALUES (temp_id_produk,temp_nama_produk,temp_harga, temp_deskripsi, temp_kategori_id,
             temp_ukuran,temp_stok,temp_warna,temp_kondisi,temp_bahan);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_produk_gallery` (IN `temp_id_gallery_produk` VARCHAR(100), IN `temp_id_produk` VARCHAR(100), IN `temp_nama_gambar` VARCHAR(100))  begin
       INSERT INTO produk_gallery (id_gallery, produk_id, nama_gambar)
       VALUES (temp_id_gallery_produk,temp_id_produk,temp_nama_gambar);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_transaksi` (IN `temp_id_transaksi` VARCHAR(100), IN `temp_users_id` VARCHAR(100), IN `temp_total_harga` FLOAT, IN `temp_bayar` FLOAT, IN `temp_kembali` FLOAT)  begin

      INSERT INTO transaksi (id_transaksi, users_id, total_harga, bayar, kembali, status)
            VALUES (temp_id_transaksi,temp_users_id,temp_total_harga,temp_bayar,temp_kembali,'pending');
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data_user` (IN `temp_id_user` VARCHAR(100), IN `temp_nama` VARCHAR(100), IN `temp_alamat` VARCHAR(100), IN `temp_no_hp` VARCHAR(100), IN `temp_email` VARCHAR(100), IN `temp_roles` VARCHAR(100))  begin
        INSERT INTO user (id_user, nama, alamat, no_hp, email, roles)
        VALUES
        (temp_id_user,temp_nama,temp_alamat,temp_no_hp,temp_email,temp_roles);
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_kategori_produk` (IN `temp_id_kategori_produk` VARCHAR(100), IN `temp_nama_kategori` VARCHAR(100))  begin
        UPDATE kategori_produk
        SET nama_kategori = temp_nama_kategori,
        waktu_ubah = now()
        WHERE id_kategori_produk = temp_id_kategori_produk;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_login` (IN `temp_id_user` VARCHAR(100), IN `temp_username` VARCHAR(100), IN `temp_password` VARCHAR(100))  begin
       UPDATE login
        SET username = temp_username,
        password = md5(temp_password)
         WHERE id_user = temp_id_user;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_produk_gallery` (IN `temp_id_gallery_produk` VARCHAR(100), IN `temp_nama_gambar` VARCHAR(100))  begin

        UPDATE produk_gallery
        SET nama_gambar = temp_nama_gambar
        WHERE id_gallery = temp_id_gallery_produk;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_produk_no_desc` (IN `temp_id_produk` VARCHAR(100), IN `temp_nama_produk` VARCHAR(100), IN `temp_harga` FLOAT, IN `temp_kategori_id` VARCHAR(100), IN `temp_ukuran` VARCHAR(100), IN `temp_stok` FLOAT, IN `temp_warna` VARCHAR(100), IN `temp_kondisi` VARCHAR(100), IN `temp_bahan` VARCHAR(100))  begin

       UPDATE produk
            SET nama_produk = temp_nama_produk,
            harga=temp_harga,
            kategori_id = temp_kategori_id,
            ukuran=temp_ukuran,
            stok=temp_stok,
            warna =temp_warna,
            kondisi = temp_kondisi,
            bahan = temp_bahan

            WHERE id_produk = temp_id_produk;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_produk_with_desc` (IN `temp_id_produk` VARCHAR(100), IN `temp_nama_produk` VARCHAR(100), IN `temp_harga` FLOAT, IN `temp_deskripsi` VARCHAR(100), IN `temp_kategori_id` VARCHAR(100), IN `temp_ukuran` VARCHAR(100), IN `temp_stok` FLOAT, IN `temp_warna` VARCHAR(100), IN `temp_kondisi` VARCHAR(100), IN `temp_bahan` VARCHAR(100))  begin

       UPDATE produk
            SET nama_produk = temp_nama_produk,
            harga=temp_harga,
            kategori_id = temp_kategori_id,
            deskripsi=temp_deskripsi,
            ukuran=temp_ukuran,
            stok=temp_stok,
            warna =temp_warna,
            kondisi = temp_kondisi,
            bahan = temp_bahan

            WHERE id_produk = temp_id_produk;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_stok_produk` (IN `temp_id_produk` VARCHAR(100))  begin

       UPDATE produk
            SET stok = 0
            WHERE id_produk = temp_id_produk;

    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_transaksi_status` (IN `temp_user_id` VARCHAR(100), IN `temp_status` VARCHAR(100))  begin
        UPDATE transaksi
        SET status = temp_status
        WHERE users_id = temp_user_id;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_no_picture` (IN `temp_id_user` VARCHAR(100), IN `temp_nama` VARCHAR(100), IN `temp_alamat` VARCHAR(100), IN `temp_no_hp` VARCHAR(100), IN `temp_email` VARCHAR(100))  begin
        UPDATE user
        SET nama = temp_nama,
        alamat = temp_alamat,
        no_hp = temp_no_hp,
        email = temp_email,
        waktu_ubah = now()
        WHERE id_user = temp_id_user;
    end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_with_picture` (IN `temp_id_user` VARCHAR(100), IN `temp_nama` VARCHAR(100), IN `temp_alamat` VARCHAR(100), IN `temp_no_hp` VARCHAR(100), IN `temp_email` VARCHAR(100), IN `temp_gambar` VARCHAR(100))  begin
        UPDATE user
        SET nama = temp_nama,
        alamat = temp_alamat,
        no_hp = temp_no_hp,
        email = temp_email,
        gambar = temp_gambar,
        waktu_ubah = now()
        WHERE id_user = temp_id_user;
    end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `data_pembayaran_nota` (`tempNotaId` VARCHAR(100)) RETURNS FLOAT BEGIN
    DECLARE tempBayar float;
    SELECT
    SUM(nt.bayar) INTO tempBayar
    FROM nota_transaksi as nt
    INNER JOIN user as usr ON (usr.id_user = nt.users_id)
    INNER JOIN user as admn ON (admn.id_user = nt.admin_id)
    INNER JOIN nota_detail_transaksi ndt on (ndt.transaksi_nota = nt.id_nota)
    INNER JOIN produk p on (ndt.produk_id = p.id_produk)
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE nt.id_nota = tempNotaId;
    RETURN tempBayar;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_foto` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah integer;
    SELECT COUNT(produk_gallery.id_gallery) INTO tempJumlah from produk_gallery;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_kategori` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah INTEGER;
    SELECT COUNT(kategori_produk.id_kategori_produk) INTO tempJumlah from kategori_produk;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_nota` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah integer;
    SELECT COUNT(nota_transaksi.id_nota) INTO tempJumlah from nota_transaksi;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_pembayaran` (`tempUserId` VARCHAR(100)) RETURNS FLOAT BEGIN
    DECLARE tempJumlah float;
    SELECT SUM(t.total_harga) INTO tempJumlah from transaksi t
    INNER JOIN user as usr ON (usr.id_user = t.users_id)
    INNER JOIN detail_transaksi dt on (dt.transaksi_id = t.id_transaksi)
    INNER JOIN produk p on (dt.produk_id = p.id_produk)
    INNER JOIN kategori_produk kp on (kp.id_kategori_produk = p.kategori_id)
    INNER JOIN produk_gallery pg on (pg.produk_id = p.id_produk)
    WHERE t.users_id = tempUserId;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_produk` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah float;
    SELECT COUNT(produk.id_produk) INTO tempJumlah from produk;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_transaksi` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah integer;
    SELECT COUNT(transaksi.id_transaksi) INTO tempJumlah from transaksi;
    RETURN tempJumlah;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jumlah_user` () RETURNS INT(11) BEGIN
    DECLARE tempJumlah integer;
    SELECT COUNT(user.id_user) INTO tempJumlah from user
    WHERE user.id_user LIKE '%USR%';
    RETURN tempJumlah;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) NOT NULL,
  `produk_id` varchar(100) NOT NULL,
  `transaksi_id` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT 0,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` bigint(20) NOT NULL,
  `id_kategori_produk` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `id_kategori_produk`, `nama_kategori`, `waktu_buat`, `waktu_ubah`) VALUES
(7, 'KP002', 'sepatu', '2022-04-06 23:25:17', '2022-04-06 23:25:17'),
(8, 'KP003', 'celana wanita', '2022-04-07 09:41:46', '2022-04-07 09:41:46'),
(13, 'KP004', 'tas', '2022-04-09 23:44:17', '2022-04-09 23:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `id_user`, `username`, `password`, `waktu_buat`) VALUES
(1, 'ADMN', 'admin', 'c50beaf72747f748af45b4e2a78c1374', '2022-04-04 23:50:00'),
(22, 'USR001', 'dina', 'e274648aed611371cf5c30a30bbe1d65', '2022-04-09 09:24:16'),
(25, 'USR002', 'jumaidi', '3cea2daebbe2712c22cea91f3941cac6', '2022-04-10 09:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `nota_detail_transaksi`
--

CREATE TABLE `nota_detail_transaksi` (
  `id` bigint(20) NOT NULL,
  `produk_id` varchar(100) NOT NULL,
  `transaksi_nota` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT 0,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota_detail_transaksi`
--

INSERT INTO `nota_detail_transaksi` (`id`, `produk_id`, `transaksi_nota`, `jumlah`, `waktu_buat`, `waktu_ubah`) VALUES
(7, 'P006', 'NT003', 1, '2022-04-10 18:18:12', '2022-04-10 18:18:12'),
(11, 'P003', 'NT004', 1, '2022-04-10 23:23:28', '2022-04-10 23:23:28'),
(12, 'P003', 'NT005', 1, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(13, 'P004', 'NT005', 1, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(14, 'P005', 'NT005', 1, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(15, 'P006', 'NT005', 1, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(16, 'P003', 'NT006', 1, '2022-05-04 07:26:25', '2022-05-04 07:26:25'),
(17, 'P004', 'NT006', 1, '2022-05-04 07:26:25', '2022-05-04 07:26:25'),
(18, 'P006', 'NT007', 1, '2022-05-04 08:08:53', '2022-05-04 08:08:53'),
(19, 'P003', 'NT008', 1, '2022-05-13 01:38:12', '2022-05-13 01:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `nota_transaksi`
--

CREATE TABLE `nota_transaksi` (
  `id` bigint(20) NOT NULL,
  `id_nota` varchar(100) NOT NULL,
  `users_id` varchar(100) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `total_harga` float DEFAULT 0,
  `bayar` float DEFAULT 0,
  `kembali` float DEFAULT 0,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota_transaksi`
--

INSERT INTO `nota_transaksi` (`id`, `id_nota`, `users_id`, `admin_id`, `total_harga`, `bayar`, `kembali`, `waktu_buat`, `waktu_ubah`) VALUES
(7, 'NT003', 'USR001', 'ADMN', 138000, 138000, 0, '2022-04-10 18:18:12', '2022-04-10 18:18:12'),
(9, 'NT004', 'USR002', 'ADMN', 230000, 230000, 0, '2022-04-10 23:23:28', '2022-04-10 23:23:28'),
(10, 'NT005', 'USR001', 'ADMN', 230000, 230000, 0, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(11, 'NT005', 'USR001', 'ADMN', 65000, 65000, 0, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(12, 'NT005', 'USR001', 'ADMN', 169000, 169000, 0, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(13, 'NT005', 'USR001', 'ADMN', 138000, 138000, 0, '2022-04-15 06:25:51', '2022-04-15 06:25:51'),
(14, 'NT006', 'USR002', 'ADMN', 230000, 230000, 0, '2022-05-04 07:26:25', '2022-05-04 07:26:25'),
(15, 'NT006', 'USR002', 'ADMN', 65000, 65000, 0, '2022-05-04 07:26:25', '2022-05-04 07:26:25'),
(16, 'NT007', 'USR001', 'ADMN', 138000, 138000, 0, '2022-05-04 08:08:53', '2022-05-04 08:08:53'),
(17, 'NT008', 'USR002', 'ADMN', 230000, 230000, 0, '2022-05-13 01:38:12', '2022-05-13 01:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) NOT NULL,
  `id_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` float DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `kategori_id` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp(),
  `ukuran` varchar(100) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `warna` varchar(100) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `bahan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_produk`, `nama_produk`, `harga`, `deskripsi`, `kategori_id`, `waktu_buat`, `waktu_ubah`, `ukuran`, `stok`, `warna`, `kondisi`, `bahan`) VALUES
(10, 'P003', 'Sepatu Sneakers Puma ', 230000, '-	Ready Size: US 9 // EUR 42 // 27 CM\r\n-	Kondisi: USED Good Condition [Thrift/Preloved] (sudah menda', 'KP002', '2022-04-08 06:56:03', '2022-04-08 06:56:03', '42', 0, 'white and black', 'pernah dipakai', 'sintetis'),
(11, 'P004', 'Corduroy Wanita Highwaist ', 65000, 'Motif : Kotak-kotak, garis-garis\r\nLP 78\r\nP 97\r\n', 'KP003', '2022-04-08 06:58:26', '2022-04-08 06:58:26', 'L', 1, 'Grey', 'pernah dipakai', 'Corduroy'),
(13, 'P005', 'Sumer Puffy Puffer Pillow Sling Bag Olive Green ', 169000, 'Model : Sling Bag\r\nWarna : Green\r\nKondisi: 92%\r\nDimensi: 34cm x 4cm x 28cm\r\n', 'KP002', '2022-04-09 23:44:25', '2022-04-09 23:44:25', '34cm x 4cm x 28cm', 1, 'green', 'pernah dipakai', 'nilon'),
(14, 'P006', 'Black Bag ', 138000, 'Dimensi - Tas (p x l x t) = 28cm x 20cm x 21cm - Tali pendek (p x l x t) = 62cm x cm x 32cm - Tali p', 'KP004', '2022-04-10 08:22:20', '2022-04-10 08:22:20', 'all size', 1, 'hitam', 'Pernah Dipakai', 'kulit');

-- --------------------------------------------------------

--
-- Table structure for table `produk_gallery`
--

CREATE TABLE `produk_gallery` (
  `id` bigint(20) NOT NULL,
  `id_gallery` varchar(100) NOT NULL,
  `produk_id` varchar(100) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_gallery`
--

INSERT INTO `produk_gallery` (`id`, `id_gallery`, `produk_id`, `nama_gambar`, `waktu_buat`, `waktu_ubah`) VALUES
(3, 'PG003', 'P003', 'sepatu-3.png', '2022-04-08 07:06:35', '2022-04-08 07:06:35'),
(4, 'PG004', 'P004', 'celana-wanita-1.png', '2022-04-08 07:07:15', '2022-04-08 07:07:15'),
(6, 'PG005', 'P005', 'bag-2.png', '2022-04-09 23:44:34', '2022-04-09 23:44:34'),
(7, 'PG006', 'P006', 'bag-4.png', '2022-04-10 08:22:20', '2022-04-10 08:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `users_id` varchar(100) NOT NULL,
  `total_harga` float DEFAULT 0,
  `bayar` float DEFAULT 0,
  `kembali` float DEFAULT 0,
  `status` enum('gagal','pending','berhasil') DEFAULT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `roles` enum('1','2') DEFAULT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `waktu_ubah` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user`, `nama`, `alamat`, `no_hp`, `email`, `gambar`, `roles`, `waktu_buat`, `waktu_ubah`) VALUES
(21, 'ADMN', 'Arman', 'Banjarmasin', '081349581708   ', 'armanjuliansyah321@gmail.com', 'giorgio-grani-MKNPDFao5ic-unsplash.jpg', '1', '2022-04-08 06:37:36', '2022-04-10 22:54:42'),
(23, 'USR001', 'Dina', 'banjarmasin', '081234354543 ', 'armjn1172@mhs.eng.upr.ac.id', NULL, '2', '2022-04-09 09:24:16', '2022-04-10 22:52:13'),
(26, 'USR002', 'jumaidi', 'banjarmasin', '2131212331', 'jumaidi@gmail.com', NULL, '2', '2022-04-10 09:45:47', '2022-04-10 09:45:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`,`produk_id`,`transaksi_id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`,`id_kategori_produk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`,`id_user`);

--
-- Indexes for table `nota_detail_transaksi`
--
ALTER TABLE `nota_detail_transaksi`
  ADD PRIMARY KEY (`id`,`produk_id`,`transaksi_nota`);

--
-- Indexes for table `nota_transaksi`
--
ALTER TABLE `nota_transaksi`
  ADD PRIMARY KEY (`id`,`users_id`,`id_nota`,`admin_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`,`id_produk`,`kategori_id`);

--
-- Indexes for table `produk_gallery`
--
ALTER TABLE `produk_gallery`
  ADD PRIMARY KEY (`id`,`produk_id`,`id_gallery`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`,`id_transaksi`,`users_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nota_detail_transaksi`
--
ALTER TABLE `nota_detail_transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nota_transaksi`
--
ALTER TABLE `nota_transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `produk_gallery`
--
ALTER TABLE `produk_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
