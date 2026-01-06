<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Informasi PPDB";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Penerimaan Peserta Didik Baru</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Informasi Pendaftaran
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">PPDB</span>
      <span>/</span>
      <span class="text-white">Info Lengkap</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <?php if ($info_ppdb): ?>
      <?php
      $today = date('Y-m-d');
      $tgl_buka = $info_ppdb['tanggal_buka'];
      $tgl_tutup = $info_ppdb['tanggal_tutup'];

      // Status Logic
      $is_open = ($info_ppdb['status'] == 'Buka' && $today >= $tgl_buka && $today <= $tgl_tutup);
      $is_upcoming = ($today < $tgl_buka);
      $is_closed = ($today > $tgl_tutup || $info_ppdb['status'] == 'Tutup');
      ?>

      <div class="flex flex-col lg:flex-row gap-12 items-start">

        <div class="lg:w-8/12 w-full">
          <div class="rounded-3xl overflow-hidden shadow-lg mb-8 bg-white border border-gray-100">
            <img src="<?= $baseURL ?>assets/img/ppdb/<?= $info_ppdb['gambar_banner'] ?>" alt="Banner PPDB" class="w-full h-auto object-cover">
          </div>

          <div class="bg-white rounded-3xl p-8 md:p-10 shadow-sm border border-gray-100">
            <div class="mb-6 border-b border-gray-100 pb-6">
              <h2 class="text-3xl font-bold text-gray-900 mb-2"><?= $info_ppdb['judul'] ?></h2>
              <p class="text-gray-500 text-sm">Diposting oleh Panitia PPDB</p>
            </div>

            <div class="prose prose-lg prose-blue text-gray-600 max-w-none leading-relaxed">
              <?= $info_ppdb['deskripsi'] ?>
            </div>
          </div>
        </div>

        <div class="lg:w-4/12 w-full space-y-8 sticky top-24">

          <div class="bg-white rounded-3xl p-8 shadow-lg border border-gray-100 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-purple-500"></div>

            <?php if ($is_open): ?>
              <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4 animate-pulse">
                <i class="bi bi-unlock-fill"></i>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Pendaftaran Dibuka</h3>
              <p class="text-green-600 font-medium mb-6">Segera daftarkan diri Anda!</p>

              <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Sisa Waktu Pendaftaran</div>
              <div id="countdown" data-date="<?= $tgl_tutup ?>" class="flex justify-center gap-3 mb-8">
                <span class="bg-gray-100 p-2 rounded text-gray-800 font-mono">Loading...</span>
              </div>

              <a href="#" class="block w-full bg-primary text-white py-4 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-500/30 mb-3">
                <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
              </a>

            <?php elseif ($is_upcoming): ?>
              <div class="w-16 h-16 bg-blue-100 text-primary rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                <i class="bi bi-hourglass-split"></i>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Segera Dibuka</h3>
              <p class="text-gray-500 mb-6">Persiapkan berkas Anda dari sekarang.</p>

              <div class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Akan dibuka dalam</div>
              <div id="countdown" data-date="<?= $tgl_buka ?>" class="flex justify-center gap-3 mb-8">
                <span class="bg-gray-100 p-2 rounded text-gray-800 font-mono">Loading...</span>
              </div>

              <button disabled class="block w-full bg-gray-100 text-gray-400 py-4 rounded-xl font-bold cursor-not-allowed">
                Belum Dibuka
              </button>

            <?php else: ?>
              <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                <i class="bi bi-lock-fill"></i>
              </div>
              <h3 class="text-2xl font-bold text-gray-900">Pendaftaran Ditutup</h3>
              <p class="text-red-500 font-medium mb-6">Sampai jumpa di periode berikutnya.</p>

              <button disabled class="block w-full bg-gray-100 text-gray-400 py-4 rounded-xl font-bold cursor-not-allowed">
                Pendaftaran Tutup
              </button>
            <?php endif; ?>

          </div>

          <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
            <h4 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
              <i class="bi bi-calendar-week text-primary"></i> Jadwal Penting
            </h4>
            <ul class="space-y-4">
              <li class="flex justify-between items-center border-b border-gray-50 pb-2">
                <span class="text-gray-500 text-sm">Tanggal Buka</span>
                <span class="font-bold text-gray-900"><?= date('d M Y', strtotime($tgl_buka)) ?></span>
              </li>
              <li class="flex justify-between items-center border-b border-gray-50 pb-2">
                <span class="text-gray-500 text-sm">Tanggal Tutup</span>
                <span class="font-bold text-gray-900"><?= date('d M Y', strtotime($tgl_tutup)) ?></span>
              </li>
            </ul>
          </div>

          <div class="bg-blue-50 rounded-3xl p-6 border border-blue-100 text-center">
            <h4 class="font-bold text-primary mb-2">Butuh Panduan?</h4>
            <p class="text-gray-500 text-sm mb-4">Unduh brosur resmi PPDB untuk informasi persyaratan yang lebih lengkap.</p>
            <a href="<?= $baseURL ?>brosur" class="inline-flex items-center text-primary font-bold hover:underline">
              <i class="bi bi-download me-2"></i> Download Brosur
            </a>
          </div>

        </div>

      </div>
    <?php else: ?>

      <div class="max-w-2xl mx-auto text-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100">
        <div class="w-20 h-20 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
          <i class="bi bi-info-circle"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Informasi Belum Tersedia</h3>
        <p class="text-gray-500">Panitia belum mempublikasikan informasi PPDB untuk periode saat ini.</p>
        <div class="mt-8">
          <a href="<?= $baseURL ?>" class="bg-primary text-white px-6 py-3 rounded-full font-bold hover:bg-blue-600 transition">
            Kembali ke Beranda
          </a>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const countdownEl = document.getElementById('countdown');
    if (countdownEl) {
      const targetDate = new Date(countdownEl.dataset.date + " 23:59:59").getTime();

      const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance < 0) {
          clearInterval(timer);
          countdownEl.innerHTML = "<span class='text-red-500 font-bold'>Waktu Habis</span>";
          return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Template Item Waktu
        const itemClass = "flex flex-col items-center bg-gray-50 p-2 rounded-lg w-16 border border-gray-200";
        const numClass = "text-xl font-bold text-gray-900";
        const labelClass = "text-[10px] uppercase text-gray-400 font-bold";

        countdownEl.innerHTML = `
                    <div class="${itemClass}"><span class="${numClass}">${days}</span><span class="${labelClass}">Hari</span></div>
                    <div class="${itemClass}"><span class="${numClass}">${hours}</span><span class="${labelClass}">Jam</span></div>
                    <div class="${itemClass}"><span class="${numClass}">${minutes}</span><span class="${labelClass}">Mnt</span></div>
                    <div class="${itemClass}"><span class="${numClass}">${seconds}</span><span class="${labelClass}">Dtk</span></div>
                `;

      }, 1000);
    }
  });
</script>

<?php require_once("sections/footer.php"); ?>