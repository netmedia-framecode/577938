-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2026 at 10:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sman_5_kota_komba`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
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
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `nama_album`, `keterangan`, `cover_album`, `id_user`, `created_at`) VALUES
(2, 'Class Meeting Semester Ganjil 2025', 'Kegiatan perlombaan olahraga dan seni antar kelas yang diselenggarakan setelah Penilaian Akhir Semester (PAS). Meliputi lomba Futsal, Voli, dan E-Sport Mobile Legends.', 'class_meeting.jpg', 1, '2025-12-15 09:00:00'),
(3, 'Peringatan Hari Guru Nasional 2025', 'Upacara bendera spesial di mana petugas upacara adalah para dewan guru, dilanjutkan dengan pemotongan tumpeng dan pemberian bunga oleh siswa sebagai tanda terima kasih.', 'hari_guru.jpg', 1, '2025-11-25 08:00:00'),
(4, 'Bulan Bahasa & Sumpah Pemuda', 'Dokumentasi kegiatan lomba baca puisi, pidato bahasa Inggris, dan fashion show pakaian adat dalam rangka memperingati Hari Sumpah Pemuda ke-97.', 'sumpah_pemuda.jpg', 1, '2025-10-28 10:30:00'),
(5, 'Perayaan HUT RI ke-80', 'Upacara pengibaran bendera merah putih oleh Paskibra SMAN 5 Kota Komba dan dimeriahkan dengan berbagai lomba tradisional seperti tarik tambang dan balap karung.', 'hut_ri_80.jpg', 1, '2025-08-17 07:30:00'),
(6, 'Masa Pengenalan Lingkungan Sekolah (MPLS)', 'Penyambutan peserta didik baru tahun ajaran 2025/2026. Kegiatan diisi dengan materi wawasan wiyata mandala, tata krama, dan pengenalan ekstrakurikuler.', 'mpls_2025.jpg', 1, '2025-07-15 08:00:00'),
(7, 'Pelepasan Siswa Kelas XII Angkatan 2024', 'Acara perpisahan dan wisuda siswa kelas XII. Diwarnai dengan pentas seni tari daerah dan paduan suara.', 'wisuda_2025.jpg', 1, '2025-05-20 09:00:00'),
(8, 'Buka Puasa Bersama & Santunan Anak Yatim', 'Kegiatan kerohanian di bulan Ramadhan 1446 H, mempererat tali silaturahmi antar warga sekolah dan berbagi dengan sesama.', 'bukber.jpg', 1, '2025-03-15 17:00:00'),
(9, 'Gotong Royong Kebersihan Lingkungan', 'Kegiatan Jumat Bersih yang melibatkan seluruh siswa dan guru untuk membersihkan area taman sekolah dan drainase menjelang musim hujan.', 'jumat_bersih.jpg', 1, '2025-02-07 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `alur_ppdb`
--

CREATE TABLE `alur_ppdb` (
  `id` int(11) NOT NULL,
  `judul_langkah` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `gambar_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alur_ppdb`
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
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `bg` varchar(35) DEFAULT NULL,
  `model` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `image`, `bg`, `model`) VALUES
(1, 'auth.png', '#4e73de', 2);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
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
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi_berita`, `gambar_utama`, `tanggal_posting`, `id_kategori`, `id_user`, `dibaca`) VALUES
(8, 'Siswa SMAN 5 Kota Komba Raih Medali Emas Olimpiade Sains Tingkat Provinsi', 'siswa-sman-5-kota-komba-raih-medali-emas-olimpiade-sains-tingkat-provinsi', '<p><strong>KOTA KOMBA</strong> - Kabar membanggakan kembali datang dari siswa SMAN 5 Kota Komba. Ananda <strong>Budi Santoso</strong> (Kelas XI IPA 1) berhasil menyabet medali emas dalam ajang Olimpiade Sains Nasional (OSN) tingkat provinsi yang diselenggarakan minggu lalu.</p><p>Kepala Sekolah menyampaikan apresiasi setinggi-tingginya atas pencapaian ini. \"Ini adalah bukti kerja keras siswa dan bimbingan guru yang luar biasa,\" ujarnya saat upacara bendera hari Senin.</p>', 'berita_1767619507_695bbbb31e49b.png', '2025-12-20 08:00:00', 4, 2, 159),
(9, 'Jadwal Pelaksanaan Penilaian Akhir Semester (PAS) Ganjil Tahun Ajaran 2025/2026', 'jadwal-pelaksanaan-penilaian-akhir-semester-pas-ganjil-tahun-ajaran-2025-2026', '<p>Diberitahukan kepada seluruh siswa-siswi SMAN 5 Kota Komba, bahwa Penilaian Akhir Semester (PAS) Ganjil akan dilaksanakan mulai tanggal <strong>2 Desember 2025</strong> hingga <strong>13 Desember 2025</strong>.</p><p>Harap mempersiapkan diri dengan belajar giat dan menjaga kesehatan. Jadwal mata pelajaran dapat diunduh melalui link berikut atau dilihat di papan pengumuman sekolah.</p><ul><li>Senin: Matematika &amp; Bahasa Indonesia</li><li>Selasa: Fisika/Geografi &amp; Bahasa Inggris</li><li>Rabu: Kimia/Sosiologi &amp; PKn</li></ul>', 'berita_1767619492_695bbba4e6749.png', '2025-11-25 09:30:00', 3, 2, 345),
(10, 'Kemeriahan Peringatan HUT RI ke-80 di SMAN 5 Kota Komba', 'kemeriahan-peringatan-hut-ri-ke-80-di-sman-5-kota-komba', '<p>Perayaan Hari Kemerdekaan Republik Indonesia ke-80 di SMAN 5 Kota Komba berlangsung sangat meriah. Kegiatan diawali dengan upacara bendera khidmat yang dipimpin langsung oleh Bapak Kepala Sekolah.</p><p>Setelah upacara, acara dilanjutkan dengan berbagai perlombaan tradisional antar kelas, seperti:</p><ol><li>Tarik Tambang</li><li>Balap Karung Helm</li><li>Lomba Makan Kerupuk</li><li>Panjat Pinang Mini</li></ol><p>Seluruh siswa antusias mengikuti kegiatan ini hingga sore hari.</p>', 'berita_1767619483_695bbb9bb6d11.png', '2025-08-17 14:15:00', 5, 2, 512),
(11, 'Pentingnya Literasi Digital di Era Modern', 'pentingnya-literasi-digital-di-era-modern', '<p>Di era digital saat ini, kemampuan literasi tidak hanya sebatas membaca buku fisik, tetapi juga kemampuan menyaring informasi di internet. Hoaks dan berita palsu menyebar dengan cepat.</p><p>Oleh karena itu, perpustakaan SMAN 5 Kota Komba kini meluncurkan program <strong>\"Pojok Baca Digital\"</strong>. Siswa dapat mengakses ribuan e-book secara gratis melalui tablet yang disediakan di perpustakaan.</p>', 'berita_1767619472_695bbb9077580.png', '2025-10-28 10:00:00', 7, 2, 89),
(12, 'Kunjungan Studi Banding dari SMA Negeri 1 Ruteng', 'kunjungan-studi-banding-dari-sma-negeri-1-ruteng', '<p>SMAN 5 Kota Komba menerima kunjungan istimewa dari rombongan guru dan OSIS SMA Negeri 1 Ruteng dalam rangka studi banding manajemen organisasi kesiswaan.</p><p>Kegiatan ini bertujuan untuk bertukar pikiran mengenai program kerja OSIS dan pengelolaan ekstrakurikuler yang efektif. Diharapkan kerjasama antar kedua sekolah dapat terus terjalin dengan baik di masa depan.</p>', 'berita_1768363323_6967153b69277.png', '2025-09-15 11:45:00', 2, 2, 211);

