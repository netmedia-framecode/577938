<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Berita & Artikel";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[300px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>
  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Pusat Informasi</span>
    <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Berita & Artikel
    </h1>
    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Berita</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">
    <div class="flex flex-col lg:flex-row gap-12">

      <div class="lg:w-8/12">

        <?php if (isset($_GET['q'])): ?>
          <div class="mb-8 p-4 bg-white rounded-xl border border-gray-200 shadow-sm flex justify-between items-center">
            <span class="text-gray-600">Menampilkan hasil pencarian: <strong>"<?= htmlspecialchars($_GET['q']) ?>"</strong></span>
            <a href="<?= $baseURL ?>berita" class="text-sm text-red-500 hover:underline"><i class="bi bi-x-circle me-1"></i> Reset</a>
          </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <?php if (mysqli_num_rows($query_berita) > 0): ?>
            <?php while ($news = mysqli_fetch_assoc($query_berita)): ?>
              <?php
              // Logic Gambar
              $img_path = "assets/img/berita/" . $news['gambar_utama'];
              $src_img = (!empty($news['gambar_utama']) && file_exists($img_path)) ? $baseURL . $img_path : "https://placehold.co/600x400/e2e8f0/64748b?text=News";

              // Cuplikan Isi (Strip HTML tags)
              $excerpt = substr(strip_tags($news['isi_berita']), 0, 100) . "...";
              ?>

              <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full">
                <div class="relative h-48 overflow-hidden">
                  <img src="<?= $src_img ?>" alt="<?= $news['judul'] ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">

                  <div class="absolute top-4 left-4">
                    <span class="bg-primary/90 backdrop-blur-sm text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                      <?= $news['nama_kategori'] ?? 'Umum' ?>
                    </span>
                  </div>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                  <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
                    <span class="flex items-center gap-1"><i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($news['tanggal_posting'])) ?></span>
                    <span>•</span>
                    <span class="flex items-center gap-1"><i class="bi bi-person"></i> <?= $news['nama_penulis'] ?? 'Admin' ?></span>
                  </div>

                  <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-primary transition-colors">
                    <a href="<?= $baseURL ?>detail-berita?id_berita=<?= $news['id'] ?>">
                      <?= $news['judul'] ?>
                    </a>
                  </h3>

                  <p class="text-sm text-gray-500 mb-4 flex-grow line-clamp-3">
                    <?= $excerpt ?>
                  </p>

                  <a href="<?= $baseURL ?>detail-berita?id_berita=<?= $news['id'] ?>" class="inline-flex items-center text-sm font-bold text-primary hover:underline mt-auto">
                    Baca Selengkapnya <i class="bi bi-arrow-right ms-2"></i>
                  </a>
                </div>
              </article>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
              <i class="bi bi-search text-4xl text-gray-300 mb-4 block"></i>
              <h3 class="text-lg font-bold text-gray-900">Tidak Ditemukan</h3>
              <p class="text-gray-500 text-sm mt-1">Belum ada berita yang sesuai dengan kriteria Anda.</p>
            </div>
          <?php endif; ?>
        </div>

        <?php if ($total_pages > 1): ?>
          <div class="mt-12 flex justify-center gap-2">
            <?php if ($page > 1): ?>
              <a href="?page=<?= $page - 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-primary hover:text-white hover:border-primary transition">
                <i class="bi bi-chevron-left"></i>
              </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
              <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center rounded-lg border <?= ($i == $page) ? 'bg-primary text-white border-primary' : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50' ?> transition font-bold">
                <?= $i ?>
              </a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
              <a href="?page=<?= $page + 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-primary hover:text-white hover:border-primary transition">
                <i class="bi bi-chevron-right"></i>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

      </div>

      <div class="lg:w-4/12 space-y-8">

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
          <h4 class="font-bold text-gray-900 mb-4">Pencarian</h4>
          <form action="" method="GET" class="relative">
            <input type="text" name="q" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
            <i class="bi bi-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
          </form>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
          <h4 class="font-bold text-gray-900 mb-4">Kategori</h4>
          <div class="space-y-2">
            <a href="<?= $baseURL ?>berita" class="flex items-center justify-between p-2 hover:bg-gray-50 rounded-lg transition group">
              <span class="text-gray-600 group-hover:text-primary transition">Semua Berita</span>
              <i class="bi bi-chevron-right text-xs text-gray-300 group-hover:text-primary"></i>
            </a>
            <?php while ($kat = mysqli_fetch_assoc($query_kategori)): ?>
              <a href="?kategori=<?= $kat['id'] ?>" class="flex items-center justify-between p-2 hover:bg-gray-50 rounded-lg transition group">
                <span class="text-gray-600 group-hover:text-primary transition"><?= $kat['nama_kategori'] ?></span>
                <i class="bi bi-chevron-right text-xs text-gray-300 group-hover:text-primary"></i>
              </a>
            <?php endwhile; ?>
          </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
          <h4 class="font-bold text-gray-900 mb-4">Berita Populer</h4>
          <div class="space-y-4">
            <?php while ($pop = mysqli_fetch_assoc($query_populer)): ?>
              <?php
              $img_pop = "assets/img/berita/" . $pop['gambar_utama'];
              $src_pop = (!empty($pop['gambar_utama']) && file_exists($img_pop)) ? $baseURL . $img_pop : "https://placehold.co/100x100/e2e8f0/64748b?text=Img";
              ?>
              <a href="<?= $baseURL ?>detail-berita?id_berita=<?= $pop['id'] ?>" class="flex gap-4 group">
                <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden">
                  <img src="<?= $src_pop ?>" alt="Thumb" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                </div>
                <div>
                  <h5 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2 group-hover:text-primary transition">
                    <?= $pop['judul'] ?>
                  </h5>
                  <span class="text-xs text-gray-400">
                    <i class="bi bi-calendar3 me-1"></i> <?= date('d M Y', strtotime($pop['tanggal_posting'])) ?>
                  </span>
                </div>
              </a>
            <?php endwhile; ?>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>