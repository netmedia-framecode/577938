<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Kalender Akademik";
require_once("sections/head.php");
require_once("sections/navbar.php");

// Helper Function untuk Nama Bulan Indonesia (Local scope)
function bulan_indo($bulan_angka)
{
  $bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  ];
  return $bulan[(int)$bulan_angka];
}
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Agenda Sekolah</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Kalender Akademik
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Akademik</span>
      <span>/</span>
      <span class="text-white">Kalender</span>
    </div>
  </div>
</header>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
      <div class="max-w-2xl">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Jadwal Kegiatan</h2>
        <p class="text-gray-500 leading-relaxed">
          Informasi lengkap mengenai jadwal ujian, libur nasional, kegiatan kesiswaan, dan agenda penting lainnya di SMAN 5 Kota Komba.
        </p>
      </div>

      <a href="#" class="bg-white text-gray-700 border border-gray-200 px-6 py-3 rounded-xl font-bold hover:bg-white hover:text-primary hover:border-primary transition flex items-center shadow-sm">
        <i class="bi bi-file-earmark-pdf text-red-500 text-xl me-2"></i> Download Versi PDF
      </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-12 relative overflow-hidden">
      <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-px bg-gray-200 transform -translate-x-1/2 md:translate-x-0"></div>

      <div class="space-y-12">
        <?php
        if (mysqli_num_rows($query_kalender) > 0):
          $current_month = '';

          while ($row = mysqli_fetch_assoc($query_kalender)):
            // Setup Tanggal
            $start = strtotime($row['tanggal_mulai']);
            $end = strtotime($row['tanggal_selesai']);
            $now = time();

            // Cek Bulan untuk Grouping Header
            $month_key = date('n', $start); // 1-12
            $year_key = date('Y', $start);

            // Logic Status Badge
            if ($now < $start) {
              $status_badge = '<span class="bg-blue-100 text-blue-600 text-xs font-bold px-3 py-1 rounded-full border border-blue-200">Akan Datang</span>';
              $border_color = 'border-l-4 border-blue-500';
            } elseif ($now >= $start && $now <= $end) {
              $status_badge = '<span class="bg-green-100 text-green-600 text-xs font-bold px-3 py-1 rounded-full border border-green-200 animate-pulse">Sedang Berlangsung</span>';
              $border_color = 'border-l-4 border-green-500';
            } else {
              $status_badge = '<span class="bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full border border-gray-200">Selesai</span>';
              $border_color = 'border-l-4 border-gray-300';
            }

            // Tampilkan Header Bulan jika berganti
            if ($current_month != $month_key . $year_key):
              $current_month = $month_key . $year_key;
        ?>
              <div class="relative z-10 text-center py-4">
                <span class="bg-white border border-gray-200 text-gray-800 font-bold px-6 py-2 rounded-full shadow-sm text-sm uppercase tracking-wider">
                  <?= bulan_indo($month_key) . " " . $year_key ?>
                </span>
              </div>
            <?php endif; ?>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 group">

              <div class="w-full md:w-5/12 text-left md:text-right order-2 md:order-1">
                <div class="inline-block">
                  <div class="text-3xl font-bold text-gray-900 leading-none">
                    <?= date('d', $start) ?>
                    <?php if ($start != $end): ?>
                      <span class="text-gray-400 text-xl font-normal">- <?= date('d', $end) ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="text-primary font-bold uppercase text-sm tracking-wider mt-1">
                    <?= bulan_indo(date('n', $start)) ?>
                  </div>
                </div>
              </div>

              <div class="absolute left-0 md:left-1/2 w-4 h-4 bg-white border-4 border-primary rounded-full transform -translate-x-1.5 md:-translate-x-2 mt-1 md:mt-0 order-1 md:order-2"></div>

              <div class="w-full md:w-5/12 pl-8 md:pl-0 order-3">
                <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-100 <?= $border_color ?> group-hover:bg-gray-50">
                  <div class="flex justify-between items-start mb-2">
                    <?= $status_badge ?>

                    <?php
                    $diff = $end - $start;
                    $days = round($diff / (60 * 60 * 24)) + 1;
                    ?>
                    <span class="text-xs text-gray-400"><i class="bi bi-clock me-1"></i> <?= $days ?> Hari</span>
                  </div>

                  <h3 class="text-lg font-bold text-gray-900 mb-2">
                    <?= $row['nama_kegiatan'] ?>
                  </h3>

                  <?php if (!empty($row['keterangan'])): ?>
                    <p class="text-gray-500 text-sm leading-relaxed">
                      <?= $row['keterangan'] ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>

            </div>

          <?php
          endwhile;
        else:
          ?>
          <div class="text-center py-10 relative z-10 bg-white">
            <div class="inline-block p-4 rounded-full bg-gray-50 mb-4">
              <i class="bi bi-calendar-x text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900">Tidak Ada Agenda</h3>
            <p class="text-gray-500">Belum ada data kalender akademik yang ditambahkan.</p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>