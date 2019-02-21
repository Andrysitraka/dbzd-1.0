<?php
include_once('class/main.php');
$main=new main();
if(isset($_POST['Nom']) AND isset($_POST['trancedage']) AND isset($_POST['SituationMatrimonial']) AND isset($_POST['Occupation']) AND isset($_POST['identifient']) AND  isset($_POST['liensurfb']) AND isset($_POST['Contact']) AND isset($_POST['ville']) AND isset($_POST['Quartier']) AND isset($_POST['Sexe']) AND isset($_FILES['image']) ){
 if(!empty($_POST['trancedage']) AND !empty($_POST['SituationMatrimonial']) AND !empty($_POST['Occupation']) AND !empty($_POST['identifient']) AND  !empty($_POST['liensurfb']) AND !empty($_POST['Contact']) AND !empty($_POST['ville']) AND !empty($_POST['Quartier']) AND !empty($_POST['Sexe']) AND !empty($_FILES['image']['name'])){
 $sql="SELECT * FROM `client` WHERE `liensurfacebook` LIKE '".$_POST['liensurfb']."'";
 $requettetest=$main->test($sql); 
 if ($requettetest==0) {
 	$sqlid="SELECT `id` FROM `client` ORDER BY `id` DESC LIMIT 1 ";
 	$id=$main->fetch($sqlid);
 	if ($id===false) {
 		$idtemp="0001";
 	}else if($id['id']<10){
 		$idtemp1=$id['id']+1;
        $idtemp="000".$idtemp1;
 	}else if ($id['id']<100) {
 		$idtemp1=$id['id']+1;
 		 $idtemp="00".$idtemp1;
 	}else if ($id['id']<1000) {
 		$idtemp1=$id['id']+1;
 		 $idtemp="0".$idtemp1;
 	}else {
 		$idtemp1=$id['id']+1;
 		$idtemp=$idtemp1;
 	}
 	$date=date("y.m");
 	$set=explode(".", $date);
$idclient="CLT-".$idtemp."-".$set[0]."-".$set['1'];
 $image=$_FILES['image']['tmp_name'];
  $extentionup=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
  $extentionValide=array('jpg','pmg','gif');
   if(array($extentionup,$extentionValide)){
    $thumb=$idclient.'.'.$extentionup;
  	$chemien="../../img/photoclient/".$idclient.'.'.$extentionup;
  	$resultat=move_uploaded_file($image,$chemien);
  	if ($resultat) {
 $qrcode=$idclient;    
 $datedenregestrement=date("Y-m-d h:n:s");
 $requetteAjout="INSERT INTO `gestiondevente`.`client` (`id`, `Nom`,`qrcode`, `trancedage`, `situationmatrimonial`, `occupation`, `identifientsurfacebook`, `liensurfacebook`, `contact`, `ville`, `quartier`, `sexe`, `photo`, `idclient`, `datedenregestrement`) VALUES (NULL, '".$_POST['Nom']."', '".$qrcode."', '".$_POST['trancedage']."', '".$_POST['SituationMatrimonial']."', '".$_POST['Occupation']."', '".$_POST['identifient']."','".$_POST['liensurfb']."', '".$_POST['Contact']."', '".$_POST['ville']."', '".$_POST['Quartier']."', '".$_POST['Sexe']."', '".$thumb."', '".$idclient."', '".$datedenregestrement."');";
 $test=$main->requette($requetteAjout);
     header("location:../../img/QRcode/generateur.php?idclient=".$idclient); 
    }
}

 }else{
 header("location:../Accueil.php?page=AjoutClient&error=1"); 
 }
 }else{
header("location:../Accueil.php?page=AjoutClient&error=2");  
 }
    
}else{
header("location:../Accueil.php?page=AjoutClient&error=3");
}
?>