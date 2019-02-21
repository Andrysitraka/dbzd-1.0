<?php
include_once('class/main.php');
$main=new main();
if (isset($_POST['recherche'])){
  if (!empty($_POST['recherche'])){
  $sql="SELECT * FROM `client` WHERE `liensurfacebook` LIKE '".$_POST['recherche']."'";
  $test=$main->fetchAll( $sql);
  if($test){
  $reponse=$test;
  }else{
  $sql1="SELECT * FROM `client` WHERE `identifientsurfacebook` LIKE '".$_POST['recherche']."'";
  $test1=$main->fetchAll($sql1);
  if ($test1) {
  	$reponse=$test1;
  }else{
  $sql2="SELECT * FROM `client` WHERE `idclient` LIKE  '".$_POST['recherche']."'";
  $test2=$main->fetchAll($sql2);
     if($test2){
    $reponse=$test2;
     }
    }
  }
if (!isset($reponse)) {
?>
<section class="panel">
    <header class="panel-heading">
        <h3>Erreur</h3>
           </header>
            <div class="table-responsive">
             </div>
        </section>        	
<?php 
}else{
?>
<?php foreach ($reponse as $reponse):?>     
 <section class="panel">
  <div class="container">
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <?php echo '<img style="width:110px;" src="../img/photoclient/'.$reponse['photo'].'">';?>
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?php echo $reponse['idclient'];?></p>
                <p><?php echo $reponse['Nom']." ".$reponse['Prenom'];?></p> <small><cite title="Source Title"> <?php echo $reponse['ville'];?> <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>
            <p> <?php echo $reponse['identifientsurfacebook'];?>
                <br/> 
              <?php echo '<a href="'.$reponse['liensurfacebook'].'">Consulter facebook</a>';?>
                <br /> 
            </p>
        </div> 

<?php endforeach;?>
                   

              </div>

            </section>

<?php 
}
  }
}

?>