<?php require_once("../../controller/profil-sekolah.php");
if (!isset($_GET["p"])) {
  header("Location: visi-&-misi");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM visi_misi WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Visi &amp; Misi";
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
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"]  ?></li>
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
                <input type="hidden" name="id" value="<?= $view_data['id']; ?>">
                <div class="mb-3">
                  <label for="visi" class="form-label">Visi</label>
                  <textarea class="form-control" id="visi" name="visi" rows="3"><?= $view_data['visi']; ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="misi" class="form-label">Misi</label>
                  <textarea class="form-control" id="misi" name="misi" rows="3"><?= $view_data['misi']; ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="tujuan_sekolah" class="form-label">Tujuan Sekolah</label>
                  <textarea class="form-control" id="tujuan_sekolah" name="tujuan_sekolah" rows="5"><?= $view_data['tujuan_sekolah']; ?></textarea>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="visi-&-misi" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_visi_misi" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

  </div>

<?php }
require_once("../../templates/views_bottom.php") ?>