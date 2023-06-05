
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>public/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
   <!-- Page script -->
   <script>
      $(function () {
         // Date Picker
         $('#datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
         })
      })
   </script>

    <script type="text/javascript">
      $(document).on("click",".btnhapus",function(){
         var id =$(this).attr("data-id");
         swal({
            title: "Peringatan!",
            text: "Apakah anda ingin menghapus data ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
            .then((willDelete) => {
            if (willDelete) {
               window.location = "<?= base_url() ?>siswa/delete/"+id;
            } else {
               swal("Cancelled", "Batal :)", "error");
            }
         });
      });

   </script>

   <script>
      $(document).ready(function(){
          $('.master').addClass('active');
          $('.kader').addClass('active');
      });
   </script>