<?php require_once("../../controller/informasi-ppdb.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Download Brosur";
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
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-download-brosur" class="btn btn-primary">
            <i class="feather-plus me-2"></i>
            <span>Tambah</span>
          </a>
        </div>
      </div>
      <div class="d-md-none d-flex align-items-center">
        <a href="javascript:void(0)" class="page-header-right-open-toggle">
          <i class="feather-align-right fs-20"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card stretch stretch-full">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th class="text-center" width="50">No</th>
                    <th>Judul Dokumen</th>
                    <th>Info File</th>
                    <th class="text-center">Tanggal Upload</th>
                    <th class="text-center" width="150">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_brosur_ppdb as $data) {
                    $ekstensi = pathinfo($data['nama_file'], PATHINFO_EXTENSION);
                    if (strtolower($ekstensi) == 'pdf') {
                      $icon_file = '<i class="feather-file-text text-danger fs-3"></i>';
                      $badge_ext = '<span class="badge bg-light-danger text-danger border-danger border">PDF</span>';
                    } else {
                      $icon_file = '<i class="feather-image text-primary fs-3"></i>';
                      $badge_ext = '<span class="badge bg-light-primary text-primary border-primary border">IMG</span>';
                    }
                  ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="align-middle">
                        <div class="d-flex align-items-center gap-3">
                          <div class="avatar-image bg-light rounded p-2">
                            <?= $icon_file ?>
                          </div>
                          <div>
                            <div class="fw-bold text-dark"><?= $data['judul_file'] ?></div>
                            <div class="small text-muted">Dokumen Publik</div>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex flex-column">
                          <span class="text-dark small fw-medium mb-1">
                            <?= $badge_ext ?> <?= $data['ukuran_file'] ?>
                          </span>
                          <span class="text-muted small text-truncate" style="max-width: 200px;">
                            <i class="feather-paperclip me-1"></i> <?= $data['judul_file'] ?>
                          </span>
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="small text-muted">
                          <?= date('d M Y', strtotime($data['tanggal_upload'])) ?>
                        </div>
                        <div class="small text-muted">
                          <?= date('H:i', strtotime($data['tanggal_upload'])) ?> WITA
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="../../assets/files/<?= $data['nama_file'] ?>" target="_blank" class="btn btn-info btn-sm text-white" data-bs-toggle="tooltip" title="Download / Lihat">
                            <i class="feather-download"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus file <?= $data['judul_file'] ?>?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="judul_file" value="<?= $data['judul_file'] ?>">
                            <button type="submit" name="delete_brosur_ppdb" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus File">
                              <i class="feather-trash-2"></i>
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>