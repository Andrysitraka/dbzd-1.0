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

<?php
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut`='non_livre'";
$rep=$main->fetchAll($sql);
$fact=unique_multidim_array($rep,'NumFact');

?>
  <table id="example" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Client
      </th>
      <th class="th-sm">Produit
      </th>
      <th class="th-sm">Date de commande
      </th>
      <th class="th-sm">Statut
      </th>
      <th class="th-sm"> Remarque
      </th>
      
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($fact as $fact):
    $sql='SELECT `idclient`,`Statut`,`datedefacture` FROM `facture` WHERE `NumFact`="'.$fact['NumFact'].'"';
    $client=$main->fetch($sql);
   
    ?>
    <tr>
      <td>
        <?php 
           $sql="SELECT `Nom` FROM `client` WHERE `idclient`='".$client['idclient']."'";
           $nom=$main->fetch($sql);
         
        ?>
        <a href=?page=infocommand&idclient="<?php echo$client['idclient'];?>"&idfacture="<?php echo $fact['NumFact'];?>"><?php echo $nom['Nom'];?></a>
        
      </td>
      <td>
        <?php
      $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`="'.$fact['NumFact'].'"';
      $idcomande=$main->fetchAll($sql);
      foreach ($idcomande as $idcomande){
      $sql="SELECT `codeproduit` FROM `comande` WHERE `idcomand` ='".$idcomande['idcomande']."'";
      $idproduit=$main->fetch($sql);
      $sql="SELECT `designation` FROM `produit` WHERE `codeproduit`='".$idproduit
      ['codeproduit']."'";
      $produit=$main->fetch( $sql);
      echo $produit['designation'].'<br/>';
      }

        ?>
      </td>
      <td><?php
       echo $client['datedefacture'];
      ?></td>
      <td>
      <?php
       echo $client['Statut'];
      ?>
      </td>
      <td></td>
      
    </tr>
    <?php
     endforeach;
    ?>
  </tbody>
  <tfoot>
    
  </tfoot>
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
