<?php
include_once('fonction/class/main.php');
$main=new main();
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Livraison</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-plane" aria-hidden="true"></i></i>Livraison</li>
              <li><i class="fa fa-list-alt" aria-hidden="true"></i>
liste des livraison</li>
            </ol>
          </div>
        </div>
    

<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>Client</th>
                    <th>Date de livraison</th>
                    <th>Lieu de livraison</th>
                    <th>Heure de livraison</th>
                     <th>Produit</th>
                    <th></th>
                  </tr>
            <?php
             $sql="SELECT * FROM `facture` WHERE `Statut`='on_attente'"; 
             $reponse=$main->fetchAll($sql);
             $Numfact=unique_multidim_array($reponse, 'NumFact');
             foreach ($Numfact as $rep):
              ?>      
                  <tr>
                    <td><?php
                    $sql="SELECT `Nom` FROM `client` WHERE `idclient`='".$rep['idclient']."'";
                    $client=$main->fetch($sql);
                    echo $client['Nom'];
                    ?></td>
                    <td>
                      <?php
                      $sql="SELECT * FROM `livraison` WHERE `idcomand`='".$rep['idcomande']."'";
                      $livraison=$main->fetch($sql); 
                      echo $livraison['datediflivre'];
                      ?>
                    </td>
                    <td><?php
                    echo $livraison['ville']." , ".$livraison['qartieur'];
                    ?></td>
                    <td>
                      <?php
                    echo $livraison['heurlivredifdebut']." à ".$livraison['heurlivrediffin'];
                    ?>
                    </td>
                    <td>
                      <?php
                      $sql1="SELECT `idcomande` FROM `facture` WHERE `NumFact`='".$rep['NumFact']."'";
                      $numcommande=$main->fetchAll($sql1);
                      foreach ($numcommande as $commande) {

                        $sql="SELECT `codeproduit` FROM `comande` WHERE `idcomand`='".$commande['idcomande']."'";
                        $idProduit=$main->fetch($sql);
                        $sql="SELECT `designation` FROM `produit` WHERE `codeproduit`='".$idProduit['codeproduit']."'"; 
                        $produit=$main->fetch($sql);
                        echo $produit['designation']."<br/>";

                      }
                      
                      ?>
            
                    </td>
                    <td>
                      <div class="btn-group">
               <a class="btn btn-info" href="?page=relance&idfacture=<?php echo $rep['NumFact'];?>&idclient=<?php echo $rep['idclient'];?>"><i class="fa fa-info"></i></a>
                      </div>
                    </td>
                  </tr>
               <?php
               endforeach; 
               ?>   
                </tbody>
              </table>
            </section>
          </div>
        </div>



      </section>
    </section>