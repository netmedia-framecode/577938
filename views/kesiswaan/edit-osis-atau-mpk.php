<?php require_once("../../controller/kesiswaan.php");
if (!isset($_GET["p"])) {
  header("Location: osis-atau-mpk");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM osis WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah OSIS atau MPK";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">OSIS atau MPK</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_siswa"] ?></li>
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
                <input type="hidden" name="foto_siswaOld" value="<?= $view_data['foto_siswa'] ?>">
                <div class="mb-3">
                  <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                  <input type="text" name="nama_siswa" class="form-control" value="<?= $view_data['nama_siswa'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                  <select name="jabatan" class="form-control" required>
                    <option value="Ketua OSIS" <?= ($view_data['jabatan'] == 'Ketua OSIS') ? 'selected' : '' ?>>Ketua OSIS</option>
                    <option value="Wakil Ketua OSIS" <?= ($view_data['jabatan'] == 'Wakil Ketua OSIS') ? 'selected' : '' ?>>Wakil Ketua OSIS</option>
                    <option value="Sekretaris" <?= ($view_data['jabatan'] == 'Sekretaris') ? 'selected' : '' ?>>Sekretaris</option>
                    <option value="Bendahara" <?= ($view_data['jabatan'] == 'Bendahara') ? 'selected' : '' ?>>Bendahara</option>
                    <option value="Koordinator Sekbid" <?= ($view_data['jabatan'] == 'Koordinator Sekbid') ? 'selected' : '' ?>>Koordinator Sekbid</option>
                    <option value="Anggota" <?= ($view_data['jabatan'] == 'Anggota') ? 'selected' : '' ?>>Anggota</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="periode" class="form-label">Periode <span class="text-danger">*</span></label>
                  <input type="text" name="periode" class="form-control" value="<?= $view_data['periode'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="foto_siswa" class="form-label">Foto Siswa</label>
                  <div class="mb-2">
                    <img src="../../assets/img/osis/<?= $view_data['foto_siswa'] ?>" class="img-thumbnail" style="height: 100px;">
                  </div>
                  <input type="file" name="foto_siswa" class="form-control" accept=".jpg, .jpeg, .png">
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="osis-atau-mpk" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_osis" class="btn btn-primary">Simpan Perubahan</button>
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