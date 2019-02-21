<?php
include_once('class/main.php');
session_start();
$main=new main();
$json=array("error"=>"true");
$dt=new DateTime();
$DateTime=$dt->format('Y-m-d');
$sql="SELECT * FROM `relance` WHERE `datedererelance`='".$DateTime."' AND  `user` ='".$_SESSION['login']['matricule']."' AND `Statu`='on'";
$reponse=$main->count($sql);
$json["badge"]=$reponse;
$json["error"]="false";
echo json_encode($json);
?>