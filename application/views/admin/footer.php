 <footer class="main-footer">
    Copyright &copy; 2018 <strong> Jakarta Center Management.</strong> All rights
    reserved.
  </footer><script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jQueryUI/jquery-ui.min.js')?>"></script>

<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js')?>"></script>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/js/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables.net/js/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jQuery-slimScroll/jquery.slimscroll.min.js')?>"></script>
<script src="../../assets/dist/js/moment.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>

<script>
    $(function(){
        $('#tabel_anggota').DataTable( {
        "scrollX": true
    } );
        $('#tabel_user').DataTable( {
        "scrollX": true
    } );
    })
</script>
 <script>
  // $('input[name=tgl_lahir').datepicker({ format: 'dd-m-yyyy' });
  </script>
  <script>
  $(function () {
    //Add text editor
    $("#isiartikel").wysihtml5();
  });
   $('input[name=tgl_lahir]').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
</script>
</body>
</div>
</html>
