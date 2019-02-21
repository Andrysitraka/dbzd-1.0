<?php 
include_once 'class/main.php';
$main=new main();
$json=array();
if(isset($_GET['codeproduit'])){
  if(!empty($_GET['codeproduit'])){
     $sqltest="SELECT * FROM `produit` WHERE `codeproduit` like '".$_GET['codeproduit']."'";
     $retour=$main->test($sqltest);
     if($retour>0){
      $sql="DELETE FROM `produit` WHERE `codeproduit` LIKE'".$_GET['codeproduit']."'";
         $main->requette($sql); 
        $json['message']='Succes';  
     }else{
        $json['message']='Produit introvable';
     }

  }else{
        $json['message']='erreur';
  }
}
echo json_encode($json);
?>