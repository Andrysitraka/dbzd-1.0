<?php
include_once 'class/main.php';
$main=new main();
$json=array();
if(isset($_POST['designation'])){
  if(!empty($_POST['designation'])){
  	$sqltest="SELECT * FROM `categoryproduit` WHERE `designation` LIKE '".$_POST['designation']."'";
  	 $retour=$main->test($sqltest);
  	 if($retour>0){
       $json['message']='Ce cathegory existe deja';
  	 }else{
  	 $sql="INSERT INTO `gestiondevente`.`categoryproduit` ( `designation`) VALUES ('".$_POST['designation']."')";	
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