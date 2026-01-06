<?php require_once("../../controller/profil-sekolah.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Visi &amp; Misi";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Visi &amp; Misi</li>
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
            <form action="" method="post">
              <div class="mb-3">
                <label for="visi" class="form-label">Visi</label>
                <textarea class="form-control" id="visi" name="visi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                <textarea class="form-control" id="misi" name="misi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="tujuan_sekolah" class="form-label">Tujuan Sekolah</label>
                <textarea class="form-control" id="tujuan_sekolah" name="tujuan_sekolah" rows="5"></textarea>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="visi-&-misi" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_visi_misi" class="btn btn-primary">Tambah</button>
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