<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Alur Pendaftaran";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Panduan PPDB</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Alur Pendaftaran
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">PPDB</span>
      <span>/</span>
      <span class="text-white">Alur Pendaftaran</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50 overflow-hidden">
  <div class="container mx-auto px-6">

    <div class="text-center mb-16 max-w-3xl mx-auto">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Mekanisme Pendaftaran</h2>
      <p class="text-gray-500 leading-relaxed">
        Ikuti langkah-langkah berikut untuk menjadi bagian dari keluarga besar SMAN 5 Kota Komba. Pastikan Anda melengkapi setiap tahapan sesuai jadwal yang ditentukan.
      </p>
    </div>

    <div class="relative max-w-5xl mx-auto">
      <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-1 bg-gray-200 rounded-full"></div>
      <div class="md:hidden absolute left-6 top-0 bottom-0 w-1 bg-gray-200 rounded-full"></div>

      <div class="space-y-12">
        <?php
        if (mysqli_num_rows($views_alur_ppdb) > 0):
          $counter = 1;
          while ($alur = mysqli_fetch_assoc($views_alur_ppdb)):
            // Cek Ganjil/Genap untuk Layout Zig-zag
            $is_even = ($counter % 2 == 0);
            $alignment_class = $is_even ? 'md:flex-row-reverse' : 'md:flex-row';
            $text_align = $is_even ? 'md:text-right' : 'md:text-left';
            $fade_dir = $is_even ? 'fade-left' : 'fade-right'; // Opsional untuk animasi
        ?>

            <div class="relative flex flex-col md:flex-row items-center justify-between gap-8 <?= $alignment_class ?>">

              <div class="w-full md:w-5/12 pl-16 md:pl-0 <?= $text_align ?>">
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-lg transition border border-gray-100 relative group">
                  <?php if ($is_even): ?>
                    <div class="hidden md:block absolute top-1/2 -right-2 w-4 h-4 bg-white border-t border-r border-gray-100 transform rotate-45 -translate-y-1/2"></div>
                  <?php else: ?>
                    <div class="hidden md:block absolute top-1/2 -left-2 w-4 h-4 bg-white border-b border-l border-gray-100 transform rotate-45 -translate-y-1/2"></div>
                  <?php endif; ?>

                  <div class="inline-block bg-blue-50 text-primary font-bold px-3 py-1 rounded-lg text-xs mb-3">
                    Langkah <?= $alur['urutan'] ?>
                  </div>
                  <h3 class="text-xl font-bold text-gray-900 mb-2"><?= $alur['judul_langkah'] ?></h3>
                  <p class="text-gray-500 text-sm leading-relaxed">
                    <?= $alur['deskripsi'] ?>
                  </p>
                </div>
              </div>

              <div class="absolute left-6 md:left-1/2 transform -translate-x-1/2 w-12 h-12 bg-primary border-4 border-white rounded-full flex items-center justify-center shadow-lg z-10">
                <?php
                $icon_path = "assets/img/icon/" . $alur['gambar_icon'];
                if (!empty($alur['gambar_icon']) && file_exists($icon_path)):
                ?>
                  <img src="<?= $baseURL . $icon_path ?>" alt="Icon" class="w-6 h-6 object-contain filter brightness-0 invert">
                <?php else: ?>
                  <i class="bi bi-check-lg text-white font-bold text-lg"></i>
                <?php endif; ?>
              </div>

              <div class="w-full md:w-5/12 hidden md:block"></div>

            </div>

          <?php
            $counter++;
          endwhile;
        else:
          ?>
          <div class="text-center py-10 bg-white rounded-xl border border-gray-200">
            <p class="text-gray-500">Data alur pendaftaran belum tersedia.</p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<section class="py-16 bg-white border-t border-gray-200">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Masih Bingung dengan Alurnya?</h2>
    <p class="text-gray-500 mb-8 max-w-2xl mx-auto">
      Jangan ragu untuk menghubungi panitia PPDB kami atau unduh panduan lengkap dalam format PDF.
    </p>
    <div class="flex justify-center gap-4">
      <a href="<?= $baseURL ?>brosur" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-500/30">
        <i class="bi bi-download me-2"></i> Download Panduan PDF
      </a>
      <a href="<?= $baseURL ?>kontak" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-full font-bold hover:bg-gray-200 transition">
        Hubungi Panitia
      </a>
    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>