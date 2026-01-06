<?php require_once("../../controller/kesiswaan.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "OSIS atau MPK";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

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
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-osis-atau-mpk" class="btn btn-primary">
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
                    <th class="text-center" width="100">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th class="text-center">Periode</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_osis as $data) { ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center">
                        <img src="../../assets/img/osis/<?= $data['foto_siswa'] ?>" alt="Foto" class="rounded-circle border" style="width: 50px; height: 50px; object-fit: cover;">
                      </td>
                      <td class="align-middle fw-bold"><?= $data['nama_siswa'] ?></td>
                      <td class="align-middle">
                        <span class="badge bg-light-primary text-primary"><?= $data['jabatan'] ?></span>
                      </td>
                      <td class="text-center align-middle"><?= $data['periode'] ?></td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="edit-osis-atau-mpk?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus data <?= $data['nama_siswa'] ?>?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="nama_siswa" value="<?= $data['nama_siswa'] ?>">
                            <button type="submit" name="delete_osis" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus">
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
</div>

<?php require_once("../../templates/views_bottom.php") ?>