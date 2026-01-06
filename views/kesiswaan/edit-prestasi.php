<?php require_once("../../controller/kesiswaan.php");
if (!isset($_GET["p"])) {
  header("Location: prestasi");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM prestasi WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Prestasi";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Prestasi</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_lomba"]  ?></li>
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
                <input type="hidden" name="foto_penyerahanOld" value="<?= $view_data['foto_penyerahan'] ?>">

                <div class="mb-3">
                  <label for="nama_lomba" class="form-label">Nama Lomba <span class="text-danger">*</span></label>
                  <input type="text" name="nama_lomba" class="form-control" value="<?= $view_data['nama_lomba'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="nama_juara" class="form-label">Nama Juara <span class="text-danger">*</span></label>
                  <input type="text" name="nama_juara" class="form-control" value="<?= $view_data['nama_juara'] ?>" required>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="peringkat" class="form-label">Peringkat <span class="text-danger">*</span></label>
                    <select name="peringkat" class="form-control" required>
                      <?php
                      $rank_opts = ['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1', 'Harapan 2', 'Finalis'];
                      foreach ($rank_opts as $rank) {
                        $selected = ($view_data['peringkat'] == $rank) ? 'selected' : '';
                        echo "<option value='$rank' $selected>$rank</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="tingkat" class="form-label">Tingkat <span class="text-danger">*</span></label>
                    <select name="tingkat" class="form-control" required>
                      <?php
                      $level_opts = ['Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
                      foreach ($level_opts as $level) {
                        $selected = ($view_data['tingkat'] == $level) ? 'selected' : '';
                        echo "<option value='$level' $selected>$level</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                  <input type="number" name="tahun" class="form-control" value="<?= $view_data['tahun'] ?>" min="2000" max="2099" required>
                </div>

                <div class="mb-3">
                  <label for="foto_penyerahan" class="form-label">Foto Penyerahan</label>
                  <div class="mb-2">
                    <img src="../../assets/img/prestasi/<?= $view_data['foto_penyerahan'] ?>" class="img-thumbnail" style="height: 100px;">
                  </div>
                  <input type="file" name="foto_penyerahan" class="form-control" accept=".jpg, .jpeg, .png">
                </div>

                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="prestasi" class="btn btn-light-brand">Batal</a>
                  <button type="submit" name="edit_prestasi" class="btn btn-primary">Simpan Perubahan</button>
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