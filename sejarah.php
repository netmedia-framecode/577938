<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Sejarah Sekolah";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[400px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Profil Sekolah</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      <?= $data_sejarah['judul'] ?>
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Sejarah</span>
    </div>
  </div>
</header>

<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <div class="flex flex-col lg:flex-row gap-12 items-start">

      <div class="lg:w-5/12 w-full relative group">
        <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-orange-100 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>

        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
          <?php if ($data_sejarah['gambar_gedung'] != 'default.jpg' && file_exists("assets/img/profil/" . $data_sejarah['gambar_gedung'])): ?>
            <img src="<?= $baseURL ?>assets/img/profil/<?= $data_sejarah['gambar_gedung'] ?>" alt="Gedung Sekolah" class="w-full h-auto object-cover transform transition duration-500 group-hover:scale-105">
          <?php else: ?>
            <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Default Gedung" class="w-full h-auto object-cover">
          <?php endif; ?>

          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900/80 to-transparent p-6">
            <p class="text-white text-sm font-medium"><i class="bi bi-camera me-2"></i>Dokumentasi Sekolah</p>
          </div>
        </div>
      </div>

      <div class="lg:w-7/12 w-full">
        <div class="mb-6">
          <h2 class="text-3xl font-bold text-gray-900 mb-2"><?= $data_sejarah['judul'] ?></h2>
          <div class="h-1 w-20 bg-primary rounded-full"></div>
        </div>

        <div class="prose prose-lg prose-blue text-gray-600 leading-relaxed text-justify max-w-none">
          <?= $data_sejarah['konten'] ?>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center text-sm text-gray-400 italic">
          <i class="bi bi-clock-history me-2"></i>
          Terakhir diperbarui: <?= date('d F Y', strtotime($data_sejarah['updated_at'])) ?>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="py-16 bg-gray-50 border-t border-gray-200">
  <div class="container mx-auto px-6">
    <div class="text-center mb-10">
      <h3 class="text-2xl font-bold text-gray-900">Kenali Kami Lebih Dekat</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="<?= $baseURL ?>visi-misi" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 flex items-center gap-4 group">
        <div class="w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-2xl group-hover:bg-primary group-hover:text-white transition">
          <i class="bi bi-bullseye"></i>
        </div>
        <div>
          <h4 class="font-bold text-gray-900">Visi & Misi</h4>
          <p class="text-xs text-gray-500">Arah dan tujuan pendidikan kami</p>
        </div>
        <i class="bi bi-chevron-right ml-auto text-gray-300"></i>
      </a>

      <a href="<?= $baseURL ?>struktur-organisasi" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 flex items-center gap-4 group">
        <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-lg flex items-center justify-center text-2xl group-hover:bg-orange-500 group-hover:text-white transition">
          <i class="bi bi-people"></i>
        </div>
        <div>
          <h4 class="font-bold text-gray-900">Struktur Organisasi</h4>
          <p class="text-xs text-gray-500">Kepemimpinan & Staff Pengajar</p>
        </div>
        <i class="bi bi-chevron-right ml-auto text-gray-300"></i>
      </a>

      <a href="<?= $baseURL ?>fasilitas" class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 flex items-center gap-4 group">
        <div class="w-12 h-12 bg-green-50 text-green-500 rounded-lg flex items-center justify-center text-2xl group-hover:bg-green-500 group-hover:text-white transition">
          <i class="bi bi-building"></i>
        </div>
        <div>
          <h4 class="font-bold text-gray-900">Fasilitas Sekolah</h4>
          <p class="text-xs text-gray-500">Sarana penunjang belajar</p>
        </div>
        <i class="bi bi-chevron-right ml-auto text-gray-300"></i>
      </a>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>