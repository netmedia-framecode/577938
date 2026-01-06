<?php require_once("../../controller/informasi-ppdb.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Info PPDB";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Info PPDB</li>
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
          <a href="add-info-ppdb" class="btn btn-primary">
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
                    <th class="text-center" width="50">#</th>
                    <th class="text-center" width="120">Banner</th>
                    <th style="min-width: 200px;">Judul & Deskripsi Singkat</th>
                    <th>Periode Pendaftaran</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tayang</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_info_ppdb as $data) {
                    $status_badge = ($data['status'] == 'Buka')
                      ? '<span class="badge bg-light-success text-success">Pendaftaran Dibuka</span>'
                      : '<span class="badge bg-light-danger text-danger">Ditutup</span>';
                    $active_badge = ($data['is_active'] == 1)
                      ? '<span class="badge bg-primary">Aktif</span>'
                      : '<span class="badge bg-secondary">Arsip</span>';
                  ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center align-middle">
                        <img src="../../assets/img/ppdb/<?= $data['gambar_banner'] ?>" alt="Banner" class="img-thumbnail rounded" style="width: 100px; height: 60px; object-fit: cover;">
                      </td>
                      <td class="align-middle">
                        <a href="edit-info-ppdb?p=<?= $data['id'] ?>" class="fw-bold text-dark text-decoration-none">
                          <?= $data['judul'] ?>
                        </a>
                        <div class="small text-muted mt-1 text-truncate" style="max-width: 300px;">
                          <?= strip_tags($data['deskripsi']) ?>
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex flex-column small">
                          <span class="text-success"><i class="feather-calendar me-1"></i> Buka: <?= date('d M Y', strtotime($data['tanggal_buka'])) ?></span>
                          <span class="text-danger mt-1"><i class="feather-calendar me-1"></i> Tutup: <?= date('d M Y', strtotime($data['tanggal_tutup'])) ?></span>
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <?= $status_badge ?>
                      </td>
                      <td class="text-center align-middle">
                        <?= $active_badge ?>
                      </td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="edit-info-ppdb?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus informasi PPDB ini?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="judul" value="<?= $data['judul'] ?>">
                            <button type="submit" name="delete_info_ppdb" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus">
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