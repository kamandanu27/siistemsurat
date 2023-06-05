
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
         alert(id);
      });

   </script>

   <script>
      $(document).ready(function(){
          $('.master').addClass('active');
          $('.kader').addClass('active');
      });
   </script>