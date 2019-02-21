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
 <section class="panel">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id Client</th>
                      <th>Photo</th>
                      <th>Nom et Prénom </th>
                      <th>Pseudo sur facebook</th>
                      <th>Lien sur facebook</th>    
                      <th>Ville</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
<?php foreach ($reponse as $reponse):?>                 
                    <tr>

                      <td><?php echo '<a href="?page=ficheclient&client='.$reponse['idclient'].'">'.$reponse['idclient'].'</a>';?></td>
                      <td><?php echo '<img style="width:70px;" src="../img/photoclient/'.$reponse['photo'].'">';?></td>
                      <td><?php echo $reponse['Nom'];?></td>
                      <td><?php echo $reponse['identifientsurfacebook'];?></td>
                      <td><?php echo '<a href="'.$reponse['liensurfacebook'].'"><i class="fa fa-facebook"></i> facebook</a>';?></td>
                      <td><?php echo $reponse['ville'];?></td>
                      <td>
                        
                  <?php echo '<a class="btn btn-info" href="?page=ficheclient&client='.$reponse['idclient'].'"><i class="fa fa-info"></i></a>';?>          
                  <?php echo '<a class="btn btn-primary" href="?page=Modificationclient&client='.$reponse['idclient'].'"><i class="fa fa-edit"></i></a>';?>
                      </td>

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