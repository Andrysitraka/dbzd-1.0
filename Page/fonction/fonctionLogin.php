<?php 
include_once"class/main.php";
session_start();
$json=array('error'=>true);
$_SESSION['login']=array();
$main=new main();
if(isset($_POST['pass']) AND $_POST['user']){
  if(!empty($_POST['pass']) AND !empty($_POST['user'])){
  $reponse=$main->fetch('SELECT `matricule`,`statu` FROM `user` WHERE `pass`= ? AND `username`= ? ',array($_POST['pass'],$_POST['user']));

    if($reponse){
   $sql1="UPDATE `gestiondevente`.`user` SET `onligne` = 'on' WHERE `user`.`matricule` ='".$reponse['matricule']."'";
    $main->fetch($sql1);
   $dt = new DateTime();
   date_default_timezone_set('UTC');
   $DateTime=$dt->format('Y-m-d H:i:s');
  $sql2="INSERT INTO `gestiondevente`.`onligne` (`condebut`, `Usermattr`) VALUES ('".$DateTime."', '".$reponse['matricule']."')";
  $main->fetch($sql2);
     $_SESSION['login']['matricule']=$reponse['matricule'];
     $_SESSION['login']['datedebut']=$DateTime;
     $json['statut']=$reponse['statu'];
     $json['error']=false;
    }else{

    	$json['error']=true;
    }
 }else{
      $json['error']=true;
  }

  echo json_encode($json);
}
?>