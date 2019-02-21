<?php
include "../../Page/fonction/class/qrcode.php";  
$qc = new QRCODE(); 
if (isset($_GET['idclient'])) {
   if(!empty($_GET['idclient'])){
   	$qc->TEXT($_GET['idclient']);
   	$qc->QRCODE(400,$_GET['idclient']);
   	header("location:../../Page/Accueil.php?page=AjoutClient&error=0");
   }
}
?>