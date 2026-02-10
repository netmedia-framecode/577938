-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jan 2026 pada 19.38
-- Versi server: 10.6.24-MariaDB-cll-lve
-- Versi PHP: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zjxtorpv_577938`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama_album` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `cover_album` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `nama_album`, `keterangan`, `cover_album`, `id_user`, `created_at`) VALUES
(2, 'Class Meeting Semester Ganjil 2025', 'Kegiatan perlombaan olahraga dan seni antar kelas yang diselenggarakan setelah Penilaian Akhir Semester (PAS). Meliputi lomba Futsal, Voli, dan E-Sport Mobile Legends.', 'album_1769494811_6978591bbd373.jpeg', 1, '2025-12-15 09:00:00'),
(3, 'Peringatan Hari Guru Nasional 2025', 'Upacara bendera spesial di mana petugas upacara adalah para dewan guru, dilanjutkan dengan pemotongan tumpeng dan pemberian bunga oleh siswa sebagai tanda terima kasih.', 'album_1769489734_69784546d014f.jpeg', 1, '2025-11-25 08:00:00'),
(4, 'Bulan Bahasa &amp; Sumpah Pemuda', 'Dokumentasi kegiatan lomba baca puisi, pidato bahasa Inggris, dan fashion show pakaian adat dalam rangka memperingati Hari Sumpah Pemuda ke-97.', 'album_1769489623_697844d7c557e.jpeg', 1, '2025-10-28 10:30:00'),
(5, 'Perayaan HUT RI ke-80', 'Upacara pengibaran bendera merah putih oleh Paskibra SMAN 5 Kota Komba dan dimeriahkan dengan berbagai lomba tradisional seperti tarik tambang dan balap karung.', 'album_1769488046_69783eaeaf173.jpeg', 1, '2025-08-17 07:30:00'),
(6, 'Masa Pengenalan Lingkungan Sekolah (MPLS)', 'Penyambutan peserta didik baru tahun ajaran 2025/2026. Kegiatan diisi dengan materi wawasan wiyata mandala, tata krama, dan pengenalan ekstrakurikuler.', 'album_1769489490_69784452a7cbc.jpeg', 1, '2025-07-15 08:00:00'),
(7, 'Pelepasan Siswa Kelas XII Angkatan 2024', 'Acara perpisahan dan wisuda siswa kelas XII. Diwarnai dengan pentas seni tari daerah dan paduan suara.', 'album_1769494770_697858f2398b0.jpeg', 1, '2025-05-20 09:00:00'),
(9, 'Gotong Royong Kebersihan Lingkungan', 'Kegiatan Jumat Bersih yang melibatkan seluruh siswa dan guru untuk membersihkan area taman sekolah dan drainase menjelang musim hujan.', 'album_1769489565_6978449de2d99.jpeg', 1, '2025-02-07 07:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur_ppdb`
--

CREATE TABLE `alur_ppdb` (
  `id` int(11) NOT NULL,
  `judul_langkah` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `gambar_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alur_ppdb`
--

INSERT INTO `alur_ppdb` (`id`, `judul_langkah`, `deskripsi`, `urutan`, `gambar_icon`) VALUES
(3, 'Registrasi Akun', 'Calon peserta didik membuat akun baru pada portal PPDB menggunakan NISN dan Email yang aktif.', 1, 'step_1_register.png'),
(4, 'Pengisian Formulir', 'Melengkapi biodata diri, data orang tua/wali, serta input nilai rapor semester 1 sampai 5.', 2, 'step_2_form.png'),
(5, 'Unggah Dokumen', 'Mengunggah scan berkas asli seperti Kartu Keluarga (KK), Akta Kelahiran, dan Surat Keterangan Lulus.', 3, 'step_3_upload.png'),
(6, 'Verifikasi Panitia', 'Panitia memverifikasi kelengkapan berkas. Calon siswa memantau status verifikasi melalui dashboard.', 4, 'step_4_verify.png'),
(7, 'Pengumuman Hasil', 'Hasil seleksi PPDB diumumkan secara online sesuai jadwal. Siswa dapat mengunduh Bukti Diterima.', 5, 'step_5_announce.png'),
(8, 'Daftar Ulang', 'Peserta yang dinyatakan lulus wajib melakukan lapor diri (daftar ulang) dan penyerahan berkas fisik ke sekolah.', 6, 'step_6_school.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `bg` varchar(35) DEFAULT NULL,
  `model` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `image`, `bg`, `model`) VALUES
(1, 'auth.png', '#4e73de', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `isi_berita` longtext DEFAULT NULL,
  `gambar_utama` varchar(100) DEFAULT NULL,
  `tanggal_posting` datetime DEFAULT current_timestamp(),
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `dibaca` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi_berita`, `gambar_utama`, `tanggal_posting`, `id_kategori`, `id_user`, `dibaca`) VALUES
(8, 'Siswa SMAN 5 Kota Komba Raih Medali Tingkat  Kabupaten', 'siswa-sman-5-kota-komba-raih-medali-tingkat-kabupaten', '<p><strong>KOTA KOMBA</strong> - Kabar membanggakan kembali datang dari siswa SMAN 5 Kota Komba. Ananda <strong>Budi Santoso</strong> (Kelas XI IPA 1) berhasil menyabet medali tingkat kabupaten yang diselenggarakan minggu lalu.</p><p>Kepala Sekolah menyampaikan apresiasi setinggi-tingginya atas pencapaian ini. \"Ini adalah bukti kerja keras siswa dan bimbingan guru yang luar biasa,\" ujarnya saat upacara bendera hari Senin.</p>', 'berita_1769164233_69734dc939182.jpg', '2025-12-20 08:00:00', 4, 2, 159),
(9, 'Jadwal Pelaksanaan Penilaian Akhir Semester (PAS) Ganjil Tahun Ajaran 2025/2026', 'jadwal-pelaksanaan-penilaian-akhir-semester-pas-ganjil-tahun-ajaran-2025-2026', '<p>Diberitahukan kepada seluruh siswa-siswi SMAN 5 Kota Komba, bahwa Penilaian Akhir Semester (PAS) Ganjil akan dilaksanakan mulai tanggal <strong>2 Desember 2025</strong> hingga <strong>13 Desember 2025</strong>.</p><p>Harap mempersiapkan diri dengan belajar giat dan menjaga kesehatan. Jadwal mata pelajaran dapat diunduh melalui link berikut atau dilihat di papan pengumuman sekolah.</p><ul><li>Senin: Matematika &amp; Bahasa Indonesia</li><li>Selasa: Fisika/Geografi &amp; Bahasa Inggris</li><li>Rabu: Kimia/Sosiologi &amp; PKn</li></ul>', 'berita_1769164187_69734d9b41054.jpg', '2025-11-25 09:30:00', 3, 2, 346),
(10, 'Kemeriahan Peringatan HUT RI ke-80 di SMAN 5 Kota Komba', 'kemeriahan-peringatan-hut-ri-ke-80-di-sman-5-kota-komba', '<p>Perayaan Hari Kemerdekaan Republik Indonesia ke-80 di SMAN 5 Kota Komba berlangsung sangat meriah. Kegiatan diawali dengan upacara bendera khidmat yang dipimpin langsung oleh Bapak Kepala Sekolah.</p><p>Setelah upacara, acara dilanjutkan dengan berbagai perlombaan tradisional antar kelas, seperti:</p><ol><li>Tarik Tambang</li><li>Balap Karung Helm</li><li>Lomba Makan Kerupuk</li><li>Panjat Pinang Mini</li></ol><p>Seluruh siswa antusias mengikuti kegiatan ini hingga sore hari.</p>', 'berita_1769164142_69734d6ecb41b.jpg', '2025-08-17 14:15:00', 5, 2, 514),
(11, 'Pentingnya Literasi Digital di Era Modern', 'pentingnya-literasi-digital-di-era-modern', '<p>Di era digital saat ini, kemampuan literasi tidak hanya sebatas membaca buku fisik, tetapi juga kemampuan menyaring informasi di internet. Hoaks dan berita palsu menyebar dengan cepat.</p><p>Oleh karena itu, perpustakaan SMAN 5 Kota Komba kini meluncurkan program <strong>\"Pojok Baca Digital\"</strong>. Siswa dapat mengakses ribuan e-book secara gratis melalui tablet yang disediakan di perpustakaan.</p>', 'berita_1769164112_69734d5003253.jpg', '2025-10-28 10:00:00', 7, 2, 92),
(12, 'Kunjungan Studi Banding dari SMA Negeri 1 Ruteng', 'kunjungan-studi-banding-dari-sma-negeri-1-ruteng', '<p>SMAN 5 Kota Komba menerima kunjungan istimewa dari rombongan guru dan OSIS SMA Negeri 1 Ruteng dalam rangka studi banding manajemen organisasi kesiswaan.</p><p>Kegiatan ini bertujuan untuk bertukar pikiran mengenai program kerja OSIS dan pengelolaan ekstrakurikuler yang efektif. Diharapkan kerjasama antar kedua sekolah dapat terus terjalin dengan baik di masa depan.</p>', 'berita_1769163964_69734cbcdefee.jpg', '2025-09-15 11:45:00', 2, 2, 215),
(13, 'Mewujudkan Merdeka Belajar,Siswa SMA Negeri 5 Kota Komba Buat Karya Moral\\\\\\&#039;Momang Adat Ru\\\\\\&#039;', 'mewujudkan-merdeka-belajar-siswa-sma-negeri-5-kota-komba-buat-karya-moral-039-momang-adat-ru-039-', '<p>Kepala SMA Negeri 5 Kota Komba Marselinus Junardi dan guru pendamping berpose bersama siswa/siswi pelukis karya moral Manggarai Momang Adat &nbsp;Ru</p>', 'berita_1769523712_6978ca00da59f.jpeg', '2026-01-27 21:14:47', 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `brosur_ppdb`
--

CREATE TABLE `brosur_ppdb` (
  `id` int(11) NOT NULL,
  `judul_file` varchar(200) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `ukuran_file` varchar(50) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `brosur_ppdb`
--

INSERT INTO `brosur_ppdb` (`id`, `judul_file`, `nama_file`, `ukuran_file`, `tanggal_upload`) VALUES
(8, 'Brosur PPDB 2026 atau Panduan Pendaftaran Siswa Baru', '20260128_69798247bad3b.jpeg', '0.08 MB', '2026-01-28 10:28:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `nama_ekskul` varchar(100) DEFAULT NULL,
  `nama_pembina` varchar(100) DEFAULT NULL,
  `jadwal_latihan` varchar(100) DEFAULT NULL,
  `deskripsi_kegiatan` text DEFAULT NULL,
  `foto_kegiatan` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekskul`, `nama_pembina`, `jadwal_latihan`, `deskripsi_kegiatan`, `foto_kegiatan`, `id_user`) VALUES
(2, 'Pramuka (Praja Muda Karana)', 'Kak Budi Santoso, S.Pd.', 'Jumat, 15:00 - 17:00 WITA', '<p><strong>Pramuka</strong> adalah ekstrakurikuler wajib bagi siswa kelas X yang bertujuan membentuk karakter disiplin, mandiri, dan cinta tanah air.</p><p><strong>Kegiatan Rutin:</strong></p><ul><li>Latihan Baris Berbaris (LKBB)</li><li>Pionering (Tali Temali)</li><li>Sandi &amp; Morse</li><li>Perkemahan Sabtu Minggu (Persami)</li></ul><p>Pramuka SMAN 5 Kota Komba aktif mengikuti Jambore Ranting dan Cabang setiap tahunnya.</p>', 'ekskul_1769521309_6978c09d3653a.jpeg', 1),
(3, 'Paskibra (Pasukan Pengibar Bendera)', 'Petrus Lijung S.Pd', 'Senin &amp; Rabu, 16:00 - 17:30 WITA', '<p>Ekskul <strong>Paskibra</strong> melatih kedisiplinan fisik dan mental siswa melalui latihan baris-berbaris.</p><p>Anggota Paskibra bertugas sebagai petugas upacara bendera setiap hari Senin dan pada peringatan hari besar nasional (17 Agustus). Selain itu, ekskul ini juga melatih kepemimpinan dan kerja sama tim yang solid.</p>', 'ekskul_1769521243_6978c05b774ee.jpeg', 1),
(4, 'Futsal &amp; Sepak Bola', 'Pak Hendra Gunawan, S.Or.', 'Selasa &amp; Kamis, 15:30 - 17:30 WITA', '<p>Wadah bagi siswa yang memiliki minat dan bakat di bidang olahraga sepak bola dan futsal.</p><p><strong>Program Latihan:</strong></p><ul><li>Latihan Fisik &amp; Stamina</li><li>Teknik Dasar (Passing, Dribbling, Shooting)</li><li>Taktik Permainan</li><li>Sparring Partner dengan sekolah lain</li></ul><p>Tim Futsal SMAN 5 Kota Komba sering menjuarai turnamen antar pelajar tingkat kabupaten.</p>', 'ekskul_1769521277_6978c07dc102b.jpeg', 1),
(6, 'Seni Tari &amp; Musik Tradisional', 'Muhamad Pezim Najibulah, S.Pd', 'Sabtu, 14:00 - 16:00 WITA', '<p>Ekskul ini bertujuan melestarikan budaya lokal melalui seni tari dan musik daerah NTT.</p><p>Siswa diajarkan berbagai tarian adat seperti Tari Caci, Rangkuk Alu, dan Tari Hegong, serta memainkan alat musik tradisional. Grup tari sekolah sering diundang untuk mengisi acara penyambutan tamu dinas dan festival budaya daerah.</p>', 'ekskul_1769520956_6978bf3c617de.jpeg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_fasilitas` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_fasilitas`, `deskripsi`, `gambar_fasilitas`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'Laboratorium Komputer', '<p>SMAN 5 Kota Komba memiliki <strong>Laboratorium Komputer</strong> yang modern dan terintegrasi dengan jaringan internet berkecepatan tinggi (Fiber Optic).</p><p>Fasilitas ini digunakan untuk:</p><ul><li>Kegiatan Belajar Mengajar (KBM) mata pelajaran Informatika.</li><li>Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK).</li><li>Ujian Sekolah berbasis digital.</li></ul><p>Ruangan dilengkapi dengan AC untuk kenyamanan siswa serta spesifikasi PC yang mumpuni untuk desain grafis dasar dan pemrograman.</p>', 'fasilitas_1769410564_69771004f0e49.jpeg', 1, '2025-12-31 03:36:51', '2026-01-26 06:56:04'),
(3, 'Perpustakaan', '<p>Perpustakaan sekolah menyediakan ribuan koleksi buku, mulai dari buku pelajaran, ensiklopedia, novel sastra, hingga majalah pendidikan.</p><p><strong>Fasilitas Unggulan:</strong></p><ul><li>Area baca yang hening dan nyaman (lesehan dan meja).</li><li>Koneksi Wi-Fi khusus untuk referensi digital.</li><li>Layanan peminjaman buku berbasis sistem informasi digital.</li></ul><p>Perpustakaan ini menjadi pusat literasi siswa untuk mengembangkan wawasan di luar jam pelajaran.</p>', 'fasilitas_1769410607_6977102fa15d3.jpeg', 1, '2025-12-31 03:36:51', '2026-01-26 06:56:47'),
(4, 'Lapangan Olahraga &amp; Upacara', '<p>Lapangan serbaguna yang luas berfungsi sebagai pusat kegiatan fisik dan kedisiplinan siswa.</p><p>Lapangan ini memfasilitasi berbagai cabang olahraga seperti:</p><ul><li>Futsal</li><li>Bola Voli</li><li>Takwro</li><li>Senam Kesegaran Jasmani (SKJ)</li></ul><p>Selain olahraga, lapangan ini digunakan untuk kegiatan rutin Upacara Bendera setiap hari Senin dan peringatan hari besar nasional.</p>', 'fasilitas_1769410673_697710718c21f.jpeg', 1, '2025-12-31 03:36:51', '2026-01-27 06:09:31'),
(5, 'Laboratorium IPA Terpadu', '<p>Untuk menunjang praktikum mata pelajaran Fisika, Kimia, dan Biologi, sekolah menyediakan Laboratorium IPA yang lengkap.</p><p>Dilengkapi dengan alat peraga anatomi, mikroskop cahaya, bahan-bahan kimia dasar untuk percobaan, serta alat ukur fisika presisi. Laboratorium ini didesain dengan standar keselamatan kerja (K3) yang tinggi, termasuk tersedianya APAR dan wastafel pencuci mata darurat.</p>', 'fasilitas_1769411741_6977149ddfc15.jpeg', 1, '2025-12-31 03:36:51', '2026-01-26 07:15:41'),
(7, 'Kantin Sehat', '<p>Kantin sekolah menyediakan berbagai menu makanan dan minuman yang higienis dan terjangkau bagi siswa. Sekolah menerapkan konsep <strong>Kantin Sehat</strong> dengan mengurangi penggunaan plastik sekali pakai dan memastikan makanan bebas dari bahan pengawet berbahaya.</p>', 'fasilitas_1769412026_697715ba0a116.jpeg', 1, '2025-12-31 03:36:51', '2026-01-26 07:20:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_album` int(11) DEFAULT NULL,
  `file_foto` varchar(100) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `id_album`, `file_foto`, `caption`) VALUES
(1, 9, 'foto_9_1767223582_6955b11e689f4.png', 'tes'),
(3, 9, 'foto_9_1767223598_6955b12eb1eb2.png', 'tes'),
(4, 3, 'foto_3_1769489678_6978450e71974.jpeg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_staff`
--

CREATE TABLE `guru_staff` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `jabatan_atau_mapel` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `urutan` int(11) DEFAULT 100,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru_staff`
--

INSERT INTO `guru_staff` (`id`, `nama`, `nip`, `jabatan_atau_mapel`, `foto`, `jenis_kelamin`, `urutan`, `id_user`) VALUES
(1, 'Marselinus Junardi, S.Pd', '196506052010011032', 'Kepala Sekolah', 'guru_1769567451_697974dbdd237.jpeg', 'L', 1, 1),
(4, 'Leltija Siska Jenem  S.Pd', '198004042005032003', 'Wakil Kepala Sekolah', 'guru_1769566147_69796fc3bb963.jpeg', 'P', 2, 1),
(6, 'Hironimus Cance, S.Pd', '198301012010011001', 'Staff', 'guru_1769474549_697809f580615.jpeg', 'L', 3, 1),
(7, 'Fransiskus Meze Mala S.Pd', '199002022015022002', 'Staff', 'guru_1769474601_69780a29ce31a.jpeg', 'L', 3, 1),
(8, 'Rudi Hartono', '-', 'Staff Keamanan & Ketertiban', 'staff_security.jpg', 'L', 3, 1),
(9, 'Karolina Nari  S.Pd', '198506062010031005', 'Guru Mata Pelajaran', 'guru_1769567082_6979736a5d5ed.jpeg', 'L', 4, 1),
(10, 'Hironimus Cance, S.Pd', '198807072012032006', 'Guru Mata Pelajaran', 'guru_1769474632_69780a482744a.jpeg', 'P', 4, 1),
(11, 'Maria Florentina Longga, S.Kom', '199008082015031007', 'Guru Mata Pelajaran', 'guru_1769567107_6979738345867.jpeg', 'L', 4, 1),
(12, 'Adriana Saiman, S.Pd', '199209092017032008', 'Guru Mata Pelajaran', 'guru_1769569304_69797c1896956.jpeg', 'P', 4, 1),
(13, 'Petrus Lijung, S.Pd', '199510102019031009', 'Guru Mata Pelajaran', 'guru_1769474668_69780a6c4c805.jpeg', 'L', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_kurikulum`
--

CREATE TABLE `info_kurikulum` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT 'Kurikulum Sekolah',
  `deskripsi_umum` longtext DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT '2024/2025',
  `id_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_kurikulum`
--

INSERT INTO `info_kurikulum` (`id`, `judul`, `deskripsi_umum`, `tahun_ajaran`, `id_user`, `updated_at`) VALUES
(2, 'Implementasi Kurikulum Merdeka (IKM)', '<p>SMAN 5 Kota Komba saat ini menerapkan <strong>Kurikulum Merdeka</strong> dengan opsi Mandiri Berubah. Kurikulum ini berfokus pada materi esensial dan pengembangan karakter Profil Pelajar Pancasila.</p><p>Struktur kurikulum dibagi menjadi dua kegiatan utama:</p><ul><li><strong>Pembelajaran Intrakurikuler:</strong> Kegiatan tatap muka reguler dengan materi yang lebih ringkas dan mendalam.</li><li><strong>Projek Penguatan Profil Pelajar Pancasila (P5):</strong> Kegiatan kokurikuler berbasis projek yang dialokasikan sekitar 30% dari total jam pelajaran per tahun.</li></ul><p>Untuk Fase Pembelajaran:</p><ul><li><strong>Fase E:</strong> Kelas X (Mata pelajaran umum, belum ada penjurusan).</li><li><strong>Fase F:</strong> Kelas XI dan XII (Pemilihan mata pelajaran minat sesuai aspirasi karir siswa).</li></ul>', '2024/2025', 1, '2025-12-31 03:35:44'),
(3, 'Kurikulum 2013 (Revisi)', '<p>Untuk tingkat akhir (Kelas XII), pembelajaran masih mengacu pada <strong>Kurikulum 2013 (K-13) Edisi Revisi</strong> hingga masa transisi selesai sepenuhnya.</p><p>Karakteristik utama pembelajaran meliputi:</p><ul><li>Pendekatan <strong>Saintifik</strong> (Mengamati, Menanya, Mengumpulkan Informasi, Menalar, dan Mengomunikasikan).</li><li>Penilaian Autentik yang mencakup tiga ranah: <strong>Sikap (Afektif), Pengetahuan (Kognitif), dan Keterampilan (Psikomotorik)</strong>.</li><li>Penjurusan (IPA/IPS) yang sudah ditetapkan sejak awal masuk sekolah.</li></ul>', '2024/2025', 1, '2025-12-31 03:35:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_ppdb`
--

CREATE TABLE `info_ppdb` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_buka` date DEFAULT NULL,
  `tanggal_tutup` date DEFAULT NULL,
  `status` enum('Buka','Tutup') DEFAULT 'Tutup',
  `gambar_banner` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_ppdb`
--

INSERT INTO `info_ppdb` (`id`, `judul`, `deskripsi`, `tanggal_buka`, `tanggal_tutup`, `status`, `gambar_banner`, `is_active`, `created_at`) VALUES
(3, 'Penerimaan Peserta Didik Baru Jalur Prestasi T.A. 2026/2027', '<p><strong>Selamat Datang Calon Peserta Didik Baru!</strong></p><p>SMAN 5 Kota Komba kembali membuka pendaftaran untuk tahun ajaran 2026/2027 khusus Jalur Prestasi. Jalur ini diperuntukkan bagi siswa yang memiliki prestasi akademik maupun non-akademik.</p><p><strong>Persyaratan Umum:</strong></p><ul><li>Lulusan SMP/MTs sederajat tahun 2026.</li><li>Memiliki nilai rata-rata rapor semester 1-5 minimal 80.</li><li>Melampirkan sertifikat kejuaraan (jika ada).</li><li>Pas foto terbaru ukuran 3x4 (latar merah).</li></ul><p>Silakan klik tombol daftar dan ikuti alur yang tersedia. Kuota terbatas!</p>', '2026-06-15', '2026-06-25', 'Buka', 'banner_ppdb_2026.jpg', 1, '2026-01-06 09:00:34'),
(4, 'Informasi PPDB Jalur Zonasi & Afirmasi (Gelombang 2)', '<p>Pendaftaran Jalur Zonasi akan dibuka segera setelah Jalur Prestasi selesai.</p><p><strong>Ketentuan Zonasi:</strong></p><ul><li>Jarak tempat tinggal ke sekolah maksimal 3 KM.</li><li>Wajib melampirkan Kartu Keluarga (KK) asli yang diterbitkan paling singkat 1 tahun sebelum tanggal pendaftaran.</li></ul><p>Pantau terus halaman ini untuk informasi tanggal pembukaan.</p>', '2026-07-01', '2026-07-05', 'Tutup', 'banner_zonasi.jpg', 0, '2026-01-06 09:00:34'),
(5, 'Arsip PPDB Tahun Ajaran 2025/2026 (Tahun Lalu)', '<p>Ini adalah arsip informasi pendaftaran tahun lalu. Seluruh rangkaian kegiatan PPDB 2025 telah selesai dan siswa baru telah memulai kegiatan belajar mengajar.</p>', '2025-06-10', '2025-06-20', 'Tutup', 'banner_2025.jpg', 0, '2026-01-06 09:00:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ikon_atau_gambar` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `deskripsi`, `ikon_atau_gambar`, `id_user`) VALUES
(2, 'MIPA (Matematika dan Ilmu Pengetahuan Alam)', '<p>Jurusan <strong>MIPA</strong> diperuntukkan bagi siswa yang memiliki minat kuat dan kemampuan analisis dalam bidang sains dan matematika.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Matematika Peminatan</li><li>Fisika</li><li>Kimia</li><li>Biologi</li></ul><p>Lulusan jurusan ini dipersiapkan untuk melanjutkan pendidikan ke jenjang perkuliahan di bidang Kedokteran, Teknik, Farmasi, Sains Murni, dan Teknologi Informasi.</p>', 'icon_mipa.jpg', 1),
(3, 'IPS (Ilmu Pengetahuan Sosial)', '<p>Jurusan <strong>IPS</strong> mempelajari fenomena sosial dan kemasyarakatan. Jurusan ini melatih siswa untuk berpikir kritis terhadap isu-isu sosial, ekonomi, dan sejarah.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Sosiologi</li><li>Geografi</li><li>Ekonomi</li><li>Sejarah Peminatan</li></ul><p>Sangat cocok bagi siswa yang ingin melanjutkan studi di bidang Hukum, Ekonomi & Bisnis, Ilmu Politik, Hubungan Internasional, Psikologi, dan Komunikasi.</p>', 'icon_ips.jpg', 1),
(4, 'IBB (Ilmu Bahasa dan Budaya)', '<p>Jurusan <strong>Bahasa</strong> fokus pada pendalaman kemampuan literasi, penguasaan bahasa asing, serta pemahaman budaya dan antropologi.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Bahasa & Sastra Indonesia</li><li>Bahasa & Sastra Inggris</li><li>Bahasa Asing Pilihan (Jepang/Jerman/Mandarin)</li><li>Antropologi</li></ul><p>Lulusan jurusan ini memiliki peluang besar di bidang Sastra, Pariwisata, Hubungan Internasional, Jurnalistik, dan Seni.</p>', 'icon_bahasa.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `id_user`) VALUES
(16, 'Masa Pengenalan Lingkungan Sekolah (MPLS)', '2025-07-15', '2025-07-17', 'Kegiatan orientasi bagi peserta didik baru kelas X untuk mengenal lingkungan sekolah dan budaya belajar.', 1),
(17, 'HUT Kemerdekaan RI ke-80', '2025-08-17', '2025-08-17', 'Upacara Bendera wajib bagi seluruh warga sekolah dan lomba-lomba kesiswaan.', 1),
(18, 'Asesmen Tengah Semester (ATS) Ganjil', '2025-09-22', '2025-09-27', 'Evaluasi pertengahan semester untuk mengukur capaian pembelajaran siswa.', 1),
(19, 'Bulan Bahasa & Sumpah Pemuda', '2025-10-28', '2025-10-28', 'Peringatan Sumpah Pemuda dirangkaikan dengan lomba literasi, puisi, dan pidato.', 1),
(20, 'Penilaian Akhir Semester (PAS) Ganjil', '2025-12-01', '2025-12-12', 'Pelaksanaan ujian akhir semester berbasis komputer untuk semua jenjang kelas.', 1),
(21, 'Class Meeting Semester Ganjil', '2025-12-15', '2025-12-18', 'Kegiatan perlombaan antar kelas (Olahraga dan Seni) pasca ujian.', 1),
(22, 'Pembagian Rapor Semester Ganjil', '2025-12-19', '2025-12-19', 'Penyerahan laporan hasil belajar peserta didik kepada orang tua/wali murid.', 1),
(23, 'Libur Semester Ganjil', '2025-12-22', '2026-01-03', 'Libur panjang akhir semester bagi peserta didik dan tenaga pendidik.', 1),
(24, 'Hari Pertama Masuk Semester Genap', '2026-01-05', '2026-01-05', 'Awal dimulainya Kegiatan Belajar Mengajar (KBM) Semester Genap TA 2025/2026.', 1),
(25, 'Ujian Sekolah (US) Kelas XII', '2026-03-09', '2026-03-14', 'Ujian kelulusan bagi siswa tingkat akhir (Kelas 12). Kegiatan kelas X dan XI belajar di rumah.', 1),
(26, 'Perkiraan Libur Awal Ramadhan', '2026-02-18', '2026-02-21', 'Libur menyambut bulan suci Ramadhan (Jadwal dapat berubah mengikuti keputusan pemerintah).', 1),
(27, 'Asesmen Tengah Semester (ATS) Genap', '2026-03-23', '2026-03-28', 'Evaluasi tengah semester genap.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_kategori`, `id_user`) VALUES
(2, 'Berita Sekolah', 2),
(3, 'Pengumuman', 2),
(4, 'Prestasi & Lomba', 2),
(5, 'Artikel Pendidikan', 2),
(6, 'Pojok Literasi', 2),
(7, 'Agenda Sekolah', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `osis`
--

CREATE TABLE `osis` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `foto_siswa` varchar(100) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `osis`
--

INSERT INTO `osis` (`id`, `nama_siswa`, `jabatan`, `foto_siswa`, `periode`, `id_user`) VALUES
(1, 'Marselina Ayu', 'Ketua OSIS', 'osis_1769521588_6978c1b481d1b.jpeg', '2024/2025', 1),
(2, 'Fransiskus Arnoldus Jegaut', 'Wakil Ketua OSIS', 'osis_1769522200_6978c4183acd0.jpeg', '2024/2025', 1),
(3, 'Tutiliani Enda', 'Sekretaris', 'osis_1769521565_6978c19de654e.jpeg', '2024/2025', 1),
(4, 'Florentina Aurelia Nde', 'Bendahara', 'osis_1769521534_6978c17e1c6bd.jpeg', '2024/2025', 1),
(5, 'Celno Sius Nggau', 'Koordinator Sekbid', 'osis_1769521483_6978c14b1b17c.jpeg', '2024/2025', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_kontak`
--

CREATE TABLE `pesan_kontak` (
  `id` int(11) NOT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `email_pengirim` varchar(100) DEFAULT NULL,
  `subjek` varchar(150) DEFAULT NULL,
  `isi_pesan` text DEFAULT NULL,
  `tanggal_kirim` datetime DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan_kontak`
--

INSERT INTO `pesan_kontak` (`id`, `nama_pengirim`, `email_pengirim`, `subjek`, `isi_pesan`, `tanggal_kirim`, `id_user`) VALUES
(1, 'Andi Pratama', 'andi.pratama99@gmail.com', 'Informasi Pendaftaran Siswa Baru (PPDB)', 'Selamat pagi, saya ingin bertanya kapan jadwal pendaftaran Penerimaan Peserta Didik Baru (PPDB) untuk tahun ajaran 2026/2027 dibuka? Apakah ada jalur prestasi?', '2026-01-05 08:15:00', NULL),
(2, 'CV. Teknologi Pendidikan', 'marketing@tekno-edu.co.id', 'Penawaran Kerjasama Pengadaan Laboratorium Komputer', 'Yth. Kepala Sekolah SMAN 5 Kota Komba, perkenalkan kami dari CV. Teknologi Pendidikan ingin mengajukan penawaran perangkat komputer terbaru untuk menunjang UNBK.', '2026-01-04 14:30:00', NULL),
(4, 'Budi Santoso', 'budisantoso@gmail.com', 'Laporan Kendala Website Sekolah', 'Saya mencoba mengakses halaman E-Learning tapi loadingnya sangat lama dan sering error 500. Mohon diperbaiki karena anak saya mau mengumpulkan tugas.', '2026-01-03 19:45:00', NULL),
(5, 'Universitas Nusa Cendana', 'humas@undana.ac.id', 'Permohonan Sosialisasi Kampus', 'Kami bermaksud mengadakan sosialisasi penerimaan mahasiswa baru jalur SNBP di SMAN 5 Kota Komba minggu depan. Mohon info kontak Waka Kesiswaan.', '2026-01-03 10:00:00', NULL),
(6, 'Rina Wati', 'rinawati.mom@gmail.com', 'Pertanyaan Mengenai Beasiswa PIP', 'Selamat siang, anak saya atas nama Dinda Kirana kelas X-2 apakah terdaftar sebagai penerima beasiswa PIP tahun ini? Syarat pencairannya apa saja ya?', '2026-01-02 13:20:00', 2),
(7, 'Doni Kusuma', 'donikusuma88@gmail.com', 'Mutasi Siswa Masuk', 'Saya berencana memindahkan anak saya dari SMAN 1 Ruteng ke SMAN 5 Kota Komba karena pindah tugas kerja. Apakah kuota kelas XI masih tersedia?', '2025-12-30 11:05:00', 2),
(8, 'OSIS SMAN 1 Borong', 'osis.sman1borong@gmail.com', 'Undangan Pertandingan Persahabatan Futsal', 'Halo rekan OSIS SMAN 5, kami ingin mengundang tim futsal kalian untuk sparing partner hari Sabtu depan di GOR Borong.', '2025-12-29 16:00:00', NULL),
(10, 'Indah Permata', 'indah.permata@outlook.com', 'Salah Input Data di Dapodik', 'Pak Admin, nama saya di kartu pelajar tertulis \"Indah Permata Sari\" padahal di Akta Kelahiran hanya \"Indah Permata\". Mohon diperbaiki di Dapodik.', '2025-12-25 10:15:00', 2),
(11, 'Perpustakaan Daerah', 'perpusda.manggarai@go.id', 'Undangan Lomba Literasi Sekolah', 'Dalam rangka bulan bahasa, kami mengundang siswa SMAN 5 untuk berpartisipasi dalam lomba menulis cerpen tingkat kabupaten.', '2025-12-24 09:00:00', 2),
(12, 'Kevin Sanjaya', 'kevin_gamers@gmail.com', 'Ekskul E-Sport', 'Kak, apakah di sekolah kita bakal ada ekskul E-Sport (Mobile Legends/PUBG)? Banyak teman-teman yang minat mau gabung.', '2025-12-22 20:10:00', NULL),
(13, 'Mama Aurel', 'mama.aurel@gmail.com', 'Izin Sakit Siswa', 'Selamat pagi Bapak/Ibu Guru Wali Kelas X-1. Saya orang tua dari Aurel Hermansyah menginfokan bahwa anak saya tidak bisa masuk sekolah hari ini karena demam.', '2025-12-20 06:45:00', 2),
(14, 'Alumni 98', 'ketua.alumni98@gmail.com', 'Koordinasi Reuni Akbar', 'Kami dari panitia reuni angkatan 98 ingin meminjam aula sekolah untuk rapat koordinasi hari Minggu besok. Apakah diizinkan?', '2025-12-18 15:30:00', 2),
(15, 'Spammer Iklan', 'jual.obat.herbal@gmail.com', 'Obat Herbal Murah Meriah', 'Promo spesial akhir tahun! Dapatkan diskon 50% untuk pembelian obat herbal segala penyakit. Kunjungi website kami sekarang.', '2025-12-15 02:00:00', NULL),
(18, 'Emanuel Naldianus Nggaur ', 'admin@gmail.com', 'Akademik', 'Berkas Persyaratan penerima peserta didik baru ', '2026-01-27 12:59:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama_lomba` varchar(255) DEFAULT NULL,
  `nama_juara` varchar(255) DEFAULT NULL,
  `peringkat` varchar(50) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `foto_penyerahan` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama_lomba`, `nama_juara`, `peringkat`, `tingkat`, `tahun`, `foto_penyerahan`, `id_user`) VALUES
(3, 'Kejuaraan Sepak Bola Tingkat Pelajar', 'Tim Sepak Bola SMAN 5', 'Juara 3', 'Kabupaten/Kota', '2023', 'prestasi_1769522441_6978c5092edc3.jpeg', 1),
(5, 'Lomba Baris Berbaris (LKBB) HUT RI', 'Paskibra Sekolah', 'Juara 3', 'Kabupaten/Kota', '2023', 'prestasi_1769522323_6978c493f1327.jpeg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT 'Sejarah Sekolah',
  `konten` longtext DEFAULT NULL,
  `gambar_gedung` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul`, `konten`, `gambar_gedung`, `id_user`, `updated_at`) VALUES
(3, 'Sejarah SMAN 5 Kota Komba', '<p>SMAN 5 Kota Komba adalah satuan pendidikan jenjang Sekolah Menengah Atas (SMA) berstatus Negeri yang berlokasi di Ketang, Desa Golo Tolang, Kecamatan Kota Komba (saat ini termasuk wilayah Kota Komba Utara), Kabupaten Manggarai Timur, Nusa Tenggara Timur.</p><p>Sekolah ini resmi berdiri dan beroperasi berdasarkan Surat Keputusan (SK) Pendirian Nomor <strong>HK/54.b/2012</strong> yang diterbitkan pada tanggal <strong>5 Juni 2012</strong>, bersamaan dengan terbitnya SK Izin Operasional. Sejak didirikan pada tahun 2012, SMAN 5 Kota Komba terus berkembang untuk memenuhi kebutuhan pendidikan masyarakat setempat.</p><p>Saat ini, sekolah dipimpin oleh Kepala Sekolah <strong>Marselinus Junardi</strong>. Dalam perkembangannya, sekolah ini juga telah mulai mengadopsi teknologi dalam manajemen sekolah, termasuk penerapan sistem semi-online dalam proses Penerimaan Peserta Didik Baru (PPDB) untuk mempermudah akses bagi calon siswa.</p>', 'sejarah_1769523983.jpeg', 2, '2026-01-27 14:26:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `en_user` varchar(75) DEFAULT NULL,
  `token` char(6) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'default.svg',
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `token`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'developer', 'default.svg', 'developer@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2025-08-27 09:31:55', '2025-08-27 09:31:55'),
(2, 2, 1, NULL, NULL, 'admin', 'default.svg', 'admin@gmail.com', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', '2025-08-27 09:31:55', '2025-08-27 09:31:55'),
(3, 8, 2, NULL, NULL, 'Marselinus Junardi', 'default.svg', 'marselinus.j@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(4, 8, 2, NULL, NULL, 'Yolentania Dhiu Bramanuja', 'default.svg', 'yolentania.db@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(5, 8, 2, NULL, NULL, 'Fransiskus Meze Mala', 'default.svg', 'fransiskus.mm@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(6, 8, 2, NULL, NULL, 'Ferederikus Harianto', 'default.svg', 'ferederikus.h@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(7, 8, 2, NULL, NULL, 'Paulus Kendung', 'default.svg', 'paulus.k@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(8, 8, 2, NULL, NULL, 'Garsianus Nana', 'default.svg', 'garsianus.n@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(9, 8, 2, NULL, NULL, 'Hironimus Cance', 'default.svg', 'hironimus.c@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(10, 8, 2, NULL, NULL, 'Yuliana Felda Jena', 'default.svg', 'yuliana.fj@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(11, 8, 2, NULL, NULL, 'Petrus Lijung', 'default.svg', 'petrus.l@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(12, 8, 2, NULL, NULL, 'Karolina Nari', 'default.svg', 'karolina.n@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(13, 8, 2, NULL, NULL, 'Hendrikus Pon', 'default.svg', 'hendrikus.p@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(14, 8, 2, NULL, NULL, 'Maria Florentina Longa', 'default.svg', 'maria.fl@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(15, 8, 2, NULL, NULL, 'Mohamad Ezi Muzlim', 'default.svg', 'mohamad.em@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(16, 8, 2, NULL, NULL, 'Adriana Saiman', 'default.svg', 'adriana.s@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(17, 8, 2, NULL, NULL, 'Yeltija Siska Jenem', 'default.svg', 'yeltija.sj@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(18, 8, 2, NULL, NULL, 'Aloysius Ceme', 'default.svg', 'aloysius.c@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(19, 8, 2, NULL, NULL, 'Gregoruis Jematu', 'default.svg', 'gregoruis.j@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(20, 8, 2, NULL, NULL, 'Heginius Dasriman Sarinto', 'default.svg', 'heginius.ds@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55'),
(21, 8, 2, NULL, NULL, 'Primus Jgo Wewo', 'default.svg', 'primus.jw@sman5komba.sch.id', 'password123', '2025-08-27 09:59:55', '2025-08-27 09:59:55');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.id_role = (
        SELECT id_role
        FROM `user_role`
        ORDER BY id_role DESC
        LIMIT 1
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(5, 2, 1),
(6, 2, 5),
(7, 2, 6),
(8, 2, 7),
(9, 2, 8),
(10, 2, 9),
(11, 2, 10),
(12, 2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id_access_sub_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_sub_menu`
--

INSERT INTO `user_access_sub_menu` (`id_access_sub_menu`, `id_role`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(12, 2, 1),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 2, 19),
(18, 2, 20),
(19, 2, 21),
(20, 2, 22),
(21, 2, 23),
(22, 2, 24),
(23, 2, 25),
(24, 2, 26),
(25, 2, 27),
(26, 2, 28),
(27, 2, 16),
(28, 2, 17),
(29, 2, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `icon`, `menu`) VALUES
(1, 'bi bi-people', 'User Management'),
(5, 'bi bi-buildings', 'Profil Sekolah'),
(6, 'bi bi-mortarboard', 'Akademik'),
(7, 'bi bi-person-vcard', 'Kesiswaan'),
(8, 'bi bi-images', 'Galeri'),
(9, 'bi bi-newspaper', 'Berita'),
(10, 'bi bi-chat-left-text', 'Kontak'),
(11, 'bi bi-list-check', 'Informasi PPDB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(8, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_status`
--

CREATE TABLE `user_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_status`
--

INSERT INTO `user_status` (`id_status`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `id_active`, `title`, `url`) VALUES
(1, 1, 1, 'Users', 'user-management/users'),
(2, 1, 1, 'Role', 'user-management/role'),
(12, 5, 1, 'Sejarah', 'profil-sekolah/sejarah'),
(13, 5, 1, 'Visi &amp; Misi', 'profil-sekolah/visi-&amp;-misi'),
(14, 5, 1, 'Struktur Organisasi', 'profil-sekolah/struktur-organisasi'),
(15, 5, 1, 'Fasilitas', 'profil-sekolah/fasilitas'),
(16, 6, 1, 'Kurikulum', 'akademik/kurikulum'),
(17, 6, 1, 'Jurusan', 'akademik/jurusan'),
(18, 6, 1, 'Kalender Akademik', 'akademik/kalender-akademik'),
(19, 7, 1, 'Ekstrakurikuler', 'kesiswaan/ekstrakurikuler'),
(20, 7, 1, 'OSIS atau MPK', 'kesiswaan/osis-atau-mpk'),
(21, 7, 1, 'Prestasi', 'kesiswaan/prestasi'),
(22, 8, 1, 'Kegiatan Sekolah', 'galeri/kegiatan-sekolah'),
(23, 9, 1, 'Rubrik', 'berita/rubrik'),
(24, 9, 1, 'List Berita', 'berita/list-berita'),
(25, 10, 1, 'Pesan Masuk', 'kontak/pesan-masuk'),
(26, 11, 1, 'Info PPDB', 'informasi-ppdb/info-ppdb'),
(27, 11, 1, 'Alur Pendaftaran', 'informasi-ppdb/alur-pendaftaran'),
(28, 11, 1, 'Download Brosur', 'informasi-ppdb/download-brosur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `name_web` varchar(75) DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `utilities`
--

INSERT INTO `utilities` (`id`, `logo`, `name_web`, `keyword`, `description`, `author`) VALUES
(1, '91861121.jpg', 'SMAN 5 Kota Komba', '', '', 'Imanuel Nggau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` longtext DEFAULT NULL,
  `tujuan_sekolah` longtext DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `tujuan_sekolah`, `id_user`, `updated_at`) VALUES
(3, '<p>Terwujudnya peserta didik yang beriman, berkarakter, cerdas, terampil, dan berwawasan lingkungan dalam semangat kekeluargaan.</p>', '<p>Untuk mencapai visi tersebut, SMAN 5 Kota Komba menetapkan misi sebagai berikut:</p><ol><li>Menumbuhkan penghayatan dan pengamalan terhadap ajaran agama yang dianut serta etika moral dalam kehidupan sehari-hari.</li><li>Melaksanakan pembelajaran dan bimbingan secara efektif, kreatif, dan inovatif untuk mengoptimalkan potensi akademik peserta didik.</li><li>Mengembangkan bakat dan minat siswa melalui kegiatan ekstrakurikuler dan pengembangan diri yang terprogram.</li><li>Menerapkan budaya disiplin, jujur, dan bertanggung jawab bagi seluruh warga sekolah.</li><li>Mewujudkan lingkungan sekolah yang bersih, sehat, asri, dan nyaman untuk mendukung suasana belajar yang kondusif.</li><li>Membangun kemitraan yang harmonis dengan orang tua, masyarakat, dan instansi terkait dalam meningkatkan mutu pendidikan.</li></ol>', '<p>Mengacu pada visi dan misi di atas, tujuan yang ingin dicapai adalah menghasilkan lulusan yang memiliki kecerdasan intelektual, emosional, dan spiritual yang seimbang, serta mampu bersaing di jenjang pendidikan yang lebih tinggi atau di dunia kerja.</p>', 2, '2026-01-23 09:38:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `brosur_ppdb`
--
ALTER TABLE `brosur_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_album` (`id_album`);

--
-- Indeks untuk tabel `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `info_ppdb`
--
ALTER TABLE `info_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `osis`
--
ALTER TABLE `osis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id_access_sub_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_sub_menu` (`id_sub_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `brosur_ppdb`
--
ALTER TABLE `brosur_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `guru_staff`
--
ALTER TABLE `guru_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `info_ppdb`
--
ALTER TABLE `info_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `osis`
--
ALTER TABLE `osis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id_access_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_berita` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD CONSTRAINT `ekstrakurikuler_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD CONSTRAINT `guru_staff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  ADD CONSTRAINT `info_kurikulum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD CONSTRAINT `kalender_akademik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD CONSTRAINT `kategori_berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `osis`
--
ALTER TABLE `osis`
  ADD CONSTRAINT `osis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD CONSTRAINT `pesan_kontak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD CONSTRAINT `sejarah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD CONSTRAINT `user_access_sub_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_access_sub_menu_ibfk_2` FOREIGN KEY (`id_sub_menu`) REFERENCES `user_sub_menu` (`id_sub_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sub_menu_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD CONSTRAINT `visi_misi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
