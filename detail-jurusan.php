<?php
require_once("controller/visitor.php");

// Validasi jika akses langsung tanpa ID
if (!isset($detail_jurusan)) {
  header("Location: " . $baseURL . "jurusan");
  exit;
}

$_SESSION["project_sman_5_kota_komba"]["name_page"] = $detail_jurusan['nama_jurusan'];
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[300px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>
  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Program Peminatan</span>
    <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
      <?= $detail_jurusan['nama_jurusan'] ?>
    </h1>
    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>jurusan" class="hover:text-white transition">Jurusan</a>
      <span>/</span>
      <span class="text-white">Detail</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">
    <div class="flex flex-col lg:flex-row gap-12 items-start">

      <div class="lg:w-8/12 w-full">
        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-gray-100 overflow-hidden">

          <div class="mb-8 rounded-2xl overflow-hidden">
            <?php
            $raw_asset = $detail_jurusan['ikon_atau_gambar'];
            $is_image_file = preg_match('/\.(jpg|jpeg|png|svg|webp)$/i', $raw_asset);
            $image_path = "assets/img/jurusan/" . $raw_asset;

            if ($is_image_file && file_exists($image_path)):
            ?>
              <img src="<?= $baseURL . $image_path ?>" alt="<?= $detail_jurusan['nama_jurusan'] ?>" class="w-full h-auto max-h-[400px] object-cover hover:scale-105 transition duration-700">

            <?php else: ?>
              <div class="w-full h-64 bg-gradient-to-r from-blue-50 to-indigo-50 flex items-center justify-center text-primary">
                <?php if (strpos($raw_asset, 'bi-') !== false || strpos($raw_asset, 'fa-') !== false): ?>
                  <i class="<?= $raw_asset ?> text-9xl drop-shadow-sm"></i>
                <?php else: ?>
                  <i class="bi bi-mortarboard text-9xl drop-shadow-sm"></i>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

          <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b border-gray-100 pb-4">
            Tentang Jurusan
          </h2>

          <div class="prose prose-lg prose-blue text-gray-600 max-w-none leading-relaxed text-justify">
            <?= $detail_jurusan['deskripsi'] ?>
          </div>

          <div class="mt-10 bg-blue-50 rounded-2xl p-6 border border-blue-100">
            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
              <i class="bi bi-briefcase text-primary"></i> Prospek Masa Depan
            </h3>
            <p class="text-sm text-gray-600 mb-4">
              Lulusan program studi ini memiliki peluang besar untuk melanjutkan pendidikan ke jenjang perguruan tinggi dengan pilihan program studi yang relevan, atau berkarir di bidang terkait.
            </p>
            <div class="flex flex-wrap gap-2">
              <span class="bg-white text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">Perguruan Tinggi Negeri</span>
              <span class="bg-white text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">Sekolah Kedinasan</span>
              <span class="bg-white text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">Profesional</span>
            </div>
          </div>

        </div>
      </div>

      <div class="lg:w-4/12 w-full space-y-8 sticky top-24">

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
          <h3 class="font-bold text-gray-900 mb-4 pb-4 border-b border-gray-50">Jurusan Lainnya</h3>
          <div class="space-y-3">
            <?php if (mysqli_num_rows($query_jurusan_lain) > 0): ?>
              <?php while ($lain = mysqli_fetch_assoc($query_jurusan_lain)): ?>
                <a href="<?= $baseURL ?>detail-jurusan?id=<?= $lain['id'] ?>" class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition group border border-transparent hover:border-gray-100">
                  <div class="w-10 h-10 bg-blue-50 text-primary rounded-lg flex items-center justify-center group-hover:bg-primary group-hover:text-white transition">
                    <i class="bi bi-chevron-right"></i>
                  </div>
                  <span class="font-semibold text-gray-700 group-hover:text-primary transition">
                    <?= $lain['nama_jurusan'] ?>
                  </span>
                </a>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="text-gray-400 text-sm">Tidak ada jurusan lain.</p>
            <?php endif; ?>
          </div>
        </div>

        <div class="bg-gradient-to-br from-primary to-blue-600 rounded-3xl p-8 text-white text-center shadow-lg relative overflow-hidden">
          <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 2px, transparent 2px); background-size: 20px 20px;"></div>

          <div class="relative z-10">
            <i class="bi bi-mortarboard-fill text-5xl mb-4 block opacity-80"></i>
            <h3 class="text-xl font-bold mb-2">Tertarik dengan Jurusan Ini?</h3>
            <p class="text-blue-100 text-sm mb-6">Segera daftarkan diri Anda dan jadilah bagian dari kami.</p>
            <a href="<?= $baseURL ?>#info-ppdb" class="inline-block w-full bg-white text-primary py-3 rounded-xl font-bold hover:bg-blue-50 transition shadow-md">
              Daftar Sekarang
            </a>
          </div>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 text-center">
          <div class="w-12 h-12 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="bi bi-file-earmark-pdf text-xl"></i>
          </div>
          <h4 class="font-bold text-gray-900 mb-1">Informasi Lengkap</h4>
          <p class="text-xs text-gray-500 mb-4">Unduh detail kurikulum jurusan ini.</p>
          <a href="<?= $baseURL ?>brosur" class="text-sm font-bold text-red-500 hover:underline">Download PDF</a>
        </div>

      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>