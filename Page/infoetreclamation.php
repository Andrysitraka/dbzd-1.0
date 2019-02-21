 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-facebook"></i>Info et réclation</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>info et réclamation</li>
            </ol>
          </div>
        </div>
 <div class="col-lg-12">
 <section class="panel">
                  <div class="panel-heading">
            <label class="nature"><b><i class="orange fa fa-info-circle"></i></b></label>
                  </div>
                  <div class="panel-body">
                    <div class="form">   
            <form>          
                  <div class="form-group">   
                    <div class="col-lg-12">
                      <div class="row">
                         
                           <div class="col-lg-2">
                        <label for="date-d-eregistrement"><b>Date du </b></label>
                        <input type="date" name="date-d-eregistrement" class="form-control date-d-eregistrement" style="width: 150px;"> 
                           </div>  
                           <div class="col-lg-9">
                            <label for="nature"><b>Activité</b></label>
                          <select class="form-control nat" style="width: 255px;">
                              <option>Demande d'information</option>
                              <option>Réclamation</option>
                              <option>Autre</option>
                            </select> 
                           </div>  
                        <div class="col-lg-2" style="margin-bottom: 10px;"> 
          <label class="control-label col-lg-2" for="commentaire"><b>Nature</b></label>
                           <select class="form-control ReclamationNature type">
                            <option>Produit</option>
                            <option>Prix</option>
                            <option>Mode d'utisation</option>
                            <option>Qantité</option>
                            <option>Efficacité</option>
                            <option>Service de livraison</option>
                        </select>
                        </div>

                        <div class="col-lg-3" style="margin-bottom: 10px;"> 
          <label class="control-label col-lg-2" for="commentaire"><b>Produit</b></label>
                  
                          <select class="form-control select ">
                            <?php var_dump($main);
                $sql="SELECT `codeproduit`,`designation` FROM `produit`";
                $reponse=$main->fetchAll($sql);
                foreach ($reponse as $reponse): 
              ?>
                    <option> <?php echo $reponse['codeproduit']." / ".$reponse['designation'];?></option>
                    <?php endforeach;?>
                          </select>
                        </div>

                        <div class="col-lg-6" style="margin-bottom: 10px;"> 
          <label class="control-label col-lg-4" for="commentaire"><b>Recherche produit</b></label>
                  <input type="text" name="" class="form-control" placeholder="Recherche produit">
                        </div>
           
                        <div class="col-lg-3" style="margin-bottom: 10px;">
         <label class="control-label col-lg-3" for="commentaire"><b>Client</b></label>
                          <select class="form-control select ClientObj">
                            <?php var_dump($main);
                $sql="SELECT  `idclient`, `identifientsurfacebook`FROM `client`";
                $reponse=$main->fetchAll($sql);
                foreach ($reponse as $reponse): 
              ?>
                    <option> <?php echo $reponse['idclient']." / ".$reponse['identifientsurfacebook'];?></option>
                    <?php endforeach;?>
                          </select>
                        </div>
             <div class="col-lg-5" style="margin-bottom: 10px;">
 <label class="control-label col-lg-5" for="recherche"><b>Recherche Client</b></label>             
 <input type="text" class="form-control cherche" name="recherche" placeholder="Recherche Client">
              </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">   
                    <div class="col-lg-12">
                      <div class="row">
                        <label class="control-label col-lg-2" for="commentaire"><b>Commentaire</b></label>
                        <div class="col-lg-12">
                          <textarea class="form-control commentaire" name="commentaire" rows="7" cols="50"  style="resize: none;"></textarea>
                        </div>
 <div class="col-lg-1" style="margin-top: 10px;">
 <button class="btn btn-primary savedisc">Enregistre  <i class="gray fa fa-save" aria-hidden="true"></i></button>
              </div>
                      </div>
                    </div>
                  </div>
              </form>       
                    </div>
                  </div>
                </section>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.savedisc').on('click',function(event){
          event.preventDefault();
        var date=$('.date-d-eregistrement').val();
        var commentair=$('.commentaire').val();
        var idclient=$('.ClientObj').val();
        var type=$('.type').val();
        var nature=$('.nat').val();

        $.post('fonction/Ajoutdiscution.php',{date:date,idclient:idclient,commentair:commentair,type:type,nature:nature},function(data){
               console.log(data);
                  $('.date-d-eregistrement').val(" ");
                  $('.commentaire').val(" ");
                  $('.cherche').val(" ");
        });
        
       });        
        
      });
    </script>     
   
  </div>
</div> 