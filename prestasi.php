<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Prestasi Siswa";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Hall of Fame</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Prestasi Siswa
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Kesiswaan</span>
      <span>/</span>
      <span class="text-white">Prestasi</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16 max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Jejak Sang Juara</h2>
      <p class="text-gray-500 leading-relaxed">
        Bukti nyata dedikasi dan kerja keras siswa-siswi SMAN 5 Kota Komba dalam mengharumkan nama sekolah di berbagai tingkat kompetisi, baik akademik maupun non-akademik.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php if (mysqli_num_rows($query_prestasi) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($query_prestasi)): ?>
          <?php
          // Logic Cek Gambar
          $img_path = "assets/img/prestasi/" . $row['foto_penyerahan'];
          if (!empty($row['foto_penyerahan']) && file_exists($img_path)) {
            $src_prestasi = $baseURL . $img_path;
          } else {
            // Fallback image (Trophy Placeholder)
            $src_prestasi = "https://placehold.co/600x400/fffbeb/f59e0b?text=Prestasi+Siswa";
          }

          // Logic Warna Badge Tingkat
          $badge_color = 'bg-gray-100 text-gray-600'; // Default
          $tingkat = strtolower($row['tingkat']);
          if (strpos($tingkat, 'nasional') !== false) {
            $badge_color = 'bg-red-100 text-red-600 border-red-200';
          } elseif (strpos($tingkat, 'provinsi') !== false) {
            $badge_color = 'bg-blue-100 text-blue-600 border-blue-200';
          } elseif (strpos($tingkat, 'kabupaten') !== false || strpos($tingkat, 'kota') !== false) {
            $badge_color = 'bg-green-100 text-green-600 border-green-200';
          }
          ?>

          <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full relative">

            <div class="relative h-64 overflow-hidden bg-yellow-50">
              <img src="<?= $src_prestasi ?>" alt="<?= $row['nama_lomba'] ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">

              <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-60"></div>

              <div class="absolute top-4 left-4">
                <span class="<?= $badge_color ?> text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border shadow-sm">
                  <?= $row['tingkat'] ?>
                </span>
              </div>

              <div class="absolute top-4 right-4">
                <span class="bg-white/20 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full border border-white/30 shadow-sm">
                  <?= $row['tahun'] ?>
                </span>
              </div>
            </div>

            <div class="p-6 flex flex-col flex-grow relative">
              <div class="absolute -top-6 right-6 w-12 h-12 bg-yellow-400 text-white rounded-full flex items-center justify-center text-xl shadow-lg ring-4 ring-white">
                <i class="bi bi-trophy-fill"></i>
              </div>

              <div class="mb-1">
                <span class="text-yellow-500 font-bold text-sm uppercase tracking-wide">
                  <?= $row['peringkat'] ?>
                </span>
              </div>

              <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2" title="<?= $row['nama_lomba'] ?>">
                <?= $row['nama_lomba'] ?>
              </h3>

              <div class="mt-auto pt-4 border-t border-gray-100 flex items-center gap-3">
                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 text-sm">
                  <i class="bi bi-person-fill"></i>
                </div>
                <div>
                  <p class="text-xs text-gray-400 uppercase font-bold">Peraih Juara</p>
                  <p class="text-sm font-semibold text-gray-800 line-clamp-1"><?= $row['nama_juara'] ?></p>
                </div>
              </div>
            </div>

          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-dashed border-gray-300">
          <div class="inline-block p-6 rounded-full bg-yellow-50 mb-6 relative">
            <i class="bi bi-trophy text-5xl text-yellow-400"></i>
            <div class="absolute top-0 right-0 -mr-2 -mt-2 w-6 h-6 bg-red-500 rounded-full border-2 border-white"></div>
          </div>
          <h3 class="text-xl font-bold text-gray-900">Belum Ada Data Prestasi</h3>
          <p class="text-gray-500 mt-2 max-w-md mx-auto">
            Data prestasi siswa belum ditambahkan ke dalam sistem.
          </p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="py-16 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6">
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-3xl p-8 md:p-12 text-center text-white shadow-lg relative overflow-hidden">
      <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 2px, transparent 2px); background-size: 30px 30px;"></div>

      <div class="relative z-10">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Kamu Juara Berikutnya?</h2>
        <p class="text-yellow-50 mb-8 max-w-2xl mx-auto text-lg">
          Jangan ragu untuk mengembangkan bakatmu. Sekolah mendukung penuh setiap langkah positif siswa menuju prestasi gemilang.
        </p>
        <a href="<?= $baseURL ?>ekstrakurikuler" class="inline-flex items-center bg-white text-orange-500 px-8 py-3 rounded-full font-bold hover:bg-orange-50 transition shadow-md">
          Ikuti Ekstrakurikuler <i class="bi bi-arrow-right ms-2"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>