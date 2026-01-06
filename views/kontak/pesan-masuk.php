<?php require_once("../../controller/kontak.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Pesan Masuk";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Pesan Masuk</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
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
                    <th>Pengirim</th>
                    <th>Subjek & Cuplikan Pesan</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center" width="150">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($views_pesan_kontak as $data) {
                    $status_badge = is_null($data['id_user'])
                      ? '<span class="badge bg-light-danger text-danger ms-2">Baru</span>'
                      : '<span class="badge bg-light-success text-success ms-2">Dibaca</span>';
                  ?>
                    <tr>
                      <td class="text-center align-middle"><?= $no++ ?></td>

                      <td class="align-middle">
                        <div class="fw-bold text-dark"><?= $data['nama_pengirim'] ?></div>
                        <div class="small text-muted">
                          <i class="feather-mail me-1"></i> <?= $data['email_pengirim'] ?>
                        </div>
                      </td>

                      <td class="align-middle">
                        <div class="mb-1 text-dark fw-medium">
                          <?= $data['subjek'] ?> <?= $status_badge ?>
                        </div>
                        <div class="text-muted small text-truncate" style="max-width: 300px;">
                          <?= substr($data['isi_pesan'], 0, 80) ?>...
                        </div>
                      </td>

                      <td class="text-center align-middle">
                        <div class="small text-muted">
                          <?= date('d M Y', strtotime($data['tanggal_kirim'])) ?>
                        </div>
                        <div class="small text-muted">
                          <?= date('H:i', strtotime($data['tanggal_kirim'])) ?> WITA
                        </div>
                      </td>

                      <td class="text-center align-middle">
                        <div class="d-flex justify-content-center gap-2">

                          <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#viewMessage<?= $data['id'] ?>" title="Baca Pesan Lengkap">
                            <i class="feather-eye"></i>
                          </button>

                          <form action="" method="post" onsubmit="return confirm('Yakin ingin menghapus pesan dari <?= $data['nama_pengirim'] ?>?');">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                            <button type="submit" name="delete_pesan_kontak" class="btn btn-danger btn-sm" title="Hapus Pesan">
                              <i class="feather-trash-2"></i>
                            </button>
                          </form>
                        </div>

                        <div class="modal fade text-start" id="viewMessage<?= $data['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $data['id'] ?>" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?= $data['id'] ?>">Detail Pesan Masuk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-start">
                                <div class="mb-3 row border-bottom pb-2">
                                  <label class="col-sm-3 fw-bold">Dari</label>
                                  <div class="col-sm-9">: <?= $data['nama_pengirim'] ?> (<a href="mailto:<?= $data['email_pengirim'] ?>"><?= $data['email_pengirim'] ?></a>)</div>
                                </div>
                                <div class="mb-3 row border-bottom pb-2">
                                  <label class="col-sm-3 fw-bold">Tanggal</label>
                                  <div class="col-sm-9">: <?= date('d F Y, H:i', strtotime($data['tanggal_kirim'])) ?> WITA</div>
                                </div>
                                <div class="mb-3 row border-bottom pb-2">
                                  <label class="col-sm-3 fw-bold">Subjek</label>
                                  <div class="col-sm-9">: <?= $data['subjek'] ?></div>
                                </div>
                                <div class="mb-3">
                                  <label class="fw-bold mb-2">Isi Pesan :</label>
                                  <div class="p-3 bg-light rounded border text-wrap">
                                    <?= nl2br($data['isi_pesan']) ?>
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="mailto:<?= $data['email_pengirim'] ?>" class="btn btn-primary"><i class="feather-mail me-2"></i>Balas Email</a>
                              </div>
                            </div>
                          </div>
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