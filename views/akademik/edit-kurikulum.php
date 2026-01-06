<?php require_once("../../controller/akademik.php");
if (!isset($_GET["p"])) {
  header("Location: kurikulum");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM info_kurikulum WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Kurikulum";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Kurikulum</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["judul"]  ?></li>
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
                <div class="mb-3">
                  <label for="judul" class="form-label">Judul Kurikulum <span class="text-danger">*</span></label>
                  <input type="text" name="judul" class="form-control" id="judul" value="<?= $view_data['judul'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="tahun_ajaran" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                  <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="<?= $view_data['tahun_ajaran'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi_umum" class="form-label">Deskripsi Umum</label>
                  <textarea name="deskripsi_umum" class="form-control" id="deskripsi_umum" rows="5"><?= $view_data['deskripsi_umum'] ?></textarea>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="kurikulum" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_info_kurikulum" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <style>
      .ck-editor__editable_inline {
        min-height: 250px;
      }
    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('#deskripsi_umum')) {
          ClassicEditor
            .create(document.querySelector('#deskripsi_umum'), {
              toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
              console.error(error);
            });
        }
      });
    </script>
  </div>

<?php }
require_once("../../templates/views_bottom.php") ?>