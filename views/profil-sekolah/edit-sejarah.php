<?php require_once("../../controller/profil-sekolah.php");
if (!isset($_GET["p"])) {
  header("Location: sejarah");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM sejarah WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Sejarah";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Sejarah</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["judul"] ?></li>
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
                <input type="hidden" name="id" value="<?= $view_data['id'] ?>">
                <input type="hidden" name="gambar_gedungOld" value="<?= $view_data['gambar_gedung'] ?>">
                <div class="mb-3">
                  <label for="judul" class="form-label required">Judul</label>
                  <input type="text" name="judul" class="form-control" id="judul" minlength="3" value="<?= $view_data['judul'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="konten" class="form-label required">Konten</label>
                  <textarea name="konten" class="form-control" id="konten" rows="5" minlength="10"><?= $view_data['konten'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="gambar_gedung" class="form-label">Gambar Gedung</label>
                  <input type="file" name="gambar_gedung" class="form-control" id="gambar_gedung" accept=".jpg, .jpeg, .png">
                  <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="sejarah" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_sejarah" class="btn btn-warning">Ubah</button>
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