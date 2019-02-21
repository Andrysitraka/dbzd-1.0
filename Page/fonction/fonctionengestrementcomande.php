<?php
include_once('class/main.php');
$main=new main();
session_start();
if(isset($_POST['date']) AND isset($_POST['Debut']) AND isset($_POST['Fin']) AND isset($_POST['ville']) AND isset($_POST['quartier']) AND isset($_POST['lieulivre']) AND isset($_POST['remarque']) AND isset($_POST['quantiter']) AND isset($_POST['produitr']) AND isset($_POST['fact']) AND isset($_POST['datecommande']) AND isset($_POST['client'])){
	$client=explode("/", $_POST['client']);
	$sql='INSERT INTO `gestiondevente`.`comande` (`idcomand`, `datedecomand`, `codeproduit`, `idclient`, `quantite`, `matriculeuser`,`observation`) VALUES (NULL, "'.$_POST['datecommande'].'", "'.$_POST['produitr'].'", "'.$client[0].'", "'.$_POST['quantiter'].'", "'.$_SESSION['login']['matricule'].'","'.$_POST['remarque'].'")';
	 $main->fetch($sql);
    $reponse=$main->fetch("SELECT `idcomand` FROM `comande` WHERE  `datedecomand`='".$_POST['datecommande']."' AND `matriculeuser`='".$_SESSION['login']['matricule']."' ORDER BY `idcomand` DESC LIMIT 1");
    if($reponse){
$sqllivre="INSERT INTO `gestiondevente`.`livraison` (`lieudelivraison`, `datedelivraison`, `debut`, `fin`,`ville`,`qartieur`, `idcomand`,`statut`) VALUES ('".$_POST['lieulivre']."','".$_POST['date']."','".$_POST['Debut']."','".$_POST['Fin']."','".$_POST['ville']."','".$_POST['quartier']."','".$reponse['idcomand']."','on_attente')";
    $main->fetch($sqllivre);
    $dt = new DateTime();
    date_default_timezone_set('UTC');
    $Date=$dt->format('Y-m-d');
    $sqlBl='INSERT INTO `gestiondevente`.`facture` (`idfacture`, `idcomande`, `datedefacture`, `NumFact`, `user`,`idclient`,`vu`,`Statut`,`vulivraison`) VALUES (NULL, "'.$reponse['idcomand'].'", "'.$Date.'", "'.$_POST['fact'].'", "'.$_SESSION['login']['matricule'].'","'.$client[0].'","off","on_attente","off")';
    $main->fetch($sqlBl);
    $dt->modify("+45 day");
    $date=$dt->format("Y-m-d");
    $sqlrelance="INSERT INTO `gestiondevente`.`relance` (`datederelance`, `idclient`, `datedererelance`, `idproduit`, `user`, `Statu`) VALUES ('".$Date."', '".$client[0]."', '". $date."', '".$_POST['produitr']."', '".$_SESSION['login']['matricule']."', 'on')";
   $historique="INSERT INTO `gestiondevente`.`historiqueclient` (`id`, `idclient`, `idx`, `date`) VALUES (NULL, '".$client[0]."', '".$_POST['fact']."', '".$Date."')";
    $main->fetch($sqlrelance);
    $main->fetch($historique);
    echo '<script type="javascript">alert("Votre commande a été envoyé");</script>';
    }else{
    	echo 'false';
    }
	

}
?>

