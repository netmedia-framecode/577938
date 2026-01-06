<?php require_once("../../controller/informasi-ppdb.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Info PPDB";
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
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
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
              <div class="row">
                <div class="col-lg-8">
                  <div class="mb-4">
                    <label for="judul" class="form-label">Judul Informasi <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control form-control-lg fw-bold" id="judul" placeholder="Contoh: Penerimaan Peserta Didik Baru Tahun 2026" required>
                  </div>
                  <div class="mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi Lengkap (Syarat & Ketentuan)</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="10"></textarea>
                    <small class="text-muted">Tuliskan detail persyaratan, jalur masuk, dan informasi penting lainnya di sini.</small>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card bg-light border-0">
                    <div class="card-body">
                      <h6 class="fw-bold mb-3">Pengaturan Jadwal</h6>
                      <div class="mb-3">
                        <label for="tanggal_buka" class="form-label">Tanggal Buka Pendaftaran</label>
                        <input type="date" name="tanggal_buka" class="form-control" id="tanggal_buka" required>
                      </div>
                      <div class="mb-3">
                        <label for="tanggal_tutup" class="form-label">Tanggal Tutup Pendaftaran</label>
                        <input type="date" name="tanggal_tutup" class="form-control" id="tanggal_tutup" required>
                      </div>
                      <hr>
                      <h6 class="fw-bold mb-3">Status Publikasi</h6>
                      <div class="mb-3">
                        <label for="status" class="form-label">Status Pendaftaran</label>
                        <select name="status" class="form-control form-select" required>
                          <option value="Buka">Buka (Open)</option>
                          <option value="Tutup">Tutup (Closed)</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="is_active" class="form-label">Tampilkan di Website?</label>
                        <select name="is_active" class="form-control form-select">
                          <option value="1">Ya, Tampilkan (Aktif)</option>
                          <option value="0">Tidak, Simpan sebagai Draft</option>
                        </select>
                        <div class="form-text text-warning small">
                          <i class="feather-alert-triangle"></i> Disarankan hanya ada 1 data yang Aktif.
                        </div>
                      </div>
                      <hr>
                      <div class="mb-4">
                        <label for="gambar_banner" class="form-label">Banner / Poster PPDB</label>
                        <input type="file" name="gambar_banner" class="form-control" id="gambar_banner" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG. Max 2MB.</small>
                      </div>
                      <div class="d-grid gap-2">
                        <button type="submit" name="add_info_ppdb" class="btn btn-primary btn-lg">
                          <i class="feather-save me-2"></i> Simpan Informasi
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

<?php require_once("../../templates/views_bottom.php") ?>