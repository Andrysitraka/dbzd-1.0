<?php
include_once 'class/main.php';
$main=new main();
$json=array();
if(isset($_POST['groupe']) AND isset($_POST['famille'])){
  if(!empty($_POST['famille']) AND !empty($_POST['groupe'])){
  	$sqltest="SELECT * FROM `categoryproduit` WHERE `groupe`='".$_POST['groupe']."' AND `famille`='".$_POST['famille']."'";
  	 $retour=$main->test($sqltest);
  	 if($retour>0){
       $json['message']='Ce cathegory existe deja';
  	 }else{
  	 $sql="INSERT INTO `categoryproduit`(`groupe`, `famille`) VALUES ('".$_POST['groupe']."','".$_POST['famille']."')";	
  	 $main->requette($sql);
     $json['message']= 'Succes';
  	}

   }else{
   $json['message']='Tous les champs son obligatoire';
   } 
 }else{
	 $json['message']='error';
} 
 echo json_encode($json);
?>