<?php
require_once("fonction/class/dompdf/dompdf_config.inc.php");
/*if ( isset( $_POST["html"] ) ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);*/
 ?>   
  <?php $html="<html>
 <body>
  <h1>Hello Dompdf</h1>
 </body>
</html>";

  $old_limit = ini_set("memory_limit", "16M");
  $dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->set_paper('letter', 'landscape');
  $dompdf->render();
  $dompdf->stream("test.pdf");

  /*exit(0);
}*/
 ;?>