-- --------------------------------------------------------

--
-- Table structure for table `brosur_ppdb`
--

CREATE TABLE `brosur_ppdb` (
  `id` int(11) NOT NULL,
  `judul_file` varchar(200) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `ukuran_file` varchar(50) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brosur_ppdb`
--

INSERT INTO `brosur_ppdb` (`id`, `judul_file`, `nama_file`, `ukuran_file`, `tanggal_upload`) VALUES
(2, 'Brosur Resmi PPDB SMAN 5 Kota Komba 2026', 'brosur_resmi_2026.pdf', '2.5 MB', '2026-01-02 08:30:00'),
(3, 'Panduan Tata Cara Pendaftaran Online', 'panduan_aplikasi_ppdb.pdf', '1.2 MB', '2026-01-02 09:15:00'),
(4, 'Format Surat Pernyataan Bebas Narkoba', 'surat_pernyataan_narkoba.pdf', '450 KB', '2026-01-03 10:00:00'),
(5, 'Infografis Fasilitas & Ekstrakurikuler Sekolah', 'info_fasilitas.jpg', '3.8 MB', '2026-01-04 14:20:00'),
(6, 'Denah Lokasi Ujian Seleksi', 'denah_lokasi.png', '800 KB', '2026-01-05 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler`
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
-- Dumping data for table `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekskul`, `nama_pembina`, `jadwal_latihan`, `deskripsi_kegiatan`, `foto_kegiatan`, `id_user`) VALUES
(2, 'Pramuka (Praja Muda Karana)', 'Kak Budi Santoso, S.Pd.', 'Jumat, 15:00 - 17:00 WITA', '<p><strong>Pramuka</strong> adalah ekstrakurikuler wajib bagi siswa kelas X yang bertujuan membentuk karakter disiplin, mandiri, dan cinta tanah air.</p><p><strong>Kegiatan Rutin:</strong></p><ul><li>Latihan Baris Berbaris (LKBB)</li><li>Pionering (Tali Temali)</li><li>Sandi & Morse</li><li>Perkemahan Sabtu Minggu (Persami)</li></ul><p>Pramuka SMAN 5 Kota Komba aktif mengikuti Jambore Ranting dan Cabang setiap tahunnya.</p>', 'pramuka.jpg', 1),
(3, 'Paskibra (Pasukan Pengibar Bendera)', 'Ibu Siti Aminah, S.Pd.', 'Senin & Rabu, 16:00 - 17:30 WITA', '<p>Ekskul <strong>Paskibra</strong> melatih kedisiplinan fisik dan mental siswa melalui latihan baris-berbaris.</p><p>Anggota Paskibra bertugas sebagai petugas upacara bendera setiap hari Senin dan pada peringatan hari besar nasional (17 Agustus). Selain itu, ekskul ini juga melatih kepemimpinan dan kerja sama tim yang solid.</p>', 'paskibra.jpg', 1),
(4, 'Futsal & Sepak Bola', 'Pak Hendra Gunawan, S.Or.', 'Selasa & Kamis, 15:30 - 17:30 WITA', '<p>Wadah bagi siswa yang memiliki minat dan bakat di bidang olahraga sepak bola dan futsal.</p><p><strong>Program Latihan:</strong></p><ul><li>Latihan Fisik & Stamina</li><li>Teknik Dasar (Passing, Dribbling, Shooting)</li><li>Taktik Permainan</li><li>Sparring Partner dengan sekolah lain</li></ul><p>Tim Futsal SMAN 5 Kota Komba sering menjuarai turnamen antar pelajar tingkat kabupaten.</p>', 'futsal.jpg', 1),
(5, 'PMR (Palang Merah Remaja)', 'Ibu Rina Marlina, S.Si.', 'Rabu, 15:00 - 16:30 WITA', '<p><strong>PMR Wira</strong> SMAN 5 Kota Komba berfokus pada pelatihan pertolongan pertama dan kepedulian sosial.</p><p>Anggota PMR dilatih untuk:</p><ul><li>Melakukan Pertolongan Pertama Pada Kecelakaan (P3K).</li><li>Siaga bencana dan evakuasi.</li><li>Menjadi petugas kesehatan saat upacara bendera.</li><li>Mengadakan kegiatan donor darah sukarela.</li></ul>', 'pmr.jpg', 1),
(6, 'Seni Tari & Musik Tradisional', 'Ibu Maria Goreti, S.Sn.', 'Sabtu, 14:00 - 16:00 WITA', '<p>Ekskul ini bertujuan melestarikan budaya lokal melalui seni tari dan musik daerah NTT.</p><p>Siswa diajarkan berbagai tarian adat seperti Tari Caci, Rangkuk Alu, dan Tari Hegong, serta memainkan alat musik tradisional. Grup tari sekolah sering diundang untuk mengisi acara penyambutan tamu dinas dan festival budaya daerah.</p>', 'tari.jpg', 1),
(7, 'English Club (ECC)', 'Mr. John Doe, S.Pd.', 'Kamis, 15:00 - 16:30 WITA', '<p><strong>English Conversation Club</strong> adalah tempat bagi siswa untuk melatih kemampuan berbahasa Inggris secara aktif dan menyenangkan.</p><p><strong>Aktivitas:</strong></p><ul><li>Story Telling</li><li>Speech & Debate</li><li>Scrabble Game</li><li>English Drama</li></ul><p>Ekskul ini mempersiapkan siswa untuk mengikuti kompetisi debat Bahasa Inggris tingkat provinsi.</p>', 'english_club.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
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
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_fasilitas`, `deskripsi`, `gambar_fasilitas`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'Laboratorium Komputer', '<p>SMAN 5 Kota Komba memiliki <strong>Laboratorium Komputer</strong> yang modern dan terintegrasi dengan jaringan internet berkecepatan tinggi (Fiber Optic).</p><p>Fasilitas ini digunakan untuk:</p><ul><li>Kegiatan Belajar Mengajar (KBM) mata pelajaran Informatika.</li><li>Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK).</li><li>Ujian Sekolah berbasis digital.</li></ul><p>Ruangan dilengkapi dengan AC untuk kenyamanan siswa serta spesifikasi PC yang mumpuni untuk desain grafis dasar dan pemrograman.</p>', 'lab_komputer.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51'),
(3, 'Perpustakaan \"Jendela Dunia\"', '<p>Perpustakaan sekolah menyediakan ribuan koleksi buku, mulai dari buku pelajaran, ensiklopedia, novel sastra, hingga majalah pendidikan.</p><p><strong>Fasilitas Unggulan:</strong></p><ul><li>Area baca yang hening dan nyaman (lesehan dan meja).</li><li>Koneksi Wi-Fi khusus untuk referensi digital.</li><li>Layanan peminjaman buku berbasis sistem informasi digital.</li></ul><p>Perpustakaan ini menjadi pusat literasi siswa untuk mengembangkan wawasan di luar jam pelajaran.</p>', 'perpustakaan.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51'),
(4, 'Lapangan Olahraga & Upacara', '<p>Lapangan serbaguna yang luas berfungsi sebagai pusat kegiatan fisik dan kedisiplinan siswa.</p><p>Lapangan ini memfasilitasi berbagai cabang olahraga seperti:</p><ul><li>Futsal</li><li>Bola Voli</li><li>Bola Basket</li><li>Senam Kesegaran Jasmani (SKJ)</li></ul><p>Selain olahraga, lapangan ini digunakan untuk kegiatan rutin Upacara Bendera setiap hari Senin dan peringatan hari besar nasional.</p>', 'lapangan.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51'),
(5, 'Laboratorium IPA Terpadu', '<p>Untuk menunjang praktikum mata pelajaran Fisika, Kimia, dan Biologi, sekolah menyediakan Laboratorium IPA yang lengkap.</p><p>Dilengkapi dengan alat peraga anatomi, mikroskop cahaya, bahan-bahan kimia dasar untuk percobaan, serta alat ukur fisika presisi. Laboratorium ini didesain dengan standar keselamatan kerja (K3) yang tinggi, termasuk tersedianya APAR dan wastafel pencuci mata darurat.</p>', 'lab_ipa.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51'),
(6, 'Musholla Al-Ikhlas', '<p>Sebagai sarana pembinaan spiritual, Musholla sekolah tersedia untuk kegiatan ibadah sehari-hari warga sekolah yang beragama Islam.</p><p>Fasilitas meliputi tempat wudhu yang bersih, mukena/sarung inventaris, dan area sholat yang terpisah antara putra dan putri. Musholla ini juga menjadi pusat kegiatan Rohani Islam (Rohis) dan kegiatan keagamaan lainnya.</p>', 'musholla.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51'),
(7, 'Kantin Sehat', '<p>Kantin sekolah menyediakan berbagai menu makanan dan minuman yang higienis dan terjangkau bagi siswa. Sekolah menerapkan konsep <strong>Kantin Sehat</strong> dengan mengurangi penggunaan plastik sekali pakai dan memastikan makanan bebas dari bahan pengawet berbahaya.</p>', 'kantin.jpg', 1, '2025-12-31 03:36:51', '2025-12-31 03:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `id_album` int(11) DEFAULT NULL,
  `file_foto` varchar(100) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `id_album`, `file_foto`, `caption`) VALUES
(1, 9, 'foto_9_1767223582_6955b11e689f4.png', 'tes'),
(3, 9, 'foto_9_1767223598_6955b12eb1eb2.png', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `guru_staff`
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
-- Dumping data for table `guru_staff`
--

INSERT INTO `guru_staff` (`id`, `nama`, `nip`, `jabatan_atau_mapel`, `foto`, `jenis_kelamin`, `urutan`, `id_user`) VALUES
(1, 'Drs. H. Ahmad Dahlan, M.Pd', '196501011990031001', 'Kepala Sekolah', 'kepsek.jpg', 'L', 1, 1),
(4, 'Rina Marlina, S.Si', '198004042005032003', 'Wakil Kepala Sekolah', 'wakil_sarpras.jpg', 'P', 2, 1),
(6, 'Andi Saputra, S.E.', '198301012010011001', 'Kepala Tata Usaha (KTU)', 'staff_ktu.jpg', 'L', 3, 1),
(7, 'Dewi Sartika, A.Md.', '199002022015022002', 'Staff Administrasi Umum', 'staff_admin.jpg', 'P', 3, 1),
(8, 'Rudi Hartono', '-', 'Staff Keamanan & Ketertiban', 'staff_security.jpg', 'L', 3, 1),
(9, 'Dedi Supriadi, S.Pd', '198506062010031005', 'Guru Mata Pelajaran Matematika', 'guru_mtk.jpg', 'L', 4, 1),
(10, 'Sri Wahyuni, S.Pd', '198807072012032006', 'Guru Mata Pelajaran Bahasa Indonesia', 'guru_indo.jpg', 'P', 4, 1),
(11, 'Eko Prasetyo, S.Kom', '199008082015031007', 'Guru Mata Pelajaran Informatika', 'guru_tik.jpg', 'L', 4, 1),
(12, 'Maria Goreti, S.Ag', '199209092017032008', 'Guru Mata Pelajaran Agama Katolik', 'guru_agama.jpg', 'P', 4, 1),
(13, 'Hendra Gunawan, S.Pd', '199510102019031009', 'Guru Mata Pelajaran PJOK', 'guru_pjok.jpg', 'L', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `info_kurikulum`
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
-- Dumping data for table `info_kurikulum`
--

INSERT INTO `info_kurikulum` (`id`, `judul`, `deskripsi_umum`, `tahun_ajaran`, `id_user`, `updated_at`) VALUES
(2, 'Implementasi Kurikulum Merdeka (IKM)', '<p>SMAN 5 Kota Komba saat ini menerapkan <strong>Kurikulum Merdeka</strong> dengan opsi Mandiri Berubah. Kurikulum ini berfokus pada materi esensial dan pengembangan karakter Profil Pelajar Pancasila.</p><p>Struktur kurikulum dibagi menjadi dua kegiatan utama:</p><ul><li><strong>Pembelajaran Intrakurikuler:</strong> Kegiatan tatap muka reguler dengan materi yang lebih ringkas dan mendalam.</li><li><strong>Projek Penguatan Profil Pelajar Pancasila (P5):</strong> Kegiatan kokurikuler berbasis projek yang dialokasikan sekitar 30% dari total jam pelajaran per tahun.</li></ul><p>Untuk Fase Pembelajaran:</p><ul><li><strong>Fase E:</strong> Kelas X (Mata pelajaran umum, belum ada penjurusan).</li><li><strong>Fase F:</strong> Kelas XI dan XII (Pemilihan mata pelajaran minat sesuai aspirasi karir siswa).</li></ul>', '2024/2025', 1, '2025-12-31 03:35:44'),
(3, 'Kurikulum 2013 (Revisi)', '<p>Untuk tingkat akhir (Kelas XII), pembelajaran masih mengacu pada <strong>Kurikulum 2013 (K-13) Edisi Revisi</strong> hingga masa transisi selesai sepenuhnya.</p><p>Karakteristik utama pembelajaran meliputi:</p><ul><li>Pendekatan <strong>Saintifik</strong> (Mengamati, Menanya, Mengumpulkan Informasi, Menalar, dan Mengomunikasikan).</li><li>Penilaian Autentik yang mencakup tiga ranah: <strong>Sikap (Afektif), Pengetahuan (Kognitif), dan Keterampilan (Psikomotorik)</strong>.</li><li>Penjurusan (IPA/IPS) yang sudah ditetapkan sejak awal masuk sekolah.</li></ul>', '2024/2025', 1, '2025-12-31 03:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `info_ppdb`
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
-- Dumping data for table `info_ppdb`
--

INSERT INTO `info_ppdb` (`id`, `judul`, `deskripsi`, `tanggal_buka`, `tanggal_tutup`, `status`, `gambar_banner`, `is_active`, `created_at`) VALUES
(3, 'Penerimaan Peserta Didik Baru Jalur Prestasi T.A. 2026/2027', '<p><strong>Selamat Datang Calon Peserta Didik Baru!</strong></p><p>SMAN 5 Kota Komba kembali membuka pendaftaran untuk tahun ajaran 2026/2027 khusus Jalur Prestasi. Jalur ini diperuntukkan bagi siswa yang memiliki prestasi akademik maupun non-akademik.</p><p><strong>Persyaratan Umum:</strong></p><ul><li>Lulusan SMP/MTs sederajat tahun 2026.</li><li>Memiliki nilai rata-rata rapor semester 1-5 minimal 80.</li><li>Melampirkan sertifikat kejuaraan (jika ada).</li><li>Pas foto terbaru ukuran 3x4 (latar merah).</li></ul><p>Silakan klik tombol daftar dan ikuti alur yang tersedia. Kuota terbatas!</p>', '2026-06-15', '2026-06-25', 'Buka', 'banner_ppdb_2026.jpg', 1, '2026-01-06 09:00:34'),
(4, 'Informasi PPDB Jalur Zonasi & Afirmasi (Gelombang 2)', '<p>Pendaftaran Jalur Zonasi akan dibuka segera setelah Jalur Prestasi selesai.</p><p><strong>Ketentuan Zonasi:</strong></p><ul><li>Jarak tempat tinggal ke sekolah maksimal 3 KM.</li><li>Wajib melampirkan Kartu Keluarga (KK) asli yang diterbitkan paling singkat 1 tahun sebelum tanggal pendaftaran.</li></ul><p>Pantau terus halaman ini untuk informasi tanggal pembukaan.</p>', '2026-07-01', '2026-07-05', 'Tutup', 'banner_zonasi.jpg', 0, '2026-01-06 09:00:34'),
(5, 'Arsip PPDB Tahun Ajaran 2025/2026 (Tahun Lalu)', '<p>Ini adalah arsip informasi pendaftaran tahun lalu. Seluruh rangkaian kegiatan PPDB 2025 telah selesai dan siswa baru telah memulai kegiatan belajar mengajar.</p>', '2025-06-10', '2025-06-20', 'Tutup', 'banner_2025.jpg', 0, '2026-01-06 09:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `ikon_atau_gambar` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `deskripsi`, `ikon_atau_gambar`, `id_user`) VALUES
(2, 'MIPA (Matematika dan Ilmu Pengetahuan Alam)', '<p>Jurusan <strong>MIPA</strong> diperuntukkan bagi siswa yang memiliki minat kuat dan kemampuan analisis dalam bidang sains dan matematika.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Matematika Peminatan</li><li>Fisika</li><li>Kimia</li><li>Biologi</li></ul><p>Lulusan jurusan ini dipersiapkan untuk melanjutkan pendidikan ke jenjang perkuliahan di bidang Kedokteran, Teknik, Farmasi, Sains Murni, dan Teknologi Informasi.</p>', 'icon_mipa.jpg', 1),
(3, 'IPS (Ilmu Pengetahuan Sosial)', '<p>Jurusan <strong>IPS</strong> mempelajari fenomena sosial dan kemasyarakatan. Jurusan ini melatih siswa untuk berpikir kritis terhadap isu-isu sosial, ekonomi, dan sejarah.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Sosiologi</li><li>Geografi</li><li>Ekonomi</li><li>Sejarah Peminatan</li></ul><p>Sangat cocok bagi siswa yang ingin melanjutkan studi di bidang Hukum, Ekonomi & Bisnis, Ilmu Politik, Hubungan Internasional, Psikologi, dan Komunikasi.</p>', 'icon_ips.jpg', 1),
(4, 'IBB (Ilmu Bahasa dan Budaya)', '<p>Jurusan <strong>Bahasa</strong> fokus pada pendalaman kemampuan literasi, penguasaan bahasa asing, serta pemahaman budaya dan antropologi.</p><p><strong>Mata Pelajaran Peminatan:</strong></p><ul><li>Bahasa & Sastra Indonesia</li><li>Bahasa & Sastra Inggris</li><li>Bahasa Asing Pilihan (Jepang/Jerman/Mandarin)</li><li>Antropologi</li></ul><p>Lulusan jurusan ini memiliki peluang besar di bidang Sastra, Pariwisata, Hubungan Internasional, Jurnalistik, dan Seni.</p>', 'icon_bahasa.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademik`
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
-- Dumping data for table `kalender_akademik`
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
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_berita`
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
-- Table structure for table `osis`
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
-- Dumping data for table `osis`
--

INSERT INTO `osis` (`id`, `nama_siswa`, `jabatan`, `foto_siswa`, `periode`, `id_user`) VALUES
(1, 'Muhammad Rizky', 'Ketua OSIS', 'osis_ketua.jpg', '2024/2025', 1),
(2, 'Alya Putri Maharani', 'Wakil Ketua OSIS', 'osis_wakil.jpg', '2024/2025', 1),
(3, 'Citra Lestari', 'Sekretaris', 'osis_sekretaris.jpg', '2024/2025', 1),
(4, 'Dewi Anggraini', 'Bendahara', 'osis_bendahara.jpg', '2024/2025', 1),
(5, 'Budi Pratama', 'Koordinator Sekbid', 'osis_sekbid.jpg', '2024/2025', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_kontak`
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
-- Dumping data for table `pesan_kontak`
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
(16, 'Budiawan', 'arlan270899@gmail.com', 'Informasi PPDB', 'tes', '2026-01-06 11:09:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
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
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama_lomba`, `nama_juara`, `peringkat`, `tingkat`, `tahun`, `foto_penyerahan`, `id_user`) VALUES
(1, 'Olimpiade Sains Nasional (OSN) Matematika', 'Andi Pratama', 'Juara 2', 'Kabupaten/Kota', '2024', 'juara_osn.jpg', 1),
(2, 'Festival Lomba Seni Siswa Nasional (FLS2N) - Solo Vokal', 'Maria Goreti', 'Juara 1', 'Provinsi', '2024', 'juara_fls2n.jpg', 1),
(3, 'Kejuaraan Futsal Pelajar Cup', 'Tim Futsal SMAN 5', 'Juara 3', 'Kabupaten/Kota', '2023', 'juara_futsal.jpg', 1),
(4, 'Lomba Debat Bahasa Inggris (NSDC)', 'Tim Debat SMAN 5', 'Finalis', 'Provinsi', '2024', 'debat_inggris.jpg', 1),
(5, 'Lomba Baris Berbaris (LKBB) HUT RI', 'Paskibra Sekolah', 'Juara 1', 'Kabupaten/Kota', '2023', 'juara_lkbb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
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
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul`, `konten`, `gambar_gedung`, `id_user`, `updated_at`) VALUES
(3, 'Sejarah SMAN 5 Kota Komba', '<p><strong>Lorem ipsum</strong>, dolor sit amet consectetur adipisicing elit. Porro soluta tempore distinctio optio neque sint molestias asperiores sit, ex debitis, alias tenetur numquam odit vero mollitia repellendus! Dolores et animi at, explicabo autem molestias ipsum qui temporibus. Placeat sapiente et repellat commodi cum reiciendis illo perspiciatis veniam tempora facere recusandae numquam, deleniti ad architecto nulla omnis provident a, id voluptate illum quisquam eaque natus enim! Soluta, illum neque accusamus aliquam atque iste praesentium cupiditate quibusdam.&nbsp;</p><p><strong>Ducimus corrupti debitis</strong> facere nisi eos pariatur neque? Doloribus ea est nulla iste nobis cumque exercitationem, sunt atque architecto quas neque voluptatem necessitatibus nam et odit nesciunt repellat soluta! Sed aut illum veniam, asperiores quae, ex deserunt assumenda id fugiat provident facilis vel quos! Corporis eos pariatur dicta ipsa illum perferendis porro rem similique ad et deleniti commodi nostrum optio quam consectetur eligendi, voluptas nisi?&nbsp;</p><p>Doloribus quaerat, repellendus aut aspernatur quidem incidunt quo consectetur odio quisquam tenetur nulla corrupti enim perferendis dicta, fuga ea, magnam obcaecati iure beatae cum? Voluptates ipsum quos magnam exercitationem vel? Explicabo nihil magnam odit culpa sed ab repellat aliquam tenetur deserunt, qui magni impedit veritatis porro mollitia perferendis consequatur quo! Incidunt, magnam! Ad vel ea fugit repudiandae doloribus hic sapiente laborum repellat, officiis, quibusdam beatae alias et error, atque eius odit dolores ipsam? Deleniti sit quis eos nostrum. Libero repellat minus ut cum neque deserunt ab, eveniet id esse adipisci alias quibusdam harum voluptates distinctio fugiat rem cupiditate sapiente vel fugit?&nbsp;</p><p>Ex ut consequuntur perferendis ea, possimus eaque facilis quisquam obcaecati quos cumque vitae aliquid dolorem laudantium neque voluptas consequatur, necessitatibus minima in quo architecto. Sequi aliquam quasi aut eius eos. Officiis beatae, natus explicabo odio modi tenetur expedita eligendi ea, repellendus iusto repellat at fuga consequatur sed sapiente doloribus tempore quaerat, velit officia nesciunt? Distinctio quas fuga tempore animi cumque molestias itaque.&nbsp;</p><p>Unde ipsa reiciendis itaque ratione? Incidunt tempore quos ad quod. Culpa natus sed quas nobis saepe ratione reprehenderit similique nam error, quos pariatur, modi adipisci quod explicabo molestias dicta delectus recusandae repellat aperiam voluptatum! Earum, aliquam. Amet, sint incidunt sapiente minus veritatis tenetur expedita explicabo obcaecati ipsum asperiores illo? Sit velit aspernatur vel tempora. Explicabo deleniti quibusdam error est.&nbsp;</p><p>Non corrupti inventore nulla sequi odit, unde expedita atque dolorum, eaque suscipit, a tenetur voluptates at. Hic, earum alias! Doloribus praesentium, sequi explicabo debitis, voluptatem rem molestias error mollitia, cumque deleniti tempora? Placeat est eveniet ex porro exercitationem alias voluptatem rem delectus minima, eum in necessitatibus adipisci incidunt laudantium quaerat esse temporibus voluptates consequatur quisquam sequi.&nbsp;</p><p>Autem velit unde deleniti quo, harum expedita porro reiciendis provident doloremque rem distinctio odit a voluptatum, eligendi obcaecati amet! Voluptatum aspernatur aperiam atque quo neque minus veritatis quisquam ut, consequuntur, cupiditate, sequi numquam quasi velit deserunt! Nobis mollitia minima praesentium, laboriosam adipisci ad consequatur cumque dolores eligendi iste corporis, sit, enim atque eveniet sapiente provident reprehenderit corrupti.&nbsp;</p><p>Magni laudantium nulla alias eos eius quaerat porro pariatur minus non sequi, quis ipsa maiores, deleniti distinctio iure excepturi a itaque id. Placeat, <i>nemo perspiciatis</i>.</p>', NULL, 2, '2026-01-14 03:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
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
-- Triggers `users`
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
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
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
-- Table structure for table `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id_access_sub_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_sub_menu`
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
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
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
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(8, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id_status`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
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
-- Table structure for table `utilities`
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
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `logo`, `name_web`, `keyword`, `description`, `author`) VALUES
(1, 'logo.png', 'SMAN 5 Kota Komba', '', '', 'Imanuel Nggau');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
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
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `tujuan_sekolah`, `id_user`, `updated_at`) VALUES
(3, '<p><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. A similique aperiam autem dignissimos maiores vero, quos qui obcaecati? Perspiciatis itaque at veritatis hic voluptas, laboriosam natus, <i>nulla saepe culpa</i> sequi quibusdam repellat ratione provident dicta velit amet. Doloremque eius suscipit, odit rerum ad qui? Voluptatum quaerat facere autem saepe adipisci!</p>', '<p><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. Velit, provident maxime non ipsum ut in corporis officia maiores nihil nostrum qui vero sapiente commodi, praesentium tenetur voluptate. <i>Voluptatum</i> natus eligendi commodi quisquam debitis doloribus a, rem harum, aperiam nemo dolore!&nbsp;</p><ol><li>Quaerat recusandae vel quia saepe non dolore voluptate labore commodi, alias rerum dolor.&nbsp;</li><li>Molestias cum eveniet consequatur nobis officia!&nbsp;</li><li>Aspernatur exercitationem ratione commodi illo minima nisi at ipsam recusandae necessitatibus mollitia,&nbsp;</li><li>accusantium dolorum cum optio.</li></ol>', '<p><strong>Lorem ipsum dolor</strong> sit amet consectetur adipisicing elit. Veritatis ipsum dolorem optio dolorum numquam exercitationem deleniti vitae eum itaque recusandae at vel totam similique nemo beatae maxime modi eligendi porro provident, ea eveniet delectus incidunt repellendus obcaecati! Eaque maiores hic illum velit voluptate aliquam.&nbsp;</p><p>Quas beatae quae minima, magni debitis repellendus distinctio maiores neque fugiat quis voluptatum saepe omnis, iste odio quaerat, quos dolorum aliquid! At dolorem eligendi quae rem ratione eos itaque, sit labore quisquam quas corrupti ad dignissimos odit natus deleniti magni aperiam excepturi! Itaque voluptatum quaerat ipsum saepe? Maxime quae, vel quod recusandae voluptate nobis.&nbsp;</p><p>Aspernatur aperiam autem alias saepe dolorem porro, ex voluptatem molestiae quae quo fuga exercitationem architecto placeat officia eum blanditiis modi velit dignissimos. Neque illo dolorem cumque accusamus magnam a odio numquam quo laboriosam, repellendus laudantium! Maxime ea cupiditate quibusdam, harum repellendus quidem suscipit tempora neque at voluptate fuga quasi dolore cum impedit quo!&nbsp;</p><p><strong>Corrupti</strong>, esse repellendus maxime impedit earum magnam vero error non optio expedita, porro quo et accusamus unde quaerat dolore eum. Hic explicabo quidem, eaque quibusdam quaerat iste quis eius ad numquam consequuntur in necessitatibus porro dolorem veniam, soluta rerum doloribus quasi. Optio asperiores quasi sapiente nemo aliquid, ipsam voluptates atque quaerat dicta nesciunt quas quo, libero numquam suscipit placeat reprehenderit.&nbsp;</p><p>Ab est eveniet aspernatur ex distinctio nam saepe ducimus vitae, reprehenderit quos? Repudiandae placeat, ducimus in aliquid, distinctio cum deleniti labore dolor itaque sapiente voluptatum quaerat asperiores delectus soluta a, accusamus rerum culpa adipisci. Placeat error architecto inventore quisquam consequatur porro eligendi minus amet facilis dolorum.&nbsp;</p><p><strong>Repellendus facilis optio</strong>, ab incidunt facere magni culpa fugit aperiam nisi, impedit, voluptatem distinctio quis consequatur non itaque veritatis? Minus iusto voluptate tenetur saepe officiis, natus esse iure, cupiditate, a magni dicta? Asperiores distinctio laudantium est temporibus architecto? Voluptas dignissimos iure <i>similique unde</i>.</p>', 2, '2025-12-29 11:28:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `brosur_ppdb`
--
ALTER TABLE `brosur_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `info_ppdb`
--
ALTER TABLE `info_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `osis`
--
ALTER TABLE `osis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_active` (`id_active`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD PRIMARY KEY (`id_access_sub_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_sub_menu` (`id_sub_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_active` (`id_active`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `alur_ppdb`
--
ALTER TABLE `alur_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brosur_ppdb`
--
ALTER TABLE `brosur_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru_staff`
--
ALTER TABLE `guru_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info_ppdb`
--
ALTER TABLE `info_ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `osis`
--
ALTER TABLE `osis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id_access_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_berita` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD CONSTRAINT `ekstrakurikuler_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD CONSTRAINT `guru_staff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `info_kurikulum`
--
ALTER TABLE `info_kurikulum`
  ADD CONSTRAINT `info_kurikulum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD CONSTRAINT `kalender_akademik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD CONSTRAINT `kategori_berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `osis`
--
ALTER TABLE `osis`
  ADD CONSTRAINT `osis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pesan_kontak`
--
ALTER TABLE `pesan_kontak`
  ADD CONSTRAINT `pesan_kontak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD CONSTRAINT `sejarah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  ADD CONSTRAINT `user_access_sub_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_access_sub_menu_ibfk_2` FOREIGN KEY (`id_sub_menu`) REFERENCES `user_sub_menu` (`id_sub_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_sub_menu_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `user_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD CONSTRAINT `visi_misi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
