<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

// 1. HITUNG JUMLAH PESAN MASUK
$query_pesan = mysqli_query($conn, "SELECT * FROM pesan_kontak");
$count_pesan = mysqli_num_rows($query_pesan);

// 2. HITUNG JUMLAH BERITA PUBLISH
$query_berita = mysqli_query($conn, "SELECT * FROM berita"); // Asumsi tabel berita ada
$count_berita = mysqli_num_rows($query_berita);

// 3. HITUNG JUMLAH GALERI
$query_galeri = mysqli_query($conn, "SELECT * FROM album"); // Asumsi tabel galeri ada
$count_galeri = mysqli_num_rows($query_galeri);

// 4. HITUNG JUMLAH DOWNLOAD / BROSUR
$query_brosur = mysqli_query($conn, "SELECT * FROM brosur_ppdb");
$count_brosur = mysqli_num_rows($query_brosur);

// 5. AMBIL 5 PESAN TERBARU (Untuk Tabel Widget)
$latest_pesan = mysqli_query($conn, "SELECT * FROM pesan_kontak ORDER BY id DESC LIMIT 5");

// 6. CEK STATUS PPDB AKTIF
$ppdb_active = mysqli_query($conn, "SELECT * FROM info_ppdb WHERE is_active = 1 LIMIT 1");
$data_ppdb = mysqli_fetch_assoc($ppdb_active);
