<?php
include_once('class/main.php');
$main=new main();
$term = $_GET['term'];
$sql="SELECT `identifientsurfacebook` FROM `client` WHERE `identifientsurfacebook`LIKE '%".$term."%'";
$reponse=$main->fetchAll($sql);
$array = array();
foreach ($reponse as $reponse) {
array_push($array, $reponse['identifientsurfacebook']); 
}
echo json_encode($array); 
?>