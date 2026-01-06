<?php require_once("../../controller/kesiswaan.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Prestasi";
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
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-prestasi" class="btn btn-primary">
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
                    <th class="text-center" width="100">Dokumentasi</th>
                    <th>Nama Lomba / Kompetisi</th>
                    <th>Nama Juara</th>
                    <th>Peringkat & Tingkat</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Pastikan query $views_prestasi ada di controller
                  $no = 1;
                  foreach ($views_prestasi as $data) { ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center">
                        <img src="../../assets/img/prestasi/<?= $data['foto_penyerahan'] ?>" alt="Foto" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                      </td>
                      <td class="align-middle fw-bold"><?= $data['nama_lomba'] ?></td>
                      <td class="align-middle"><?= $data['nama_juara'] ?></td>
                      <td class="align-middle">
                        <div class="d-flex flex-column">
                          <span class="badge bg-light-success text-success mb-1">
                            <i class="feather-award me-1"></i> <?= $data['peringkat'] ?>
                          </span>
                          <span class="small text-muted">Tingkat <?= $data['tingkat'] ?></span>
                        </div>
                      </td>
                      <td class="text-center align-middle"><?= $data['tahun'] ?></td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="edit-prestasi?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus data prestasi <?= $data['nama_lomba'] ?>?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="nama_lomba" value="<?= $data['nama_lomba'] ?>">
                            <button type="submit" name="delete_prestasi" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus">
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