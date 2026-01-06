<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Jurusan & Peminatan";
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
      Program Jurusan
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Akademik</span>
      <span>/</span>
      <span class="text-white">Jurusan</span>
    </div>
  </div>
</header>

<section class="py-20 bg-white">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16 max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Pilihan Peminatan</h2>
      <p class="text-gray-500 leading-relaxed">
        Kami menyediakan berbagai program peminatan yang dirancang untuk menggali potensi siswa secara maksimal dan mempersiapkan mereka menuju jenjang pendidikan tinggi maupun dunia profesional.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <?php if (mysqli_num_rows($query_jurusan) > 0): ?>
        <?php while ($jurusan = mysqli_fetch_assoc($query_jurusan)): ?>
          <?php
          // --- LOGIKA DETEKSI GAMBAR VS ICON ---
          $raw_asset = $jurusan['ikon_atau_gambar'];
          $is_image_file = preg_match('/\.(jpg|jpeg|png|svg|webp)$/i', $raw_asset);
          $image_path = "assets/img/jurusan/" . $raw_asset;

          // Tentukan Tipe Tampilan (Image atau Icon)
          $display_type = 'icon_default'; // Default fallback

          if ($is_image_file && file_exists($image_path)) {
            $display_type = 'image';
          } elseif (strpos($raw_asset, 'bi-') !== false || strpos($raw_asset, 'fa-') !== false) {
            $display_type = 'icon_class';
          }
          ?>

          <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-300 border border-gray-100 group flex flex-col h-full relative overflow-hidden">

            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 bg-gray-50 rounded-full group-hover:bg-blue-50 transition duration-500 z-0"></div>

            <div class="relative z-10 mb-6">
              <?php if ($display_type == 'image'): ?>
                <div class="w-16 h-16 rounded-xl overflow-hidden shadow-sm">
                  <img src="<?= $baseURL . $image_path ?>" alt="<?= $jurusan['nama_jurusan'] ?>" class="w-full h-full object-cover">
                </div>
              <?php elseif ($display_type == 'icon_class'): ?>
                <div class="w-16 h-16 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-3xl group-hover:bg-primary group-hover:text-white transition duration-300 shadow-sm">
                  <i class="<?= $raw_asset ?>"></i>
                </div>
              <?php else: ?>
                <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-xl flex items-center justify-center text-3xl group-hover:bg-gray-600 group-hover:text-white transition duration-300">
                  <i class="bi bi-mortarboard"></i>
                </div>
              <?php endif; ?>
            </div>

            <div class="relative z-10 flex-grow">
              <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                <?= $jurusan['nama_jurusan'] ?>
              </h3>

              <div class="prose prose-sm text-gray-500 mb-6 line-clamp-4">
                <?= $jurusan['deskripsi'] ?>
              </div>
            </div>

            <div class="relative z-10 pt-6 border-t border-gray-100 mt-auto">
              <a href="<?= $baseURL ?>detail-jurusan?id=<?= $jurusan['id'] ?>" class="text-sm font-semibold text-gray-900 flex items-center gap-2 group-hover:translate-x-2 transition duration-300 cursor-pointer">
                Selengkapnya <i class="bi bi-arrow-right text-primary"></i>
              </a>
            </div>
          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="col-span-full py-16 text-center">
          <div class="inline-block p-4 rounded-full bg-gray-100 text-gray-400 mb-4">
            <i class="bi bi-journal-x text-4xl"></i>
          </div>
          <h3 class="text-lg font-bold text-gray-900">Data Jurusan Belum Tersedia</h3>
          <p class="text-gray-500 mt-1">Silakan hubungi admin sekolah untuk informasi lebih lanjut.</p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-200">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl font-bold text-gray-900">Bimbingan Karir</h2>
      <p class="text-gray-500 mt-2">Kami membantu siswa menentukan arah masa depan</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
      <div class="bg-white p-6 rounded-xl border border-gray-100 text-center hover:shadow-lg transition">
        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
          <i class="bi bi-person-workspace"></i>
        </div>
        <h4 class="font-bold text-gray-900 mb-2">Konsultasi BK</h4>
        <p class="text-sm text-gray-500">Layanan konsultasi minat dan bakat bersama guru BK profesional.</p>
      </div>

      <div class="bg-white p-6 rounded-xl border border-gray-100 text-center hover:shadow-lg transition">
        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
          <i class="bi bi-buildings"></i>
        </div>
        <h4 class="font-bold text-gray-900 mb-2">Kunjungan Kampus</h4>
        <p class="text-sm text-gray-500">Program rutin kunjungan ke universitas ternama di Indonesia.</p>
      </div>

      <div class="bg-white p-6 rounded-xl border border-gray-100 text-center hover:shadow-lg transition">
        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
          <i class="bi bi-briefcase"></i>
        </div>
        <h4 class="font-bold text-gray-900 mb-2">Alumni Sharing</h4>
        <p class="text-sm text-gray-500">Sesi berbagi pengalaman dengan alumni sukses di berbagai bidang.</p>
      </div>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>