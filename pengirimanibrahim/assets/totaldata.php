<?php
// Include file konfigurasi database
include 'config.php';

// Fungsi untuk membersihkan nilai input
function clean_input($data) {
    global $db;
    return mysqli_real_escape_string($db, $data);
}

// Query untuk mengambil jumlah data dari setiap entitas
$query_pengiriman = "SELECT COUNT(*) AS total_pengiriman FROM pengiriman";
$query_pengirim = "SELECT COUNT(*) AS total_pengirim FROM datadiripengirim";
$query_penerima = "SELECT COUNT(*) AS total_penerima FROM datadiripenerima";
$query_jenis_kiriman = "SELECT COUNT(*) AS total_jenis_kiriman FROM jeniskiriman";
$query_kabupaten = "SELECT COUNT(*) AS total_kabupaten FROM kabupatenkota";
$query_kecamatan = "SELECT COUNT(*) AS total_kecamatan FROM kecamatan";
$query_kelurahan = "SELECT COUNT(*) AS total_kelurahan FROM kelurahan";

// Eksekusi query
$result_pengiriman = mysqli_query($db, $query_pengiriman);
$result_pengirim = mysqli_query($db, $query_pengirim);
$result_penerima = mysqli_query($db, $query_penerima);
$result_jenis_kiriman = mysqli_query($db, $query_jenis_kiriman);
$result_kabupaten = mysqli_query($db, $query_kabupaten);
$result_kecamatan = mysqli_query($db, $query_kecamatan);
$result_kelurahan = mysqli_query($db, $query_kelurahan);

// Mengambil hasil query
$data_pengiriman = mysqli_fetch_assoc($result_pengiriman);
$data_pengirim = mysqli_fetch_assoc($result_pengirim);
$data_penerima = mysqli_fetch_assoc($result_penerima);
$data_jenis_kiriman = mysqli_fetch_assoc($result_jenis_kiriman);
$data_kabupaten = mysqli_fetch_assoc($result_kabupaten);
$data_kecamatan = mysqli_fetch_assoc($result_kecamatan);
$data_kelurahan = mysqli_fetch_assoc($result_kelurahan);
?>
