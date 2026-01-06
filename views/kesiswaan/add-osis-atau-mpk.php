<?php require_once("../../controller/kesiswaan.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah OSIS atau MPK";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">OSIS atau MPK</li>
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
                <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Lengkap Siswa" required>
              </div>
              <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                <select name="jabatan" class="form-control" id="jabatan" required>
                  <option value="">Pilih Jabatan</option>
                  <option value="Ketua OSIS">Ketua OSIS</option>
                  <option value="Wakil Ketua OSIS">Wakil Ketua OSIS</option>
                  <option value="Sekretaris">Sekretaris</option>
                  <option value="Bendahara">Bendahara</option>
                  <option value="Koordinator Sekbid">Koordinator Sekbid</option>
                  <option value="Anggota">Anggota</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="periode" class="form-label">Periode Masa Jabatan <span class="text-danger">*</span></label>
                <input type="text" name="periode" class="form-control" id="periode" value="<?= date('Y') ?>/<?= date('Y') + 1 ?>" required>
              </div>
              <div class="mb-3">
                <label for="foto_siswa" class="form-label">Foto Siswa</label>
                <input type="file" name="foto_siswa" class="form-control" id="foto_siswa" accept=".jpg, .jpeg, .png">
                <small class="text-muted">Format: JPG/PNG. Disarankan rasio foto resmi (3x4 atau 4x6).</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="osis-atau-mpk" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_osis" class="btn btn-primary">Simpan Data</button>
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