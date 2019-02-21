<?php
include_once('class/main.php');
$main=new main();
if (isset($_GET['idfacture'])) {
	$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
	$comand=$main->fetchAll($sql);
if($comand){	
	$sql='UPDATE `gestiondevente`.`facture` SET `Statut` = "Annule" WHERE `facture`.`NumFact` ="'.$_GET['idfacture'].'"';
	$main->fetch($sql);
	foreach ($comand as $comand) {
		$sql="UPDATE `gestiondevente`.`livraison` SET `statut` = 'Annule' WHERE `livraison`.`idcomand`='".$comand['idcomande']."'";
		$main->fetch($sql);
		var_dump($sql);
	}
  }
}
?>