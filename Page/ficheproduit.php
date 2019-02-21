<?php
include_once('fonction/class/main.php');
$main=new main();
if (isset($_GET['codeproduit'])):
  if (!empty($_GET['codeproduit'])): 
     $sql="SELECT * FROM `produit` WHERE `codeproduit`LIKE '".$_GET['codeproduit']."'";
     $reponse=$main->fetch($sql);
;?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Fiche individuel produit</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="Accueil.php">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Produit</li>
              <li><i class="fa fa-files-o"></i>Fiche produit</li>
            </ol>
          </div>
        </div>
<fieldset><legend>Produit</legend>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          <form>
                            <?php echo '<img src="../img/produit/'.$reponse['photoproduit'].'" alt=""/>';?>
                            <div class="file btn btn-lg btn-primary">
                                <?php echo $reponse['codeproduit'];?>
                                <input type="file" name="file"/>
                            </div>
                          </form>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo '<strong>'.$reponse['designation']." ".$reponse['quantite'].'</strong>';?>
                                    </h5>
                                    <h5>
                                        <?php echo "<strong>Prix : ".number_format($reponse['prix'],2,",",".")." Ar </strong>";?>
                                    </h5>
                                    <h6>
                                        <?php echo $reponse['category']?>
                                    </h6>
                                    <p class="proile-rating"> <?php?><div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="orange ace-icon fa fa-lightbulb-o bigger-120"></i>
                        DESCRIPTION
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon fa fa-info bigger-120"></i>
                        CONSEIL D’UTILISATION

                    </a>
                </li>
            </ul>

            <div class="tab-content  padding-15" style="width: 615px;">
                <div id="home" class="tab-pane in active">
                  <div class="container-fluid">
                    <div class="row">
                     <P class="text-justify" style="padding-left:10px;padding-right:10px;">
                    
                    <?php echo $reponse['description'];?>

                     </P>
                     <p class="text-justify" style="padding-left:10px;padding-right:10px;"> 
                      
                   </p>   
                      </div>
                    </div>
                </div>

                <div id="feed" class="tab-pane">
                  <div class="container-fluid">
                    <div class="row">
                          
                   <p class="text-justify" style="padding-left:10px;padding-right:10px;"> 
                    <?php echo $reponse['ModeUtilisation'];?>
                   </p> 
                   <p class="text-justify" style="padding-left:10px;padding-right:10px;"> 
                      
                   </p>    
                        </div>
                    </div>
            </div>
      
      
  </div>
</div>
</section>

    </section>

</fieldset>
    <section id="main-content" style="margin-top: -95px;">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
          
<fieldset><legend>Argumentaire et Objections </legend>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4" style="text-align: center;">
                 <div style="margin-left: 100px;">
                <?php echo   '<embed src="../argument/'.$reponse['argument'].'" width=800 height=900 type=\'application/pdf\'/>';?>
                 </div>     
               
               
      
      </div> 
  </div>
</div>


  </fieldset>   

         
     
      
      </section>

    </section>


  <?php
       endif;
   endif; 
  ?>

  