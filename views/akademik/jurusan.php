<?php require_once("../../controller/akademik.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Jurusan";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Jurusan</li>
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
          <a href="add-jurusan" class="btn btn-primary">
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
                    <th class="text-center">#</th>
                    <th class="text-center" style="width: 20%;">Nama Jurusan</th>
                    <th class="text-center" style="width: 40%;">Deskripsi</th>
                    <th class="text-center">Ikon / Gambar</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($views_jurusan as $key => $data) { ?>
                    <tr class="single-item">
                      <td class="text-center"><?= $key + 1 ?></td>
                      <td>
                        <span class="fw-bold"><?= $data['nama_jurusan'] ?></span>
                      </td>
                      <td style="max-width: 350px; white-space: normal; word-wrap: break-word;">
                        <p><?= $data['deskripsi'] ?></p>
                      </td>
                      <td class="text-center">
                        <img src="<?= $baseURL ?>assets/img/jurusan/<?= $data['ikon_atau_gambar'] ?>" alt="<?= $data['nama_jurusan'] ?>" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                      </td>
                      <td>
                        <div class="hstack gap-2 justify-content-center">
                          <a href="edit-jurusan?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus jurusan ini?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="nama_jurusan" value="<?= $data['nama_jurusan'] ?>">
                            <button type="submit" name="delete_jurusan" class="btn btn-danger btn-sm">
                              <i class="bi bi-trash"></i>
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