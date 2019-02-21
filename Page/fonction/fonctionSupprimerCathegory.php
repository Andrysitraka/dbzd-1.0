<?php 
include_once 'class/main.php';
$main=new main();
$json=array();
if(isset($_GET['id'])){
	if(!empty($_GET['id'])){
     $sqltest="SELECT * FROM `categoryproduit` WHERE `id` = ".$_GET['id'];
     var_dump($sqltest);
  	 $retour=$main->test($sqltest);
  	 var_dump($retour);
  	 if($retour>0){
  	 	$sql="DELETE FROM `gestiondevente`.`categoryproduit` WHERE `categoryproduit`.`id` ='".$_GET['id']."'";
         $main->requette($sql); 
        $json['message']='Succes';  
  	 }else{
        $json['message']='chathegory introvable';
  	 }

	}else{
        $json['message']='erreur';
	}
}
echo json_encode($json);
?>