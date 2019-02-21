<?php
include_once('class/main.php');
$main=new main();
$image=$_POST['image']['value'];
$lien=explode("/", $image);
$json= array();
$sql='SELECT `photo`,`idclient` FROM `client` WHERE `idclient` like"'.$lien[0].'"';
$reponse=$main->fetch($sql);
$json['image']=$reponse['photo'];
$json['idclient']=$reponse['idclient'];
echo json_encode($json); 
?>
