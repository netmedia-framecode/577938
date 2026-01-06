<?php

require_once("config/Base.php");
require_once("config/Alert.php");

// 1. AMBIL DATA INFO PPDB (Active)
$query_info = mysqli_query($conn, "SELECT * FROM info_ppdb WHERE is_active = 1 LIMIT 1");
$info_ppdb = mysqli_fetch_assoc($query_info);

// 2. AMBIL DATA ALUR PENDAFTARAN
$views_alur_ppdb = mysqli_query($conn, "SELECT * FROM alur_ppdb ORDER BY urutan ASC");

// 3. AMBIL BERITA TERBARU (Limit 3)
$query_berita_index = @mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC LIMIT 3");

// FUNGSI HELPER
function format_tanggal($tanggal)
{
  return date('d F Y', strtotime($tanggal));
}

// Kita ambil 1 data saja (bisa berdasarkan ID atau yang terbaru)
$query_sejarah = mysqli_query($conn, "SELECT * FROM sejarah ORDER BY id DESC LIMIT 1");
$data_sejarah = mysqli_fetch_assoc($query_sejarah);

// Default Values jika data kosong (Agar tidak error saat view)
if (!$data_sejarah) {
  $data_sejarah = [
    'judul' => 'Sejarah Sekolah',
    'konten' => '<p>Belum ada data sejarah yang diinputkan oleh administrator.</p>',
    'gambar_gedung' => 'default.jpg' // Pastikan ada gambar default
  ];
}

// Kita ambil 1 data saja (bisa berdasarkan ID atau yang terbaru)
$query_visimisi = mysqli_query($conn, "SELECT * FROM visi_misi ORDER BY id DESC LIMIT 1");
$data_visimisi = mysqli_fetch_assoc($query_visimisi);

// Default Values jika kosong
if (!$data_visimisi) {
  $data_visimisi = [
    'visi' => 'Menjadi sekolah unggul yang berprestasi dan berkarakter.',
    'misi' => '<ul><li>Melaksanakan pembelajaran aktif.</li><li>Menumbuhkan karakter siswa.</li></ul>',
    'tujuan_sekolah' => '<p>Mewujudkan lulusan yang kompetitif.</p>'
  ];
}

// Diurutkan berdasarkan 'urutan' ASC (1, 2, 3...)
$query_guru = mysqli_query($conn, "SELECT * FROM guru_staff ORDER BY urutan ASC");

// Kita masukkan ke array dulu agar mudah memisahkan Kepsek dan Guru
$data_staff = [];
while ($row = mysqli_fetch_assoc($query_guru)) {
  $data_staff[] = $row;
}

// Ambil data pertama sebagai Pimpinan (Asumsi urutan 1 adalah Kepsek)
// Jika array kosong, $pimpinan bernilai null
$pimpinan = !empty($data_staff) ? array_shift($data_staff) : null;

$query_fasilitas = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");

$query_kurikulum = mysqli_query($conn, "SELECT * FROM info_kurikulum ORDER BY id DESC LIMIT 1");
$data_kurikulum = mysqli_fetch_assoc($query_kurikulum);

// Default Values jika kosong
if (!$data_kurikulum) {
  $data_kurikulum = [
    'judul' => 'Kurikulum Merdeka',
    'deskripsi_umum' => '<p>Sekolah kami menerapkan Kurikulum Merdeka yang berpusat pada peserta didik, memberikan fleksibilitas kepada guru untuk melakukan pembelajaran yang terdiferensiasi sesuai dengan kemampuan peserta didik.</p>',
    'tahun_ajaran' => '2025/2026',
    'updated_at' => date('Y-m-d H:i:s')
  ];
}

$query_jurusan = mysqli_query($conn, "SELECT * FROM jurusan ORDER BY id ASC");
// Hanya dijalankan jika ada parameter ?id=... di URL
if (isset($_GET['id'])) {
  $id_jurusan = mysqli_real_escape_string($conn, $_GET['id']);

  // 1. Ambil Data Jurusan yang dipilih
  $query_detail_jurusan = mysqli_query($conn, "SELECT * FROM jurusan WHERE id = '$id_jurusan'");
  $detail_jurusan = mysqli_fetch_assoc($query_detail_jurusan);

  // Jika ID tidak ditemukan, redirect kembali ke halaman jurusan
  if (!$detail_jurusan) {
    header("Location: " . $baseURL . "jurusan");
    exit;
  }

  // 2. Ambil Jurusan Lainnya (Untuk Sidebar)
  $query_jurusan_lain = mysqli_query($conn, "SELECT * FROM jurusan WHERE id != '$id_jurusan' ORDER BY nama_jurusan ASC");
}

$query_kalender = mysqli_query($conn, "SELECT * FROM kalender_akademik ORDER BY tanggal_mulai DESC");

