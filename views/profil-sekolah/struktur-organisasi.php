<?php require_once("../../controller/profil-sekolah.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Struktur Organisasi";
require_once("../../templates/views_top.php");
?>

<style>
  /* --- TREE STRUCTURE CSS --- */
  .tree {
    width: 100%;
    overflow-x: auto;
    padding: 40px 20px;
    text-align: center;
    background: #f8f9fc;
    /* Latar belakang sedikit abu agar kartu pop-up */
    border-radius: 16px;
  }

  .tree ul {
    padding-top: 20px;
    position: relative;
    display: flex;
    justify-content: center;
    margin: 0;
  }

  .tree li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 10px 0 10px;
  }

  /* Garis Konektor Horizontal & Vertikal */
  .tree li::before,
  .tree li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 2px solid #cbd5e1;
    /* Warna garis lebih soft */
    width: 50%;
    height: 20px;
  }

  .tree li::after {
    right: auto;
    left: 50%;
    border-left: 2px solid #cbd5e1;
  }

  .tree li:only-child::after,
  .tree li:only-child::before {
    display: none;
  }

  .tree li:only-child {
    padding-top: 0;
  }

  .tree li:first-child::before,
  .tree li:last-child::after {
    border: 0 none;
  }

  .tree li:last-child::before {
    border-right: 2px solid #cbd5e1;
    border-radius: 0 10px 0 0;
  }

  .tree li:first-child::after {
    border-radius: 10px 0 0 0;
  }

  .tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 2px solid #cbd5e1;
    width: 0;
    height: 20px;
  }

  /* --- MODERN CARD DESIGN --- */
  .member-card {
    background: #ffffff;
    border: none;
    border-radius: 16px;
    padding: 20px 15px;
    min-width: 180px;
    max-width: 200px;
    position: relative;
    z-index: 10;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: inline-block;
    border-top: 4px solid transparent;
    /* Untuk indikator warna jabatan */
  }

  .member-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }

  /* Color Coding Jabatan */
  .card-kepsek {
    border-top-color: #f59e0b;
  }

  /* Gold */
  .card-wakil {
    border-top-color: #3b82f6;
  }

  /* Blue */
  .card-guru {
    border-top-color: #10b981;
  }

  /* Green */

  .member-card img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 12px;
    border: 3px solid #f1f5f9;
    padding: 2px;
  }

  .member-card h6 {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 4px;
    color: #1e293b;
    letter-spacing: -0.025em;
  }

  .member-card .nip {
    font-size: 11px;
    color: #64748b;
    display: block;
    margin-bottom: 8px;
    font-family: monospace;
  }

  .badge-jabatan {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .badge-kepsek {
    background: #fffbeb;
    color: #b45309;
    border: 1px solid #fcd34d;
  }

  .badge-wakil {
    background: #eff6ff;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
  }

  .badge-guru {
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #a7f3d0;
  }

  .card-actions {
    margin-top: 12px;
    padding-top: 10px;
    border-top: 1px dashed #e2e8f0;
    display: flex;
    justify-content: center;
    gap: 10px;
    opacity: 0.6;
    transition: opacity 0.3s;
  }

  .member-card:hover .card-actions {
    opacity: 1;
  }

  /* --- KONEKTOR KHUSUS GURU (ALUR MENYAMBUNG) --- */
  .staff-connector {
    position: relative;
    padding-top: 40px;
    /* Jarak dari baris wakil */
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  /* Garis Vertikal Panjang dari Wakil ke Guru */
  .staff-connector::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 40px;
    background-color: #cbd5e1;
    z-index: 1;
  }

  .staff-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    position: relative;
    z-index: 5;
    padding-top: 10px;
    /* Garis Horizontal di atas Guru */
    border-top: 2px solid #cbd5e1;
    width: 90%;
    /* Lebar garis horizontal */
  }

  /* Panah kecil di tengah garis staff */
  .staff-grid::before {
    content: '';
    position: absolute;
    top: -6px;
    left: 50%;
    transform: translateX(-50%);
    width: 10px;
    height: 10px;
    background: #cbd5e1;
    border-radius: 50%;
  }

  /* Responsive Fixes */
  @media (max-width: 768px) {
    .staff-grid {
      width: 100%;
      border-top: none;
    }

    .staff-connector::before {
      display: none;
    }

    /* Hapus garis rumit di mobile */
  }
</style>

