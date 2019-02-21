<?php
include_once('class/main.php');
$main=new main();
if (isset($_GET['idfacture']) AND isset($_POST['livreur']) AND isset($_POST['datelivre']) AND isset($_POST['debut']) AND isset($_POST['fin']) ){

	$sql="SELECT `idcomande` FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
	$comand=$main->fetchAll($sql);
	var_dump($comand);
if($comand){	
	$sql='UPDATE `gestiondevente`.`facture` SET `Statut` = "confirmer" WHERE `facture`.`NumFact` ="'.$_GET['idfacture'].'"';
	$main->fetch($sql);
	foreach ($comand as $comand){
		$sql="UPDATE `gestiondevente`.`livraison` SET `statut` = 'confirmer',`datediflivre`='".$_POST['datelivre']."',`heurlivrediffin`='".$_POST['fin']."',`heurlivredifdebut`='".$_POST['debut']."',`Nomlivreur`='".$_POST['livreur']."' WHERE `livraison`.`idcomand`='".$comand['idcomande']."'";
		$main->fetch($sql);
		var_dump($sql);
	}
  }
}else {
	echo 'ko';
}
?>