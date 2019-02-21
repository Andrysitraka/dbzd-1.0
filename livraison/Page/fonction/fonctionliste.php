<?php
include_once('class/main.php');
$main=new main();
$term = $_GET['term'];
if(isset($_GET['cat'])){
$cat=$_GET['cat'];	
}

$sql="SELECT `designation` FROM `produit` WHERE `category` LIKE '".$cat."' AND `designation`LIKE '%".$term."%'";
$reponse=$main->fetchAll($sql);
$array = array();
foreach ($reponse as $reponse) {
array_push($array, $reponse['designation']); 
}
echo json_encode($array); 
?>