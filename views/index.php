<?php require_once("../controller/dashboard.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Dashboard";
require_once("../templates/views_top.php"); ?>

<div class="nxl-content">
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10">Dashboard</h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Dashboard Overview</li>
      </ul>
    </div>
  </div>
  <div class="main-content">
    <div class="row">

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-soft-primary text-primary">
                  <i class="feather-mail"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $count_pesan ?></span></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Pesan Masuk</h3>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="kontak/pesan-masuk" class="fs-12 fw-medium text-muted text-truncate-1-line">Lihat Inbox</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">Total</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-soft-warning text-warning">
                  <i class="feather-file-text"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $count_berita ?></span></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Berita / Artikel</h3>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="berita/list-berita" class="fs-12 fw-medium text-muted text-truncate-1-line">Kelola Berita</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">Total</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-soft-success text-success">
                  <i class="feather-image"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $count_galeri ?></span></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Galeri Foto</h3>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="galeri/kegiatan-sekolah" class="fs-12 fw-medium text-muted text-truncate-1-line">Lihat Album</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">Total</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-soft-danger text-danger">
                  <i class="feather-download-cloud"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark"><span class="counter"><?= $count_brosur ?></span></div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">File & Brosur</h3>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="informasi-ppdb/download-brosur" class="fs-12 fw-medium text-muted text-truncate-1-line">Kelola File</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">Total</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-8">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Pesan Masuk Terbaru</h5>
            <div class="card-header-action">
              <a href="kontak/pesan-masuk" class="btn btn-sm btn-light-brand">Lihat Semua</a>
            </div>
          </div>
          <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr class="border-b">
                    <th scope="row">Pengirim</th>
                    <th>Subjek</th>
                    <th>Tanggal</th>
                    <th class="text-end">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (mysqli_num_rows($latest_pesan) > 0) {
                    foreach ($latest_pesan as $msg) { ?>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center gap-3">
                            <div class="avatar-text bg-light-primary text-primary rounded">
                              <?= substr($msg['nama_pengirim'], 0, 1) ?>
                            </div>
                            <a href="javascript:void(0);">
                              <span class="d-block fw-bold text-dark"><?= $msg['nama_pengirim'] ?></span>
                              <span class="fs-12 d-block fw-normal text-muted"><?= $msg['email_pengirim'] ?></span>
                            </a>
                          </div>
                        </td>
                        <td>
                          <span class="text-dark"><?= $msg['subjek'] ?></span>
                        </td>
                        <td><?= date('d M Y', strtotime($msg['tanggal_kirim'])) ?></td>
                        <td class="text-end">
                          <a href="kontak/pesan-masuk" class="btn btn-sm btn-light-primary"><i class="feather-eye"></i></a>
                        </td>
                      </tr>
                    <?php }
                  } else { ?>
                    <tr>
                      <td colspan="4" class="text-center py-4 text-muted">Belum ada pesan masuk.</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xxl-4">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Status PPDB Aktif</h5>
          </div>
          <div class="card-body">

            <?php if ($data_ppdb) {
              $status_color = ($data_ppdb['status'] == 'Buka') ? 'success' : 'danger';
              $status_text = ($data_ppdb['status'] == 'Buka') ? 'Pendaftaran Dibuka' : 'Pendaftaran Ditutup';
            ?>
              <div class="mb-4">
                <img src="../../assets/img/ppdb/<?= $data_ppdb['gambar_banner'] ?>" alt="Banner" class="img-fluid rounded w-100" style="height: 150px; object-fit: cover;">
              </div>

              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="fw-bold text-dark">Periode:</span>
                <span class="text-muted small">
                  <?= date('d M Y', strtotime($data_ppdb['tanggal_buka'])) ?> s/d <?= date('d M Y', strtotime($data_ppdb['tanggal_tutup'])) ?>
                </span>
              </div>

              <div class="p-3 border border-dashed rounded-3 bg-light-<?= $status_color ?> mb-3 text-center">
                <h4 class="text-<?= $status_color ?> fw-bold mb-1"><?= $status_text ?></h4>
                <small class="text-muted"><?= $data_ppdb['judul'] ?></small>
              </div>

              <div class="d-grid">
                <a href="informasi-ppdb/info-ppdb" class="btn btn-primary">Kelola PPDB</a>
              </div>

            <?php } else { ?>

              <div class="text-center py-5">
                <i class="feather-alert-circle fs-1 text-muted mb-3"></i>
                <p class="text-muted">Belum ada informasi PPDB yang aktif.</p>
                <a href="informasi-ppdb/add-info-ppdb" class="btn btn-outline-primary btn-sm">Buat Info Baru</a>
              </div>

            <?php } ?>

          </div>
        </div>

        <div class="card mt-4">
          <div class="card-body">
            <h6 class="fw-bold mb-3">Akses Cepat</h6>
            <div class="row g-2">
              <div class="col-6">
                <a href="informasi-ppdb/alur-pendaftaran" class="btn btn-light w-100 text-start"><i class="feather-list me-2"></i> Alur</a>
              </div>
              <div class="col-6">
                <a href="informasi-ppdb/download-brosur" class="btn btn-light w-100 text-start"><i class="feather-file me-2"></i> Brosur</a>
              </div>
              <div class="col-6">
                <a href="galeri/kegiatan-sekolah" class="btn btn-light w-100 text-start"><i class="feather-image me-2"></i> Galeri</a>
              </div>
              <div class="col-6">
                <a href="berita/list-berita" class="btn btn-light w-100 text-start"><i class="feather-globe me-2"></i> Berita</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once("../templates/views_bottom.php") ?>