<?php require_once("../../controller/kesiswaan.php");
if (!isset($_GET["p"])) {
  header("Location: menu");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM ekstrakurikuler WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Ekstrakurikuler";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Ekstrakurikuler</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_ekskul"] ?></li>
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
              <form action="ekstrakurikuler" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $view_data['id'] ?>">
                <input type="hidden" name="foto_kegiatanOld" value="<?= $view_data['foto_kegiatan'] ?>">
                <div class="mb-3">
                  <label for="nama_ekskul" class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                  <input type="text" name="nama_ekskul" class="form-control" value="<?= $view_data['nama_ekskul'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="nama_pembina" class="form-label">Nama Pembina <span class="text-danger">*</span></label>
                  <input type="text" name="nama_pembina" class="form-control" value="<?= $view_data['nama_pembina'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                  <input type="text" name="jadwal_latihan" class="form-control" value="<?= $view_data['jadwal_latihan'] ?>">
                </div>
                <div class="mb-3">
                  <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                  <textarea name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan" rows="5"><?= $view_data['deskripsi_kegiatan'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="foto_kegiatan" class="form-label">Foto Kegiatan</label>
                  <div class="mb-3 p-2 border rounded bg-light d-inline-block">
                    <img src="../../assets/img/ekstrakurikuler/<?= $view_data['foto_kegiatan'] ?>" alt="Preview" class="img-fluid" style="max-height: 150px;">
                  </div>
                  <input type="file" name="foto_kegiatan" class="form-control" accept=".jpg, .jpeg, .png">
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="ekstrakurikuler" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_ekstrakurikuler" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

  </div>

  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <style>
    .ck-editor__editable_inline {
      min-height: 200px;
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      if (document.querySelector('#deskripsi_kegiatan')) {
        ClassicEditor
          .create(document.querySelector('#deskripsi_kegiatan'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
          })
          .catch(error => {
            console.error(error);
          });
      }
    });
  </script>
<?php }
require_once("../../templates/views_bottom.php") ?>