<?php require_once("../../controller/galeri.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Kegiatan Sekolah";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kegiatan Sekolah</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-8">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama_album" class="form-label">Nama Album / Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="nama_album" class="form-control" id="nama_album" placeholder="Contoh: Perayaan HUT RI ke-80" required>
              </div>
              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan Singkat</label>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="4" placeholder="Deskripsi singkat mengenai kegiatan ini..."></textarea>
              </div>
              <div class="mb-3">
                <label for="cover_album" class="form-label">Cover Album <span class="text-danger">*</span></label>
                <input type="file" name="cover_album" class="form-control" id="cover_album" accept=".jpg, .jpeg, .png" required>
                <small class="text-muted">Gambar sampul depan album. Format: JPG/PNG.</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="kegiatan-sekolah" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_album" class="btn btn-primary">Simpan Album</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>