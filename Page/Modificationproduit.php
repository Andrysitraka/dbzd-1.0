<?php
include_once('fonction/class/main.php');
$main=new main();
if(isset($_GET['codeproduit'])):
  if(!empty($_GET['codeproduit'])):
    $sql="SELECT * FROM `produit` WHERE `codeproduit` ='".$_GET['codeproduit']."'";
    $reponse=$main->fetch( $sql);

?>
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Modification Produit</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>Produit</li>
              <li><i class="fa fa-files-o"></i>Modification produit</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Modification produit
              </header>
              <div class="panel-body">
                <div class="form">
    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="fonction/fonctionModificationProduit.php" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="codeproduit" class="control-label col-lg-2">Code Produit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="codeproduit" name="codeproduit" minlength="5" type="text" required value=<?php  echo '"'.$reponse['codeproduit'].'"';?> />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="designation" class="control-label col-lg-2">Designation<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="designation" type="text" name="designation" required value=<?php  echo '"'.$reponse['designation'].'"';?>/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="prix" class="control-label col-lg-2">Prix en Ariary<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="prix" type="number" name="prix" required value=<?php  echo '"'.$reponse['prix'].'"';?>/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Quantite <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="quantite" minlength="1" type="text" required value=<?php  echo '"'.$reponse['quantite'].'"';?>/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="category" class="control-label col-lg-2">Cathegory<span class="required">*</span></label>
                      <div class="col-lg-10">
                           
                        <select class="form-control select" name="category" >
                        <?php
                          $sql="SELECT `designation` FROM `categoryproduit` "; 
                            $category=$main->fetchAll($sql);
                          foreach ($category as $category):
                            ?>
                          <option><?php echo $category['designation'] ;?></option>
                        <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                     

                     <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Description
<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <textarea class="form-control" rows="5" name="description" required><?php  echo $reponse['description'];?></textarea>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Ingrédient 
<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <textarea class="form-control" rows="5" name="ingredient" >
                         <?php echo $reponse['ingredient'];?>
                       </textarea>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Conseil d'utilisation<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control" rows="5" id="comment" name="ModeUtilisation" required ><?php  echo $reponse['ModeUtilisation'];?></textarea>
                      </div>
                    </div>




                  

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Modification</button>
                      </div>
                    </div>
                  </form>
                
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>


<script type="text/javascript">
  $(document).ready(function(){
    var option=<?php echo '"'.$reponse['category'].'";';?>
    $('.select option').each(function(){
         if($(this).val()==option){
          $(this).attr('selected','selected');
         }     
    });
  });

  
</script>


<?php
  endif;
endif;
?>