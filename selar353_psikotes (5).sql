-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2021 pada 05.09
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selar353_psikotes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_tes`
--

CREATE TABLE `alat_tes` (
  `id_alat_tes` int(2) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `bank_id` bigint(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_logo` text NOT NULL,
  `bank_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_account`
--

CREATE TABLE `bank_account` (
  `account_id` bigint(20) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_desc` text NOT NULL,
  `id_branch` bigint(20) NOT NULL,
  `id_bank` bigint(20) NOT NULL,
  `account_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_branch`
--

CREATE TABLE `bank_branch` (
  `branch_id` bigint(20) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` text NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `id_bank` bigint(20) NOT NULL,
  `branch_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch`
--

CREATE TABLE `batch` (
  `id_batch` int(4) NOT NULL,
  `nama_batch` varchar(100) NOT NULL,
  `perusahaan_id` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `batch_user`
--

CREATE TABLE `batch_user` (
  `id_batch` int(5) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `configuration`
--

CREATE TABLE `configuration` (
  `conf_id` bigint(20) NOT NULL,
  `id_concat` bigint(20) NOT NULL,
  `conf_set` varchar(255) NOT NULL COMMENT 'left/right/bottom_center',
  `conf_text` text NOT NULL,
  `conf_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `conf_create_by` bigint(20) NOT NULL,
  `conf_update` datetime NOT NULL,
  `conf_last_update` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_alat`
--

CREATE TABLE `daftar_alat` (
  `id_alat` int(2) NOT NULL,
  `nama_alat` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_perusahaan`
--

CREATE TABLE `daftar_perusahaan` (
  `id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_sekolah`
--

CREATE TABLE `daftar_sekolah` (
  `sekolah_id` int(4) NOT NULL,
  `nama_sekolah` text NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_sekolah` varchar(5) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lastlogin`
--

CREATE TABLE `data_lastlogin` (
  `lastlogin_id` bigint(20) NOT NULL,
  `lastlogin_tgl` date NOT NULL,
  `lastlogin_wkt` varchar(255) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `lastlogin_ip` varchar(255) NOT NULL,
  `lastlogin_status` varchar(255) NOT NULL,
  `mdk_flag` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_cfit`
--

CREATE TABLE `hasil_cfit` (
  `id_tes` int(4) NOT NULL,
  `id_user` int(2) NOT NULL,
  `sub_test` int(1) NOT NULL,
  `soal_1` varchar(2) DEFAULT NULL,
  `soal_2` varchar(2) DEFAULT NULL,
  `soal_3` varchar(2) DEFAULT NULL,
  `soal_4` varchar(2) DEFAULT NULL,
  `soal_5` varchar(2) DEFAULT NULL,
  `soal_6` varchar(2) DEFAULT NULL,
  `soal_7` varchar(2) DEFAULT NULL,
  `soal_8` varchar(2) DEFAULT NULL,
  `soal_9` varchar(2) DEFAULT NULL,
  `soal_10` varchar(2) DEFAULT NULL,
  `soal_11` varchar(2) DEFAULT NULL,
  `soal_12` varchar(2) DEFAULT NULL,
  `soal_13` varchar(2) DEFAULT NULL,
  `soal_14` varchar(2) DEFAULT NULL,
  `soal_15` varchar(2) DEFAULT NULL,
  `soal_16` varchar(2) DEFAULT NULL,
  `soal_17` varchar(2) DEFAULT NULL,
  `soal_18` varchar(2) DEFAULT NULL,
  `soal_19` varchar(2) DEFAULT NULL,
  `soal_20` varchar(2) DEFAULT NULL,
  `soal_21` varchar(2) DEFAULT NULL,
  `soal_22` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_rmib`
--

CREATE TABLE `hasil_rmib` (
  `id_tes` int(2) NOT NULL,
  `id_user` int(5) NOT NULL,
  `sub_test` varchar(2) NOT NULL,
  `jawaban` varchar(800) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_survey`
--

CREATE TABLE `hasil_survey` (
  `id_tes` int(4) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_perusahaan` int(1) NOT NULL,
  `soal_1` varchar(2) DEFAULT NULL,
  `soal_2` varchar(2) DEFAULT NULL,
  `soal_3` varchar(2) DEFAULT NULL,
  `soal_4` varchar(2) DEFAULT NULL,
  `soal_5` varchar(2) DEFAULT NULL,
  `soal_6` varchar(2) DEFAULT NULL,
  `soal_7` varchar(2) DEFAULT NULL,
  `soal_8` varchar(2) DEFAULT NULL,
  `soal_9` varchar(2) DEFAULT NULL,
  `soal_10` varchar(2) DEFAULT NULL,
  `soal_11` varchar(2) DEFAULT NULL,
  `soal_12` varchar(2) DEFAULT NULL,
  `soal_13` varchar(2) DEFAULT NULL,
  `soal_14` varchar(2) DEFAULT NULL,
  `soal_15` varchar(2) DEFAULT NULL,
  `soal_16` varchar(2) DEFAULT NULL,
  `soal_17` varchar(2) DEFAULT NULL,
  `soal_18` varchar(2) DEFAULT NULL,
  `soal_19` varchar(2) DEFAULT NULL,
  `soal_20` varchar(2) DEFAULT NULL,
  `soal_21` varchar(2) DEFAULT NULL,
  `soal_22` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_survey`
--

CREATE TABLE `jawaban_survey` (
  `id_survey` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `jawaban` text NOT NULL,
  `id_batch` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kab_id` bigint(20) NOT NULL,
  `kab_name` varchar(255) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `kab_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kec_id` bigint(20) NOT NULL,
  `kec_name` varchar(255) NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `kec_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kel_id` bigint(20) NOT NULL,
  `kel_name` varchar(255) NOT NULL,
  `id_kec` bigint(20) NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `kel_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_profil`
--

CREATE TABLE `login_profil` (
  `profil_id` bigint(20) NOT NULL,
  `profil_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_user`
--

CREATE TABLE `login_user` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL COMMENT 'owner/staff/admin',
  `user_photo` varchar(255) NOT NULL,
  `user_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_create_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_checkin`
--

CREATE TABLE `member_checkin` (
  `checkin_id` bigint(20) NOT NULL,
  `checkin_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_client` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_checkout`
--

CREATE TABLE `member_checkout` (
  `checkout_id` bigint(20) NOT NULL,
  `checkout_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_client` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_agent`
--

CREATE TABLE `m_agent` (
  `agent_id` bigint(20) NOT NULL,
  `id_branch` bigint(20) NOT NULL,
  `agent_code` varchar(255) NOT NULL,
  `agent_prefix` varchar(255) NOT NULL,
  `agent_fname` varchar(255) NOT NULL,
  `agent_lname` varchar(255) NOT NULL,
  `agent_address1` varchar(255) NOT NULL,
  `agent_address2` varchar(255) NOT NULL,
  `agent_address3` varchar(255) NOT NULL,
  `agent_address4` varchar(255) NOT NULL,
  `agent_phone` varchar(255) NOT NULL,
  `agent_email` varchar(255) NOT NULL,
  `agent_quota` varchar(255) NOT NULL,
  `agent_date_start` date NOT NULL,
  `agent_date_last` date DEFAULT NULL,
  `agent_photo` varchar(255) NOT NULL,
  `agent_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `agent_create_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_commision`
--

CREATE TABLE `m_commision` (
  `commision_id` bigint(20) NOT NULL,
  `commision_code` varchar(255) NOT NULL,
  `commision_name` varchar(255) NOT NULL,
  `commision_amount` varchar(255) NOT NULL,
  `commision_set` varchar(255) NOT NULL COMMENT 'persen/komisi',
  `commision_price` varchar(255) NOT NULL,
  `commision_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `commision_create_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_developer`
--

CREATE TABLE `m_developer` (
  `developer_id` bigint(20) NOT NULL,
  `developer_name` varchar(255) NOT NULL,
  `developer_address1` varchar(255) NOT NULL,
  `developer_address2` varchar(255) NOT NULL,
  `developer_address3` varchar(255) NOT NULL,
  `developer_address4` varchar(255) NOT NULL,
  `developer_phone` varchar(255) NOT NULL,
  `developer_email` varchar(255) NOT NULL,
  `developer_fax` varchar(255) NOT NULL,
  `developer_logo` varchar(255) NOT NULL,
  `developer_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `developer_create_id` bigint(20) NOT NULL,
  `developer_account_bank` varchar(255) NOT NULL,
  `developer_account_number` varchar(255) NOT NULL,
  `developer_project_name` varchar(255) NOT NULL,
  `developer_project_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_developer_branch`
--

CREATE TABLE `m_developer_branch` (
  `branch_id` bigint(20) NOT NULL,
  `id_developer` bigint(20) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `branch_address1` varchar(255) NOT NULL,
  `branch_address2` varchar(255) NOT NULL,
  `branch_address3` varchar(255) NOT NULL,
  `branch_address4` varchar(255) NOT NULL,
  `branch_email` varchar(255) NOT NULL,
  `branch_phone` varchar(255) NOT NULL,
  `branch_create_id` bigint(20) NOT NULL,
  `branch_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_image`
--

CREATE TABLE `m_image` (
  `image_id` bigint(20) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `id_concat` bigint(20) NOT NULL,
  `image_status` varchar(255) NOT NULL,
  `image_verification_date` datetime NOT NULL,
  `image_verification_by` bigint(20) NOT NULL,
  `image_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_create_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_nilai`
--

CREATE TABLE `m_jenis_nilai` (
  `jenis_nilai_id` bigint(20) NOT NULL,
  `waktu` bigint(20) NOT NULL,
  `jenis_nilai_nama` varchar(255) NOT NULL,
  `jenis_nilai_urutan` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `instruksi` text NOT NULL,
  `contoh1` text NOT NULL,
  `contoh2` text NOT NULL,
  `subtes` varchar(255) NOT NULL,
  `id_nilai_tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_nilaix`
--

CREATE TABLE `m_jenis_nilaix` (
  `jenis_nilai_id` bigint(20) NOT NULL,
  `id_nilai_tipe` bigint(20) NOT NULL,
  `jenis_nilai_nama` varchar(255) NOT NULL,
  `jenis_nilai_urutan` varchar(20) NOT NULL,
  `mdk_flag` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kelas_id` bigint(20) NOT NULL,
  `kelas_kode` varchar(255) NOT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `id_shift` bigint(20) NOT NULL,
  `id_lpa` bigint(20) NOT NULL,
  `mdk_flag` char(1) NOT NULL,
  `kelas_alias` varchar(255) NOT NULL,
  `kelas_kecerdasan` varchar(255) NOT NULL,
  `id_kurikulum` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_locker`
--

CREATE TABLE `m_locker` (
  `locker_id` bigint(20) NOT NULL,
  `locker_code` varchar(255) NOT NULL,
  `locker_name` varchar(255) NOT NULL,
  `locker_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_matapelajaran`
--

CREATE TABLE `m_matapelajaran` (
  `mp_id` bigint(20) NOT NULL,
  `mp_kode` varchar(255) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `soal_tipe` varchar(255) NOT NULL,
  `mp_status` varchar(255) NOT NULL,
  `id_kurikulum` bigint(20) NOT NULL,
  `mdk_flag` char(1) NOT NULL,
  `mp_alias` varchar(255) NOT NULL,
  `mp_alias2` varchar(255) NOT NULL,
  `mp_alias_raport` varchar(255) NOT NULL,
  `mp_urut` bigint(20) NOT NULL,
  `mp_urut2` bigint(20) NOT NULL,
  `mp_urut_k13` bigint(20) NOT NULL,
  `mp_raport` bigint(20) NOT NULL,
  `mp_pengetahuan` varchar(255) NOT NULL,
  `mp_ketrampilan` varchar(255) NOT NULL,
  `mp_min_her` varchar(255) NOT NULL,
  `mp_nama_ktsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_matapelajaranx`
--

CREATE TABLE `m_matapelajaranx` (
  `mp_id` bigint(20) NOT NULL,
  `mp_kode` varchar(255) NOT NULL,
  `mp_nama` varchar(255) NOT NULL,
  `id_kel_mp` bigint(20) NOT NULL,
  `mp_status` varchar(255) NOT NULL,
  `id_kurikulum` bigint(20) NOT NULL,
  `mdk_flag` char(1) NOT NULL,
  `mp_alias` varchar(255) NOT NULL,
  `mp_alias2` varchar(255) NOT NULL,
  `mp_alias_raport` varchar(255) NOT NULL,
  `mp_urut` bigint(20) NOT NULL,
  `mp_urut2` bigint(20) NOT NULL,
  `mp_urut_k13` bigint(20) NOT NULL,
  `mp_raport` bigint(20) NOT NULL,
  `mp_pengetahuan` varchar(255) NOT NULL,
  `mp_ketrampilan` varchar(255) NOT NULL,
  `mp_min_her` varchar(255) NOT NULL,
  `mp_nama_ktsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_promo`
--

CREATE TABLE `m_promo` (
  `promo_id` bigint(20) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `promo_amount` varchar(255) NOT NULL,
  `promo_type` varchar(255) NOT NULL,
  `promo_start_date` date NOT NULL,
  `promo_end_date` date NOT NULL,
  `promo_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `promo_create_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_alat`
--

CREATE TABLE `paket_alat` (
  `id_sklh` int(2) NOT NULL,
  `id_alat` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_soal`
--

CREATE TABLE `paket_soal` (
  `paket_id` bigint(20) NOT NULL,
  `paket_name` varchar(255) NOT NULL,
  `id_mp` bigint(20) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `id_jenis_nilai` bigint(20) NOT NULL,
  `paket_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `paket_create+by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_soal_det`
--

CREATE TABLE `paket_soal_det` (
  `paket_det_id` bigint(20) NOT NULL,
  `id_soal` bigint(20) NOT NULL,
  `paket_det_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `paket_det_create_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pauli`
--

CREATE TABLE `pauli` (
  `id` bigint(20) NOT NULL,
  `COL 1` varchar(5) DEFAULT NULL,
  `COL 2` varchar(5) DEFAULT NULL,
  `COL 3` varchar(4) DEFAULT NULL,
  `COL 4` varchar(4) DEFAULT NULL,
  `COL 5` varchar(4) DEFAULT NULL,
  `COL 6` varchar(4) DEFAULT NULL,
  `COL 7` varchar(4) DEFAULT NULL,
  `COL 8` varchar(4) DEFAULT NULL,
  `COL 9` varchar(4) DEFAULT NULL,
  `COL 10` varchar(4) DEFAULT NULL,
  `COL 11` varchar(4) DEFAULT NULL,
  `COL 12` varchar(5) DEFAULT NULL,
  `COL 13` varchar(5) DEFAULT NULL,
  `COL 14` varchar(5) DEFAULT NULL,
  `COL 15` varchar(5) DEFAULT NULL,
  `COL 16` varchar(5) DEFAULT NULL,
  `COL 17` varchar(5) DEFAULT NULL,
  `COL 18` varchar(5) DEFAULT NULL,
  `COL 19` varchar(5) DEFAULT NULL,
  `COL 20` varchar(5) DEFAULT NULL,
  `COL 21` varchar(5) DEFAULT NULL,
  `COL 22` varchar(5) DEFAULT NULL,
  `COL 23` varchar(5) DEFAULT NULL,
  `COL 24` varchar(5) DEFAULT NULL,
  `COL 25` varchar(5) DEFAULT NULL,
  `COL 26` varchar(5) DEFAULT NULL,
  `COL 27` varchar(5) DEFAULT NULL,
  `COL 28` varchar(5) DEFAULT NULL,
  `COL 29` varchar(5) DEFAULT NULL,
  `COL 30` varchar(5) DEFAULT NULL,
  `COL 31` varchar(5) DEFAULT NULL,
  `COL 32` varchar(5) DEFAULT NULL,
  `COL 33` varchar(5) DEFAULT NULL,
  `COL 34` varchar(5) DEFAULT NULL,
  `COL 35` varchar(5) DEFAULT NULL,
  `COL 36` varchar(5) DEFAULT NULL,
  `COL 37` varchar(5) DEFAULT NULL,
  `COL 38` varchar(5) DEFAULT NULL,
  `COL 39` varchar(5) DEFAULT NULL,
  `COL 40` varchar(5) DEFAULT NULL,
  `COL 41` varchar(5) DEFAULT NULL,
  `COL 42` varchar(5) DEFAULT NULL,
  `COL 43` varchar(5) DEFAULT NULL,
  `COL 44` varchar(5) DEFAULT NULL,
  `COL 45` varchar(5) DEFAULT NULL,
  `COL 46` varchar(5) DEFAULT NULL,
  `COL 47` varchar(5) DEFAULT NULL,
  `COL 48` varchar(5) DEFAULT NULL,
  `COL 49` varchar(5) DEFAULT NULL,
  `COL 50` varchar(5) DEFAULT NULL,
  `COL 51` varchar(5) DEFAULT NULL,
  `COL 52` varchar(5) DEFAULT NULL,
  `COL 53` varchar(5) DEFAULT NULL,
  `COL 54` varchar(5) DEFAULT NULL,
  `COL 55` varchar(5) DEFAULT NULL,
  `COL 56` varchar(5) DEFAULT NULL,
  `COL 57` varchar(5) DEFAULT NULL,
  `COL 58` varchar(5) DEFAULT NULL,
  `COL 59` varchar(5) DEFAULT NULL,
  `COL 60` varchar(5) DEFAULT NULL,
  `COL 61` varchar(5) DEFAULT NULL,
  `COL 62` varchar(5) DEFAULT NULL,
  `COL 63` varchar(5) DEFAULT NULL,
  `COL 64` varchar(5) DEFAULT NULL,
  `COL 65` varchar(5) DEFAULT NULL,
  `COL 66` varchar(5) DEFAULT NULL,
  `COL 67` varchar(5) DEFAULT NULL,
  `COL 68` varchar(5) DEFAULT NULL,
  `COL 69` varchar(5) DEFAULT NULL,
  `COL 70` varchar(5) DEFAULT NULL,
  `COL 71` varchar(5) DEFAULT NULL,
  `COL 72` varchar(5) DEFAULT NULL,
  `COL 73` varchar(5) DEFAULT NULL,
  `COL 74` varchar(5) DEFAULT NULL,
  `COL 75` varchar(5) DEFAULT NULL,
  `COL 76` varchar(5) DEFAULT NULL,
  `COL 77` varchar(5) DEFAULT NULL,
  `COL 78` varchar(5) DEFAULT NULL,
  `COL 79` varchar(5) DEFAULT NULL,
  `COL 80` varchar(5) DEFAULT NULL,
  `COL 81` varchar(5) DEFAULT NULL,
  `COL 82` varchar(5) DEFAULT NULL,
  `COL 83` varchar(5) DEFAULT NULL,
  `COL 84` varchar(5) DEFAULT NULL,
  `COL 85` varchar(5) DEFAULT NULL,
  `COL 86` varchar(5) DEFAULT NULL,
  `COL 87` varchar(5) DEFAULT NULL,
  `COL 88` varchar(5) DEFAULT NULL,
  `COL 89` varchar(5) DEFAULT NULL,
  `COL 90` varchar(5) DEFAULT NULL,
  `COL 91` varchar(5) DEFAULT NULL,
  `COL 92` varchar(5) DEFAULT NULL,
  `COL 93` varchar(5) DEFAULT NULL,
  `COL 94` varchar(5) DEFAULT NULL,
  `COL 95` varchar(5) DEFAULT NULL,
  `COL 96` varchar(5) DEFAULT NULL,
  `COL 97` varchar(5) DEFAULT NULL,
  `COL 98` varchar(5) DEFAULT NULL,
  `COL 99` varchar(5) DEFAULT NULL,
  `COL 100` varchar(5) DEFAULT NULL,
  `COL 101` varchar(5) DEFAULT NULL,
  `COL 102` varchar(6) DEFAULT NULL,
  `COL 103` varchar(6) DEFAULT NULL,
  `COL 104` varchar(6) DEFAULT NULL,
  `COL 105` varchar(6) DEFAULT NULL,
  `COL 106` varchar(6) DEFAULT NULL,
  `COL 107` varchar(6) DEFAULT NULL,
  `COL 108` varchar(6) DEFAULT NULL,
  `COL 109` varchar(6) DEFAULT NULL,
  `COL 110` varchar(6) DEFAULT NULL,
  `COL 111` varchar(6) DEFAULT NULL,
  `COL 112` varchar(6) DEFAULT NULL,
  `COL 113` varchar(6) DEFAULT NULL,
  `COL 114` varchar(6) DEFAULT NULL,
  `COL 115` varchar(6) DEFAULT NULL,
  `COL 116` varchar(6) DEFAULT NULL,
  `COL 117` varchar(6) DEFAULT NULL,
  `COL 118` varchar(6) DEFAULT NULL,
  `COL 119` varchar(6) DEFAULT NULL,
  `COL 120` varchar(6) DEFAULT NULL,
  `COL 121` varchar(6) DEFAULT NULL,
  `COL 122` varchar(6) DEFAULT NULL,
  `COL 123` varchar(6) DEFAULT NULL,
  `COL 124` varchar(6) DEFAULT NULL,
  `COL 125` varchar(6) DEFAULT NULL,
  `COL 126` varchar(6) DEFAULT NULL,
  `COL 127` varchar(6) DEFAULT NULL,
  `COL 128` varchar(6) DEFAULT NULL,
  `COL 129` varchar(6) DEFAULT NULL,
  `COL 130` varchar(6) DEFAULT NULL,
  `COL 131` varchar(6) DEFAULT NULL,
  `COL 132` varchar(6) DEFAULT NULL,
  `COL 133` varchar(6) DEFAULT NULL,
  `COL 134` varchar(6) DEFAULT NULL,
  `COL 135` varchar(6) DEFAULT NULL,
  `COL 136` varchar(6) DEFAULT NULL,
  `COL 137` varchar(6) DEFAULT NULL,
  `COL 138` varchar(6) DEFAULT NULL,
  `COL 139` varchar(6) DEFAULT NULL,
  `COL 140` varchar(6) DEFAULT NULL,
  `COL 141` varchar(6) DEFAULT NULL,
  `COL 142` varchar(6) DEFAULT NULL,
  `COL 143` varchar(6) DEFAULT NULL,
  `COL 144` varchar(6) DEFAULT NULL,
  `COL 145` varchar(6) DEFAULT NULL,
  `COL 146` varchar(6) DEFAULT NULL,
  `COL 147` varchar(6) DEFAULT NULL,
  `COL 148` varchar(6) DEFAULT NULL,
  `COL 149` varchar(6) DEFAULT NULL,
  `COL 150` varchar(6) DEFAULT NULL,
  `COL 151` varchar(6) DEFAULT NULL,
  `COL 152` varchar(6) DEFAULT NULL,
  `COL 153` varchar(6) DEFAULT NULL,
  `COL 154` varchar(6) DEFAULT NULL,
  `COL 155` varchar(6) DEFAULT NULL,
  `COL 156` varchar(6) DEFAULT NULL,
  `COL 157` varchar(6) DEFAULT NULL,
  `COL 158` varchar(6) DEFAULT NULL,
  `COL 159` varchar(6) DEFAULT NULL,
  `COL 160` varchar(6) DEFAULT NULL,
  `COL 161` varchar(6) DEFAULT NULL,
  `COL 162` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pauli2`
--

CREATE TABLE `pauli2` (
  `id` bigint(20) NOT NULL,
  `Angka` varchar(1) DEFAULT NULL,
  `Tanda` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pauli_contoh`
--

CREATE TABLE `pauli_contoh` (
  `id` bigint(20) NOT NULL,
  `Angka` varchar(1) DEFAULT NULL,
  `Tanda` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pauli_jwb`
--

CREATE TABLE `pauli_jwb` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `angka1` varchar(255) NOT NULL,
  `angka2` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `baris` varchar(255) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `test_jawab2` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(4) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` bigint(20) NOT NULL,
  `peserta_nama` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) NOT NULL,
  `peserta_kode_soal` text NOT NULL,
  `peserta_jk` varchar(255) NOT NULL,
  `peserta_kode_soal3` varchar(255) NOT NULL,
  `peserta_tgl_start` date DEFAULT NULL,
  `peserta_tgl_jam` int(11) NOT NULL,
  `peserta_username` varchar(255) NOT NULL,
  `peserta_password` varchar(255) NOT NULL,
  `peserta_nim` varchar(255) NOT NULL,
  `peserta_create_id` int(11) NOT NULL,
  `peserta_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_status` varchar(255) NOT NULL,
  `peserta_notelp` varchar(225) NOT NULL,
  `peserta_email` varchar(255) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `peserta_sekolah` varchar(255) NOT NULL,
  `peserta_printscr` int(11) NOT NULL,
  `peserta_basetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_epps`
--

CREATE TABLE `peserta_epps` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `test_jawab2` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL,
  `test_jawab3` varchar(255) NOT NULL,
  `test_jawab4` varchar(255) NOT NULL,
  `test_jawab5` varchar(255) NOT NULL,
  `test_jawab6` varchar(255) NOT NULL,
  `test_jawab7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_holland`
--

CREATE TABLE `peserta_holland` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `test_jawab2` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL,
  `test_jawab3` varchar(255) NOT NULL,
  `test_jawab4` varchar(255) NOT NULL,
  `test_jawab5` varchar(255) NOT NULL,
  `test_jawab6` varchar(255) NOT NULL,
  `test_jawab7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_jwb2`
--

CREATE TABLE `peserta_jwb2` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `test_jawab2` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_rmib`
--

CREATE TABLE `peserta_rmib` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `id_array` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL,
  `test_jawab3` varchar(255) NOT NULL,
  `test_jawab4` varchar(255) NOT NULL,
  `test_jawab5` varchar(255) NOT NULL,
  `test_jawab6` varchar(255) NOT NULL,
  `test_jawab7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_rmib2`
--

CREATE TABLE `peserta_rmib2` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL DEFAULT 3,
  `nama` text NOT NULL,
  `id_sekolah` int(5) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_survey`
--

CREATE TABLE `peserta_survey` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL DEFAULT 3,
  `nama` text DEFAULT NULL,
  `id_perusahaan` int(5) DEFAULT NULL,
  `tgl_lahir` varchar(30) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_temp`
--

CREATE TABLE `peserta_temp` (
  `peserta_id` bigint(20) NOT NULL DEFAULT 0,
  `peserta_nama` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) NOT NULL,
  `peserta_kode_soal` text NOT NULL,
  `peserta_jk` varchar(255) NOT NULL,
  `peserta_kode_soal3` varchar(255) NOT NULL,
  `peserta_tgl_start` date DEFAULT NULL,
  `peserta_tgl_jam` int(11) NOT NULL,
  `peserta_username` varchar(255) NOT NULL,
  `peserta_password` varchar(255) NOT NULL,
  `peserta_nim` varchar(255) NOT NULL,
  `peserta_create_id` int(11) NOT NULL,
  `peserta_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_status` varchar(255) NOT NULL,
  `peserta_notelp` varchar(225) NOT NULL,
  `peserta_email` varchar(255) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `peserta_sekolah` varchar(255) NOT NULL,
  `peserta_printscr` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_timer`
--

CREATE TABLE `peserta_timer` (
  `id` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` bigint(20) NOT NULL,
  `soal_tipe` varchar(255) NOT NULL,
  `soal_kode` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `times` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `propinsi`
--

CREATE TABLE `propinsi` (
  `prop_id` bigint(20) NOT NULL,
  `prop_name` varchar(255) NOT NULL,
  `prop_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `reg_id` bigint(20) NOT NULL,
  `reg_code` varchar(255) NOT NULL,
  `reg_name` varchar(255) NOT NULL,
  `reg_address` varchar(255) NOT NULL,
  `reg_email` varchar(255) NOT NULL,
  `reg_phone` varchar(255) NOT NULL,
  `reg_parent_name` varchar(255) NOT NULL,
  `reg_parent_address` varchar(255) NOT NULL,
  `reg_parent_phone` varchar(255) NOT NULL,
  `reg_parent_work` varchar(255) NOT NULL,
  `reg_parent_name2` varchar(255) NOT NULL,
  `reg_parent_address2` varchar(255) NOT NULL,
  `reg_parent_phone2` varchar(255) NOT NULL,
  `reg_parent_work2` varchar(255) NOT NULL,
  `id_kelas` bigint(20) NOT NULL,
  `reg_bank_to` bigint(20) NOT NULL,
  `reg_bank_from` bigint(20) NOT NULL,
  `reg_bank_from_account` varchar(255) NOT NULL,
  `reg_bank_from_noaccount` varchar(255) NOT NULL,
  `reg_infaq` varchar(255) NOT NULL,
  `reg_photo` text NOT NULL,
  `reg_lat` varchar(255) NOT NULL,
  `reg_lng` varchar(255) NOT NULL,
  `id_prop` bigint(20) NOT NULL,
  `id_kab` bigint(20) NOT NULL,
  `id_kec` bigint(20) NOT NULL,
  `id_kel` bigint(20) NOT NULL,
  `reg_payment_status` varchar(255) NOT NULL,
  `reg_payment_date` varchar(255) NOT NULL,
  `reg_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `reg_create_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_survey`
--

CREATE TABLE `riwayat_survey` (
  `id_tes` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_alat_tes` int(2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_tes`
--

CREATE TABLE `riwayat_tes` (
  `id_tes` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `id_alat_tes` int(2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `soal_id` bigint(20) NOT NULL,
  `soal_kode` varchar(255) NOT NULL,
  `soal_tipe` varchar(255) NOT NULL,
  `soal_jenis` varchar(255) NOT NULL,
  `soal_pertanyaan` text NOT NULL,
  `kd_tbl_rmib` varchar(2) NOT NULL,
  `soal_jawaban_a` text NOT NULL,
  `soal_jawaban_b` text NOT NULL,
  `soal_jawaban_c` text NOT NULL,
  `soal_jawaban_d` text NOT NULL,
  `soal_jawaban_e` text NOT NULL,
  `soal_jawaban_f` text NOT NULL,
  `soal_jawaban_g` text NOT NULL,
  `soal_media_jawaban_a` varchar(255) NOT NULL,
  `soal_media_jawaban_b` varchar(255) NOT NULL,
  `soal_media_jawaban_c` varchar(255) NOT NULL,
  `soal_media_jawaban_d` varchar(255) NOT NULL,
  `soal_media_jawaban_e` varchar(255) NOT NULL,
  `soal_kunci` varchar(255) NOT NULL,
  `soal_kunci2` varchar(255) NOT NULL,
  `soal_type` varchar(11) NOT NULL,
  `soal_narasi` text NOT NULL,
  `soal_media` varchar(255) NOT NULL,
  `soal_kelas` varchar(255) NOT NULL,
  `soal_aktif` date NOT NULL,
  `soal_akhir` date NOT NULL,
  `soal_wkt_start` time NOT NULL,
  `soal_wkt_stop` time NOT NULL,
  `soal_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `soal_create_by` int(11) NOT NULL,
  `soal_contoh` int(11) NOT NULL,
  `soal_instruksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_skip`
--

CREATE TABLE `soal_skip` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_soal` varchar(255) NOT NULL,
  `id_soal` bigint(20) NOT NULL,
  `soal_tipe` varchar(255) NOT NULL,
  `soal_kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_survey`
--

CREATE TABLE `soal_survey` (
  `id_soal` int(5) NOT NULL,
  `no_soal` int(5) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `soal` varchar(300) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `table 41`
--

CREATE TABLE `table 41` (
  `id` bigint(20) NOT NULL,
  `COL 1` varchar(5) DEFAULT NULL,
  `COL 2` varchar(5) DEFAULT NULL,
  `COL 3` varchar(4) DEFAULT NULL,
  `COL 4` varchar(4) DEFAULT NULL,
  `COL 5` varchar(4) DEFAULT NULL,
  `COL 6` varchar(4) DEFAULT NULL,
  `COL 7` varchar(4) DEFAULT NULL,
  `COL 8` varchar(4) DEFAULT NULL,
  `COL 9` varchar(4) DEFAULT NULL,
  `COL 10` varchar(4) DEFAULT NULL,
  `COL 11` varchar(4) DEFAULT NULL,
  `COL 12` varchar(5) DEFAULT NULL,
  `COL 13` varchar(5) DEFAULT NULL,
  `COL 14` varchar(5) DEFAULT NULL,
  `COL 15` varchar(5) DEFAULT NULL,
  `COL 16` varchar(5) DEFAULT NULL,
  `COL 17` varchar(5) DEFAULT NULL,
  `COL 18` varchar(5) DEFAULT NULL,
  `COL 19` varchar(5) DEFAULT NULL,
  `COL 20` varchar(5) DEFAULT NULL,
  `COL 21` varchar(5) DEFAULT NULL,
  `COL 22` varchar(5) DEFAULT NULL,
  `COL 23` varchar(5) DEFAULT NULL,
  `COL 24` varchar(5) DEFAULT NULL,
  `COL 25` varchar(5) DEFAULT NULL,
  `COL 26` varchar(5) DEFAULT NULL,
  `COL 27` varchar(5) DEFAULT NULL,
  `COL 28` varchar(5) DEFAULT NULL,
  `COL 29` varchar(5) DEFAULT NULL,
  `COL 30` varchar(5) DEFAULT NULL,
  `COL 31` varchar(5) DEFAULT NULL,
  `COL 32` varchar(5) DEFAULT NULL,
  `COL 33` varchar(5) DEFAULT NULL,
  `COL 34` varchar(5) DEFAULT NULL,
  `COL 35` varchar(5) DEFAULT NULL,
  `COL 36` varchar(5) DEFAULT NULL,
  `COL 37` varchar(5) DEFAULT NULL,
  `COL 38` varchar(5) DEFAULT NULL,
  `COL 39` varchar(5) DEFAULT NULL,
  `COL 40` varchar(5) DEFAULT NULL,
  `COL 41` varchar(5) DEFAULT NULL,
  `COL 42` varchar(5) DEFAULT NULL,
  `COL 43` varchar(5) DEFAULT NULL,
  `COL 44` varchar(5) DEFAULT NULL,
  `COL 45` varchar(5) DEFAULT NULL,
  `COL 46` varchar(5) DEFAULT NULL,
  `COL 47` varchar(5) DEFAULT NULL,
  `COL 48` varchar(5) DEFAULT NULL,
  `COL 49` varchar(5) DEFAULT NULL,
  `COL 50` varchar(5) DEFAULT NULL,
  `COL 51` varchar(5) DEFAULT NULL,
  `COL 52` varchar(5) DEFAULT NULL,
  `COL 53` varchar(5) DEFAULT NULL,
  `COL 54` varchar(5) DEFAULT NULL,
  `COL 55` varchar(5) DEFAULT NULL,
  `COL 56` varchar(5) DEFAULT NULL,
  `COL 57` varchar(5) DEFAULT NULL,
  `COL 58` varchar(5) DEFAULT NULL,
  `COL 59` varchar(5) DEFAULT NULL,
  `COL 60` varchar(5) DEFAULT NULL,
  `COL 61` varchar(5) DEFAULT NULL,
  `COL 62` varchar(5) DEFAULT NULL,
  `COL 63` varchar(5) DEFAULT NULL,
  `COL 64` varchar(5) DEFAULT NULL,
  `COL 65` varchar(5) DEFAULT NULL,
  `COL 66` varchar(5) DEFAULT NULL,
  `COL 67` varchar(5) DEFAULT NULL,
  `COL 68` varchar(5) DEFAULT NULL,
  `COL 69` varchar(5) DEFAULT NULL,
  `COL 70` varchar(5) DEFAULT NULL,
  `COL 71` varchar(5) DEFAULT NULL,
  `COL 72` varchar(5) DEFAULT NULL,
  `COL 73` varchar(5) DEFAULT NULL,
  `COL 74` varchar(5) DEFAULT NULL,
  `COL 75` varchar(5) DEFAULT NULL,
  `COL 76` varchar(5) DEFAULT NULL,
  `COL 77` varchar(5) DEFAULT NULL,
  `COL 78` varchar(5) DEFAULT NULL,
  `COL 79` varchar(5) DEFAULT NULL,
  `COL 80` varchar(5) DEFAULT NULL,
  `COL 81` varchar(5) DEFAULT NULL,
  `COL 82` varchar(5) DEFAULT NULL,
  `COL 83` varchar(5) DEFAULT NULL,
  `COL 84` varchar(5) DEFAULT NULL,
  `COL 85` varchar(5) DEFAULT NULL,
  `COL 86` varchar(5) DEFAULT NULL,
  `COL 87` varchar(5) DEFAULT NULL,
  `COL 88` varchar(5) DEFAULT NULL,
  `COL 89` varchar(5) DEFAULT NULL,
  `COL 90` varchar(5) DEFAULT NULL,
  `COL 91` varchar(5) DEFAULT NULL,
  `COL 92` varchar(5) DEFAULT NULL,
  `COL 93` varchar(5) DEFAULT NULL,
  `COL 94` varchar(5) DEFAULT NULL,
  `COL 95` varchar(5) DEFAULT NULL,
  `COL 96` varchar(5) DEFAULT NULL,
  `COL 97` varchar(5) DEFAULT NULL,
  `COL 98` varchar(5) DEFAULT NULL,
  `COL 99` varchar(5) DEFAULT NULL,
  `COL 100` varchar(5) DEFAULT NULL,
  `COL 101` varchar(5) DEFAULT NULL,
  `COL 102` varchar(6) DEFAULT NULL,
  `COL 103` varchar(6) DEFAULT NULL,
  `COL 104` varchar(6) DEFAULT NULL,
  `COL 105` varchar(6) DEFAULT NULL,
  `COL 106` varchar(6) DEFAULT NULL,
  `COL 107` varchar(6) DEFAULT NULL,
  `COL 108` varchar(6) DEFAULT NULL,
  `COL 109` varchar(6) DEFAULT NULL,
  `COL 110` varchar(6) DEFAULT NULL,
  `COL 111` varchar(6) DEFAULT NULL,
  `COL 112` varchar(6) DEFAULT NULL,
  `COL 113` varchar(6) DEFAULT NULL,
  `COL 114` varchar(6) DEFAULT NULL,
  `COL 115` varchar(6) DEFAULT NULL,
  `COL 116` varchar(6) DEFAULT NULL,
  `COL 117` varchar(6) DEFAULT NULL,
  `COL 118` varchar(6) DEFAULT NULL,
  `COL 119` varchar(6) DEFAULT NULL,
  `COL 120` varchar(6) DEFAULT NULL,
  `COL 121` varchar(6) DEFAULT NULL,
  `COL 122` varchar(6) DEFAULT NULL,
  `COL 123` varchar(6) DEFAULT NULL,
  `COL 124` varchar(6) DEFAULT NULL,
  `COL 125` varchar(6) DEFAULT NULL,
  `COL 126` varchar(6) DEFAULT NULL,
  `COL 127` varchar(6) DEFAULT NULL,
  `COL 128` varchar(6) DEFAULT NULL,
  `COL 129` varchar(6) DEFAULT NULL,
  `COL 130` varchar(6) DEFAULT NULL,
  `COL 131` varchar(6) DEFAULT NULL,
  `COL 132` varchar(6) DEFAULT NULL,
  `COL 133` varchar(6) DEFAULT NULL,
  `COL 134` varchar(6) DEFAULT NULL,
  `COL 135` varchar(6) DEFAULT NULL,
  `COL 136` varchar(6) DEFAULT NULL,
  `COL 137` varchar(6) DEFAULT NULL,
  `COL 138` varchar(6) DEFAULT NULL,
  `COL 139` varchar(6) DEFAULT NULL,
  `COL 140` varchar(6) DEFAULT NULL,
  `COL 141` varchar(6) DEFAULT NULL,
  `COL 142` varchar(6) DEFAULT NULL,
  `COL 143` varchar(6) DEFAULT NULL,
  `COL 144` varchar(6) DEFAULT NULL,
  `COL 145` varchar(6) DEFAULT NULL,
  `COL 146` varchar(6) DEFAULT NULL,
  `COL 147` varchar(6) DEFAULT NULL,
  `COL 148` varchar(6) DEFAULT NULL,
  `COL 149` varchar(6) DEFAULT NULL,
  `COL 150` varchar(6) DEFAULT NULL,
  `COL 151` varchar(6) DEFAULT NULL,
  `COL 152` varchar(6) DEFAULT NULL,
  `COL 153` varchar(6) DEFAULT NULL,
  `COL 154` varchar(6) DEFAULT NULL,
  `COL 155` varchar(6) DEFAULT NULL,
  `COL 156` varchar(6) DEFAULT NULL,
  `COL 157` varchar(6) DEFAULT NULL,
  `COL 158` varchar(6) DEFAULT NULL,
  `COL 159` varchar(6) DEFAULT NULL,
  `COL 160` varchar(6) DEFAULT NULL,
  `COL 161` varchar(6) DEFAULT NULL,
  `COL 162` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `timer`
--

CREATE TABLE `timer` (
  `id` int(4) NOT NULL,
  `id_tes` int(5) NOT NULL,
  `id_user` int(2) NOT NULL,
  `start` varchar(40) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `timer_survey`
--

CREATE TABLE `timer_survey` (
  `id` int(4) NOT NULL,
  `id_tes` int(5) NOT NULL,
  `id_user` int(2) NOT NULL,
  `start` varchar(40) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toefl_penilaian`
--

CREATE TABLE `toefl_penilaian` (
  `pen_id` bigint(20) NOT NULL,
  `pen_num_cor` varchar(255) NOT NULL,
  `pen_listening_class` varchar(255) NOT NULL,
  `pen_listening_remidi` varchar(255) NOT NULL,
  `pen_structure_class` varchar(255) NOT NULL,
  `pen_structure_remidi` varchar(255) NOT NULL,
  `pen_reading_class` varchar(255) NOT NULL,
  `pen_reading_remidi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toefl_test`
--

CREATE TABLE `toefl_test` (
  `test_id` bigint(20) NOT NULL,
  `test_kode_soal` varchar(255) NOT NULL,
  `soal_id` bigint(20) NOT NULL,
  `test_jawab` varchar(255) NOT NULL,
  `test_jawab2` varchar(255) NOT NULL,
  `test_waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `peserta_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id_batch`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indeks untuk tabel `peserta_epps`
--
ALTER TABLE `peserta_epps`
  ADD PRIMARY KEY (`test_id`);

--
-- Indeks untuk tabel `peserta_holland`
--
ALTER TABLE `peserta_holland`
  ADD PRIMARY KEY (`test_id`);

--
-- Indeks untuk tabel `peserta_jwb2`
--
ALTER TABLE `peserta_jwb2`
  ADD PRIMARY KEY (`test_id`);

--
-- Indeks untuk tabel `peserta_rmib`
--
ALTER TABLE `peserta_rmib`
  ADD PRIMARY KEY (`test_id`);

--
-- Indeks untuk tabel `peserta_rmib2`
--
ALTER TABLE `peserta_rmib2`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `peserta_survey`
--
ALTER TABLE `peserta_survey`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `peserta_temp`
--
ALTER TABLE `peserta_temp`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indeks untuk tabel `peserta_timer`
--
ALTER TABLE `peserta_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `propinsi`
--
ALTER TABLE `propinsi`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indeks untuk tabel `riwayat_survey`
--
ALTER TABLE `riwayat_survey`
  ADD PRIMARY KEY (`id_tes`,`id_alat_tes`);

--
-- Indeks untuk tabel `riwayat_tes`
--
ALTER TABLE `riwayat_tes`
  ADD PRIMARY KEY (`id_tes`,`id_alat_tes`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indeks untuk tabel `soal_skip`
--
ALTER TABLE `soal_skip`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_survey`
--
ALTER TABLE `soal_survey`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `table 41`
--
ALTER TABLE `table 41`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `timer_survey`
--
ALTER TABLE `timer_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `toefl_penilaian`
--
ALTER TABLE `toefl_penilaian`
  ADD PRIMARY KEY (`pen_id`);

--
-- Indeks untuk tabel `toefl_test`
--
ALTER TABLE `toefl_test`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `batch`
--
ALTER TABLE `batch`
  MODIFY `id_batch` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_epps`
--
ALTER TABLE `peserta_epps`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_holland`
--
ALTER TABLE `peserta_holland`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_rmib`
--
ALTER TABLE `peserta_rmib`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_rmib2`
--
ALTER TABLE `peserta_rmib2`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_survey`
--
ALTER TABLE `peserta_survey`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta_timer`
--
ALTER TABLE `peserta_timer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_skip`
--
ALTER TABLE `soal_skip`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_survey`
--
ALTER TABLE `soal_survey`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `table 41`
--
ALTER TABLE `table 41`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `timer_survey`
--
ALTER TABLE `timer_survey`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toefl_test`
--
ALTER TABLE `toefl_test`
  MODIFY `test_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
