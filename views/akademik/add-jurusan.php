<?php require_once("../../controller/akademik.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Jurusan";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Jurusan</li>
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
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="text-danger">*</span></label>
                <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Contoh: MIPA (Matematika dan Ilmu Pengetahuan Alam)" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Jurusan</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Jelaskan tentang keunggulan dan materi jurusan ini..."></textarea>
              </div>
              <div class="mb-3">
                <label for="ikon_atau_gambar" class="form-label">Ikon / Foto Jurusan <span class="text-danger">*</span></label>
                <input type="file" name="ikon_atau_gambar" class="form-control" id="ikon_atau_gambar" accept=".jpg, .jpeg, .png" required>
                <small class="text-muted">Format: JPG, JPEG, PNG. Disarankan ukuran rasio 1:1 (Persegi) atau 4:3.</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="jurusan" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_jurusan" class="btn btn-primary">Simpan Data</button>
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

<?php require_once("../../templates/views_bottom.php") ?>