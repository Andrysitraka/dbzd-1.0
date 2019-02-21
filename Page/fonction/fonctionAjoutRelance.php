<?php
session_start();
include_once('class/main.php');
$main=new main();
if(isset($_POST['produit']) AND isset($_POST['client']) AND isset($_POST['type'])){
$user=$_SESSION['login']['matricule'];
$dt=new DateTime();
$datedeb=$dt->format('Y-m-d');
echo $datedeb.'<br/>';
$dt->modify('+1 month');
$datefin=$dt->format('Y-m-d');
echo $datefin;
$sql="INSERT INTO `gestiondevente`.`relance` (`idreclance`, `datederelance`, `idclient`, `datedererelance`, `idproduit`, `user`,`type`) VALUES (NULL, '". $datedeb."', '".$_POST['client']."', '".$datefin."', '".$_POST['produit']."', '".$user."','".$_POST['type']."')";
var_dump($sql);
$main->fetch($sql);
}else{
	echo 'false';
}
?>
