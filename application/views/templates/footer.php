      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; WPU <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/');?>js/demo/datatables-demo.js"></script>
<!-- Ajax Access Role-->
<script>
  $('.form-check-input').on('click',function(){
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url : "<?= base_url('admin/changeaccess'); ?>",
      type: 'post',
      data:{
        menuId : menuId,
        roleId : roleId
        },
        success: function(){
          document.location.href="<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
    })
  }
  )
  </script>

<script>

  $('.form-check-input2').on('click',function(){
    const name = $(this).data('name');
    const is_active = $(this).data('is_active');

    $.ajax({
      url : "<?= base_url('admin/changeWebsetting'); ?>",
      type: 'post',
      data:{
        name : name,
        is_active : is_active
        },
        success: function(){
          document.location.href="<?= base_url('admin/websetting/'); ?>";
        }
    })
  }
  )
  </script>

<script>
var view = document.getElementById("tampilkan");
var url = document.getElementById("url");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 function showPosition(position) {
    view.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude; 
    url.innerHTML = "<a href=<?= base_url('gis/mylocationmap/')?>" + position.coords.latitude + 
    "/" + position.coords.longitude +" class='btn btn-info'>Lihat Peta</a>";
 }
 
 function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
            break;
        case error.TIMEOUT:
            view.innerHTML = "Requestnya timeout bro"
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
    }
 }
</script>
</body>

</html>
