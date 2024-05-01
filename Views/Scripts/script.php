<?php
  $secondes = "null";

  if(isset($_SESSION['idRedacteur'])) {
    $idRed = $_SESSION['idRedacteur'];

    //Récupération des rédaction du rédacteur connecté
    $manag = new RedactionManager();
    $redac = $manag->findRedaction($idRed);
    //Récupération de l'instance du rédacteur connecté
    $manag = new RedacteurManager();
    $red = $manag->find($idRed);
    //Récupération de l'article du rédacteur

    if($red->getArticle()) {
      
      $manag = new ArticleManager();
      $art = $manag->find($red->getArticle());
      // echo "lorem dhl aedlh lhdea duehadl kjdedh".$art->getDateLimit()."lorem";
      //L'article ne sera libéré que dans le cas où celui ci est pris
      if(!is_null($art->getIdArticle()) && $art->getDateLimit() != "" && $art->getEtat() == 2) {
        $secondes = $art->getDateLimit() - time();
        $redirection = "liberer-article.html~idArticle~".$art->getIdArticle()."~idRedacteur~".$_SESSION['idRedacteur'];
        if($secondes <= 0) header("Location: $redirection");
      }
      
    }
      
  }

?>

<!-- gestion du compte à rebours -->
<script type="text/javascript">
  var temps = <?php echo $secondes?>;
  if(!isNaN(temps)) {
    var timer =setInterval('CompteaRebour()',1000);
    function CompteaRebour() {
      temps--;
      j = parseInt(temps) ;
      h = parseInt(temps/3600) ;
      m = parseInt((temps%3600)/60) ;
      s = parseInt((temps%3600)%60) ;
      var compte_a_rebours = document.getElementById('compte_a_rebours');
      compte_a_rebours.innerHTML= (h<10 ? "0"+h : h) + ' : ' + (m<10 ? "0"+m : m) + ' : ' + (s<10 ? "0"+s : s);
      compte_a_rebours.className = "float-right bg-danger px-1 rounded";
      if ((s == 0 && m ==0 && h ==0)) {
        clearInterval(timer);
        url = "<?php echo $redirection ?>"
        Redirection(url)
      }
    }
    function Redirection(url) {
      setTimeout("window.location=url", 500)
    }
    document.getElementByTagName(body).addEventListenner('load', function(e) {
      setInterval('CompteaRebour()',0);
      timer;
    });
  }
</script>

<!-- jQuery -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ASSETS;?>LTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ASSETS;?>LTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo ASSETS;?>LTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo ASSETS;?>LTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo ASSETS;?>LTE/plugins/moment/moment.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo ASSETS;?>LTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo ASSETS;?>LTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo ASSETS;?>LTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSETS;?>LTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo ASSETS;?>LTE/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes --> 
<script src="<?php echo ASSETS;?>LTE/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo ASSETS;?>LTE/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo ASSETS;?>LTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo ASSETS;?>LTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- DataTables -->
<script src="<?php echo ASSETS;?>LTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo ASSETS;?>LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- html2pdf -->
<script src="<?php echo ASSETS;?>LTE/plugins/html2pdf.bundle.js"></script>
<!-- printThis -->
<script src="<?php echo ASSETS;?>LTE/plugins/printThis.js"></script>
<!-- sweetalert2 -->
<script src="<?php echo ASSETS;?>LTE/package/dist/sweetalert2.all.min.js"></script>

<script src="<?= ASSETS ?>LTE/plugins/xlsx/xlsx.full.min.js"></script>
<script src="<?= ASSETS ?>LTE/plugins/xlsx/FileSaver.js"></script>
<script src="<?= ASSETS ?>LTE/plugins/xlsx/jhxlsx.js"></script>