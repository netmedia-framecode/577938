<?php require_once("../../controller/galeri.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Kegiatan Sekolah";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kegiatan Sekolah</li>
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
          <a href="add-kegiatan-sekolah" class="btn btn-primary">
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
                    <th class="text-center" width="120">Cover Album</th>
                    <th>Nama Album & Keterangan</th>
                    <th class="text-center">Tanggal Dibuat</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_album as $data) {
                  ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center">
                        <img src="../../assets/img/album/<?= $data['cover_album'] ?>" alt="Cover" class="img-thumbnail shadow-sm" style="width: 100px; height: 70px; object-fit: cover; border-radius: 6px;">
                      </td>
                      <td class="align-middle">
                        <h6 class="mb-1 fw-bold text-dark"><?= $data['nama_album'] ?></h6>
                        <p class="mb-0 text-muted small" style="line-height: 1.4;">
                          <?= $data['keterangan'] ?>
                        </p>
                      </td>
                      <td class="text-center align-middle">
                        <span class="badge bg-light-secondary text-secondary">
                          <i class="feather-calendar me-1"></i>
                          <?= date('d M Y', strtotime($data['created_at'])) ?>
                        </span>
                        <div class="small text-muted mt-1">
                          <?= date('H:i', strtotime($data['created_at'])) ?> WITA
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="detail-album?p=<?= $data['id'] ?>" class="btn btn-info btn-sm text-white" data-bs-toggle="tooltip" title="Kelola Foto">
                            <i class="feather-image"></i> Lihat Foto
                          </a>
                          <a href="edit-kegiatan-sekolah?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah Album">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus album <?= $data['nama_album'] ?>? Seluruh foto di dalamnya mungkin akan ikut terhapus (jika ada relasi).');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="nama_album" value="<?= $data['nama_album'] ?>">
                            <button type="submit" name="delete_album" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Album">
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