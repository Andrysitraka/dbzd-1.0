<?php
include_once('class/main.php');
$main=new main();
if (isset($_POST['recherche'])){
  if (!empty($_POST['recherche'])){
  $sql="SELECT * FROM `produit` WHERE `designation`  LIKE '".$_POST['recherche']."'";
  $test=$main->fetchAll( $sql);

  if($test){
  $reponse=$test;
  }else{
  $sql1="SELECT * FROM `produit` WHERE `codeproduit` = '".$_POST['recherche']."'";
  $test1=$main->fetchAll($sql1);
  if ($test1) {
  	$reponse=$test1;
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
 <section class="panel">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Code produit</th>
                      <th>Aperçu</th>
                      <th>Designation</th>
                      <th>Category</th>
                      <th>Prix </th>  
                      <th>Quantite</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php foreach ($reponse as $reponse):?>                 
                    <tr>

                      <td><?php echo $reponse['codeproduit'];?></td>
                      <td><?php echo '<a href="page=ficheproduit&codeproduit='.$reponse['codeproduit'].'"><img style="width:70px;" src="../img/produit/'.$reponse['photoproduit'].'"></a>';?></td>
                      <td><?php echo $reponse['designation'];?></td>
                      <td><?php echo $reponse['category'];?></td>
                      <td><?php echo $reponse['prix']." Ar";?></td>
                      <td><?php echo $reponse['quantite'];?></td>
                      <td><div class="btn-group">
                        <?php echo '<a class="btn btn-info" href="fonction/?codeproduit='.$reponse['codeproduit'].'"><i class="fa fa-info"></i></a>';?>
                        <!--<a class="btn btn-primary" href="?page=Ajoutproduit"><i class="icon_plus_alt2"></i></a>-->
                        <?php echo '<a class="btn btn-success" href="fonction/?codeproduit='.$reponse['codeproduit'].'"><i class="fa fa-edit"></i></a>';?>
       <?php echo '<a class="btn btn-danger" href="fonction/fonctionSupprimerProduit.php?codeproduit='.$reponse['codeproduit'].'"><i class="icon_close_alt2"></i></a>';?>
                      </div></td>
                      

<?php endforeach;?>
                    </tr>
                  </tbody>
                </table>

              </div>

            </section>

<?php 
}
  }
}

?>