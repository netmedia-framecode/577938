<?php require_once("../../controller/kesiswaan.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Prestasi";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Prestasi</li>
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
                <label for="nama_lomba" class="form-label">Nama Lomba / Kompetisi <span class="text-danger">*</span></label>
                <input type="text" name="nama_lomba" class="form-control" id="nama_lomba" placeholder="Contoh: O2SN Cabang Atletik" required>
              </div>
              <div class="mb-3">
                <label for="nama_juara" class="form-label">Nama Siswa / Tim Juara <span class="text-danger">*</span></label>
                <input type="text" name="nama_juara" class="form-control" id="nama_juara" placeholder="Nama siswa atau nama tim" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="peringkat" class="form-label">Peringkat Juara <span class="text-danger">*</span></label>
                  <select name="peringkat" class="form-control" required>
                    <option value="">Pilih Peringkat</option>
                    <option value="Juara 1">Juara 1 (Emas)</option>
                    <option value="Juara 2">Juara 2 (Perak)</option>
                    <option value="Juara 3">Juara 3 (Perunggu)</option>
                    <option value="Harapan 1">Harapan 1</option>
                    <option value="Harapan 2">Harapan 2</option>
                    <option value="Finalis">Finalis / Peserta Terbaik</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tingkat" class="form-label">Tingkat Kompetisi <span class="text-danger">*</span></label>
                  <select name="tingkat" class="form-control" required>
                    <option value="">Pilih Tingkat</option>
                    <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Nasional">Nasional</option>
                    <option value="Internasional">Internasional</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Perolehan <span class="text-danger">*</span></label>
                <input type="number" name="tahun" class="form-control" value="<?= date('Y') ?>" min="2000" max="2099" required>
              </div>
              <div class="mb-3">
                <label for="foto_penyerahan" class="form-label">Foto Penyerahan Piala / Sertifikat</label>
                <input type="file" name="foto_penyerahan" class="form-control" accept=".jpg, .jpeg, .png">
                <small class="text-muted">Format: JPG/PNG.</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="prestasi" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_prestasi" class="btn btn-primary">Simpan Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>