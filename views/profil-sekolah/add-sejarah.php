<?php require_once("../../controller/profil-sekolah.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Sejarah";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Sejarah</li>
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
                <label for="judul" class="form-label required">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" minlength="3" required>
              </div>
              <div class="mb-3">
                <label for="konten" class="form-label required">Konten</label>
                <textarea name="konten" class="form-control" id="konten" rows="5"></textarea>
              </div>
              <div class="mb-3">
                <label for="gambar_gedung" class="form-label required">Gambar Gedung</label>
                <input type="file" name="gambar_gedung" class="form-control" id="gambar_gedung" accept=".jpg, .jpeg, .png" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="sejarah" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_sejarah" class="btn btn-primary">Tambah</button>
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