<?php require_once("../../controller/informasi-ppdb.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Tambah Download Brosur";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Download Brosur</li>
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
                    <label for="judul_file" class="form-label">Judul Dokumen <span class="text-danger">*</span></label>
                    <input type="text" name="judul_file" class="form-control form-control-lg fw-bold" id="judul_file" placeholder="Contoh: Brosur PPDB 2026 atau Panduan Pendaftaran" required>
                  </div>
                  <div class="mb-4">
                    <label for="nama_file" class="form-label">Pilih File <span class="text-danger">*</span></label>
                    <div class="p-4 bg-light border border-dashed rounded text-center">
                      <div class="mb-3">
                        <i class="feather-upload-cloud fs-1 text-primary"></i>
                      </div>
                      <input type="file" name="nama_file" class="form-control" id="nama_file" accept=".pdf, .jpg, .jpeg, .png" required>
                      <div class="small text-muted mt-2">
                        Klik tombol di atas untuk memilih file dari komputer Anda.
                      </div>
                    </div>
                  </div>
                  <div class="d-flex gap-2 mt-4">
                    <button type="submit" name="add_brosur_ppdb" class="btn btn-primary">
                      <i class="feather-upload me-2"></i> Upload Sekarang
                    </button>
                    <a href="download-brosur" class="btn btn-light-brand">Batal</a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="alert alert-warning fade show" role="alert">
                    <div class="d-flex align-items-start">
                      <i class="feather-info fs-3 me-3 mt-1"></i>
                      <div>
                        <h6 class="alert-heading fw-bold mb-1">Ketentuan Upload</h6>
                        <p class="mb-2 small">Mohon perhatikan hal berikut sebelum mengupload file:</p>
                        <ul class="mb-0 small ps-3">
                          <li class="mb-1"><strong>Format File:</strong> Hanya diperbolehkan PDF, JPG, JPEG, atau PNG.</li>
                          <li class="mb-1"><strong>Ukuran Maksimal:</strong> 5 MB per file.</li>
                          <li class="mb-1"><strong>Nama File:</strong> Usahakan nama file fisik tidak mengandung spasi atau karakter aneh (contoh yang baik: <code>brosur_2026.pdf</code>).</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card bg-primary text-white mt-4">
                    <div class="card-body">
                      <h6 class="text-white fw-bold"><i class="feather-help-circle me-2"></i>Tips</h6>
                      <p class="small mb-0 opacity-75">
                        Jika Anda ingin mengupload gambar brosur, pastikan resolusinya cukup tinggi agar teks di dalamnya bisa terbaca jelas oleh calon siswa.
                      </p>
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

</div>

<?php require_once("../../templates/views_bottom.php") ?>