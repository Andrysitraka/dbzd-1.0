<?php
include_once('fonction/class/main.php');
$main=new main();
if(isset($_GET['client'])):
    $sql="SELECT * FROM `client` WHERE `idclient` LIKE '".$_GET['client']."'";
    $reponse=$main->fetch($sql);
 ?>

<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-facebook"></i>Enregistrement des discussions sur facebook</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Discussion sur facebook</li>
            </ol>
          </div>
        </div>


	<div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        Activite
                    </a>
                </li>
            </ul>

            <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                           <div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div>
                    <?php echo'<img class="editable img-responsive" alt="'.$reponse['Nom'].'" id="avatar2" src="../img/photoclient/'.$reponse['photo'].'">';?>
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div  class="profile-userpic">
                     <?php echo '<img src="../img/QRcode/'.$reponse['qrcode'].'.png" class="img-thumbnail style="width:60px;">';?>
                    </div>
                </div>
                
                <div class="profile-userbuttons">
               <a href="#" class="btn btn-sm btn-block btn-primary">
                        
                                <span class="bigger-110"><?php //*echo $reponse['statut']; ?>Blue</span>
                    
                            </a>     
                   
                </div>
                
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                 <div class="col-xs-12 col-sm-9">
                            <h4 class="blue">
                                <span class="middle"><?php echo $reponse['Nom'];?> </span>
                                <?php //echo '<img src="../img/QRcode/'.$reponse['qrcode'].'.png" class="img-thumbnail style="width:60px;">';?>
                            </h4>
              <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nom sur facebook </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $reponse['identifientsurfacebook'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Localisation </div>

                                    <div class="profile-info-value">
                                        <i class="fa fa-map-marker light-orange bigger-110"></i>
                                        <span><?php echo $reponse['ville'];?></span>
                                        <span><?php echo $reponse['quartier'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">Age </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $reponse['trancedage']." ans";?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Sexe</div>

                                    <div class="profile-info-value">
                                        <span><?php echo $reponse['sexe'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Enregistre le  </div>

                                    <div class="profile-info-value">
                                        <span><?php
                                         $date=explode(" ", $reponse['datedenregestrement']);

                                         echo  $date[0];?></span>
                                    </div>
                                </div>

                                 <div class="profile-info-row">
                                    <div class="profile-info-name"> situation matrimoniale </div>

                                    <div class="profile-info-value">
                                        <span><?php echo  $reponse['situationmatrimonial'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Cadre socio-professionnel </div>

                                    <div class="profile-info-value">
                                        <span><?php echo $reponse['occupation'];?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr hr-8 dotted"></div>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                    </div>

                                    <div class="profile-info-value">
                                         <?php echo'<a href="'.$reponse['liensurfacebook'].'">facebook</a>';?>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <i class="middle ace-icon fa fa-phone-square bigger-150 green"></i>
                                    </div>

                                    <div class="profile-info-value">
                                        <?php echo $reponse['contact'] ;?>
                                    </div>
                                </div>
                   </div>
            </div>
        </div>
    </div>
</div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                    <div class="profile-feed row"> 
                <?php
  $sql="SELECT * FROM `historiqueclient` WHERE `idclient`='".$_GET['client']."' ORDER BY `historiqueclient`.`date` DESC ";
  $rep=$main->fetchAll($sql);
  if($rep):
    foreach ($rep as $rep):
    $sql="SELECT * FROM `discutionfb` WHERE `idclient`='".$_GET['client']."' AND `iddiscution`='".$rep['idx']."'";
    $reponse1=$main->fetch($sql);
    $sql2="SELECT * FROM `facture` WHERE `NumFact`='".$rep['idx']."' AND `user`='".$_SESSION['login']['matricule']."' AND `idclient`='".$_GET['client']."' ORDER BY `idfacture` DESC";
    $reponse2=$main->fetch($sql2);
    ?>
                        
                                   <?php 
                                   if($reponse1){
                                   ?>
                                   <div class="col-sm-6">
                                    <div class="profile-activity clearfix">
                                     <div>
                                    <?php echo'<img class="editable img-responsive" alt="'.$reponse['Nom'].'" id="avatar2" src="../img/photoclient/'.$reponse['photo'].'">';?>
                                    <a class="user" href="#"><?php echo $reponse['Nom']; ?></a>
                                    a fait une <?php echo $reponse1['nature'];?>
                                    

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        <?php echo $rep['date'];?>
                                    </div>
                                </div>
                                </div>
                                      </div>
                                 <?php
                                    }
                                 ?>



                                 <?php 
                                   if($reponse2){

                                   ?>
                                   <div class="col-sm-6">
                                      <div class="profile-activity clearfix">
                                         <div>
                                    <?php echo'<img class="editable img-responsive" alt="'.$reponse['Nom'].'" id="avatar2" src="../img/photoclient/'.$reponse['photo'].'">';?>
                                    <a class="user" href="#"><?php echo $reponse['Nom']; ?></a>
                                    a fait un achat 
                                

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        <?php echo $rep['date'];?>
                                    </div>
                                </div>
                                </div>
                                      </div>
                                 <?php
                                    }
                                 ?>



                          <!-- /.col -->
                    <?php
                 endforeach;
                      endif;
                    ?>
                </div><!-- /#feed -->
            </div>
        </div>
    </div>
 <?php 

endif; 
?>


    </section>
</section>

