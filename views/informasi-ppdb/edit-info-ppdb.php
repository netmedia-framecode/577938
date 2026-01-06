<?php require_once("../../controller/informasi-ppdb.php");
if (!isset($_GET["p"])) {
  header("Location: menu");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM info_ppdb WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Info PPDB";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Info PPDB</li>
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
                <input type="hidden" name="gambar_bannerOld" value="<?= $view_data['gambar_banner'] ?>">

                <div class="row">

                  <div class="col-lg-8">
                    <div class="mb-4">
                      <label for="judul" class="form-label">Judul Informasi <span class="text-danger">*</span></label>
                      <input type="text" name="judul" class="form-control form-control-lg fw-bold" id="judul" value="<?= $view_data['judul'] ?>" required>
                    </div>

                    <div class="mb-4">
                      <label for="deskripsi" class="form-label">Deskripsi Lengkap (Syarat & Ketentuan)</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10"><?= $view_data['deskripsi'] ?></textarea>
                    </div>
                  </div>

                  <div class="col-lg-4">

                    <div class="card bg-light border-0">
                      <div class="card-body">
                        <h6 class="fw-bold mb-3">Pengaturan Jadwal</h6>

                        <div class="mb-3">
                          <label for="tanggal_buka" class="form-label">Tanggal Buka</label>
                          <input type="date" name="tanggal_buka" class="form-control" id="tanggal_buka" value="<?= $view_data['tanggal_buka'] ?>" required>
                        </div>

                        <div class="mb-3">
                          <label for="tanggal_tutup" class="form-label">Tanggal Tutup</label>
                          <input type="date" name="tanggal_tutup" class="form-control" id="tanggal_tutup" value="<?= $view_data['tanggal_tutup'] ?>" required>
                        </div>

                        <hr>

                        <h6 class="fw-bold mb-3">Status Publikasi</h6>

                        <div class="mb-3">
                          <label for="status" class="form-label">Status Pendaftaran</label>
                          <select name="status" class="form-control form-select" required>
                            <option value="Buka" <?= ($view_data['status'] == 'Buka') ? 'selected' : '' ?>>Buka (Open)</option>
                            <option value="Tutup" <?= ($view_data['status'] == 'Tutup') ? 'selected' : '' ?>>Tutup (Closed)</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="is_active" class="form-label">Tampilkan di Website?</label>
                          <select name="is_active" class="form-control form-select">
                            <option value="1" <?= ($view_data['is_active'] == 1) ? 'selected' : '' ?>>Ya, Tampilkan (Aktif)</option>
                            <option value="0" <?= ($view_data['is_active'] == 0) ? 'selected' : '' ?>>Tidak, Simpan sebagai Draft</option>
                          </select>
                        </div>

                        <hr>

                        <div class="mb-4">
                          <label for="gambar_banner" class="form-label">Ganti Banner (Opsional)</label>

                          <div class="mb-2 text-center">
                            <img src="../../assets/img/ppdb/<?= $view_data['gambar_banner'] ?>" alt="Banner Lama" class="img-fluid rounded border" style="max-height: 150px;">
                            <div class="small text-muted mt-1">Banner Saat Ini</div>
                          </div>

                          <input type="file" name="gambar_banner" class="form-control" id="gambar_banner" accept="image/*">
                          <small class="text-muted">Biarkan kosong jika tidak ingin mengubah banner.</small>
                        </div>

                        <div class="d-grid gap-2">
                          <button type="submit" name="edit_info_ppdb" class="btn btn-warning btn-lg text-white">
                            <i class="feather-edit me-2"></i> Update Informasi
                          </button>
                          <a href="info-ppdb" class="btn btn-light-brand">Batal</a>
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