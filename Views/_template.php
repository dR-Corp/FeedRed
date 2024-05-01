<!DOCTYPE html>
<html>
<head>
    <?php echo $head; ?>
    <?php echo $scripts; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php echo $navbar; ?>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-cyan elevation-4">
    <!-- Brand Logo -->
    <a href="home.html" class="brand-link" style="background-color: #044687;">
      <img src="<?php echo ASSETS;?>LTE/dist/img/as.png" alt="AdminLTE Logo" class="bg-white brand-image img-circle elevation-3">
      <span class="brand-text font-weight-bold text-white">Feed|Red</span>
    </a>
    <!-- Sidebar -->
  <?php echo $sidebar; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php echo $contentPage; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
  <?php echo $footer; ?>
  <!-- /.footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  if(isset($_SESSION['alert']) && !empty($_SESSION['alert']) && $_SESSION['alert_message'] != "Bienvenue") {
    ?>
    <script>
      Swal.fire({
          position: 'top-end',
          icon: '<?php echo $_SESSION['alert'] ?>',
          title: "<?php echo $_SESSION['alert_message'] ?>",
          showConfirmButton: false,
          timer: 2000
      })
    </script>
    <?php
    unset($_SESSION['alert']);
    unset($_SESSION['alert_message']);
  }
  else if(isset($_SESSION['alert']) && !empty($_SESSION['alert']) && $_SESSION['alert_message'] == "Bienvenue"){
    
    if(isset($_SESSION['notif']) && !empty($_SESSION['notif']) && $_SESSION["showed"] == 1 && $_SESSION['profil'] !=4):
    ?>
    <script>
      Swal.fire({
          position: 'center',
          icon: 'info',
          title: 'Information importante',
          text: <?php echo json_encode($_SESSION['notif']) ?>,
          showConfirmButton: true,
      })
    </script>
    <?php else: ?>  
    <script>
      Swal.fire({
          position: 'center',
          icon: '<?php echo $_SESSION['alert'] ?>',
          title: "<?php echo $_SESSION['alert_message'] ?>",
          showConfirmButton: false,
          timer: 3000
      })
    </script>
    <?php
    endif;
    unset($_SESSION['alert']);
    unset($_SESSION['alert_message']);
  }
?>

</body>
</html>
