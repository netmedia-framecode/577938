<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Download Brosur";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Dokumen & Panduan</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Download Brosur
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">PPDB</span>
      <span>/</span>
      <span class="text-white">Brosur</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16 max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Arsip Dokumen Resmi</h2>
      <p class="text-gray-500 leading-relaxed">
        Silakan unduh brosur informasi, panduan teknis pendaftaran, dan format surat pernyataan yang diperlukan untuk proses Penerimaan Peserta Didik Baru.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <?php if (mysqli_num_rows($query_brosur) > 0): ?>
        <?php while ($file = mysqli_fetch_assoc($query_brosur)): ?>
          <?php
          // --- LOGIKA DETEKSI TIPE FILE ---
          $ext = pathinfo($file['nama_file'], PATHINFO_EXTENSION);
          $is_pdf = (strtolower($ext) == 'pdf');

          // Set Icon & Warna berdasarkan tipe
          if ($is_pdf) {
            $icon = 'bi-file-earmark-pdf';
            $icon_color = 'text-red-500';
            $bg_icon = 'bg-red-50';
            $label_type = 'PDF Document';
          } else {
            $icon = 'bi-file-earmark-image';
            $icon_color = 'text-blue-500';
            $bg_icon = 'bg-blue-50';
            $label_type = 'Image File';
          }
          ?>

          <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 group flex items-start gap-5">

            <div class="flex-shrink-0 w-16 h-16 <?= $bg_icon ?> <?= $icon_color ?> rounded-xl flex items-center justify-center text-3xl group-hover:scale-110 transition duration-300">
              <i class="<?= $icon ?>"></i>
            </div>

            <div class="flex-grow min-w-0">
              <div class="flex items-center justify-between mb-1">
                <span class="text-[10px] font-bold uppercase text-gray-400 tracking-wider border border-gray-200 px-2 py-0.5 rounded">
                  <?= $label_type ?>
                </span>
                <span class="text-xs text-gray-400 font-mono">
                  <?= $file['ukuran_file'] ?>
                </span>
              </div>

              <h3 class="text-lg font-bold text-gray-900 mb-1 leading-snug line-clamp-2 group-hover:text-primary transition-colors" title="<?= $file['judul_file'] ?>">
                <?= $file['judul_file'] ?>
              </h3>

              <p class="text-xs text-gray-400 mb-4 flex items-center gap-1">
                <i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($file['tanggal_upload'])) ?>
              </p>

              <a href="<?= $baseURL ?>assets/files/<?= $file['nama_file'] ?>" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-blue-700 transition" download>
                <i class="bi bi-download"></i> Download File
              </a>
            </div>
          </div>

        <?php endwhile; ?>
      <?php else: ?>

        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
            <i class="bi bi-folder-x text-3xl"></i>
          </div>
          <h3 class="text-lg font-bold text-gray-900">Belum Ada Dokumen</h3>
          <p class="text-gray-500 text-sm mt-1">Administrator belum mengunggah file atau brosur apapun.</p>
        </div>

      <?php endif; ?>

    </div>
  </div>
</section>

<section class="py-16 bg-white border-t border-gray-100">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Mengalami Kendala Unduhan?</h2>
    <p class="text-gray-500 mb-8 max-w-xl mx-auto">
      Jika Anda tidak dapat mengunduh file di atas atau membutuhkan informasi lebih lanjut, silakan hubungi layanan bantuan kami.
    </p>
    <a href="<?= $baseURL ?>kontak" class="inline-flex items-center bg-gray-100 text-gray-700 px-8 py-3 rounded-full font-bold hover:bg-gray-200 transition">
      <i class="bi bi-whatsapp me-2"></i> Hubungi Admin
    </a>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>