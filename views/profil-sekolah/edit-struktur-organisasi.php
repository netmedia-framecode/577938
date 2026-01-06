<?php require_once("../../controller/profil-sekolah.php");
if (!isset($_GET["p"])) {
  header("Location: struktur-organisasi");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM guru_staff WHERE id = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $view_data = mysqli_fetch_assoc($store_data);
  $_SESSION["project_sman_5_kota_komba"]["name_page"] = "Ubah Struktur Organisasi";
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
          <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] . ' ' . $view_data["nama"] ?></li>
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
                <input type="hidden" name="fotoOld" value="<?= $view_data['foto'] ?>">
                <input type="hidden" name="nipOld" value="<?= $view_data['nip'] ?>">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" name="nama" class="form-control" id="nama" value="<?= $view_data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                  <input type="number" name="nip" class="form-control" id="nip" value="<?= $view_data['nip'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" <?= ($view_data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= ($view_data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="urutan" class="form-label">Urutan Hierarki <span class="text-danger">*</span></label>
                  <input type="number" name="urutan" class="form-control" id="urutan" min="1" max="4" value="<?= $view_data['urutan'] ?>" required>
                  <div class="form-text mt-2">
                    <strong class="text-dark">Jabatan saat ini: <?= $view_data['jabatan_atau_mapel'] ?></strong>
                    <ul class="mb-0 small text-muted mt-1">
                      <li>Ubah urutan untuk mengubah jabatan secara otomatis:</li>
                      <li>Urutan <strong>1</strong> = Kepala Sekolah</li>
                      <li>Urutan <strong>2</strong> = Wakil Kepala Sekolah</li>
                      <li>Urutan <strong>3</strong> = Staff</li>
                      <li>Urutan <strong>4</strong> = Guru Mata Pelajaran</li>
                    </ul>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="foto" class="form-label">Foto Profil</label>
                  <div class="mb-2">
                    <img src="<?= $baseURL ?>assets/img/guru_staff/<?= $view_data['foto'] ?>" alt="Foto Lama" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    <small class="d-block text-muted">Foto saat ini</small>
                  </div>
                  <input type="file" name="foto" class="form-control" id="foto" accept=".jpg, .jpeg, .png">
                  <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="struktur-organisasi" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_guru_staff" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

  </div>

<?php }
require_once("../../templates/views_bottom.php") ?>