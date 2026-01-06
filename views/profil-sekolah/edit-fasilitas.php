<?php require_once("../../controller/profil-sekolah.php");
if (!isset($_GET["p"])) {
  header("Location: fasilitas");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM fasilitas WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Fasilitas";
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
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_fasilitas"]  ?></li>
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

                <input type="hidden" name="id" value="<?= $view_data['id'] ?>">
                <input type="hidden" name="gambar_fasilitasOld" value="<?= $view_data['gambar_fasilitas'] ?>">

                <div class="mb-3">
                  <label for="nama_fasilitas" class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                  <input type="text" name="nama_fasilitas" class="form-control" id="nama_fasilitas" value="<?= $view_data['nama_fasilitas'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi / Keterangan</label>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"><?= $view_data['deskripsi'] ?></textarea>
                </div>

                <div class="mb-3">
                  <label for="gambar_fasilitas" class="form-label">Foto Fasilitas</label>

                  <div class="mb-2">
                    <img src="<?= $baseURL ?>assets/img/<?= $view_data['gambar_fasilitas'] ?>" alt="Foto Lama" class="img-thumbnail" style="width: 150px; height: auto; object-fit: cover;">
                    <p class="small text-muted mt-1">Foto saat ini: <?= $view_data['gambar_fasilitas'] ?></p>
                  </div>

                  <input type="file" name="gambar_fasilitas" class="form-control" id="gambar_fasilitas" accept=".jpg, .jpeg, .png">
                  <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                </div>

                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="fasilitas" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_fasilitas" class="btn btn-primary">Simpan Perubahan</button>
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

<?php }
require_once("../../templates/views_bottom.php") ?>