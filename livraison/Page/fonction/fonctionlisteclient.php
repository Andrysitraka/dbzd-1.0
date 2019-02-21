<?php 
include_once('class/main.php');
session_start();
$main=new main();
$dt=new DateTime();
$date=$dt->format('Y-m-d');
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

<table class="table table-striped table-advance table-hover" id="example">
  <thead>
    <tr>
                    <th>Nom du client</th>
                    <th>Produit</th>
                    <th>Nom du livreur</th>
                    <th>lieu de livraison</th>
                    <th>Heure de livraison</th>
                    <th></th>
                  </tr>
  </thead>
                <tbody>

  
                  
            <?php
            $sql="SELECT `NumFact` FROM `facture` WHERE `datelivre`='".$date."' AND `Statut` LIKE 'confirmer'";
            $reponse=$main->fetchAll($sql);
            $result=unique_multidim_array($reponse,'NumFact');
            foreach ($result as $result):  
            $sql="SELECT `idclient` FROM `facture` WHERE `NumFact`='".$result['NumFact']."'";
            $facture=$main->fetch($sql);
            ?>     
                  <tr>
                    <th>
                  <?php
                 $sql="SELECT `Nom`,`idclient` FROM `client` WHERE `idclient`='".$facture['idclient']."'";
                 $client=$main->fetch($sql);
                 echo $client['Nom'];
                    ?>
                    </th>
                    <th>
                    <?php
                  $sql="SELECT `idcomande` FROM `facture` WHERE `NumFact`='".$result['NumFact']."'";
                  $fact=$main->fetchAll($sql);
                  foreach ($fact as $fact) {
                   $sql="SELECT `codeproduit`,`quantite` FROM `comande` WHERE `idcomand`='".$fact['idcomande']."'";
               
                   $codproduit=$main->fetch($sql);
                  
                   $sql="SELECT `designation` FROM `produit` WHERE `codeproduit`='".$codproduit['codeproduit']."'";
                   $Produit=$main->fetch($sql);
                   echo $Produit['designation']." * ".$codproduit['quantite']."<br/>";
                  }
                  
                    ?>  
                    </th>
                    <th>
                  <?php
                  $sql="SELECT `Nomlivreur`,`lieudelivraison`,`heurlivredifdebut`,`heurlivrediffin` FROM `livraison` WHERE `idcomand`='".$fact['idcomande']."'";
              
                  $livreur=$main->fetch($sql);
  
                   echo $livreur['Nomlivreur'];
                    ?>
                    </th>
                    <th><?php echo $livreur['lieudelivraison'] ;?></th>
                    <th><?php echo $livreur['heurlivredifdebut']." à ". $livreur['heurlivrediffin'] ;?></th>
                    <th>
                      <?php echo '<a class="btn btn-info" href="?page=detaillivraison&idclient='.$client['idclient'].'&idfacture='.$result['NumFact'].'">
                      <i class="fa fa-info"></i></a>';?>
                      
                      </th>
                      
                  </tr>
            <?php
             endforeach;
            ?>      
  </tbody>
              </table>
<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        


pagingType: "simple_numbers",

lengthMenu:[5,10,15,20,25],

pageLength: 3

        
    } );
var dataTable = $('#mon_tableau').DataTable();
 
$("#search_box").on('keyup', function() {
  dataTable.search( this.value ).draw();
});

  
  
} );
 

 </script> 