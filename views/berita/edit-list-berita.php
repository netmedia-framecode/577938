<?php require_once("../../controller/berita.php");
if (!isset($_GET["p"])) {
  header("Location: list-berita");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM berita WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah List Berita";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">List Berita</li>
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["judul"] ?></li>
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
                <input type="hidden" name="gambar_utamaOld" value="<?= $view_data['gambar_utama'] ?>">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="mb-3">
                      <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                      <input type="text" name="judul" class="form-control form-control-lg fw-bold" id="judul" value="<?= $view_data['judul'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="isi_berita" class="form-label">Isi Berita</label>
                      <textarea name="isi_berita" class="form-control" id="isi_berita" rows="10"><?= $view_data['isi_berita'] ?></textarea>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card bg-light border-0">
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="id_kategori" class="form-label">Kategori / Rubrik <span class="text-danger">*</span></label>
                          <select name="id_kategori" class="form-control form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            while ($kat = mysqli_fetch_assoc($views_kategori_berita)) {
                              $selected = ($kat['id'] == $view_data['id_kategori']) ? 'selected' : '';
                            ?>
                              <option value="<?= $kat['id'] ?>" <?= $selected ?>><?= $kat['nama_kategori'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="gambar_utama" class="form-label">Gambar Utama (Cover)</label>
                          <div class="mb-2 p-1 border bg-white rounded">
                            <img src="../../assets/img/berita/<?= $view_data['gambar_utama'] ?>" alt="Preview" class="img-fluid rounded" style="width: 100%; max-height: 200px; object-fit: cover;">
                            <div class="small text-muted text-center mt-1">Gambar saat ini</div>
                          </div>
                          <input type="file" name="gambar_utama" class="form-control" id="gambar_utama" accept=".jpg, .jpeg, .png">
                          <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>
                        <hr>
                        <div class="d-grid gap-2">
                          <button type="submit" name="edit_berita" class="btn btn-primary btn-lg">
                            <i class="feather-save me-2"></i> Simpan Perubahan
                          </button>
                          <a href="list-berita" class="btn btn-light-brand">Batal</a>
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
        min-height: 400px;
      }
    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('#isi_berita')) {
          ClassicEditor
            .create(document.querySelector('#isi_berita'), {
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