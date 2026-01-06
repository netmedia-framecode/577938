<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "OSIS & MPK";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Organisasi Siswa</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      OSIS & MPK
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Kesiswaan</span>
      <span>/</span>
      <span class="text-white">OSIS</span>
    </div>
  </div>
</header>

<section class="py-16 bg-white">
  <div class="container mx-auto px-6 text-center max-w-3xl">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Suara & Aspirasi Siswa</h2>
    <p class="text-gray-500 leading-relaxed mb-8">
      Organisasi Siswa Intra Sekolah (OSIS) dan Majelis Perwakilan Kelas (MPK) SMAN 5 Kota Komba adalah wadah bagi siswa untuk belajar berorganisasi, mengembangkan jiwa kepemimpinan, dan menyalurkan aspirasi demi kemajuan sekolah.
    </p>
    <div class="flex justify-center gap-4">
      <div class="px-6 py-2 bg-blue-50 text-primary rounded-full font-bold text-sm">
        <i class="bi bi-people-fill me-2"></i> Leadership
      </div>
      <div class="px-6 py-2 bg-orange-50 text-orange-500 rounded-full font-bold text-sm">
        <i class="bi bi-lightbulb-fill me-2"></i> Creativity
      </div>
      <div class="px-6 py-2 bg-green-50 text-green-500 rounded-full font-bold text-sm">
        <i class="bi bi-heart-fill me-2"></i> Integrity
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-gray-50 border-t border-gray-100">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16">
      <h2 class="text-3xl font-bold text-gray-900">Struktur Pengurus</h2>
      <p class="text-gray-500 mt-2">Daftar fungsionaris OSIS & MPK Periode Aktif</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

      <?php if (mysqli_num_rows($query_osis) > 0): ?>
        <?php while ($siswa = mysqli_fetch_assoc($query_osis)): ?>
          <?php
          // Logic Cek Gambar Siswa
          $img_path = "assets/img/osis/" . $siswa['foto_siswa'];

          if (!empty($siswa['foto_siswa']) && file_exists($img_path)) {
            $src_siswa = $baseURL . $img_path;
          } else {
            // Avatar Fallback (Warna Orange agar beda dengan Guru)
            $src_siswa = "https://ui-avatars.com/api/?name=" . urlencode($siswa['nama_siswa']) . "&background=fd7e14&color=fff&size=500";
          }
          ?>

          <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full relative">

            <div class="absolute top-4 right-4 z-10">
              <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1 rounded-full shadow-sm border border-gray-100">
                <?= $siswa['periode'] ?>
              </span>
            </div>

            <div class="relative h-72 overflow-hidden bg-orange-50">
              <img src="<?= $src_siswa ?>" alt="<?= $siswa['nama_siswa'] ?>" class="w-full h-full object-cover object-top transform group-hover:scale-110 transition duration-700">

              <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-gray-900/80 to-transparent"></div>

              <div class="absolute bottom-4 left-4 text-white">
                <p class="text-xs font-light uppercase tracking-wider text-orange-200 mb-1">Jabatan</p>
                <p class="text-lg font-bold leading-none"><?= $siswa['jabatan'] ?></p>
              </div>
            </div>

            <div class="p-5 text-center bg-white flex flex-col justify-center flex-grow">
              <h4 class="text-lg font-bold text-gray-900 line-clamp-2" title="<?= $siswa['nama_siswa'] ?>">
                <?= $siswa['nama_siswa'] ?>
              </h4>
              <div class="h-1 w-10 bg-orange-500 mx-auto mt-3 rounded-full"></div>
            </div>

          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
            <i class="bi bi-people text-3xl"></i>
          </div>
          <h3 class="text-lg font-bold text-gray-900">Belum Ada Data Pengurus</h3>
          <p class="text-gray-500 text-sm mt-1">Administrator belum menambahkan struktur organisasi OSIS.</p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="py-20 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6">
    <div class="flex flex-col md:flex-row gap-12 items-center">
      <div class="md:w-1/2">
        <img src="<?= $baseURL ?>assets/img/illustration-team.svg" onerror="this.src='https://placehold.co/500x400/fff7ed/fd7e14?text=OSIS+Team'" alt="Team OSIS" class="w-full h-auto">
      </div>
      <div class="md:w-1/2">
        <h3 class="text-2xl font-bold text-gray-900 mb-4">Program Kerja Unggulan</h3>
        <p class="text-gray-500 mb-6 leading-relaxed">
          OSIS SMAN 5 Kota Komba memiliki berbagai program kerja yang bertujuan untuk mengembangkan potensi siswa, baik akademik maupun non-akademik, serta menumbuhkan kepedulian sosial.
        </p>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="mt-1 text-orange-500"><i class="bi bi-check-circle-fill"></i></div>
            <div>
              <h4 class="font-bold text-gray-900 text-sm">Latihan Dasar Kepemimpinan (LDK)</h4>
              <p class="text-xs text-gray-500">Membentuk karakter pemimpin yang tangguh.</p>
            </div>
          </li>
          <li class="flex items-start gap-3">
            <div class="mt-1 text-orange-500"><i class="bi bi-check-circle-fill"></i></div>
            <div>
              <h4 class="font-bold text-gray-900 text-sm">Pentas Seni & Budaya</h4>
              <p class="text-xs text-gray-500">Ajang unjuk bakat dan pelestarian budaya lokal.</p>
            </div>
          </li>
          <li class="flex items-start gap-3">
            <div class="mt-1 text-orange-500"><i class="bi bi-check-circle-fill"></i></div>
            <div>
              <h4 class="font-bold text-gray-900 text-sm">Bakti Sosial & Lingkungan</h4>
              <p class="text-xs text-gray-500">Program kepedulian terhadap masyarakat sekitar.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>