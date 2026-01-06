<?php require_once("../../controller/akademik.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Kurikulum";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kurikulum</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
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
            <form action="" method="post">
              <div class="mb-3">
                <label for="judul" class="form-label">Judul Kurikulum <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Misal: Implementasi Kurikulum Merdeka" required>
              </div>
              <div class="mb-3">
                <label for="tahun_ajaran" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" placeholder="Contoh: 2025/2026" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi_umum" class="form-label">Deskripsi Umum</label>
                <textarea name="deskripsi_umum" class="form-control" id="deskripsi_umum" rows="5" placeholder="Jelaskan secara umum tentang penerapan kurikulum di sekolah..."></textarea>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="kurikulum" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_info_kurikulum" class="btn btn-primary">Simpan Data</button>
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

<?php require_once("../../templates/views_bottom.php") ?>