<?php 
include_once('class/main.php');
$main=new main();
if(isset($_POST['codeproduit']) AND isset($_POST['prix']) AND isset($_POST['designation'])AND isset($_POST['quantite']) AND isset($_POST['category']) AND isset($_POST['description'])  AND isset($_POST['ModeUtilisation']) ){
	$sql="UPDATE `produit` SET `codeproduit`='".$_POST['codeproduit']."',`prix`='".$_POST['prix']."',`designation`='".$_POST['designation']."',`quantite`='".$_POST['quantite']."',`category`='".$_POST['category']."',`description`='".$_POST['description']."',`ModeUtilisation`='".$_POST['ModeUtilisation']."',`ingredient`='".$_POST['ingredient']."' WHERE `codeproduit` ='".$_POST['codeproduit']."'";
    $requette=$main->requette($sql);
   /* var_dump($sql);
    var_dump($requetteajout);*/
    if ($requette===true) {
     header('location:../Accueil.php?page=Modificationproduit&codeproduit='.$_POST['codeproduit'].'&error=0');
    }else{
    header('location:../Accueil.php?page=Modificationproduit&codeproduit='.$_POST['codeproduit'].'&error=1');	
    }
  	
}else{
   header('location:../Accueil.php?page=Modificationproduit&codeproduit='.$_POST['codeproduit'].'&error=2');

}
?>
