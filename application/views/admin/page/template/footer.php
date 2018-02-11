<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script src="../../jquery.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="../../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="../../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../assets/bower_components/datatables/js/datatables.min.js"></script>
<script src="../../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables.net/js/jquery.dataTables.js"></script>
<script src="../../assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../../assets/dist/js/moment.js"></script>

<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>

 
<script>
 $(function () {
    $('#contoh').DataTable()
});

      $(document).on('click', '.pilihjadwal', function (e) {
                document.getElementById("kd_jadwal").value = $(this).attr('datakd_jadwal');
                document.getElementById("no_seri").value = $(this).attr('datano_seri');
                document.getElementById("nm_alat").value = $(this).attr('datanm_alat');
                document.getElementById("kd_lokalat").value = $(this).attr('datakd_lokalat');
                document.getElementById("nm_lokasi").value = $(this).attr('datalokasi');
                document.getElementById("lantai").value = $(this).attr('datalantai');
                $('#ModalJadwal').modal('hide');
            });

      $(document).on('click', '.pilihpelaksana', function (e) {
                document.getElementById("pelaksana").value = $(this).attr('datanama');
                document.getElementById("nip").value = $(this).attr('data_nip');    
                $('#ModalPelaksana').modal('hide');
            });

       $(document).on('click', '.pilihpemeliharaan', function (e) {
       			document.getElementById("kd_pemeliharaan").value = $(this).attr('datakd_pemeliharaan');
                document.getElementById("pelaksana").value = $(this).attr('data_pelaksana');  
                document.getElementById("nip").value = $(this).attr('data_nip');
                document.getElementById("kd_jadwal").value = $(this).attr('datakd_jadwal'); 
                document.getElementById("tgl_pemeliharaan").value = $(this).attr('datatgl_pemeliharaan'); 
                document.getElementById("no_seri").value = $(this).attr('datano_seri'); 
                document.getElementById("nm_alat").value = $(this).attr('datanm_alat'); 
                document.getElementById("tipe").value = $(this).attr('data_tipe'); 
                document.getElementById("merek").value = $(this).attr('data_merek');
                document.getElementById("kd_lokalat").value = $(this).attr('datakd_lokalat'); 
                document.getElementById("nm_lokasi").value = $(this).attr('datanm_lokasi');  
                document.getElementById("lantai").value = $(this).attr('data_lantai'); 
                $('#ModalPemeliharaan').modal('hide');
            });

$(document).on('click', '.pilihlokasi', function (e) {
                document.getElementById("kd_lokalat").value = $(this).attr('datakd_lokalat');
                document.getElementById("nm_lokasi").value = $(this).attr('datanm_lokasi');
                document.getElementById("lantai").value = $(this).attr('datalantai');   
                $('#ModalLokasi').modal('hide');
            });

      $(document).on('click', '.pilihalat', function (e) {
                document.getElementById("no_seri").value = $(this).attr('datano_seri');
                document.getElementById("nm_alat").value = $(this).attr('datanm_alat');
                document.getElementById("tgl_beli").value = $(this).attr('datatgl_beli');
                document.getElementById("w_pemeliharaan").value = $(this).attr('dataw_pemeliharaan');
                document.getElementById("tipe").value = $(this).attr('datatipe');
                document.getElementById("merek").value = $(this).attr('datamerek');
                document.getElementById("kd_lokalat").value = $(this).attr('datakd_lokalat');
                document.getElementById("nm_lokasi").value = $(this).attr('datanm_lokasi');
                document.getElementById("lantai").value = $(this).attr('datalantai');
                $('#ModalAlat').modal('hide');
            });


            $(function () {
                $("#lookupjadwal").dataTable();
            });

            $(function () {
                $("#lookup").dataTable();
            });

              $(function () {
                $("#lookuppelaksana").dataTable();
            });

               $(function () {
                $("#lookuplokasi").dataTable();
            });

                $(function () {
                $("#lookupalat").dataTable();
            });
    
 </script>



</body>
</html>
