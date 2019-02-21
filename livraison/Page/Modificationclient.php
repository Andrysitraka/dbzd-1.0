<?php
include_once('fonction/class/main.php');
$main=new main(); 
if(isset($_GET['client'])):
  $sql="SELECT * FROM `client` WHERE `idclient` LIKE '".$_GET['client']."'";
  $reponse=$main->fetch($sql);
  if($reponse):
?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Modification</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Client</li>
              <li><i class="fa fa-files-o"></i>Modification Client</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Modification
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="fonction/fonctionModifClient.php" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="Nom" class="control-label col-lg-2">Nom et Prénom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="Nom" name="Nom" type="text" value=<?php echo'"'.$reponse['Nom'].'"';?> />
                      </div>
                    </div>
                    <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="fonction/fonctionAjoutClient.php">
                    <!--<div class="form-group ">
                      <label for="Prenom" class="control-label col-lg-2">Prenom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="Prenom" type="text" value=<?php //*echo'"'.$reponse['Prenom'].'"';?>/>
                      </div>
                    </div>-->




                    <div class="form-group ">

                      <label for="trancedage" class="control-label col-lg-2">Trance d'age <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control trancedage" name="trancedage" value=<?php echo'"'.$reponse['Prenom'].'"';?>> 
                            <option>-24</option>
                            <option>[25 - 29]</option>
                            <option>[30 - 34]</option>
                            <option>[35 - 39]</option> 
                            <option>[40 - 44]</option>
                            <option>[45 - 49]</option>
                            <option>[50 - 54]</option>
                            <option> +55 </option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="SituationMatrimonial" class="control-label col-lg-2">Situation matrimonial <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control SituationMatrimonial" name="situationmatrimonial"> 
                            <option >Célibataire </option>
                            <option >Marié(e)</option>
                  
                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Occupation " class="control-label col-lg-2">Occupation <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control Occupation" name="occupation" value=<?php echo'"'.$reponse['occupation'].'"';?>> 
                            <option >Actif</option>
                            <option >Femme au foyer </option>
                            <option >Chomeur</option>
                            <option >Etudiant</option>
                            <option >Retraite </option>            
                        </select>
                      </div>
                    </div>


                    <div class="form-group ">
                      <label for="identifient" class="control-label col-lg-2">Identifient sur Facebook<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="identifientsurfacebook" type="text" value=<?php echo'"'.$reponse['identifientsurfacebook'].'"';?>/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="liensurfb" class="control-label col-lg-2">Lien sur Facebook<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="liensurfb" name="liensurfacebook" type="text" value=<?php echo'"'.$reponse['liensurfacebook'].'"';?>/>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="Contact" class="control-label col-lg-2">Contact<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="Contact" name="contact" type="text" value=<?php echo'"'.$reponse['contact'].'"';?>/>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ville" class="control-label col-lg-2">Ville<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="ville" name="ville" type="text" value= <?php echo'"'.$reponse['ville'].'"';?> />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Quartier" class="control-label col-lg-2">Quartier<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="Quartier" name="quartier" type="text"  value= <?php echo'"'.$reponse['quartier'].'"';?>/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Sexe" class="control-label col-lg-2">Sexe <span class="required">*</span></label>
                      <div class="col-lg-10">
                         
                           <select class="form-control sexe" name="sexe"> 
                            <option >Homme</option>
                            <option >Femme</option>
                            
                          </select>
                           
                        
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="liensurfb" class="control-label col-lg-2">Modifier Photo+</label>
                      <div class="col-lg-10">
                       <input type="checkbox">
                      </div>
                    </div>
                    <div class="form-group collapse">
                      <label for="trancedage" class="control-label col-lg-2">Photo <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input  id="image" name="image" type="file" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary btn-sub btn-modif" type="submit"><i class="fa fa-save"></i><?php echo " ";?>Modifier</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>
<?php
  endif;
    endif;
?>  

<script type="text/javascript">
  $(document).ready(function(){
    var val1=<?php echo'"'.$reponse['occupation'].'"';?>;
    var Val2=<?php echo'"'.$reponse['trancedage'].'"';?>;
    var val3=<?php echo'"'.$reponse['situationmatrimonial'].'"';?>;
    var Val4=<?php echo'"'.$reponse['sexe'].'"';?>;
    console.log(Val2);
    $('.Occupation option').each(function(){
        if( $(this).val()==val1){
           $(this).attr("selected","selected");
         }
     });
    $('.trancedage option').each(function(){
         if( $(this).val()==Val2){
           $(this).attr("selected","selected");
         }
     });

    $('.SituationMatrimonial option').each(function(){
         if( $(this).val()==val3){
           $(this).attr("selected","selected");
         }
     });
     $('.sexe option').each(function(){
         if( $(this).val()==Val4){
           $(this).attr("selected","selected");
         }
     });

  });

$('.btn-sub').on('click',function(event){
     /*/event.preventDefault(); 
    alert();*/
});


</script>