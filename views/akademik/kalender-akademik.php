<?php require_once("../../controller/akademik.php");
$_SESSION["project_sman_5_kota_komba"]["name_page"] = "Kalender Akademik";
require_once("../../templates/views_top.php");

$arr_events = [];
while ($row = mysqli_fetch_assoc($views_kalender_akademik)) {
  $arr_events[] = [
    'id' => $row['id'],
    'title' => $row['nama_kegiatan'],
    'start' => $row['tanggal_mulai'],
    'end'   => $row['tanggal_selesai'],
    'description' => $row['keterangan'],
    'color' => '#4e73df',
    'textColor' => '#ffffff'
  ];
}
$json_events = json_encode($arr_events);
?>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  /* CSS Anda sudah bagus, tidak ada perubahan */
  #calendar {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background: white;
    min-height: 650px;
    font-family: 'Inter', sans-serif;
  }

  .fc-event-main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2px 5px;
  }

  .delete-icon {
    color: #fff;
    cursor: pointer;
    margin-left: 5px;
    padding: 2px 6px;
    border-radius: 4px;
    background-color: rgba(255, 255, 255, 0.2);
    font-weight: bold;
    font-size: 10px;
    transition: background 0.2s;
    z-index: 99;
  }

  .delete-icon:hover {
    background-color: #e74a3b;
  }

  .fc-daygrid-day {
    cursor: pointer;
  }

  .fc-daygrid-day:hover {
    background-color: #f8f9fc;
  }
</style>

<div class="nxl-content">
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kalender Akademik</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?></li>
      </ul>
    </div>
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-kalender-akademik" class="btn btn-primary">
            <i class="feather-plus me-2"></i>
            <span>Tambah</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="main-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card stretch stretch-full">
          <div class="card-body p-0">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form id="deleteForm" action="" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="nama_kegiatan" id="nama_kegiatan">
    <input type="hidden" name="delete_kalender_akademik" value="true">
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var eventsData = <?= $json_events ?: '[]' ?>;

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listMonth'
      },
      locale: 'id',
      buttonText: {
        today: 'Hari Ini',
        month: 'Bulan',
        list: 'List Agenda'
      },
      events: eventsData,
      selectable: true,

      dateClick: function(info) {
        window.location.href = 'add-kalender-akademik?date=' + info.dateStr;
      },

      eventContent: function(arg) {
        let title = document.createElement('div');
        title.innerHTML = arg.event.title;
        let deleteBtn = document.createElement('span');
        deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
        deleteBtn.className = 'delete-icon';
        let arrayOfDomNodes = [title, deleteBtn]
        return {
          domNodes: arrayOfDomNodes
        }
      },

      eventClick: function(info) {
        if (info.jsEvent.target.closest('.delete-icon')) {
          info.jsEvent.preventDefault();
          Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data kegiatan \"" + info.event.title + "\" akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            document.getElementById('id').value = info.event.id;
            document.getElementById('nama_kegiatan').value = info.event.title;
            document.getElementById('deleteForm').submit();
          });
        } else {
          window.location.href = 'edit-kalender-akademik?p=' + info.event.id;
        }
      }
    });
    calendar.render();
  });
</script>

<?php require_once("../../templates/views_bottom.php") ?>