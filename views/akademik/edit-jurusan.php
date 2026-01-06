<?php require_once("../../controller/akademik.php");
if (!isset($_GET["p"])) {
  header("Location: jurusan");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM jurusan WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Jurusan";
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
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama_jurusan"]  ?></li>
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
                <input type="hidden" name="ikon_atau_gambarOld" value="<?= $view_data['ikon_atau_gambar'] ?>">
                <div class="mb-3">
                  <label for="nama_jurusan" class="form-label">Nama Jurusan <span class="text-danger">*</span></label>
                  <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" value="<?= $view_data['nama_jurusan'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi Jurusan</label>
                  <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5"><?= $view_data['deskripsi'] ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="ikon_atau_gambar" class="form-label">Ikon / Foto Jurusan</label>
                  <div class="mb-3 p-2 border rounded bg-light d-inline-block">
                    <img src="<?= $baseURL ?>assets/img/<?= $view_data['ikon_atau_gambar'] ?>" alt="Preview" class="img-fluid" style="max-height: 150px; object-fit: contain;">
                    <div class="small text-muted mt-1 text-center">Gambar saat ini</div>
                  </div>
                  <input type="file" name="ikon_atau_gambar" class="form-control" id="ikon_atau_gambar" accept=".jpg, .jpeg, .png">
                  <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="jurusan" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_jurusan" class="btn btn-primary">Simpan Perubahan</button>
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