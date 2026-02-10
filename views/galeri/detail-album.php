<?php require_once("../../controller/galeri.php");
if (!isset($_GET["p"])) {
  header("Location: kegiatan-sekolah");
  exit();
}
$id_album = valid($conn, $_GET["p"]);
$album_sql = mysqli_query($conn, "SELECT * FROM album WHERE id = '$id_album'");
$album_data = mysqli_fetch_assoc($album_sql);
$foto_sql = mysqli_query($conn, "SELECT * FROM foto WHERE id_album = '$id_album' ORDER BY id DESC");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Detail Album";
require_once("../../templates/views_top.php");
?>

<div class="nxl-content">

  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10">Album: <?= $album_data['nama_album'] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Galeri</li>
        <li class="breadcrumb-item"><a href="kegiatan-sekolah">Kegiatan Sekolah</a></li>
        <li class="breadcrumb-item">Detail Foto</li>
      </ul>
    </div>
    <div class="page-header-right ms-auto">
      <a href="kegiatan-sekolah" class="btn btn-success">
        <i class="feather-arrow-left me-2"></i> Kembali ke Daftar Album
      </a>
    </div>
  </div>

  <div class="main-content">
    <div class="row">

      <div class="col-lg-4">

        <div class="card">
          <img src="../../assets/img/album/<?= $album_data['cover_album'] ?>" class="card-img-top" alt="Cover" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $album_data['nama_album'] ?></h5>
            <p class="card-text text-muted"><?= $album_data['keterangan'] ?></p>
            <p class="card-text"><small class="text-muted">Dibuat: <?= date('d M Y', strtotime($album_data['created_at'])) ?></small></p>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h6 class="mb-0"><i class="feather-upload-cloud me-2"></i>Upload Foto Baru</h6>
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_album" value="<?= $id_album ?>">
              <div class="mb-3">
                <label class="form-label">Pilih Foto</label>
                <input type="file" name="file_foto" class="form-control" accept=".jpg, .jpeg, .png" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Caption / Keterangan Foto</label>
                <input type="text" name="caption" class="form-control" placeholder="Sedang apa di foto ini?">
              </div>
              <div class="d-grid">
                <button type="submit" name="add_foto" class="btn btn-primary">Upload Foto</button>
              </div>
            </form>
          </div>
        </div>

      </div>

      <div class="col-lg-8">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Galeri Foto (<?= mysqli_num_rows($foto_sql) ?> item)</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <?php if (mysqli_num_rows($foto_sql) > 0) {
                while ($foto = mysqli_fetch_assoc($foto_sql)) { ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="card h-100 border shadow-none">
                      <div style="height: 180px; overflow: hidden; background: #f0f0f0;">
                        <img src="../../assets/img/album/<?= $foto['file_foto'] ?>" class="w-100 h-100" style="object-fit: cover; transition: 0.3s;" alt="Foto">
                      </div>
                      <div class="card-body p-2 d-flex justify-content-between align-items-center">
                        <div class="text-truncate small text-muted" style="max-width: 70%;">
                          <?= $foto['caption'] ? $foto['caption'] : 'Tanpa caption' ?>
                        </div>
                        <form action="" method="post" onsubmit="return confirm('Hapus foto ini?');">
                          <input type="hidden" name="id" value="<?= $foto['id'] ?>">
                          <input type="hidden" name="id_redirect" value="<?= $id_album ?>">
                          <button type="submit" name="delete_foto" class="btn btn-sm btn-light-danger p-1 px-2">
                            <i class="feather-trash-2" style="font-size: 20px;"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php }
              } else { ?>
                <div class="col-12 text-center py-5">
                  <i class="feather-image fs-1 text-muted opacity-50"></i>
                  <p class="text-muted mt-2">Belum ada foto di album ini. Silakan upload di kolom sebelah kiri.</p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<?php require_once("../../templates/views_bottom.php") ?>