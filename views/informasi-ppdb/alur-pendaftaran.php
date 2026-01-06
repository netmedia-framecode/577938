<?php require_once("../../controller/informasi-ppdb.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Alur Pendaftaran";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Alur Pendaftaran</li>
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
          <a href="add-alur-pendaftaran" class="btn btn-primary">
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
                    <th class="text-center" width="100">Step</th>
                    <th class="text-center" width="100">Icon</th>
                    <th>Judul & Deskripsi Langkah</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_alur_ppdb as $data) {
                  ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center align-middle">
                        <span class="badge bg-light-primary text-primary fs-12 border border-primary">
                          Langkah <?= $data['urutan'] ?>
                        </span>
                      </td>
                      <td class="text-center align-middle">
                        <div class="avatar-image avatar-lg bg-light rounded border p-2">
                          <img src="../../assets/img/icon/<?= $data['gambar_icon'] ?>" alt="Icon" class="img-fluid" style="object-fit: contain;">
                        </div>
                      </td>
                      <td class="align-middle">
                        <div class="fw-bold text-dark fs-14 mb-1"><?= $data['judul_langkah'] ?></div>
                        <div class="text-muted small" style="white-space: pre-wrap;"><?= $data['deskripsi'] ?></div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="edit-alur-pendaftaran?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus Langkah <?= $data['urutan'] ?>?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="judul_langkah" value="<?= $data['judul_langkah'] ?>">
                            <button type="submit" name="delete_alur_ppdb" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus">
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