<div class="nxl-content">

  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Struktur Organisasi</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
    </div>
    <div class="page-header-right ms-auto">
      <div class="d-flex align-items-center gap-2">
        <a href="add-struktur-organisasi" class="btn btn-primary shadow-sm">
          <i class="feather-plus me-2"></i>
          <span>Tambah Pegawai</span>
        </a>
      </div>
    </div>
  </div>
  <div class="main-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card stretch stretch-full border-0 shadow-none bg-transparent">
          <div class="card-body p-0">

            <div class="tree">
              <ul>
                <li>
                  <?php if ($kepsek) : ?>
                    <div class="member-card card-kepsek">
                      <img src="<?= $baseURL ?>assets/img/guru_staff/<?= $kepsek['foto'] ?>" alt="<?= $kepsek['nama'] ?>">
                      <h6><?= $kepsek['nama'] ?></h6>
                      <span class="nip">NIP. <?= $kepsek['nip'] ?></span>
                      <span class="badge-jabatan badge-kepsek"><?= $kepsek['jabatan_atau_mapel'] ?></span>

                      <div class="card-actions">
                        <a href="edit-struktur-organisasi?p=<?= $kepsek['id'] ?>" class="text-primary" title="Edit"><i class="feather-edit-2"></i></a>
                        <form action="" method="post" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                          <input type="hidden" name="id" value="<?= $kepsek['id'] ?>">
                          <button type="submit" name="delete_guru_staff" class="btn btn-link text-danger p-0 border-0 bg-transparent" title="Hapus"><i class="feather-trash-2"></i></button>
                        </form>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="member-card border-danger">
                      <div class="text-danger fw-bold">Data Kepsek Kosong</div>
                      <small class="text-muted">Input urutan 1</small>
                    </div>
                  <?php endif; ?>

                  <?php if (mysqli_num_rows($query_wakil) > 0) : ?>
                    <ul>
                      <?php while ($wakil = mysqli_fetch_assoc($query_wakil)) : ?>
                        <li>
                          <div class="member-card card-wakil">
                            <img src="<?= $baseURL ?>assets/img/guru_staff/<?= $wakil['foto'] ?>" alt="<?= $wakil['nama'] ?>">
                            <h6><?= $wakil['nama'] ?></h6>
                            <span class="nip">NIP. <?= $wakil['nip'] ?></span>
                            <span class="badge-jabatan badge-wakil"><?= $wakil['jabatan_atau_mapel'] ?></span>
                            <div class="card-actions">
                              <a href="edit-struktur-organisasi?p=<?= $wakil['id'] ?>" class="text-primary"><i class="feather-edit-2"></i></a>
                              <form action="" method="post" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                <input type="hidden" name="id" value="<?= $wakil['id'] ?>">
                                <button type="submit" name="delete_guru_staff" class="btn btn-link text-danger p-0 border-0 bg-transparent"><i class="feather-trash-2"></i></button>
                              </form>
                            </div>
                          </div>
                        </li>
                      <?php endwhile; ?>
                    </ul>
                  <?php endif; ?>

                  <div class="staff-connector">
                    <div class="staff-grid">

                      <div class="w-100 text-center mb-3">
                        <span class="badge bg-white text-secondary border shadow-sm px-3 py-2 rounded-pill">Dewan Guru & Staff Pengajar</span>
                      </div>

                      <?php if (mysqli_num_rows($query_guru) > 0) : ?>
                        <?php while ($guru = mysqli_fetch_assoc($query_guru)) : ?>
                          <div class="member-card card-guru">
                            <img src="<?= $baseURL ?>assets/img/guru_staff/<?= $guru['foto'] ?>" alt="<?= $guru['nama'] ?>">
                            <h6><?= $guru['nama'] ?></h6>
                            <span class="nip">NIP. <?= $guru['nip'] ?></span>
                            <span class="badge-jabatan badge-guru"><?= $guru['jabatan_atau_mapel'] ?></span>
                            <div class="card-actions">
                              <a href="edit-struktur-organisasi?p=<?= $guru['id'] ?>" class="text-primary"><i class="feather-edit-2"></i></a>
                              <form action="" method="post" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                <input type="hidden" name="id" value="<?= $guru['id'] ?>">
                                <button type="submit" name="delete_guru_staff" class="btn btn-link text-danger p-0 border-0 bg-transparent"><i class="feather-trash-2"></i></button>
                              </form>
                            </div>
                          </div>
                        <?php endwhile; ?>
                      <?php else : ?>
                        <div class="alert alert-light border w-50">Belum ada data Guru</div>
                      <?php endif; ?>

                    </div>
                  </div>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("../../templates/views_bottom.php") ?>