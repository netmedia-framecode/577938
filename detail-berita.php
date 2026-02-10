<?php
require_once("controller/visitor.php");

// Validasi: Jika variabel $detail_berita tidak ada (akses langsung tanpa id_berita), kembalikan ke index berita
if (!isset($detail_berita)) {
  header("Location: " . $baseURL . "berita");
  exit;
}

$_SESSION["project_sman_5_kota_komba"]["name_page"] = $detail_berita['judul'];
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[450px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <?php
    $bg_path = "assets/img/berita/" . $detail_berita['gambar_utama'];
    $bg_src = (!empty($detail_berita['gambar_utama']) && file_exists($bg_path)) ? $baseURL . $bg_path : $baseURL . "assets/img/school-bg.jpg";
    ?>
    <img src="<?= $bg_src ?>" alt="Background" class="w-full h-full object-cover filter blur-md brightness-50 scale-110">
    <div class="absolute inset-0 bg-black/40"></div>
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl mt-10">
    <a href="<?= $baseURL ?>berita?kategori=<?= $detail_berita['id_kategori'] ?>" class="inline-block bg-primary/90 hover:bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 shadow-lg transition backdrop-blur-md border border-white/20">
      <?= $detail_berita['nama_kategori'] ?? 'Umum' ?>
    </a>

    <h1 class="text-3xl md:text-5xl font-bold text-white mb-8 leading-tight drop-shadow-xl">
      <?= $detail_berita['judul'] ?>
    </h1>

    <div class="flex flex-wrap justify-center items-center gap-4 md:gap-8 text-gray-200 text-sm font-medium">
      <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
        <i class="bi bi-calendar3 text-blue-300"></i>
        <?= date('d M Y', strtotime($detail_berita['tanggal_posting'])) ?>
      </div>
      <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
        <i class="bi bi-person-circle text-blue-300"></i>
        <?= $detail_berita['nama_penulis'] ?? 'Admin' ?>
      </div>
      <div class="flex items-center gap-2 bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm">
        <i class="bi bi-eye text-blue-300"></i>
        <?= number_format($detail_berita['dibaca']) ?>x Dilihat
      </div>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50 relative">
  <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-b from-gray-900/5 to-transparent z-0"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="flex flex-col lg:flex-row gap-12">

      <div class="lg:w-8/12">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-xl shadow-gray-200/50 border border-gray-100">

          <div class="rounded-2xl overflow-hidden mb-10 shadow-sm border border-gray-100">
            <?php if (!empty($detail_berita['gambar_utama']) && file_exists($bg_path)): ?>
              <img src="<?= $baseURL . $bg_path ?>" alt="<?= $detail_berita['judul'] ?>" class="w-full h-auto object-cover">
            <?php endif; ?>
          </div>

          <article class="prose prose-lg prose-blue text-gray-700 max-w-none leading-relaxed text-justify font-sans">
            <?= $detail_berita['isi_berita'] ?>
          </article>

          <div class="mt-16 pt-8 border-t border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

              <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-gray-500 uppercase tracking-wider">Bagikan:</span>
                <a href="#" class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 hover:-translate-y-1 transition shadow-md shadow-blue-200"><i class="bi bi-facebook"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 hover:-translate-y-1 transition shadow-md shadow-green-200"><i class="bi bi-whatsapp"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center hover:bg-gray-800 hover:-translate-y-1 transition shadow-md shadow-gray-200"><i class="bi bi-twitter-x"></i></a>
              </div>

              <a href="<?= $baseURL ?>berita" class="group flex items-center gap-2 text-gray-500 hover:text-primary font-bold text-sm transition px-4 py-2 rounded-lg hover:bg-blue-50">
                <i class="bi bi-arrow-left group-hover:-translate-x-1 transition"></i> Kembali ke Berita
              </a>
            </div>
          </div>

        </div>
      </div>

      <div class="lg:w-4/12 space-y-8 sticky top-24 h-fit">

        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 text-center relative overflow-hidden group">
          <div class="absolute top-0 left-0 w-full h-2 bg-primary"></div>

          <div class="w-24 h-24 bg-gray-100 rounded-full mx-auto mb-4 flex items-center justify-center text-4xl text-gray-400 border-4 border-white shadow-md group-hover:scale-110 transition duration-500">
            <i class="bi bi-person-fill"></i>
          </div>

          <h4 class="font-bold text-gray-900 text-lg"><?= $detail_berita['nama_penulis'] ?? 'Administrator' ?></h4>
          <p class="text-xs text-primary font-bold uppercase tracking-wider mb-4">Penulis Konten</p>

          <p class="text-sm text-gray-500 italic px-4">
            "Berbagi informasi terkini seputar kegiatan dan prestasi sekolah untuk kemajuan pendidikan bersama."
          </p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
          <h4 class="font-bold text-gray-900 mb-6 flex items-center gap-3 text-lg border-b border-gray-50 pb-4">
            <i class="bi bi-newspaper text-primary"></i> Berita Lainnya
          </h4>

          <div class="space-y-6">
            <?php while ($terbaru = mysqli_fetch_assoc($query_berita_terbaru)): ?>
              <?php
              $img_tb = "assets/img/berita/" . $terbaru['gambar_utama'];
              $src_tb = (!empty($terbaru['gambar_utama']) && file_exists($img_tb)) ? $baseURL . $img_tb : "https://placehold.co/100x100/e2e8f0/64748b?text=News";
              ?>
              <a href="<?= $baseURL ?>detail-berita?id_berita=<?= $terbaru['id'] ?>" class="flex gap-4 group items-start">
                <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden relative shadow-sm">
                  <img src="<?= $src_tb ?>" alt="Thumb" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                </div>
                <div>
                  <h5 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 group-hover:text-primary transition leading-snug">
                    <?= $terbaru['judul'] ?>
                  </h5>
                  <span class="text-xs text-gray-400 flex items-center gap-1">
                    <i class="bi bi-calendar-event"></i> <?= date('d M Y', strtotime($terbaru['tanggal_posting'])) ?>
                  </span>
                </div>
              </a>
            <?php endwhile; ?>
          </div>

          <div class="mt-8 pt-4 border-t border-gray-50 text-center">
            <a href="<?= $baseURL ?>berita" class="inline-flex items-center text-sm font-bold text-primary hover:underline gap-1">
              Lihat Semua Berita <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="bg-gradient-to-br from-primary to-blue-700 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
          <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 10px 10px;"></div>

          <div class="relative z-10">
            <h4 class="font-bold text-xl mb-2">Cari Artikel?</h4>
            <p class="text-blue-100 text-sm mb-6">Temukan berita atau pengumuman sekolah dengan mudah.</p>

            <form action="<?= $baseURL ?>berita" method="GET" class="relative group">
              <input type="text" name="q" placeholder="Kata kunci..." class="w-full pl-5 pr-12 py-3.5 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-200 focus:outline-none focus:bg-white/20 focus:border-white/40 transition backdrop-blur-md">
              <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-8 h-8 flex items-center justify-center rounded-lg text-white hover:bg-white/20 transition">
                <i class="bi bi-search"></i>
              </button>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>