<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Beranda";
require_once("sections/head.php");
require_once("sections/navbar.php"); // Include Navbar di sini
?>

<header class="relative h-[700px] flex items-center justify-center overflow-hidden group">
  <div class="absolute inset-0 z-0 overflow-hidden">
    <img src="assets/img/school-bg.jpg" alt="Sekolah" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/60 to-transparent"></div>
  </div>

  <div class="container mx-auto px-6 relative z-10 pt-10">
    <div class="max-w-3xl text-white">
      <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-sm font-medium mb-6 backdrop-blur-md animate-fade-in-down">
        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
        Terakreditasi A (Unggul)
      </div>

      <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight tracking-tight">
        Mencetak Generasi <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Berprestasi & Berakhlak</span>
      </h1>

      <p class="text-lg text-gray-300 mb-8 leading-relaxed max-w-xl">
        SMAN 5 Kota Komba hadir sebagai lembaga pendidikan yang mengintegrasikan kecerdasan akademik dengan nilai-nilai karakter untuk masa depan yang gemilang.
      </p>

      <div class="flex flex-col sm:flex-row gap-4">
        <?php if ($info_ppdb && $info_ppdb['status'] == 'Buka') : ?>
          <a href="#info-ppdb" class="bg-primary text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-600 transition shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2 transform hover:-translate-y-1">
            Daftar PPDB Sekarang <i class="bi bi-arrow-right"></i>
          </a>
        <?php else: ?>
          <a href="#profil" class="bg-primary text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-600 transition shadow-lg shadow-blue-600/30 flex items-center justify-center gap-2">
            Jelajahi Profil <i class="bi bi-arrow-down"></i>
          </a>
        <?php endif; ?>

        <a href="jurusan" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-gray-900 transition flex items-center justify-center gap-2">
          <i class="bi bi-mortarboard"></i> Lihat Jurusan
        </a>
      </div>
    </div>
  </div>
</header>

<section id="profil" class="py-24 bg-white">
  <div class="container mx-auto px-6">
    <div class="flex flex-col lg:flex-row items-center gap-16">
      <div class="lg:w-1/2 relative">
        <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
          <img src="assets/img/kepsek.jpg" alt="Kepala Sekolah" class="w-full h-auto object-cover transform hover:scale-105 transition duration-500">

          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900/90 to-transparent p-6 text-white">
            <h3 class="text-xl font-bold">Drs. Nama Kepala Sekolah, M.Pd.</h3>
            <p class="text-blue-300 text-sm">Kepala SMAN 5 Kota Komba</p>
          </div>
        </div>
      </div>

      <div class="lg:w-1/2">
        <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Sambutan Kepala Sekolah</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 leading-tight">Mewujudkan Pendidikan Berkualitas untuk Semua</h2>

        <div class="prose prose-lg text-gray-600 mb-8">
          <p>
            "Selamat datang di website resmi SMAN 5 Kota Komba. Kami berkomitmen untuk memberikan layanan pendidikan terbaik yang adaptif terhadap perkembangan teknologi namun tetap memegang teguh nilai-nilai budaya dan karakter bangsa."
          </p>
          <p>
            Melalui website ini, kami berharap dapat menjalin komunikasi yang lebih baik dengan seluruh masyarakat, orang tua, dan peserta didik. Mari bersama-sama memajukan pendidikan Indonesia.
          </p>
        </div>

        <a href="sejarah" class="inline-flex items-center text-primary font-semibold hover:text-blue-700 transition gap-2 group">
          Baca Sejarah Sekolah
          <i class="bi bi-arrow-right transform group-hover:translate-x-1 transition"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<section id="jurusan" class="py-24 bg-gray-50 relative overflow-hidden">
  <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-50/50 skew-x-12 transform translate-x-20"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16">
      <span class="text-primary font-bold tracking-wider uppercase text-sm">Program Akademik</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Pilihan Jurusan & Peminatan</h2>
      <p class="text-gray-500 max-w-2xl mx-auto">Kami menyediakan program peminatan yang dirancang untuk mempersiapkan siswa melanjutkan ke jenjang pendidikan tinggi sesuai bakat dan minat.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
          <i class="bi bi-atom"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">MIPA (Ilmu Alam)</h3>
        <p class="text-gray-500 mb-6 text-sm leading-relaxed">Fokus pada penguasaan konsep sains, matematika, dan teknologi. Cocok untuk calon dokter, insinyur, dan ilmuwan.</p>
        <a href="jurusan" class="text-sm font-semibold text-gray-900 hover:text-primary transition flex items-center gap-1">Pelajari Lebih Lanjut <i class="bi bi-chevron-right text-xs"></i></a>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
        <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors">
          <i class="bi bi-globe-asia-australia"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">IPS (Ilmu Sosial)</h3>
        <p class="text-gray-500 mb-6 text-sm leading-relaxed">Mempelajari interaksi sosial, ekonomi, dan sejarah. Mempersiapkan pemimpin masa depan, ahli hukum, dan ekonom.</p>
        <a href="jurusan" class="text-sm font-semibold text-gray-900 hover:text-primary transition flex items-center gap-1">Pelajari Lebih Lanjut <i class="bi bi-chevron-right text-xs"></i></a>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
        <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-purple-500 group-hover:text-white transition-colors">
          <i class="bi bi-translate"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3">IBB (Bahasa & Budaya)</h3>
        <p class="text-gray-500 mb-6 text-sm leading-relaxed">Mendalami bahasa asing, sastra, dan antropologi. Membuka peluang karir di hubungan internasional dan pariwisata.</p>
        <a href="jurusan" class="text-sm font-semibold text-gray-900 hover:text-primary transition flex items-center gap-1">Pelajari Lebih Lanjut <i class="bi bi-chevron-right text-xs"></i></a>
      </div>
    </div>
  </div>
