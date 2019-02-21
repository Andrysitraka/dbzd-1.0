<?php
include_once('class/main.php');
$main=new main();
if( isset($_POST['Nom']) AND isset($_POST['trancedage']) AND isset($_POST['situationmatrimonial']) AND isset($_POST['occupation']) AND isset($_POST['identifientsurfacebook'])AND isset($_POST['contact']) AND isset($_POST['liensurfacebook']) AND isset($_POST['sexe']) AND isset($_POST['quartier']) AND isset($_POST['ville']) ){

	if( !empty($_POST['Nom']) AND !empty($_POST['identifientsurfacebook'])AND !empty($_POST['contact']) AND !empty($_POST['liensurfacebook']) AND !empty($_POST['quartier']) AND !empty($_POST['ville']) ){
$sql1="SELECT `idclient` FROM `client` WHERE `liensurfacebook` LIKE '".$_POST['liensurfacebook']."'";
$id=$main->fetch($sql1);
$sql="UPDATE `client` SET `Nom`='".$_POST['Nom']."',`trancedage`='".$_POST['trancedage']."',`situationmatrimonial`='".$_POST['situationmatrimonial']."',`occupation`='".$_POST['occupation']."',`identifientsurfacebook`='".$_POST['identifientsurfacebook']."',`liensurfacebook`='".$_POST['liensurfacebook']."',`contact`='".$_POST['contact']."',`ville`='".$_POST['ville']."',`quartier`='".$_POST['quartier']."',`sexe`='".$_POST['sexe']."' WHERE `idclient` LIKE'".$id['idclient']."'";
    $reponse=$main->requette($sql);
    if ($reponse) {
    	header("location:../Accueil.php?page=Modificationclient&client=".$id['idclient']."&error=0"); 
    }
 } 
}else{
 echo 'faux';
}
?>