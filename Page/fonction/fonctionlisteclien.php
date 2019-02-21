<?php
include_once('class/main.php');
$main=new main();
$term = $_GET['term'];
$sql="SELECT `identifientsurfacebook`,`idclient` FROM `client` WHERE `identifientsurfacebook`LIKE '%".$term."%'";
$reponse=$main->fetchAll($sql);
$array = array();
foreach ($reponse as $reponse) {
array_push($array, $reponse['idclient']."/".$reponse['identifientsurfacebook']); 
}
echo json_encode($array); 
?>