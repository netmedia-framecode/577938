<?php require_once("../../controller/galeri.php");
if (!isset($_GET["p"])) {
  header("Location: menu");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM album WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Kegiatan Sekolah";
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
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_album"]  ?></li>
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
                <input type="hidden" name="cover_albumOld" value="<?= $view_data['cover_album'] ?>">
                <div class="mb-3">
                  <label for="nama_album" class="form-label">Nama Album / Kegiatan <span class="text-danger">*</span></label>
                  <input type="text" name="nama_album" class="form-control" value="<?= $view_data['nama_album'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan Singkat</label>
                  <textarea name="keterangan" class="form-control" rows="4"><?= $view_data['keterangan'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="cover_album" class="form-label">Cover Album</label>
                  <div class="mb-3 p-2 border rounded bg-light d-inline-block">
                    <img src="../../assets/img/album/<?= $view_data['cover_album'] ?>" alt="Preview" class="img-fluid" style="max-height: 150px; border-radius: 4px;">
                    <div class="small text-muted mt-1 text-center">Cover saat ini</div>
                  </div>
                  <input type="file" name="cover_album" class="form-control" accept=".jpg, .jpeg, .png">
                  <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengubah cover.</small>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="kegiatan-sekolah" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_album" class="btn btn-primary">Simpan Perubahan</button>
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