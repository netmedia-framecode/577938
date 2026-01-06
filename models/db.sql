-- Active: 1734576880718@@127.0.0.1@3306@sman_5_kota_komba
CREATE TABLE
  utilities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo VARCHAR(50),
    name_web VARCHAR(75),
    keyword TEXT,
    description TEXT,
    author VARCHAR(50)
  );

CREATE TABLE
  auth (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(50),
    bg VARCHAR(35),
    model INT DEFAULT 2
  );

CREATE TABLE
  user_role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(35)
  );

INSERT INTO
  user_role (role)
VALUES
  ('Administrator'),
  ('Owner'),
  ('Member');

CREATE TABLE
  user_status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(35)
  );

INSERT INTO
  user_status (status)
VALUES
  ('Active'),
  ('No Active');

CREATE TABLE
  users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_active INT,
    en_user VARCHAR(75),
    token CHAR(6),
    name VARCHAR(100),
    image VARCHAR(100),
    email VARCHAR(75),
    password VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_active) REFERENCES user_status (id_status) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(50),
    menu VARCHAR(50)
  );

CREATE TABLE
  user_sub_menu (
    id_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_menu INT,
    id_active INT,
    title VARCHAR(50),
    url VARCHAR(50),
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_active) REFERENCES user_status (id_status) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_access_menu (
    id_access_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  user_access_sub_menu (
    id_access_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_sub_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_sub_menu) REFERENCES user_sub_menu (id_sub_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  profil_sekolah (
    profil_key VARCHAR(50) NOT NULL,
    judul VARCHAR(255) NOT NULL,
    konten TEXT NOT NULL,
    image_url VARCHAR(255) NULL,
    terakhir_diperbarui TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (profil_key)
  );

-- => Application features
-- ==================================================
-- BAGIAN 1: MENU PROFIL SEKOLAH (Relasi ke Users)
-- ==================================================
-- 1. Sejarah (Ditambahkan id_user sebagai pembuat/pengedit)
CREATE TABLE
  sejarah (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) DEFAULT 'Sejarah Sekolah',
    konten LONGTEXT,
    gambar_gedung VARCHAR(100),
    id_user INT, -- Foreign Key
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 2. Visi Misi
CREATE TABLE
  visi_misi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visi TEXT,
    misi LONGTEXT,
    tujuan_sekolah LONGTEXT,
    id_user INT, -- Foreign Key
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 3. Daftar Guru & Staf
CREATE TABLE
  guru_staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nip VARCHAR(30),
    jabatan_atau_mapel VARCHAR(100),
    foto VARCHAR(100),
    jenis_kelamin ENUM ('L', 'P'),
    urutan INT DEFAULT 100,
    id_user INT, -- Admin yang menginput data guru
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 4. Fasilitas
CREATE TABLE
  fasilitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_fasilitas VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    gambar_fasilitas VARCHAR(100),
    id_user INT, -- Relasi ke tabel users
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- ==================================================
-- BAGIAN 2: MENU AKADEMIK (Relasi ke Users)
-- ==================================================
-- 5. Info Kurikulum
CREATE TABLE
  info_kurikulum (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) DEFAULT 'Kurikulum Sekolah',
    deskripsi_umum LONGTEXT,
    tahun_ajaran VARCHAR(20) DEFAULT '2024/2025',
    id_user INT, -- Foreign Key
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 6. Jurusan
CREATE TABLE
  jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(50),
    deskripsi TEXT,
    ikon_atau_gambar VARCHAR(100),
    id_user INT, -- Foreign Key
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 7. Kalender Akademik
CREATE TABLE
  kalender_akademik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kegiatan VARCHAR(255),
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    keterangan TEXT,
    id_user INT, -- Foreign Key
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- ==================================================
-- BAGIAN 3: MENU KESISWAAN (Relasi ke Users)
-- ==================================================
-- 8. Ekstrakurikuler
CREATE TABLE
  ekstrakurikuler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_ekskul VARCHAR(100),
    nama_pembina VARCHAR(100),
    jadwal_latihan VARCHAR(100),
    deskripsi_kegiatan TEXT,
    foto_kegiatan VARCHAR(100),
    id_user INT, -- Foreign Key
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 9. Prestasi
CREATE TABLE
  prestasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lomba VARCHAR(255),
    nama_juara VARCHAR(255),
    peringkat VARCHAR(50),
    tingkat VARCHAR(50),
    tahun YEAR,
    foto_penyerahan VARCHAR(100),
    id_user INT, -- Foreign Key
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 10. OSIS
CREATE TABLE
  osis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(100),
    jabatan VARCHAR(50),
    foto_siswa VARCHAR(100),
    periode VARCHAR(20),
    id_user INT, -- Foreign Key
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- ==================================================
-- BAGIAN 4: MENU BERITA (Relasi Antar Tabel & Users)
-- ==================================================
-- 11. Kategori Berita
CREATE TABLE
  kategori_berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50),
    id_user INT, -- Siapa yang membuat kategori ini
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 12. Berita (Terhubung ke Kategori DAN Users)
CREATE TABLE
  berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    slug VARCHAR(255),
    isi_berita LONGTEXT,
    gambar_utama VARCHAR(100),
    tanggal_posting DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_kategori INT, -- Relasi ke tbl kategori
    id_user INT, -- Relasi ke tbl users (Penulis)
    dibaca INT DEFAULT 0,
    FOREIGN KEY (id_kategori) REFERENCES kategori_berita (id) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE CASCADE
  );

