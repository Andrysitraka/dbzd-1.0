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
               
          <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#vente">
                        <i class="fa fa-credit-card bigger-120"></i>
                        Commande
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#info">
                        <i class="orange ace-icon fa fa-info-circle bigger-120"></i>
                        Demande d'information et Réclamation
                    </a>
                </li>

             
            
            </ul> 
<div class="tab-content">

  




  <div id="info" class="tab-pane"> 
   <div class="col-lg-12">

 <section class="panel">
                  <div class="panel-heading">
            <label class="nature"><b><i class="orange fa fa-info-circle"></i>Demande d'information</b></label>
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
  <div id="vente" class="tab-pane">   
    <div class="form">
      <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
          <div class="form-group">
  <label class="control-label col-lg-2" for="inputSuccess">Client<span class="required">*</span></label>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-3">
                   <select name="client" class="form-control select select-client">
              <?php var_dump($main);
                $sql="SELECT  `idclient`, `identifientsurfacebook`FROM `client`";
                $reponse=$main->fetchAll($sql);
                foreach ($reponse as $reponse): 
              ?>
                    <option> <?php echo $reponse['idclient']." / ".$reponse['identifientsurfacebook'];?></option>
                    <?php endforeach;?>
            </select>
                </div>
                 <label class="control-label col-lg-3" for="inputSuccess">Recherche</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control cherche">
                </div>
            </div>
        </div>
   </div>
    <div class="form-group ">
        <label for="datecommande" class="control-label col-lg-2">Date de commande<span class="required"> *</span>
        </label>
          <div class="col-lg-3">
            <input class="form-control datecommande" id="datecommande" type="date" name="datecommande" style="width:223px;" />
          </div>
      </div>

   <div class="form-group">
      <label class="control-label col-lg-2" for="inputSuccess">Dade de livrason<span class="required"> *</span></label>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-3">
                    <input type="date" class="form-control datelivre"/>
                </div>
                 <label class="control-label col-lg-2" for="inputSuccess">Debut<span class="required"> *</span></label>
                <div class="col-lg-2">
                    <input type="time" class="form-control Debut"  min="09:00" max="17:00"/>
                </div>
                 <label class="control-label col-lg-2" for="inputSuccess">Fin<span class="required"> *</span></label>
                <div class="col-lg-2">
                    <input type="time"  min="09:00" max="17:00" class="form-control Fin"/>
                </div>
            </div>
        </div>
   </div>
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Ville<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control ville" id="ville" type="text" name="livraison"  />
          </div>
      </div>
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Quartier<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control quartier" id="quartier" type="text" name="quartier"  />
          </div>
      </div>
      <div class="form-group ">
        <label for="cemail" class="control-label col-lg-2">Lieu de livraison<span class="required"> *</span>
        </label>
          <div class="col-lg-10">
            <input class="form-control lieulivre" id="lieulivre" type="text" name="lieulivre"/>
          </div>
      </div>
      <div class="form-group ">
        <label for="cname" class="control-label col-lg-2">Remarque<span class="required">*</span></label>
        <div class="col-lg-10">
            <textarea class="form-control comment" id="comment" name="comment" ></textarea>
        </div>
      </div>
      <div class="form-group ">
        <label for="ccomment" class="control-label col-lg-2">Produit</label>
      <div class="col-lg-10">
         <select name="codeproduit" class="form-control selectProduit" style="width:300px;">
          <?php 
              $sql="SELECT `codeproduit`,`designation` FROM `produit`";
                $reponse=$main->fetchAll($sql);
                   foreach ($reponse as $reponse): 
          ?>
              <option>
              <?php echo $reponse['codeproduit']."/ ".$reponse['designation']; ?>
              </option>
          <?php endforeach;?>
        </select>

        </div>
          </div>        
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <header class="panel-heading">Detait produit </header>
            <section class="panel">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                      <th>Produit</th>
                      <th>Prix Unitaire</th>
                      <th>Quantite</th>
                      <th>Total en Ar </th>
                      <th>Aperçu</th>
                </tr>   
              </thead>
               <tbody class="tbody">  
              </tbody>
               <tfoot>                                  
                <th>
                      <td></td>
                      <td></td>
                </th>
                <th>
                  <label>Sous total :<span class="sous"></span></label>
                </th>
                <th>
                  <label class="total">00 MGA</label>
                </th>
                      <th colspan="2"style="text-align: right;">
                      <button type="submit" class="btn btn-primary btn-test">Valider</button>
                      <button class="btn btn-primary print"><i class="fa fa-print"></i> Inprimer</button>
                      </th>
                </tr>
          </tfoot>
         </table>
        </div>        
      </div>
     </div>
    </div>  
  </form>   
  </section>
 </section>       
<script type="text/javascript" src="../js/fonctionenregistrementvent.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.savere').on('click',function(event){
      event.preventDefault();
      var client=$('.clientre').val();
      var client1=client.split(" ");
      var type=$('.typere').val();
      var produit=$('.produitre').val();
      var produit1=produit.split(" ")
      $.post('fonction/fonctionAjoutRelance.php',{client:client1[0],type:type,produit:produit1[0]},function(data){
           console.log(data);
      });
    });
  });
</script>