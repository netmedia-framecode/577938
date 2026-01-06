<?php require_once("../../controller/informasi-ppdb.php");
if (!isset($_GET["p"])) {
  header("Location: alur-pendaftaran");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM alur_ppdb WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Alur Pendaftaran";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Alur Pendaftaran</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["judul_langkah"] ?></li>
        </ul>
      </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
      <div class="row">
        <div class="col-lg-12">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $view_data['id'] ?>">
                <input type="hidden" name="gambar_iconOld" value="<?= $view_data['gambar_icon'] ?>">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="mb-4">
                      <label for="judul_langkah" class="form-label">Judul Langkah <span class="text-danger">*</span></label>
                      <input type="text" name="judul_langkah" class="form-control form-control-lg fw-bold" id="judul_langkah" value="<?= $view_data['judul_langkah'] ?>" required>
                    </div>
                    <div class="mb-4">
                      <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" required><?= $view_data['deskripsi'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card bg-light border-0">
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="urutan" class="form-label fw-bold">Urutan Langkah Ke-</label>
                          <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $view_data['urutan'] ?>" required>
                          <div class="form-text text-muted">
                            Ubah angka ini jika ingin mengganti urutan tampil.
                          </div>
                        </div>
                        <hr>
                        <div class="mb-4">
                          <label for="gambar_icon" class="form-label fw-bold">Ganti Icon (Opsional)</label>
                          <div class="mb-2 p-3 bg-white border rounded text-center">
                            <img src="../../assets/img/icon/<?= $view_data['gambar_icon'] ?>" alt="Icon Lama" class="img-fluid" style="max-height: 64px;">
                            <div class="small text-muted mt-1">Icon Saat Ini</div>
                          </div>
                          <input type="file" name="gambar_icon" class="form-control" id="gambar_icon" accept="image/*">
                          <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti icon.</small>
                        </div>
                        <div class="d-grid gap-2">
                          <button type="submit" name="edit_alur_ppdb" class="btn btn-warning btn-lg text-white">
                            <i class="feather-edit me-2"></i> Update Langkah
                          </button>
                          <a href="alur-ppdb" class="btn btn-light-brand">Batal</a>
                        </div>
                      </div>
                    </div>
                  </div>
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
        min-height: 300px;
      }
    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('#deskripsi')) {
          ClassicEditor
            .create(document.querySelector('#deskripsi'), {
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