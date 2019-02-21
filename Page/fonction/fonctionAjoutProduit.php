<?php 
include_once('class/main.php');
$main=new main();

if(isset($_POST['codeproduit']) AND isset($_POST['prix']) AND isset($_POST['designation'])AND isset($_POST['quantite']) AND isset($_FILES['image'])AND isset($_POST['description']) AND isset($_POST['ModeUtilisation']) AND isset($_FILES['pdf']) AND isset($_POST['famille']) AND isset($_POST['groupe'])){
	if(!empty($_FILES['image']) AND !empty($_FILES['pdf'])){
    $sqltest="SELECT * FROM `produit` WHERE `codeproduit` LIKE'".$_POST['codeproduit']."'";
   // var_dump($sqltest);
    $requettetest=$main->test($sqltest);
  //  var_dump($requettetest);
if($requettetest==0){
  $image=$_FILES['image']['tmp_name'];
  $pdffile=$_FILES['pdf']['tmp_name'];
  $extentionup=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
  $extentionuppdf=strtolower(substr(strrchr($_FILES['pdf']['name'], '.'), 1));
  $extentionValide=array('jpg','JPG','PNG','pmg','gif');
  $extentionValideOb=array('PDF','pdf');

   if(array($extentionup,$extentionValide)){ 
     if (array($extentionuppdf,$extentionValideOb) ){
    $thumb=$_POST['codeproduit'].'.'.$extentionup;
    $pdf=$_POST['codeproduit'].'.'.$extentionuppdf;
  	$chemien="../../img/produit/".$_POST['codeproduit'].'.'.$extentionup;
    $chemienpdf="../../argument/".$_POST['codeproduit'].'.'.$extentionuppdf;
  	$resultat=move_uploaded_file($image,$chemien);
    $resultatpdf=move_uploaded_file($pdffile,$chemienpdf);

  if ($resultat){
    if($resultatpdf){
      if (!empty($_POST['ingredient'])){
         $sql="INSERT INTO `gestiondevente`.`produit` (`codeproduit`, `prix`, `designation`, `quantite`, `photoproduit`,`ModeUtilisation`,`description`,`ingredient`,`argument`,`group`, `famille`) VALUES ('".$_POST['codeproduit']."', '".$_POST['prix']."', '".$_POST['designation']."', '".$_POST['quantite']."', '".$thumb."','".$_POST['ModeUtilisation']."','".$_POST['description']."','".$_POST['ingredient']."','".$pdf."','".$_POST['groupe']."','".$_POST['famille']."')";
      }else{
         $sql='INSERT INTO `gestiondevente`.`produit` (`codeproduit`, `prix`, `designation`, `quantite`, `photoproduit`,`ModeUtilisation`,`description`,`argument`,`group`,`famille`) VALUES ("'.$_POST['codeproduit'].'", "'.$_POST['prix'].'","'.$_POST['designation'].'", "'.$_POST['quantite'].'","'.$thumb.'","'.$_POST['ModeUtilisation'].'","'.$_POST['description'].'","'.$pdf.'","'.$_POST['groupe'].'","'.$_POST['famille'].'")';
      }
   
    $requetteajout=$main->requette($sql);
   //var_dump($sql);*/
   //var_dump($sql);
    //var_dump($requetteajout);
    if ($requetteajout===true) {
    header('location:../Accueil.php?page=Ajoutproduit&error=0');
    }else{
    header('location:../Accueil.php?page=Ajoutproduit&error=1');	
    }
     
       }
      }
     }
    }
  }
}
  	
}else{
//header('location:../Accueil.php?page=Ajoutproduit&error=2');
}
?>



