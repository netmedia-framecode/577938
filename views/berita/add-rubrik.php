<?php require_once("../../controller/berita.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Rubrik";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Rubrik</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-4">
                <label for="nama_kategori" class="form-label">Nama Rubrik / Kategori <span class="text-danger">*</span></label>
                <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Contoh: Pengumuman, Prestasi, Artikel, dll" required autofocus>
                <small class="text-muted">Gunakan nama yang singkat dan jelas.</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="rubrik" class="btn btn-light-brand">Batal</a>
                <button type="submit" name="add_kategori_berita" class="btn btn-primary">Simpan Rubrik</button>
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