$query_ekskul = mysqli_query($conn, "SELECT * FROM ekstrakurikuler ORDER BY nama_ekskul ASC");

$query_osis = mysqli_query($conn, "SELECT * FROM osis ORDER BY id ASC");

$query_prestasi = mysqli_query($conn, "SELECT * FROM prestasi ORDER BY tahun DESC, id DESC");

$query_info = mysqli_query($conn, "SELECT * FROM info_ppdb WHERE is_active = 1 LIMIT 1");
$info_ppdb = mysqli_fetch_assoc($query_info);

$views_alur_ppdb = mysqli_query($conn, "SELECT * FROM alur_ppdb ORDER BY urutan ASC");

$query_brosur = mysqli_query($conn, "SELECT * FROM brosur_ppdb ORDER BY id DESC");

// 1. Konfigurasi Pagination
$limit = 6; // Jumlah berita per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $limit) - $limit : 0;

// 2. Filter Logic
$where_clause = "WHERE 1=1"; // Default true

// Cek Pencarian
if (isset($_GET['q'])) {
  $keyword = mysqli_real_escape_string($conn, $_GET['q']);
  $where_clause .= " AND (berita.judul LIKE '%$keyword%' OR berita.isi_berita LIKE '%$keyword%')";
}

// Cek Kategori
if (isset($_GET['kategori'])) {
  $id_kat = mysqli_real_escape_string($conn, $_GET['kategori']);
  $where_clause .= " AND berita.id_kategori = '$id_kat'";
}

// 3. Query Utama (Join ke Kategori & User)
$sql_berita = "SELECT berita.*, kategori_berita.nama_kategori, users.name as nama_penulis 
               FROM berita 
               LEFT JOIN kategori_berita ON berita.id_kategori = kategori_berita.id 
               LEFT JOIN users ON berita.id_user = users.id_user 
               $where_clause 
               ORDER BY berita.tanggal_posting DESC 
               LIMIT $start, $limit";

$query_berita = mysqli_query($conn, $sql_berita);

// 4. Hitung Total Data (Untuk Pagination)
$sql_total = "SELECT COUNT(*) as total FROM berita $where_clause";
$res_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_assoc($res_total);
$total_pages = ceil($row_total['total'] / $limit);

// 5. Query Sidebar (Kategori List)
$query_kategori = mysqli_query($conn, "SELECT * FROM kategori_berita ORDER BY nama_kategori ASC");

// 6. Query Sidebar (Berita Populer/Terbaru limit 3)
$query_populer = mysqli_query($conn, "SELECT id, judul, gambar_utama, tanggal_posting FROM berita ORDER BY dibaca DESC LIMIT 3");

if (isset($_GET['id_berita'])) {
  $id_berita = mysqli_real_escape_string($conn, $_GET['id_berita']);

  // 1. UPDATE VIEW COUNT
  mysqli_query($conn, "UPDATE berita SET dibaca = dibaca + 1 WHERE id = '$id_berita'");

  // 2. AMBIL DETAIL BERITA
  $sql_detail_berita = "SELECT berita.*, kategori_berita.nama_kategori, users.name as nama_penulis 
                          FROM berita 
                          LEFT JOIN kategori_berita ON berita.id_kategori = kategori_berita.id 
                          LEFT JOIN users ON berita.id_user = users.id_user 
                          WHERE berita.id = '$id_berita'";

  $query_detail_berita = mysqli_query($conn, $sql_detail_berita);
  $detail_berita = mysqli_fetch_assoc($query_detail_berita);

  if (!$detail_berita) {
    header("Location: " . $baseURL . "berita");
    exit;
  }

  // 3. AMBIL BERITA TERBARU (Sidebar)
  $query_berita_terbaru = mysqli_query($conn, "SELECT id, judul, gambar_utama, tanggal_posting FROM berita WHERE id != '$id_berita' ORDER BY tanggal_posting DESC LIMIT 4");
}

$status_pesan = ""; // Untuk menampung notifikasi

if (isset($_POST['kirim_pesan'])) {
  $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
  $email   = mysqli_real_escape_string($conn, $_POST['email']);
  $subjek  = mysqli_real_escape_string($conn, $_POST['subjek']);
  $pesan   = mysqli_real_escape_string($conn, $_POST['pesan']);

  // Validasi sederhana
  if (!empty($nama) && !empty($email) && !empty($pesan)) {
    $insert = mysqli_query($conn, "INSERT INTO pesan_kontak (nama_pengirim, email_pengirim, subjek, isi_pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')");

    if ($insert) {
      $status_pesan = "success";
    } else {
      $status_pesan = "error";
    }
  } else {
    $status_pesan = "empty";
  }
}
