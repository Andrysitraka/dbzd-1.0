<?php
include_once('class/main.php');
$main=new main();
session_start();
$dt = new DateTime();
date_default_timezone_set('UTC');
$DateTime=$dt->format('Y-m-d H:i:s');
$sql="UPDATE `onligne` SET `confinfin`='".$DateTime."' WHERE `Usermattr`='".$_SESSION['login']['matricule']."'  AND `condebut`='".$_SESSION['login']['datedebut']."'";
$reponse=$main->fetch($sql);
$sql1="UPDATE `gestiondevente`.`user` SET `onligne` = 'off' WHERE `user`.`matricule` ='".$_SESSION['login']['matricule']."'";
$reponse=$main->fetch($sql1);
session_unset($_SESSION['login']);
header('location:../../Index.php');
?>