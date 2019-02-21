<?php
include_once('class/main.php');
$main=new main();
$json=array("erreur"=>"true");
if (isset($_POST['cherche'])){
  if (!empty($_POST['cherche'])){
  $sql="SELECT `idclient`,`Nom` FROM `client` WHERE `liensurfacebook` LIKE '".$_POST['cherche']."'";
  $test=$main->fetch( $sql);
  if($test){
  $reponse=$test;
  }else{
  $sql1="SELECT `idclient`,`Nom` FROM `client` WHERE `identifientsurfacebook` LIKE'".$_POST['cherche']."'";
  $test1=$main->fetch($sql1);
  if ($test1) {
    $reponse=$test1;
  }else{
  $sql2="SELECT `idclient`,`Nom` FROM `client` WHERE `idclient` LIKE '".$_POST['cherche']."'";
  $test2=$main->fetch($sql2);
     if($test2){
    $reponse=$test2;
     }
    }
  }
if (!isset($reponse)){
  $json['client']='';
   }else{
    $client=$reponse['idclient'];
    $json['client']=$client;
    
   }

 } 
}
 echo json_encode($json);
?>