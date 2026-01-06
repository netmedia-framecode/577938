<?php require_once("../../controller/profil-sekolah.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Fasilitas";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Fasilitas</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="main-content">
      <div class="row">
        <div class="col-lg-8">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="nama_fasilitas" class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                  <input type="text" name="nama_fasilitas" class="form-control" id="nama_fasilitas" placeholder="Contoh: Laboratorium Komputer" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi / Keterangan</label>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Jelaskan detail fasilitas ini..."></textarea>
                </div>
                <div class="mb-3">
                  <label for="gambar_fasilitas" class="form-label">Foto Fasilitas <span class="text-danger">*</span></label>
                  <input type="file" name="gambar_fasilitas" class="form-control" id="gambar_fasilitas" accept=".jpg, .jpeg, .png" required>
                  <small class="text-muted">Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB.</small>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="fasilitas" class="btn btn-success">Kembali</a>
                  <button type="submit" name="add_fasilitas" class="btn btn-primary">Simpan Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <style>
      .ck-editor__editable_inline {
        min-height: 200px;
      }
    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('#deskripsi')) {
          ClassicEditor
            .create(document.querySelector('#deskripsi'), {
              toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
              console.error(error);
            });
        }
      });
    </script>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>