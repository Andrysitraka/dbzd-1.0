<?php 
include_once 'class/main.php';
$main=new main();
$json=array();
if(isset($_GET['idclient'])){
  if(!empty($_GET['idclient'])){
     $sqltest="SELECT * FROM `client` WHERE `idclient` LIKE '".$_GET['idclient']."'";
     $retour=$main->test($sqltest);
     if($retour>0){
      $sql="DELETE FROM `client` WHERE `idclient` LIKE'".$_GET['idclient']."'";
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