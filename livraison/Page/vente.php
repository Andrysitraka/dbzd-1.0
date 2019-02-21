<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"> <i class=" fa fa-eur"></i>Vente</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="icon_document_alt"></i>vente</li>
            </ol>
          </div>
        </div>
  <div id="vente" class="tab-pane">   
    <div class="form">
      <form class="form-validate form-horizontal" id="feedback_form" >
        <fieldset class="border p-2">
           <legend  class="w-auto">Client</legend> 
          <div class="form-group">
  <label class="control-label col-lg-2" for="inputSuccess">Nom du client<span class="required">*</span></label>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-4">
                  <input type="text" class="form-control cherche client select-client" id="client">
                </div>
                <div class="col-lg-4" style="text-align: right;">
                  <span class="image">
                  </span>
                  <span class="idclient"></span>
                </div>
                 
            </div>
        </div>
   </div>
</fieldse> 
   <fieldset class="border p-2">
     <legend  class="w-auto">Livraison</legend> 
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
  <div >
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
</div>   
</fieldset>
<fieldset class="border p-2">
   <legend  class="w-auto">Produit</legend>   
      <div class="form-group">
        <label for="ccomment" class="control-label col-lg-2">Choix du produit</label>
      <div class="col-lg-3">
        
       <select name="codeproduit" class="form-control selectProduit">
          <?php 
              $sql="SELECT `designation` FROM `categoryproduit` ";
                $reponse=$main->fetchAll($sql);
                   foreach ($reponse as $reponse): 
          ?>
              <option>
              <?php echo $reponse['designation']; ?>
              </option>
          <?php endforeach;?>
        </select>

        </div>

        <div class="col-lg-3">
        <input type="cherche" name="" id="recherche" class="form-control">
        </div>

        <div class="col-lg-2">
        <button class="btn btn-primary validproduit" style="display: inline;"><i class="fa fa-plus"></i></button>
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
                      <th>Code produit</th>
                      <th>Désignation</th>
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
      </fieldset>        
      </div>
     </div>
    </div>  
  </form>   
  </section>
 </section> 
    

<script type="text/javascript">
$(document).ready(function(){


  var cat;
  $('.selectProduit').on('change',function(){
       cat=$('.selectProduit').val();
  });
     
 

  $('#recherche').autocomplete({
    source : function(request, response) {
      var cat=$('.selectProduit').val();
      $.get('fonction/fonctionliste.php',{term:request.term,cat:cat},function(data){
          response(data);
       },'json');
    }  
  });
  $('#client').autocomplete({
       source : 'fonction/fonctionlisteclien.php',
    select : function(event, ui){ 
      $.post('fonction/image.php',{image:ui.item},function(data){
         $('.image').empty().append('<img class="img-thumbnail" style="width:80px;" src="../img/photoclient/'+data.image+'">');
      },'json'); 
    }
  });
});

 </script>  
 <script type="text/javascript" src="../js/fonctionenregistrementvent.js"></scrip>