</section>

<section id="info-ppdb" class="py-24 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
      <div>
        <span class="text-primary font-bold tracking-wider uppercase text-sm">Penerimaan Siswa Baru</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Informasi PPDB</h2>
      </div>

      <?php if ($info_ppdb && $info_ppdb['status'] == 'Buka'): ?>
        <div class="flex items-center gap-2">
          <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
          </span>
          <span class="text-green-600 font-bold text-sm bg-green-50 px-3 py-1 rounded-full border border-green-100">Pendaftaran Sedang Dibuka</span>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($info_ppdb) : ?>
      <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row text-white">
        <div class="lg:w-1/2 relative min-h-[300px]">
          <img src="assets/img/ppdb/<?= $info_ppdb['gambar_banner'] ?>" alt="Banner PPDB" class="absolute inset-0 w-full h-full object-cover opacity-80 hover:opacity-100 transition duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent lg:bg-gradient-to-r"></div>
        </div>

        <div class="lg:w-1/2 p-8 md:p-12 flex flex-col justify-center relative z-10">
          <h3 class="text-2xl md:text-3xl font-bold mb-6 text-white"><?= $info_ppdb['judul'] ?></h3>

          <div class="prose prose-invert text-gray-300 mb-8 max-w-none line-clamp-4">
            <?= $info_ppdb['deskripsi'] ?>
          </div>

          <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
              <p class="text-xs text-gray-400 uppercase font-bold mb-1">Mulai</p>
              <p class="font-bold text-lg text-white"><?= format_tanggal($info_ppdb['tanggal_buka']) ?></p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
              <p class="text-xs text-gray-400 uppercase font-bold mb-1">Selesai</p>
              <p class="font-bold text-lg text-white"><?= format_tanggal($info_ppdb['tanggal_tutup']) ?></p>
            </div>
          </div>

          <?php if ($info_ppdb['status'] == 'Buka'): ?>
            <div class="flex gap-4">
              <a href="#" class="flex-1 bg-primary text-white text-center py-4 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-900/50">
                Daftar Sekarang
              </a>
              <a href="brosur" class="px-6 py-4 border border-white/20 rounded-xl font-bold hover:bg-white/10 transition flex items-center justify-center">
                <i class="bi bi-download text-xl"></i>
              </a>
            </div>
          <?php else: ?>
            <div class="bg-red-500/20 border border-red-500/30 p-4 rounded-xl text-center text-red-200">
              <i class="bi bi-lock-fill mr-2"></i> Pendaftaran saat ini ditutup.
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php else : ?>
      <div class="text-center py-16 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
        <i class="bi bi-calendar-x text-5xl text-gray-300 mb-4 block"></i>
        <p class="text-gray-500 font-medium">Belum ada jadwal PPDB yang aktif.</p>
      </div>
    <?php endif; ?>

    <div class="mt-12 text-center">
      <a href="index#alur-ppdb" class="inline-flex items-center text-gray-500 hover:text-primary transition font-medium">
        Lihat Alur Pendaftaran <i class="bi bi-arrow-down ml-2 animate-bounce"></i>
      </a>
    </div>
  </div>
