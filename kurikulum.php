<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Kurikulum";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Akademik</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      <?= $data_kurikulum['judul'] ?>
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Akademik</span>
      <span>/</span>
      <span class="text-white">Kurikulum</span>
    </div>
  </div>
</header>

<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <div class="flex flex-col lg:flex-row gap-12 items-start">

      <div class="lg:w-7/12">
        <div class="flex items-center gap-3 mb-6">
          <span class="bg-blue-100 text-primary px-3 py-1 rounded-lg text-sm font-bold">
            Tahun Ajaran <?= $data_kurikulum['tahun_ajaran'] ?>
          </span>
          <span class="text-gray-400 text-sm">
            <i class="bi bi-clock-history me-1"></i> Update: <?= date('d M Y', strtotime($data_kurikulum['updated_at'])) ?>
          </span>
        </div>

        <h2 class="text-3xl font-bold text-gray-900 mb-6">Pedoman Pembelajaran</h2>

        <div class="prose prose-lg prose-blue text-gray-600 leading-relaxed text-justify max-w-none">
          <?= $data_kurikulum['deskripsi_umum'] ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
          <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100">
            <div class="mt-1 text-primary"><i class="bi bi-check-circle-fill"></i></div>
            <div>
              <h4 class="font-bold text-gray-900 text-sm">Berpusat Pada Peserta Didik</h4>
              <p class="text-xs text-gray-500 mt-1">Pembelajaran menyesuaikan kebutuhan dan minat siswa.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl border border-gray-100">
            <div class="mt-1 text-primary"><i class="bi bi-check-circle-fill"></i></div>
            <div>
              <h4 class="font-bold text-gray-900 text-sm">Penguatan Karakter</h4>
              <p class="text-xs text-gray-500 mt-1">Fokus pada Profil Pelajar Pancasila.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="lg:w-5/12 w-full">
        <div class="bg-blue-50 rounded-3xl p-8 relative overflow-hidden text-center border border-blue-100">
          <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-blue-100 rounded-full opacity-50"></div>
          <div class="absolute bottom-0 left-0 -ml-8 -mb-8 w-32 h-32 bg-blue-200 rounded-full opacity-50"></div>

          <img src="<?= $baseURL ?>assets/img/illustration-learning.svg" onerror="this.src='https://placehold.co/400x300/e2e8f0/64748b?text=Learning+Process'" alt="Ilustrasi" class="relative z-10 w-full max-w-xs mx-auto mb-6 drop-shadow-lg">

          <h3 class="text-xl font-bold text-gray-900 mb-2 relative z-10">Dokumen Akademik</h3>
          <p class="text-gray-500 text-sm mb-6 relative z-10">Unduh kalender pendidikan dan silabus pembelajaran lengkap.</p>

          <div class="flex flex-col gap-3 relative z-10">
            <a href="<?= $baseURL ?>kalender-akademik" class="bg-primary text-white py-3 px-6 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-500/20">
              <i class="bi bi-calendar-week me-2"></i> Lihat Kalender Akademik
            </a>
            <a href="#" class="bg-white text-gray-700 border border-gray-200 py-3 px-6 rounded-xl font-bold hover:bg-white transition">
              <i class="bi bi-download me-2"></i> Download Silabus
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-200">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-900">Kelompok Mata Pelajaran</h2>
      <p class="text-gray-500 mt-2">Struktur pembelajaran dibagi menjadi dua kelompok utama</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">

      <div class="bg-white rounded-2xl p-8 shadow-sm border-t-4 border-primary relative overflow-hidden group hover:shadow-lg transition">
        <div class="absolute top-4 right-4 text-6xl text-gray-50 group-hover:text-blue-50 transition"><i class="bi bi-book"></i></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Kelompok Umum (Wajib)</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-primary"></i> Pendidikan Agama & Budi Pekerti
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-primary"></i> Pendidikan Pancasila & Kewarganegaraan
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-primary"></i> Bahasa Indonesia
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-primary"></i> Matematika & Bahasa Inggris
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-8 shadow-sm border-t-4 border-green-500 relative overflow-hidden group hover:shadow-lg transition">
        <div class="absolute top-4 right-4 text-6xl text-gray-50 group-hover:text-green-50 transition"><i class="bi bi-puzzle"></i></div>
        <h3 class="text-xl font-bold text-gray-900 mb-4">Kelompok Peminatan</h3>
        <ul class="space-y-3 text-gray-600">
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-green-500"></i> <strong class="text-gray-800">MIPA:</strong> Biologi, Fisika, Kimia
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-green-500"></i> <strong class="text-gray-800">IPS:</strong> Sosiologi, Ekonomi, Geografi, Sejarah
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-dot text-2xl text-green-500"></i> <strong class="text-gray-800">Bahasa:</strong> Sastra Inggris, Bahasa Asing Lainnya
          </li>
        </ul>
        <div class="mt-6 pt-4 border-t border-gray-100">
          <a href="<?= $baseURL ?>jurusan" class="text-green-600 font-bold text-sm hover:underline">Lihat Detail Jurusan <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>