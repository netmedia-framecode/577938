<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Visi & Misi";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Landasan Pendidikan</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Visi, Misi & Tujuan
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Profil</span>
      <span>/</span>
      <span class="text-white">Visi Misi</span>
    </div>
  </div>
</header>

<section class="py-20 bg-white">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <div class="w-20 h-20 bg-blue-50 text-primary rounded-full flex items-center justify-center text-3xl mx-auto mb-6 shadow-sm">
        <i class="bi bi-eye"></i>
      </div>

      <h2 class="text-sm font-bold text-gray-400 tracking-widest uppercase mb-4">Visi Sekolah</h2>

      <div class="relative">
        <i class="bi bi-quote text-6xl text-gray-100 absolute -top-8 -left-4 md:-left-12"></i>
        <h3 class="text-2xl md:text-4xl font-bold text-gray-900 leading-snug relative z-10">
          "<?= $data_visimisi['visi'] ?>"
        </h3>
        <i class="bi bi-quote text-6xl text-gray-100 absolute -bottom-8 -right-4 md:-right-12 rotate-180"></i>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-100">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

      <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
          <i class="bi bi-bullseye text-9xl"></i>
        </div>

        <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center text-2xl">
            <i class="bi bi-list-check"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-900">Misi Sekolah</h2>
        </div>

        <div class="prose prose-lg prose-red text-gray-600 leading-relaxed">
          <?= $data_visimisi['misi'] ?>
        </div>
      </div>

      <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg transition duration-300">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
          <i class="bi bi-flag text-9xl"></i>
        </div>

        <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-12 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-2xl">
            <i class="bi bi-trophy"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-900">Tujuan Sekolah</h2>
        </div>

        <div class="prose prose-lg prose-green text-gray-600 leading-relaxed text-justify">
          <?= $data_visimisi['tujuan_sekolah'] ?>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="py-16 bg-primary relative overflow-hidden">
  <div class="absolute inset-0 bg-[url('<?= $baseURL ?>assets/img/pattern.png')] opacity-10"></div>
  <div class="container mx-auto px-6 text-center relative z-10 text-white">
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Ingin Menjadi Bagian dari Visi Kami?</h2>
    <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Bergabunglah bersama SMAN 5 Kota Komba untuk mewujudkan generasi masa depan yang cerdas dan berkarakter mulia.</p>
    <div class="flex justify-center gap-4">
      <a href="<?= $baseURL ?>#info-ppdb" class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-blue-50 transition shadow-lg">
        Daftar PPDB
      </a>
      <a href="<?= $baseURL ?>kontak" class="border border-white/30 text-white px-8 py-3 rounded-full font-bold hover:bg-white/10 transition">
        Hubungi Kami
      </a>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>