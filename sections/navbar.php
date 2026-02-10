<nav class="bg-white shadow-sm sticky top-0 z-50">
  <div class="container mx-auto px-6 py-4">
    <div class="flex justify-between items-center">

      <a href="<?= $baseURL ?>" class="flex items-center gap-3">
        <img src="<?= $baseURL ?>assets/img/<?= $data_utilities['logo'] ?>" class="w-10 h-10 rounded-lg flex items-center justify-center text-white font-bold text-xl" alt="">
        <div>
          <h1 class="text-lg font-bold text-gray-900 leading-none">SMAN 5</h1>
          <span class="text-xs text-gray-500 font-medium tracking-wider">KOTA KOMBA</span>
        </div>
      </a>

      <div class="hidden md:flex items-center space-x-5 lg:space-x-8">
        <a href="<?= $baseURL ?>" class="text-gray-600 hover:text-primary font-medium transition">Beranda</a>

        <div class="relative group">
          <button class="flex items-center text-gray-600 hover:text-primary font-medium transition focus:outline-none py-2">
            Profil <i class="bi bi-chevron-down ml-1 text-xs"></i>
          </button>
          <div class="absolute left-0 mt-0 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left z-50">
            <div class="py-2">
              <a href="<?= $baseURL ?>sejarah" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-hourglass-split me-2"></i>Sejarah
              </a>
              <a href="<?= $baseURL ?>visi-misi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-bullseye me-2"></i>Visi & Misi
              </a>
              <a href="<?= $baseURL ?>struktur-organisasi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-people me-2"></i>Struktur Organisasi
              </a>
              <a href="<?= $baseURL ?>fasilitas" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-building me-2"></i>Fasilitas
              </a>
            </div>
          </div>
        </div>

        <div class="relative group">
          <button class="flex items-center text-gray-600 hover:text-primary font-medium transition focus:outline-none py-2">
            Akademik <i class="bi bi-chevron-down ml-1 text-xs"></i>
          </button>
          <div class="absolute left-0 mt-0 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left z-50">
            <div class="py-2">
              <a href="<?= $baseURL ?>kurikulum" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-journal-bookmark me-2"></i>Kurikulum
              </a>
              <a href="<?= $baseURL ?>jurusan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-mortarboard me-2"></i>Jurusan
              </a>
              <a href="<?= $baseURL ?>kalender-akademik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-calendar-week me-2"></i>Kalender Akademik
              </a>
            </div>
          </div>
        </div>

        <div class="relative group">
          <button class="flex items-center text-gray-600 hover:text-primary font-medium transition focus:outline-none py-2">
            Kesiswaan <i class="bi bi-chevron-down ml-1 text-xs"></i>
          </button>
          <div class="absolute left-0 mt-0 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left z-50">
            <div class="py-2">
              <a href="<?= $baseURL ?>ekstrakurikuler" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-palette me-2"></i>Ekstrakurikuler
              </a>
              <a href="<?= $baseURL ?>osis-mpk" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-megaphone me-2"></i>OSIS atau MPK
              </a>
              <a href="<?= $baseURL ?>prestasi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-trophy me-2"></i>Prestasi
              </a>
            </div>
          </div>
        </div>

        <div class="relative group">
          <button class="flex items-center text-gray-600 hover:text-primary font-medium transition focus:outline-none py-2">
            PPDB <i class="bi bi-chevron-down ml-1 text-xs"></i>
          </button>
          <div class="absolute left-0 mt-0 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left z-50">
            <div class="py-2">
              <a href="<?= $baseURL ?>info-ppdb" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-info-circle me-2"></i>Informasi Pendaftaran
              </a>
              <a href="<?= $baseURL ?>alur-ppdb" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-diagram-3 me-2"></i>Alur Pendaftaran
              </a>
              <a href="<?= $baseURL ?>brosur" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-primary">
                <i class="bi bi-file-earmark-pdf me-2"></i>Download Brosur
              </a>
            </div>
          </div>
        </div>

        <a href="<?= $baseURL ?>berita" class="text-gray-600 hover:text-primary font-medium transition">Berita</a>
      </div>

      <div class="hidden md:flex items-center gap-4">

        <a href="<?= $baseURL ?>auth/" class="text-gray-600 hover:text-primary font-medium text-sm transition flex items-center gap-2">
          <i class="bi bi-person-circle text-lg"></i>
          Login
        </a>

        <div class="h-6 w-px bg-gray-300"></div>

        <a href="<?= $baseURL ?>kontak" class="bg-primary text-white px-6 py-2.5 rounded-full font-medium hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 text-sm">
          Hubungi Kami
        </a>
      </div>

      <button id="mobile-menu-btn" class="md:hidden text-gray-600 text-2xl focus:outline-none">
        <i class="bi bi-list"></i>
      </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-100 pt-4 max-h-[80vh] overflow-y-auto">
      <div class="flex flex-col space-y-4">
        <a href="<?= $baseURL ?>" class="text-gray-600 hover:text-primary font-medium">Beranda</a>

        <div class="pl-4 border-l-2 border-gray-200">
          <span class="text-xs text-gray-400 font-bold uppercase mb-2 block">Profil Sekolah</span>
          <a href="<?= $baseURL ?>sejarah" class="block text-gray-600 hover:text-primary text-sm mb-2">Sejarah</a>
          <a href="<?= $baseURL ?>visi-misi" class="block text-gray-600 hover:text-primary text-sm mb-2">Visi & Misi</a>
          <a href="<?= $baseURL ?>struktur-organisasi" class="block text-gray-600 hover:text-primary text-sm mb-2">Struktur Organisasi</a>
          <a href="<?= $baseURL ?>fasilitas" class="block text-gray-600 hover:text-primary text-sm mb-2">Fasilitas</a>
        </div>

        <div class="pl-4 border-l-2 border-gray-200">
          <span class="text-xs text-gray-400 font-bold uppercase mb-2 block">Akademik</span>
          <a href="<?= $baseURL ?>kurikulum" class="block text-gray-600 hover:text-primary text-sm mb-2">Kurikulum</a>
          <a href="<?= $baseURL ?>jurusan" class="block text-gray-600 hover:text-primary text-sm mb-2">Jurusan</a>
          <a href="<?= $baseURL ?>kalender-akademik" class="block text-gray-600 hover:text-primary text-sm mb-2">Kalender Akademik</a>
        </div>

        <div class="pl-4 border-l-2 border-gray-200">
          <span class="text-xs text-gray-400 font-bold uppercase mb-2 block">Kesiswaan</span>
          <a href="<?= $baseURL ?>ekstrakurikuler" class="block text-gray-600 hover:text-primary text-sm mb-2">Ekstrakurikuler</a>
          <a href="<?= $baseURL ?>osis-mpk" class="block text-gray-600 hover:text-primary text-sm mb-2">OSIS atau MPK</a>
          <a href="<?= $baseURL ?>prestasi" class="block text-gray-600 hover:text-primary text-sm mb-2">Prestasi</a>
        </div>

        <div class="pl-4 border-l-2 border-gray-200">
          <span class="text-xs text-gray-400 font-bold uppercase mb-2 block">Menu PPDB</span>
          <a href="<?= $baseURL ?>info-ppdb" class="block text-gray-600 hover:text-primary text-sm mb-2">Info Pendaftaran</a>
          <a href="<?= $baseURL ?>alur-ppdb" class="block text-gray-600 hover:text-primary text-sm mb-2">Alur Pendaftaran</a>
          <a href="<?= $baseURL ?>brosur" class="block text-gray-600 hover:text-primary text-sm">Download Brosur</a>
        </div>

        <a href="<?= $baseURL ?>berita" class="text-gray-600 hover:text-primary font-medium">Berita</a>

        <div class="flex flex-col gap-3 mt-4 pt-4 border-t border-gray-100">
          <a href="<?= $baseURL ?>auth/" class="text-center text-primary font-semibold border border-blue-100 bg-blue-50 py-2.5 rounded-lg hover:bg-blue-100 transition">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login Area
          </a>
          <a href="<?= $baseURL ?>kontak" class="bg-primary text-white py-2.5 rounded-lg text-center font-medium shadow-md shadow-blue-500/20">
            Hubungi Kami
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>