<?php require_once("../../controller/profil-sekolah.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Struktur Organisasi";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Struktur Organisasi</li>
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
                <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Contoh: Budi Santoso, S.Pd" required>
              </div>
              <div class="mb-3">
                <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                <input type="number" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP (Angka)" required>
              </div>
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="urutan" class="form-label">Urutan Hierarki <span class="text-danger">*</span></label>
                <input type="number" name="urutan" class="form-control" id="urutan" min="1" placeholder="Masukkan nomor urut..." required>
                <div class="form-text mt-2">
                  <ul class="mb-0 small text-muted">
                    <li>Urutan <strong>1</strong> = Kepala Sekolah</li>
                    <li>Urutan <strong>2</strong> = Wakil Kepala Sekolah</li>
                    <li>Urutan <strong>3</strong> = Staff</li>
                    <li>Urutan <strong>4</strong> = Guru Mata Pelajaran</li>
                  </ul>
                </div>
              </div>
              <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil <span class="text-danger">*</span></label>
                <input type="file" name="foto" class="form-control" id="foto" accept=".jpg, .jpeg, .png" required>
                <small class="text-muted">Format: JPG/PNG, Maks 2MB.</small>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="struktur-organisasi" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_guru_staff" class="btn btn-primary">Simpan Data</button>
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