-- ==================================================
-- BAGIAN 4: MENU GALERI (Relasi Berjenjang)
-- ==================================================
-- 13. Album (Terhubung ke Users)
CREATE TABLE
  album (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_album VARCHAR(100),
    keterangan TEXT,
    cover_album VARCHAR(100),
    id_user INT, -- Siapa yang upload album
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- 14. Foto (Terhubung ke Album)
-- Di ERD: Users -> Album -> Foto (Sudah terhubung secara tidak langsung)
CREATE TABLE
  foto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_album INT, -- Relasi ke tabel album
    file_foto VARCHAR(100),
    caption VARCHAR(255),
    FOREIGN KEY (id_album) REFERENCES album (id) ON UPDATE CASCADE ON DELETE CASCADE
  );

-- ==================================================
-- BAGIAN 5: KONTAK & PPDB (Relasi Verifikator)
-- ==================================================
-- 15. Pesan Kontak
CREATE TABLE
  pesan_kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pengirim VARCHAR(100),
    email_pengirim VARCHAR(100),
    subjek VARCHAR(150),
    isi_pesan TEXT,
    tanggal_kirim DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_user INT, -- Admin yang membaca/membalas pesan ini (Boleh NULL jika belum dibaca)
    FOREIGN KEY (id_user) REFERENCES users (id_user) ON UPDATE CASCADE ON DELETE SET NULL
  );

-- ==================================================
-- BAGIAN 6: PPDB
-- ==================================================
-- 16. Info PPDB
CREATE TABLE
  info_ppdb (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200) NOT NULL, -- Contoh: "PPDB Tahun Ajaran 2026/2027"
    deskripsi TEXT, -- Isi lengkap (syarat, kuota, dll dalam format HTML)
    tanggal_buka DATE, -- Tanggal mulai pendaftaran
    tanggal_tutup DATE, -- Tanggal akhir pendaftaran
    status ENUM ('Buka', 'Tutup') DEFAULT 'Tutup',
    gambar_banner VARCHAR(255), -- Foto banner/poster utama
    is_active TINYINT (1) DEFAULT 0, -- 1 = Tampil di Web, 0 = Tidak Tampil (Arsip)
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  );

-- 17. Pendaftar PPDB
CREATE TABLE
  alur_ppdb (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_langkah VARCHAR(150) NOT NULL, -- Contoh: "Langkah 1: Isi Formulir"
    deskripsi TEXT, -- Penjelasan singkat langkah tersebut
    urutan INT NOT NULL, -- Angka urutan (1, 2, 3...) agar langkahnya rapi
    gambar_icon VARCHAR(255) -- Ikon atau gambar ilustrasi kecil untuk langkah ini
  );

-- 17. Brosur PPDB
CREATE TABLE
  brosur_ppdb (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul_file VARCHAR(200) NOT NULL, -- Contoh: "Brosur Jalur Prestasi 2026"
    nama_file VARCHAR(255) NOT NULL, -- Nama file fisik (contoh: brosur_2026.pdf)
    ukuran_file VARCHAR(50), -- Opsional: Info ukuran file (misal: "2 MB")
    tanggal_upload DATETIME DEFAULT CURRENT_TIMESTAMP
  );