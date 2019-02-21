<?php
include_once('class/main.php');
$main=new main();
$term = $_GET['term'];
if(isset($_GET['cat']) AND isset($_GET['famille']) ){
$groupe=$_GET['groupe'];	
$famille=$_GET['famille'];
}
$sql="SELECT `designation`,`codeproduit` FROM `produit` WHERE `group`LIKE'".$groupe."' AND `famille` LIKE '".$famille."' AND `designation`LIKE '%".$term."%'";
$reponse=$main->fetchAll($sql);
$array = array();
foreach ($reponse as $reponse) {
array_push($array, $reponse['codeproduit']."/".$reponse['designation']); 
}
echo json_encode($array); 
?>