</section>

<section id="alur-ppdb" class="py-24 bg-gray-50">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <span class="text-primary font-bold tracking-wider uppercase text-sm">Panduan</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Alur Pendaftaran</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php if (mysqli_num_rows($views_alur_ppdb) > 0): ?>
        <?php while ($alur = mysqli_fetch_assoc($views_alur_ppdb)) { ?>
          <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 relative group">
            <div class="absolute top-4 right-4 text-4xl font-black text-gray-100 group-hover:text-blue-50 transition-colors select-none">
              <?= $alur['urutan'] ?>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-primary rounded-xl flex items-center justify-center mb-4 text-xl group-hover:bg-primary group-hover:text-white transition-colors">
              <img src="assets/img/icon/<?= $alur['gambar_icon'] ?>" class="w-6 h-6 object-contain" alt="icon">
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2"><?= $alur['judul_langkah'] ?></h3>
            <p class="text-gray-500 text-sm leading-relaxed"><?= $alur['deskripsi'] ?></p>
          </div>
        <?php } ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="berita" class="py-24 bg-white">
  <div class="container mx-auto px-6">
    <div class="flex justify-between items-end mb-12">
      <div>
        <span class="text-primary font-bold tracking-wider uppercase text-sm">Kabar Sekolah</span>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Berita & Artikel</h2>
      </div>
      <a href="berita" class="hidden md:inline-flex items-center text-primary font-semibold hover:text-blue-700 transition gap-2">
        Lihat Semua Berita <i class="bi bi-arrow-right"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php if ($query_berita_index && mysqli_num_rows($query_berita_index) > 0): ?>
        <?php while ($berita = mysqli_fetch_assoc($query_berita_index)) { ?>
          <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full group">
            <div class="relative h-48 overflow-hidden">
              <img src="assets/img/berita/<?= $berita['gambar'] ?>" alt="<?= $berita['judul'] ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
              <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-lg text-xs font-bold text-gray-900 shadow-sm">
                <?= date('d M Y', strtotime($berita['tanggal'])) ?>
              </div>
            </div>

            <div class="p-6 flex flex-col flex-grow">
              <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-primary transition-colors">
                <a href="detail-berita?id_berita=<?= $berita['id'] ?>">
                  <?= $berita['judul'] ?>
                </a>
              </h3>
              <p class="text-gray-500 text-sm mb-6 line-clamp-3 flex-grow">
                <?= strip_tags(substr($berita['isi'], 0, 150)) ?>...
              </p>
              <a href="detail-berita?id_berita=<?= $berita['id'] ?>" class="inline-flex items-center text-sm font-semibold text-primary hover:text-blue-700 transition">
                Baca Selengkapnya <i class="bi bi-chevron-right ml-1 text-xs"></i>
              </a>
            </div>
          </article>
        <?php } ?>
      <?php else: ?>
        <?php for ($i = 1; $i <= 3; $i++): ?>
          <article class="bg-gray-50 rounded-2xl border border-dashed border-gray-200 p-8 text-center flex flex-col items-center justify-center opacity-75">
            <i class="bi bi-newspaper text-4xl text-gray-300 mb-4"></i>
            <h3 class="font-bold text-gray-400">Belum ada berita</h3>
            <p class="text-sm text-gray-400 mt-2">Nantikan update terbaru dari kami.</p>
          </article>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    <div class="mt-12 text-center md:hidden">
      <a href="berita" class="btn bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition">
        Lihat Semua Berita
      </a>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php") ?>