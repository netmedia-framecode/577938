<?php require_once("../../controller/akademik.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Kalender Akademik";
require_once("../../templates/views_top.php");

$tanggal_default = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d'); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kalender Akademik</li>
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
            <form action="kalender-akademik" method="post">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai" value="<?= $tanggal_default ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai" value="<?= $tanggal_default ?>" required>
                  <small class="text-muted">Sama dengan tanggal mulai jika kegiatan 1 hari.</small>
                </div>
              </div>
              <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Contoh: Penilaian Akhir Semester (PAS)" required>
              </div>
              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan / Detail</label>
                <textarea name="keterangan" class="form-control" id="keterangan" rows="4" placeholder="Tambahkan catatan detail mengenai kegiatan ini..."></textarea>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="kalender-akademik" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_kalender_akademik" class="btn btn-primary">Simpan Agenda</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <script>
    document.getElementById('tanggal_mulai').addEventListener('change', function() {
      var startDate = this.value;
      var endDateInput = document.getElementById('tanggal_selesai');
      if (endDateInput.value === '' || endDateInput.value < startDate) {
        endDateInput.value = startDate;
      }
    });
  </script>

</div>

<?php require_once("../../templates/views_bottom.php") ?>