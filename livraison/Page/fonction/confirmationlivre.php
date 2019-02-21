 <?php
 include_once('class/main.php');
 $main=new main();
 if(isset($_POST['idfacture'])):
 ?>
 <table class="table table-striped table-advance table-hover" style="margin-top: 60px;">
                <tbody>
                  <tr>
                    <th> Nom du livreur</th>
                    <th> Date de livraison</th>
                    <th> Heure de livraison </th>
                    <th> Lieu de livraison</th>
                    <th> Statue</th>
                    
                    
                  </tr>
                  <tr>
                    <td>
                      <?php
              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_POST['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
               echo $livre['Nomlivreur'];
                      ?>
                    </td>
                    <td><?php echo $livre['datediflivre'];?></td>
                    <td><?php echo "Entre ".$livre['heurlivredifdebut']." et ".$livre['heurlivrediffin'];?></td>
                    
                   
                    <td>
                      <?php echo $livre['ville']." , ".$livre['qartieur']." , ".$livre['lieudelivraison'];?>
                    </td>
                    <td>
                      <?php echo $livre['statut'];?>
                        
                      </td>
                  </tr>
                 
                  
                </tbody>
              </table>
<?php 
endif;
?>