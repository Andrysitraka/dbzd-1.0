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
                                  
                            
                                      
            
             $sql ='UPDATE `facture` SET `vu`="'.$_SESSION['login']['matricule'].'" WHERE `NumFact` ="'.$_GET['idfacture'].'"';
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



          
        <?php
 $sql='SELECT `idcomande` FROM `facture` WHERE `NumFact`="'.$_GET['idfacture'].'"';
 $reponse=$main->fetchAll($sql);
        ?>
  <table class="table"  style="border-top:solid 1px #dbdbdb;border-bottom:solid 1px #dbdbdb; margin-top: 10px;">
                  <thead >


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
                      $repuser=$main->fetch( $sql);
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
 <div class="row confirmform">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Confirmation de commande
                <?php 
                      $sql="SELECT * FROM `livraison` WHERE `idcomand`='".$rep1['idcomand']."'";
                      $livre=$main->fetch( $sql);
                       ?>
              </header>
              <div class="panel-body">
                <form class="form-horizontal"> 
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date de livraison</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control datelivre" style="width: 150px;" value= <?php echo $livre['datedelivraison'] ?> >
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="col-sm-2 control-label">Heure de livraison</label>
                    <div class="col-sm-2">
                      <input type="Time" class="form-control debut" style="width: 150px;" value= <?php echo $livre['debut'] ?>>
                    </div>
                    <label class="col-sm-1 control-label "> à </label>
                    <div class="col-sm-3">
                      <input type="Time" class="form-control fin" style="width: 150px;"value= <?php echo $livre['fin'] ?>>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nom du livreur</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control livreur" style="width: 452px;" value= >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Remarque</label>
                    <div class="col-sm-5">
                      <textarea class="form-control remarque"></textarea>
                    </div>
                  </div>
              <div class="panel-body">
                <div class="btn-group btn-group-justified">
                 <?php echo ' <a class="btn btn-primary valider" href="fonction/fonctionvente.php?idfacture='.$_GET['idfacture'].'">Valider la commande</a>';?>
                 <a class="btn btn-warning modifier"  href="#">Modifier la commande </a>
                 <?php echo '<a class="btn btn-danger Annule" href="fonction/Annule.php?idfacture='.$_GET['idfacture'].'">Annule commande</a>';?>
                </div>
              </div>
                </form>
              </div>
            </section>          
               
<script type="text/javascript">

  $(document).ready(function(){

   $('form').on('submit',function(event){
        event.preventDefault();
        alert("veillez appuyé sur l'un des trois buttons");
   });


    $('.valider').on('click',function(event){
        event.preventDefault();
        var idfacture=<?php echo "'".$_GET['idfacture']."'";?>;
        var livreur=$('.livreur').val();
        var datelivre=$('.datelivre').val();
        var debut=$('.debut').val();
        var fin=$('.fin').val();
        var remarque=$('.remarque').val();
    $.post($(this).attr('href'),{idfacture:idfacture,livreur:livreur,datelivre:datelivre,debut:debut,fin:fin,remarque:remarque},function(data){
          $.post('fonction/confirmationlivre.php',{idfacture:idfacture},function(data){
                $('.confirm').empty().append(data);
                $('.confirmform').addClass('collapse');
                alert('Commande confimer');
            
          });
      });
        
      

    });

    $('.modifier').on('click',function(event){
        event.preventDefault();
      

    });
    
    $('.Annule').on('click',function(event){
        event.preventDefault();
        var remarque=$('.remarque').val();
        if (remarque!="") {
      $.post($(this).attr('href'),{remarque:remarque},function(data){
        console.log(data);
        var idfacture=<?php echo "'".$_GET['idfacture']."'";?>;
 $.post('fonction/confirmationlivre.php',{idfacture:idfacture},function(data){
                $('.confirm').empty().append(data);
                $('.confirmform').addClass('collapse');
                alert('Commande Annule');

            
          });
      });
           }else{
            alert('Vous deviez indiquer pourquoi la commande a été annuler ');
           }
     

    

    });
    
    

    
  });
</script>