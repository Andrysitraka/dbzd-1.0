              <?php
include_once('fonction/class/main.php');
$main=new main();
$dt=new DateTime();
$soustout=0;
?>

<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Livraison</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-cube"></i>Livraison</li>
              <li><i class="fa fa-plus"></i>Detail de livraison</li>
            </ol>
          </div>
        </div>
       
      
          <?php
            $sql="SELECT * FROM `client` WHERE `idclient`=".$_GET['idclient'];
            $reponse=$main->fetch($sql);
            
                    ?>
                           
      <div class="panel-body" >
       
                <div class="row">
                        <div class="col-xs-3 col-sm-3 center">
                            <span class="profile-picture">
                              <?php
  echo '<img alt="'.$reponse['Nom'].'" class="simple" src="../../img/photoclient/'.$reponse['photo'].'"class="img-thumbnail" style="height:160px;width:160px;">';?> 
                            </span>

                            <div class="space space-4" style="margin-top: 20px; font-size:18px;"></div>
                                
                            </a>
                        </div>

                        <div class="col-xs-4 col-sm-5">
                            <h4 class="blue">
                                <span class="middle">
                                  <b><?php  echo " ".$reponse['Nom']; ?></b>
                                </span>
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-phone-square bigger-150 green"></i> Contact
                                    </div>

                                    <div class="profile-info-value">
                                        <?php echo '<b>'.$reponse['contact'].'</b>' ;?>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> </div>

                                    <div class="profile-info-value">
                                        <span><i class="blue fa fa-facebook"></i>
                                     <a href="<?php echo $reponse['liensurfacebook']; ?>>">consulter facebook</a>

                                        </span>
                                    </div>
                                </div>

                          <?php

              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
                          ?>     
                             </div>
                        </div><!-- /.col -->

                             <div class="col-xs-3 col-sm-3">
                              <div style="overflow:hidden;width: 350px;height: 400px;"><iframe width="350" height="400" src="https://maps.google.com/maps?width=350&amp;height=400&amp;hl=en&amp;q=<?php echo $livre['ville'];?>%2C<?php echo $livre['qartieur'];?>%2C<?php echo $livre['lieudelivraison'];?>%2CMadagascar+(Titre)&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div><small><a href="https://embedgooglemaps.com/es/">https://embedgooglemaps.com/es/</a></small></div><div><small><a href="http://botonmegusta.org/">Boton megusta</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />



                             </div>
                        
                    </div><!-- /.row -->
      

  

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
              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`=".$_GET['idfacture'];
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
 $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`='.$_GET['idfacture'];
 $reponse=$main->fetchAll($sql);
        ?>
  <table class="table table-striped table-advance table-hover"  style="border:solid 1px #dbdbdb;margin-top: 10px;">
                  <thead class="thead">


                    <tr>
                      <th style="text-align: center;">Produit</th>
                      <th style="text-align: center;">Prix en Ariary</th>
                      <th style="text-align: center;">Quantite</th>
                      <th style="text-align: center;">Total en Ariary</th>
                      <th>Aperçu</th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
<?php 
 foreach ($reponse as $reponse):
  $sql="SELECT * FROM `comande` WHERE `idcomand`=".$reponse['idcomande'];
  $rep1=$main->fetch($sql);
 ?>                    
                    <tr>
                      <td style="text-align: center;"><?php
                      $sql="SELECT `designation`,`photoproduit`,`prix` FROM `produit` WHERE `codeproduit`='".$rep1['codeproduit']."'";
                      $produit=$main->fetch($sql);
                      echo $produit['designation'];
                      ?></td>
                      <td style="text-align: center;"><?php echo  number_format($produit['prix'], 2, ',', ' ');?></td>
                      <td style="text-align: center;"><?php echo $rep1['quantite'];?></td>
                      <td  style="text-align: center;" class="total"><?php $total=$produit['prix']*$rep1['quantite']; echo number_format($total, 2, ',', ' ');?></td>
                      <td ><?php 
                      echo '<img src="../../img/produit/'. $produit['photoproduit'].'" class="img-thumbnail" style="width:60px;">';
                      ?></td>
                     
                      <?php
                    
                     
                      $soustout+=$total;
                    
                       
                      ?>
                    </tr>
 <?php endforeach;?>

                   <tr>
                      <th style="text-align: center;">Emetteur : <?php
                $sql="SELECT `username` FROM `user` WHERE `matricule`='".$rep1['matriculeuser']."'";
                      $repuser=$main->fetch($sql);
                      echo $repuser['username'];
                      ?></th>
                      <th style="text-align: center;"></th>
                      <th style="text-align: center;">Sous total en Ariary</th>
                      <th style="text-align: center;" class="contTotal">
                        <?php
                        echo number_format($soustout, 2, ',', ' ');
                         ?>
                      </th>
                      <th></th>
                    </tr>                    
                  </tbody>
                </table>
      </div>
    </div>

  </div>
</div>