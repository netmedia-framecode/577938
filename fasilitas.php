<?php 
require_once("controller/visitor.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Fasilitas Sekolah";
require_once("sections/head.php"); 
require_once("sections/navbar.php"); 
?>

<header class="relative h-[350px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="<?= $baseURL ?>assets/img/school-bg.jpg" alt="Background" class="w-full h-full object-cover filter brightness-50">
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <span class="text-blue-300 font-bold tracking-widest uppercase text-sm mb-2 block animate-fade-in-up">Sarana & Prasarana</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            Fasilitas Sekolah
        </h1>
        
        <div class="inline-flex items-center gap-2 text-gray-300 text-sm bg-white/10 px-4 py-2 rounded-full backdrop-blur-md border border-white/10">
            <a href="<?= $baseURL ?>" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-white">Profil</span>
            <span>/</span>
            <span class="text-white">Fasilitas</span>
        </div>
    </div>
</header>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Penunjang Kegiatan Belajar</h2>
            <p class="text-gray-500 leading-relaxed">
                SMAN 5 Kota Komba berkomitmen menyediakan lingkungan belajar yang nyaman dan lengkap untuk mendukung pengembangan potensi akademik maupun non-akademik siswa.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php if (mysqli_num_rows($query_fasilitas) > 0): ?>
                <?php while ($fasilitas = mysqli_fetch_assoc($query_fasilitas)): ?>
                    <?php 
                        // Logic Cek Gambar
                        $img_path = "assets/img/fasilitas/" . $fasilitas['gambar_fasilitas'];
                        if (!empty($fasilitas['gambar_fasilitas']) && file_exists($img_path)) {
                            $src_fasilitas = $baseURL . $img_path;
                        } else {
                            // Fallback image jika file tidak ada/rusak
                            $src_fasilitas = "https://placehold.co/600x400/e2e8f0/64748b?text=No+Image"; 
                        }
                    ?>

                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col h-full">
                        
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?= $src_fasilitas ?>" alt="<?= $fasilitas['nama_fasilitas'] ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-primary flex items-center justify-center">
                                    <i class="bi bi-building-check"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 line-clamp-1" title="<?= $fasilitas['nama_fasilitas'] ?>">
                                    <?= $fasilitas['nama_fasilitas'] ?>
                                </h3>
                            </div>
                            
                            <div class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3 flex-grow prose prose-sm max-w-none">
                                <?= $fasilitas['deskripsi'] ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                
                <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4 text-gray-400">
                        <i class="bi bi-images text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Belum Ada Data Fasilitas</h3>
                    <p class="text-gray-500 text-sm mt-1">Administrator belum menambahkan data fasilitas sekolah.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>
</section>

<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="container mx-auto px-6 text-center relative z-10">
        <h2 class="text-2xl font-bold text-white mb-4">Ingin Melihat Langsung?</h2>
        <p class="text-blue-100 mb-8 max-w-xl mx-auto">Kami mengundang Anda untuk berkunjung dan melihat lingkungan belajar yang asri dan kondusif di SMAN 5 Kota Komba.</p>
        <a href="<?= $baseURL ?>kontak" class="inline-flex items-center bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-blue-50 transition shadow-lg">
            <i class="bi bi-geo-alt-fill me-2"></i> Lihat Lokasi Sekolah
        </a>
    </div>
</section>

<?php require_once("sections/footer.php"); ?>