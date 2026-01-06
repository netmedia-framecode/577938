<?php require_once("../../controller/berita.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "List Berita";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">List Berita</li>
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
          <a href="add-list-berita" class="btn btn-primary">
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
                    <th class="text-center" width="100">Cover</th>
                    <th style="min-width: 250px;">Judul Berita</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th class="text-center">Info</th>
                    <th class="text-center" width="120">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_berita as $data) { ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>
                      <td class="text-center align-middle">
                        <img src="../../assets/img/berita/<?= $data['gambar_utama'] ?>" alt="Cover" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                      </td>
                      <td class="align-middle">
                        <a href="edit-berita?p=<?= $data['id'] ?>" class="fw-bold text-dark text-decoration-none">
                          <?= $data['judul'] ?>
                        </a>
                        <div class="small text-muted mt-1">
                          <?= substr(strip_tags($data['isi_berita']), 0, 80) ?>...
                        </div>
                      </td>
                      <td class="align-middle">
                        <span class="badge bg-light-primary text-primary">
                          <?= $data['nama_kategori'] ?>
                        </span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex align-items-center gap-2">
                          <i class="feather-user text-muted"></i>
                          <span><?= $data['name'] ?></span>
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="small text-muted">
                          <i class="feather-calendar me-1"></i> <?= date('d M Y', strtotime($data['tanggal_posting'])) ?>
                        </div>
                        <div class="small text-muted mt-1">
                          <i class="feather-eye me-1"></i> <?= $data['dibaca'] ?>x dibaca
                        </div>
                      </td>
                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">
                          <a href="edit-list-berita?p=<?= $data['id'] ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Ubah Berita">
                            <i class="feather-edit"></i>
                          </a>
                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <input type="hidden" name="judul" value="<?= $data['judul'] ?>">
                            <button type="submit" name="delete_berita" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Hapus Berita">
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