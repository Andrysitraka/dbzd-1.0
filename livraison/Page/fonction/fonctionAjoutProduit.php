<?php 
include_once('class/main.php');
$main=new main();
if(isset($_POST['codeproduit']) AND isset($_POST['prix']) AND isset($_POST['designation'])AND isset($_POST['quantite']) AND isset($_POST['category'])  AND isset($_FILES['image'])AND isset($_POST['description'])  AND isset($_POST['ModeUtilisation']) ){
	if(!empty($_FILES['image'])){
    $sqltest="SELECT * FROM `produit` WHERE `codeproduit` LIKE'".$_POST['codeproduit']."'";
    /*var_dump($sqltest);*/
    $requettetest=$main->test($sqltest);
    /*var_dump($requettetest);*/
if($requettetest==0){
  $image=$_FILES['image']['tmp_name'];
  $extentionup=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
  $extentionValide=array('jpg','pmg','gif');
   if(array($extentionup,$extentionValide)){
    $thumb=$_POST['codeproduit'].'.'.$extentionup;
  	$chemien="../../img/produit/".$_POST['codeproduit'].'.'.$extentionup;
  	$resultat=move_uploaded_file($image,$chemien);
  	if ($resultat) {
      if (!empty($_POST['ingredient'])) {
         $sql="INSERT INTO `gestiondevente`.`produit` (`codeproduit`, `prix`, `designation`, `quantite`, `category`, `photoproduit`,`ModeUtilisation`,`description`,`ingredient`) VALUES ('".$_POST['codeproduit']."', '".$_POST['prix']."', '".$_POST['designation']."', '".$_POST['quantite']."','".$_POST['category']."', '".$thumb."','".$_POST['ModeUtilisation']."','".$_POST['description']."','".$_POST['ingredient']."')";
      }else{
         $sql="INSERT INTO `gestiondevente`.`produit` (`codeproduit`, `prix`, `designation`, `quantite`, `category`, `photoproduit`,`ModeUtilisation`,`description`) VALUES ('".$_POST['codeproduit']."', '".$_POST['prix']."', '".$_POST['designation']."', '".$_POST['quantite']."','".$_POST['category']."', '".$thumb."','".$_POST['ModeUtilisation']."','".$_POST['description']."')";
      }
   
    $requetteajout=$main->requette($sql);
   /* var_dump($sql);
    var_dump($requetteajout);*/
    if ($requetteajout===true) {
     header('location:../Accueil.php?page=Ajoutproduit&error=0');
    }else{
    header('location:../Accueil.php?page=Ajoutproduit&error=1');	
    }
     
      }
    }
  }
}
  	
}else{
 header('location:../Accueil.php?page=Ajoutproduit&error=2');

}
?>



