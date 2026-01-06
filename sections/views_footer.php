<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
          <span>Copyright &copy; <a href="https://wasd.netmedia-framecode.com" class="text-decoration-none" target="_blank">WASD Netmedia Framecode</a> <?= date('Y') ?> | Develop by Imanuel Nggau</span>
        </p>
      </div>
    </div>
  </div>
</footer>
</main>

<script src="<?= $baseURL ?>assets/vendor/js/vendors.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/js/daterangepicker.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/js/apexcharts.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/js/circle-progress.min.js"></script>
<script src="<?= $baseURL ?>assets/js/common-init.min.js"></script>
<script src="<?= $baseURL ?>assets/js/dashboard-init.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/js/dataTables.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/js/dataTables.bs5.min.js"></script>
<script src="<?= $baseURL ?>assets/js/theme-customizer-init.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $baseURL ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= $baseURL ?>assets/js/demo/datatables-demo.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
  const showMessage = (type, title, message) => {
    if (message) {
      Swal.fire({
        icon: type,
        title: title,
        text: message,
      });
    }
  };

  showMessage("success", "Berhasil Terkirim", $(".message-success").data("message-success"));
  showMessage("info", "For your information", $(".message-info").data("message-info"));
  showMessage("warning", "Peringatan!!", $(".message-warning").data("message-warning"));
  showMessage("error", "Kesalahan", $(".message-danger").data("message-danger"));
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const elementIDs = ['#konten', '#visi', '#misi', '#tujuan_sekolah'];
    elementIDs.forEach(function(id) {
      if (document.querySelector(id)) {
        ClassicEditor
          .create(document.querySelector(id), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
          })
          .catch(error => {
            console.error('Error pada element ' + id + ':', error);
          });
      }
    });
  });
</script>