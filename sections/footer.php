<footer id="kontak" class="bg-dark text-white pt-20 pb-8 mt-auto">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-16">

      <div class="lg:col-span-2">
        <div class="flex items-center gap-3 mb-6">
          <img src="<?= $baseURL ?>assets/img/<?= $data_utilities['logo'] ?>" class="w-10 h-10 rounded-lg flex items-center justify-center text-white font-bold text-xl" alt="">
          <span class="text-xl font-bold tracking-tight">SMAN 5<br><span class="text-sm font-normal text-gray-400">KOTA KOMBA</span></span>
        </div>
        <p class="text-gray-400 text-sm leading-relaxed mb-6 max-w-sm">
          Mewujudkan pendidikan yang inklusif, berkarakter, dan berkualitas untuk mencetak pemimpin masa depan yang kompetitif di era global.
        </p>
        <div class="flex gap-3">
          <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="bi bi-facebook"></i></a>
          <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="bi bi-instagram"></i></a>
          <a href="#" class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div>
        <h4 class="text-white font-bold mb-6">Tentang Sekolah</h4>
        <ul class="space-y-3 text-sm text-gray-400">
          <li><a href="<?= $baseURL ?>sejarah" class="hover:text-primary transition">Sejarah Singkat</a></li>
          <li><a href="<?= $baseURL ?>visi-misi" class="hover:text-primary transition">Visi & Misi</a></li>
          <li><a href="<?= $baseURL ?>fasilitas" class="hover:text-primary transition">Fasilitas Sekolah</a></li>
          <li><a href="<?= $baseURL ?>kurikulum" class="hover:text-primary transition mt-4 block pt-2 border-t border-gray-800">Kurikulum</a></li>
          <li><a href="<?= $baseURL ?>jurusan" class="hover:text-primary transition">Jurusan</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-6">Informasi</h4>
        <ul class="space-y-3 text-sm text-gray-400">
          <li><a href="<?= $baseURL ?>ekstrakurikuler" class="hover:text-primary transition">Ekstrakurikuler</a></li>
          <li><a href="<?= $baseURL ?>prestasi" class="hover:text-primary transition">Prestasi Siswa</a></li>
          <li><a href="<?= $baseURL ?>#info-ppdb" class="hover:text-primary transition mt-4 block pt-2 border-t border-gray-800">Info PPDB</a></li>
          <li><a href="<?= $baseURL ?>#alur-ppdb" class="hover:text-primary transition">Alur Pendaftaran</a></li>
          <li><a href="<?= $baseURL ?>brosur" class="hover:text-primary transition">Download Brosur</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
        <ul class="space-y-4 text-sm text-gray-400">
          <li class="flex items-start gap-3">
            <i class="bi bi-geo-alt mt-1 text-primary"></i>
            <span>Jl. Pendidikan No. 5, Kota Komba,<br>Nusa Tenggara Timur</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-envelope text-primary"></i>
            <span>info@sman5kotakomba.sch.id</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="bi bi-telephone text-primary"></i>
            <span>(0380) 1234567</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
      <p>&copy; <?= date('Y') ?> SMAN 5 Kota Komba. All rights reserved.</p>
      <p>Developed by NFT Indonesia.</p>
    </div>
  </div>
</footer>

<script>
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');

  if (btn && menu) {
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  }
</script>
</body>

</html>