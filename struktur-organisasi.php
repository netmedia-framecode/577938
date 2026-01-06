<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Struktur Organisasi";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Sumber Daya Manusia</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Struktur Organisasi
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Profil</span>
      <span>/</span>
      <span class="text-white">Struktur Organisasi</span>
    </div>
  </div>
</header>

<?php if ($pimpinan): ?>
  <section class="py-20 bg-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1/2 bg-gray-50 skew-y-3 transform -translate-y-10 z-0"></div>

    <div class="container mx-auto px-6 relative z-10">
      <div class="text-center mb-12">
        <h2 class="text-2xl font-bold text-gray-900">Pimpinan Sekolah</h2>
        <div class="w-16 h-1 bg-primary mx-auto rounded-full mt-3"></div>
      </div>

      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">

          <div class="md:w-5/12 relative group bg-gray-100">
            <?php
            $foto_pimpinan = 'default-l.png'; // Default Laki-laki
            if ($pimpinan['jenis_kelamin'] == 'P') $foto_pimpinan = 'default-p.png'; // Default Perempuan

            // Cek jika ada foto asli
            if (!empty($pimpinan['foto']) && file_exists("assets/img/guru/" . $pimpinan['foto'])) {
              $src_pimpinan = $baseURL . "assets/img/guru/" . $pimpinan['foto'];
            } else {
              // Gunakan UI Avatars atau gambar default lokal
              $src_pimpinan = "https://ui-avatars.com/api/?name=" . urlencode($pimpinan['nama']) . "&background=0d6efd&color=fff&size=500";
            }
            ?>
            <img src="<?= $src_pimpinan ?>" alt="<?= $pimpinan['nama'] ?>" class="w-full h-full object-cover min-h-[300px]">
          </div>

          <div class="md:w-7/12 p-8 md:p-12 flex flex-col justify-center">
            <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2">Kepala Sekolah</span>
            <h3 class="text-3xl font-bold text-gray-900 mb-2"><?= $pimpinan['nama'] ?></h3>

            <?php if (!empty($pimpinan['nip']) && $pimpinan['nip'] != '-'): ?>
              <p class="text-gray-500 font-mono text-sm mb-6 bg-gray-100 inline-block px-3 py-1 rounded w-fit">
                NIP. <?= $pimpinan['nip'] ?>
              </p>
            <?php endif; ?>

            <div class="prose text-gray-600">
              <p>
                "Pendidikan adalah senjata paling ampuh yang bisa Anda gunakan untuk mengubah dunia. Di SMAN 5 Kota Komba, kami berkomitmen untuk tidak hanya mencetak siswa yang cerdas secara akademik, tetapi juga memiliki integritas dan karakter yang kuat."
              </p>
            </div>

            <div class="mt-6 flex gap-3">
              <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"><i class="bi bi-envelope"></i></a>
              <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-primary flex items-center justify-center hover:bg-primary hover:text-white transition"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="py-20 bg-gray-50 border-t border-gray-200">
  <div class="container mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-bold text-gray-900">Dewan Guru & Staff</h2>
      <p class="text-gray-500 mt-2">Tenaga pendidik dan kependidikan profesional SMAN 5 Kota Komba</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php if (!empty($data_staff)): ?>
        <?php foreach ($data_staff as $staff): ?>
          <?php
          // Logic Foto
          if (!empty($staff['foto']) && file_exists("assets/img/guru/" . $staff['foto'])) {
            $src_staff = $baseURL . "assets/img/guru/" . $staff['foto'];
          } else {
            // Avatar Fallback (Inisial Nama)
            $bg_color = ($staff['jenis_kelamin'] == 'L') ? '0d6efd' : 'd63384'; // Biru (L), Pink (P)
            $src_staff = "https://ui-avatars.com/api/?name=" . urlencode($staff['nama']) . "&background=" . $bg_color . "&color=fff&size=500";
          }
          ?>

          <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group">
            <div class="relative h-64 overflow-hidden bg-gray-100">
              <img src="<?= $src_staff ?>" alt="<?= $staff['nama'] ?>" class="w-full h-full object-cover object-top transform group-hover:scale-110 transition duration-700">

              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-gray-900/90 to-transparent pt-12">
                <span class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                  <?= $staff['jabatan_atau_mapel'] ?>
                </span>
              </div>
            </div>

            <div class="p-5 text-center">
              <h4 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1" title="<?= $staff['nama'] ?>">
                <?= $staff['nama'] ?>
              </h4>

              <?php if (!empty($staff['nip']) && $staff['nip'] != '-'): ?>
                <p class="text-xs text-gray-400 font-mono">NIP. <?= $staff['nip'] ?></p>
              <?php else: ?>
                <p class="text-xs text-gray-400 font-mono">-</p>
              <?php endif; ?>
            </div>
          </div>

        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-span-full text-center py-12">
          <div class="inline-block p-4 rounded-full bg-gray-100 text-gray-400 mb-4">
            <i class="bi bi-people text-4xl"></i>
          </div>
          <p class="text-gray-500">Data guru dan staff belum tersedia.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="py-16 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6 text-center">
    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bergabung Bersama Kami?</h3>
    <p class="text-gray-500 mb-8 max-w-2xl mx-auto">Kami selalu terbuka untuk tenaga pendidik berkualitas yang memiliki passion tinggi dalam mencerdaskan kehidupan bangsa.</p>
    <a href="<?= $baseURL ?>kontak" class="inline-flex items-center text-primary font-bold hover:text-blue-700 transition">
      Hubungi Tata Usaha <i class="bi bi-arrow-right ml-2"></i>
    </a>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>