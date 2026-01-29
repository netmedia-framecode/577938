<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ekstrakurikuler";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Pengembangan Diri</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Ekstrakurikuler
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Kesiswaan</span>
      <span>/</span>
      <span class="text-white">Ekstrakurikuler</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16 max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Wadah Kreativitas & Bakat</h2>
      <p class="text-gray-500 leading-relaxed">
        SMAN 5 Kota Komba menyediakan berbagai kegiatan ekstrakurikuler untuk menunjang minat dan bakat siswa di luar bidang akademik, mulai dari olahraga, seni, hingga teknologi.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php if (mysqli_num_rows($query_ekskul) > 0): ?>
        <?php while ($ekskul = mysqli_fetch_assoc($query_ekskul)): ?>
          <?php
          // Logic Cek Gambar
          $img_path = "assets/img/ekstrakurikuler/" . $ekskul['foto_kegiatan'];
          if (!empty($ekskul['foto_kegiatan']) && file_exists($img_path)) {
            $src_ekskul = $baseURL . $img_path;
          } else {
            // Fallback image (Placeholder Sport/Activity)
            $src_ekskul = "https://placehold.co/600x400/e2e8f0/64748b?text=Kegiatan+Siswa";
          }
          ?>

          <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full">

            <div class="relative h-56 overflow-hidden">
              <img src="<?= $src_ekskul ?>" alt="<?= $ekskul['nama_ekskul'] ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">

              <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-60"></div>

              <div class="absolute bottom-4 left-4 text-white">
                <h3 class="text-xl font-bold leading-none shadow-black drop-shadow-md">
                  <?= $ekskul['nama_ekskul'] ?>
                </h3>
              </div>
            </div>

            <div class="p-6 flex flex-col flex-grow">

              <div class="grid grid-cols-1 gap-3 mb-4">
                <div class="flex items-start gap-3">
                  <div class="mt-1 text-primary"><i class="bi bi-person-badge"></i></div>
                  <div>
                    <p class="text-xs text-gray-400 uppercase font-bold">Pembina</p>
                    <p class="text-sm font-semibold text-gray-800"><?= $ekskul['nama_pembina'] ?></p>
                  </div>
                </div>
                <div class="flex items-start gap-3">
                  <div class="mt-1 text-orange-500"><i class="bi bi-calendar-event"></i></div>
                  <div>
                    <p class="text-xs text-gray-400 uppercase font-bold">Jadwal Latihan</p>
                    <p class="text-sm font-semibold text-gray-800"><?= $ekskul['jadwal_latihan'] ?></p>
                  </div>
                </div>
              </div>

              <div class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 prose prose-sm max-w-none">
                <?= $ekskul['deskripsi_kegiatan'] ?>
              </div>

            </div>

            <div class="px-6 pb-6 pt-0 mt-auto">
              <a href="<?= $baseURL ?>kontak" class="block w-full py-2.5 rounded-lg border border-primary text-primary text-center text-sm font-bold hover:bg-primary hover:text-white transition">
                Gabung Sekarang
              </a>
            </div>

          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
            <i class="bi bi-emoji-smile text-3xl"></i>
          </div>
          <h3 class="text-lg font-bold text-gray-900">Belum Ada Data Ekskul</h3>
          <p class="text-gray-500 text-sm mt-1">Administrator belum menambahkan data kegiatan ekstrakurikuler.</p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="py-16 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Punya Ide Kegiatan Baru?</h2>
    <p class="text-gray-500 mb-8 max-w-xl mx-auto">
      OSIS SMAN 5 Kota Komba terbuka untuk aspirasi siswa yang ingin membentuk komunitas atau klub kegiatan baru yang positif.
    </p>
    <a href="<?= $baseURL ?>osis-mpk" class="inline-flex items-center bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-blue-600 transition shadow-lg">
      Hubungi Pengurus OSIS
    </a>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>