<?php
include_once('fonction/class/main.php');
$main=new main();
$dt=new DateTime();
$soustout=0;
$DateTime=$dt->format('Y-m-d');
 if(isset($_GET['idclient'])){
$sql="SELECT * FROM `relance` WHERE `datedererelance`='".$DateTime."' AND  `user` ='".$_SESSION['login']['matricule']."' AND `idclient`='".$_GET['idclient']."' AND `Statu`='on'";
 $repnse=$main->fetchAll($sql);
 
 }


 ?>
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"></i>Suivi de livraison</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Suivi de livraison</li>
            </ol>
          </div>
        </div>
         
       <div class="panel">
     
                         <?php
                         $sql="SELECT * FROM `client` WHERE `idclient`='".$_GET['idclient']."'";
                           $reponse=$main->fetch($sql);
                                  
                            
                                      
            
             $sql ='UPDATE `facture` SET `vulivraison`="'.$_SESSION['login']['matricule'].'" WHERE `NumFact` ="'.$_GET['idfacture'].'"';
             $main->fetch($sql);         
                                        ?>
                           
      <div class="panel-body">
       
                <div class="row">
                        <div class="col-xs-5 col-sm-4 center">
                            <span class="profile-picture">
                              <?php
  echo '<img alt="'.$reponse['Nom'].'" class="simple" src="../../img/photoclient/'.$reponse['photo'].'"class="img-thumbnail" style="height:160px;width:160px;">';?> 
                            </span>

                            <div class="space space-4" ></div>
                            </a>

                        </div>

                        <div class="col-xs-3 col-sm-3">
                            <h4 class="blue">
                                <span class="middle"><?php  echo " ".$reponse['Nom']; ?></span>
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name" style="text-align: left;">
                                        <i class="middle ace-icon fa fa-phone-square bigger-150 green"></i> Contact :<?php echo '<b>'.$reponse['contact'].'</b>' ;?>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name" style="text-align: left;">Localisation : <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span><?php echo $reponse['ville']." , ".$reponse['quartier'];?></span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> </div>

                                    <div class="profile-info-value">
                                        <span></span>
                                    </div>
                                </div>
                               
                             </div>
                <?php
                $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
              $fact=$main->fetch($sql);
              $sql="SELECT * FROM `livraison` WHERE `idcomand`='". $fact['idcomande']."'";
              $livre=$main->fetch($sql);
              
                          ?>     
                             </div>   <div class="col-xs-3 col-sm-3">
                             <div style="overflow:hidden;width: 350px;height: 400px;"><iframe width="350" height="400" src="https://maps.google.com/maps?width=350&amp;height=400&amp;hl=en&amp;q=%20%09<?php echo $livre['lieudelivraison'];?>%20%2C%20<?php echo $livre['qartieur'];?>%20%2C<?php echo $livre['ville'];?>%2Cmadagascar+(Titre)&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div><small><a href="https://embedgooglemaps.com/en/">embedgooglemaps FR</a></small></div><div><small><a href="https://newyorkhoponhopoffbus.nl">new york city freestyle pass: hop-on, hop-off tour en ferry</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />

                        </div ><!-- /.col -->
                    <div class="confirm">
                      
                    </div>
              
                        </div><!-- /.col -->
                    </div><!-- /.row -->

<table class="table table-striped table-advance table-hover" style="margin-top: 60px;">
                <tbody>
                  <tr>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 250px;"> Nom du livreur</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff; width: 200px"> Date de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 267px;"> Heure de livraison </th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"> Lieu de livraison</th>
                    <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 142px;"> Statue</th>
                    
                    
                  </tr>
                  <tr>
                    <td>
                      <?php
              $sql="SELECT `idcomande`FROM `facture` WHERE `NumFact`='".$_GET['idfacture']."'";
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
 $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`="'.$_GET['idfacture'].'"';
 $reponse=$main->fetchAll($sql);
        ?>
  <table class="table"  style="border-top:solid 1px #dbdbdb;border-bottom:solid 1px #dbdbdb; margin-top: 10px;">
                  <thead >


                    <tr>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;width: 250px;">Produit</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Prix en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Quantite</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Aperçu</th>
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
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Emetteur : <?php
                      $sql="SELECT `username` FROM `user` WHERE `matricule`='".$rep1['matriculeuser']."'";
                      $repuser=$main->fetch( $sql);
                      echo $repuser['username'];
                      ?></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;">Sous total en Ariary</th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;" class="contTotal">
                        <?php
                        echo number_format($soustout, 2, ',', ' ');
                         ?>
                      </th>
                      <th style="text-align: center; background-color: #7d8997;color: #fff; border-left: 1px solid #fff;"></th>
                    </tr>                    
                  </tbody>
                </table>
      </div>
    </div>

</div>
        </div>


