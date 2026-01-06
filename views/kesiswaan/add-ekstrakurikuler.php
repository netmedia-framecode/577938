<?php require_once("../../controller/kesiswaan.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Ekstrakurikuler";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Ekstrakurikuler</li>
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
            <form action="ekstrakurikuler" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama_ekskul" class="form-label">Nama Ekstrakurikuler <span class="text-danger">*</span></label>
                <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul" required>
              </div>
              <div class="mb-3">
                <label for="nama_pembina" class="form-label">Nama Pembina <span class="text-danger">*</span></label>
                <input type="text" name="nama_pembina" class="form-control" id="nama_pembina" required>
              </div>
              <div class="mb-3">
                <label for="jadwal_latihan" class="form-label">Jadwal Latihan</label>
                <input type="text" name="jadwal_latihan" class="form-control" id="jadwal_latihan" placeholder="Contoh: Senin & Kamis, 15:00 WITA">
              </div>
              <div class="mb-3">
                <label for="deskripsi_kegiatan" class="form-label">Deskripsi Kegiatan</label>
                <textarea name="deskripsi_kegiatan" class="form-control" id="deskripsi_kegiatan" rows="5"></textarea>
              </div>
              <div class="mb-3">
                <label for="foto_kegiatan" class="form-label">Foto Kegiatan</label>
                <input type="file" name="foto_kegiatan" class="form-control" id="foto_kegiatan" accept=".jpg, .jpeg, .png">
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="ekstrakurikuler" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_ekstrakurikuler" class="btn btn-primary">Simpan Data</button>
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

</div>

<?php require_once("../../templates/views_bottom.php") ?>