<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/dist/css/skins/_all-skins.min.css">

        <!-- fullCalendar -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/plugins/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/plugins/fullcalendar/dist/fullcalendar.print.min.css" media="print">

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>public/lte/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- bootstrap datetimepicker -->
    <script src="<?= base_url() ?>public/lte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      .skin-green .main-header .navbar .sidebar-toggle:hover {
        background-color: white;
      }
      .skin-green .main-header .navbar .sidebar-toggle {
        color: black;
      }
      .skin-green .main-header .navbar .sidebar-toggle:hover {
        color: black;
      }
    </style>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header" style="background-color: #ffffff">
         <?php  include 'v_head.php'; ?>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php  include 'v_sidebar.php'; ?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php include 'v_content.php'; ?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <?php  include 'v_footer.php'; ?>
      </footer>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url() ?>public/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url() ?>public/lte/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>public/lte/plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url() ?>public/lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>public/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>public/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>public/lte/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/lte/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>public/lte/dist/js/demo.js"></script>
    <!-- page script -->

    <script type="text/javascript">
		    $(".alert-dismissible").alert().delay(2000).slideUp('slow');
    </script>
    

    <?php include 'v_ajax.php'; ?>

    <script>
        $(function () {

        $(".select2").select2();

        $("#example1").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
