<?php require_once("../../controller/informasi-ppdb.php");
$query_urutan = mysqli_query($conn, "SELECT MAX(urutan) as max_urutan FROM alur_ppdb");
$data_urutan = mysqli_fetch_assoc($query_urutan);
$next_urutan = $data_urutan['max_urutan'] + 1;
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Alur Pendaftaran";
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
                    <label for="judul_langkah" class="form-label">Judul Langkah <span class="text-danger">*</span></label>
                    <input type="text" name="judul_langkah" class="form-control form-control-lg fw-bold" id="judul_langkah" placeholder="Contoh: Mengisi Formulir Online" required>
                  </div>
                  <div class="mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Jelaskan apa yang harus dilakukan calon siswa pada tahap ini..."></textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card bg-light border-0">
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="urutan" class="form-label fw-bold">Urutan Langkah Ke-</label>
                        <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $next_urutan ?>" required>
                        <div class="form-text text-muted">
                          Otomatis diisi urutan selanjutnya.
                        </div>
                      </div>
                      <hr>
                      <div class="mb-4">
                        <label for="gambar_icon" class="form-label fw-bold">Icon / Ilustrasi</label>
                        <input type="file" name="gambar_icon" class="form-control" id="gambar_icon" accept="image/*" required>
                        <small class="text-muted d-block mt-1">Disarankan format PNG transparan atau SVG. Ukuran kecil (64x64 px).</small>
                      </div>
                      <div class="d-grid gap-2">
                        <button type="submit" name="add_alur_ppdb" class="btn btn-primary btn-lg">
                          <i class="feather-save me-2"></i> Simpan Langkah
                        </button>
                        <a href="alur-pendaftaran" class="btn btn-light-brand">Batal</a>
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