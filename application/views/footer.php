
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://efarina.co.id">EFARINA.CO.ID</a>.</strong><a href="http://efarina.co.id"> IT RS EFARINA</a>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b><a href="http://vanrezkysadewa.me">Made With &hearts;</a></b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url().'assets/' ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url().'assets/' ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url().'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url().'assets/' ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url().'assets/' ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url().'assets/' ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url().'assets/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url().'assets/' ?>plugins/moment/moment.min.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url().'assets/' ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url().'assets/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url().'assets/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url().'assets/' ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url().'assets/' ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url().'assets/' ?>dist/js/demo.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<!-- ChartJS -->
<!-- select2 -->
<!-- <script src="<?=base_url().'assets/' ?>/plugins/select2/js/select2.full.min.js"></script> -->
<script src="<?=base_url().'assets/' ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url().'assets/' ?>plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });

  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "scrollY" :true, 
    });
  });
</script>

</body>
</html>