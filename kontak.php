<?php
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Hubungi Kami";
require_once("sections/head.php");
require_once("sections/navbar.php");
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0 z-0">
    <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
  </div>

  <div class="container mx-auto px-6 relative z-10 text-center">
    <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Layanan Informasi</span>
    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
      Hubungi Kami
    </h1>

    <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
      <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
      <span>/</span>
      <span class="text-white">Kontak</span>
    </div>
  </div>
</header>

<section class="py-16 bg-white -mt-16 relative z-20">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
        <div class="w-16 h-16 bg-blue-50 text-primary rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
          <i class="bi bi-geo-alt-fill"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Alamat Sekolah</h3>
        <p class="text-gray-500 text-sm leading-relaxed">
          Jl. Pendidikan No. 5, Kota Komba,<br>Kabupaten Manggarai Timur,<br>Nusa Tenggara Timur
        </p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
        <div class="w-16 h-16 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
          <i class="bi bi-telephone-fill"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Telepon / WhatsApp</h3>
        <p class="text-gray-500 text-sm leading-relaxed">
          (0380) 1234567<br>
          +62 812-3456-7890 (Humas)
        </p>
      </div>

      <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center hover:-translate-y-2 transition duration-300">
        <div class="w-16 h-16 bg-orange-50 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
          <i class="bi bi-envelope-fill"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Email Resmi</h3>
        <p class="text-gray-500 text-sm leading-relaxed">
          info@sman5kotakomba.sch.id<br>
          ppdb@sman5kotakomba.sch.id
        </p>
      </div>

    </div>
  </div>
</section>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <?php if ($status_pesan == 'success'): ?>
      <div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-8 flex items-center gap-3" role="alert">
        <i class="bi bi-check-circle-fill text-xl"></i>
        <div>
          <strong class="font-bold">Pesan Terkirim!</strong>
          <span class="block sm:inline">Terima kasih telah menghubungi kami. Kami akan membalas secepatnya.</span>
        </div>
      </div>
    <?php elseif ($status_pesan == 'error'): ?>
      <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-8 flex items-center gap-3" role="alert">
        <i class="bi bi-exclamation-triangle-fill text-xl"></i>
        <div>
          <strong class="font-bold">Gagal Mengirim!</strong>
          <span class="block sm:inline">Terjadi kesalahan sistem. Silakan coba lagi nanti.</span>
        </div>
      </div>
    <?php endif; ?>

    <div class="flex flex-col lg:flex-row gap-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

      <div class="lg:w-1/2 p-8 md:p-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
        <p class="text-gray-500 mb-8 text-sm">
          Punya pertanyaan seputar PPDB atau informasi sekolah? Silakan isi formulir di bawah ini.
        </p>

        <form action="" method="POST" class="space-y-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="space-y-1">
              <label for="nama" class="text-sm font-bold text-gray-700">Nama Lengkap</label>
              <input type="text" name="nama" id="nama" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition" placeholder="Nama Anda">
            </div>
            <div class="space-y-1">
              <label for="email" class="text-sm font-bold text-gray-700">Alamat Email</label>
              <input type="email" name="email" id="email" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition" placeholder="email@contoh.com">
            </div>
          </div>

          <div class="space-y-1">
            <label for="subjek" class="text-sm font-bold text-gray-700">Subjek</label>
            <select name="subjek" id="subjek" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition">
              <option value="Informasi PPDB">Informasi PPDB</option>
              <option value="Akademik">Pertanyaan Akademik</option>
              <option value="Kerjasama">Tawaran Kerjasama</option>
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <div class="space-y-1">
            <label for="pesan" class="text-sm font-bold text-gray-700">Pesan Anda</label>
            <textarea name="pesan" id="pesan" rows="4" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-primary focus:bg-white transition" placeholder="Tuliskan pesan Anda di sini..."></textarea>
          </div>

          <button type="submit" name="kirim_pesan" class="w-full bg-primary text-white py-3.5 rounded-xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2">
            <i class="bi bi-send-fill"></i> Kirim Pesan Sekarang
          </button>
        </form>
      </div>

      <div class="lg:w-1/2 relative min-h-[400px] bg-gray-200">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63089.47167683935!2d120.73045355!3d-8.75628465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db44d03d077f1b5%3A0x4030bfbcaf77170!2sKota%20Komba%2C%20East%20Manggarai%20Regency%2C%20East%20Nusa%20Tenggara!5e0!3m2!1sen!2sid!4v1709692482594!5m2!1sen!2sid"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="absolute inset-0 w-full h-full grayscale hover:grayscale-0 transition duration-500">
        </iframe>

        <div class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-md p-4 rounded-xl shadow-lg border border-white/50">
          <h4 class="font-bold text-gray-900 text-sm flex items-center gap-2">
            <i class="bi bi-pin-map-fill text-red-500"></i> Lokasi Sekolah
          </h4>
          <p class="text-xs text-gray-500 mt-1">Gunakan peta untuk navigasi langsung ke lokasi kami.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php require_once("sections/footer.php"); ?>