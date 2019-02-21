<?php
session_start();
include_once('class/main.php');
$main=new main();
$user=$_SESSION['login']['matricule'];
var_dump($_POST['nature']);
if (isset($_POST['date'])AND isset($_POST['commentair']) AND isset($_POST['type']) AND isset($_POST['nature']) AND isset($_POST['idclient']) ) {
	if (!empty($_POST['date']) AND !empty($_POST['commentair']) AND !empty($_POST['type']) AND !empty($_POST['nature']) AND !empty($_POST['idclient']) ){
		$idclient=explode(" ",$_POST['idclient']);
$sql='INSERT INTO `gestiondevente`.`discutionfb` (`idclient`, `nature`, `commentaire`, `type`, `Date`, `user`) VALUES ("'.$idclient[0].'","'.$_POST['nature'].'","'.$_POST['commentair'].'","'.$_POST['type'].'","'.$_POST['date'].'","'.$user.'")';
    $main->fetch($sql);
var_dump($sql);
$sql2="SELECT `iddiscution` FROM `discutionfb` ORDER BY `iddiscution` DESC  LIMIT 1";
$reponse=$main->fetch($sql2);
$sql3="INSERT INTO `gestiondevente`.`historiqueclient` (`id`, `idclient`, `idx`, `date`) VALUES (NULL, '".$idclient[0]."', '".$reponse['iddiscution']."', '".$_POST['date']."')"; 
   $main->fetch($sql3);
    echo 'sur';
    var_dump($sql);
	}
}
?>