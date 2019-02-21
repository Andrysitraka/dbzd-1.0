<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Ajout produit</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-cube"></i>Produit</li>
              <li><i class="fa fa-plus"></i>Ajout produit</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Saisie produit
              </header>
              <div class="panel-body">
                <div class="form">
    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="fonction/fonctionAjoutProduit.php" enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="codeproduit" class="control-label col-lg-2">Code Produit <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="codeproduit" name="codeproduit" minlength="5" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="designation" class="control-label col-lg-2">Designation<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="designation" type="text" name="designation" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="prix" class="control-label col-lg-2">Prix en Ariary<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="prix" type="number" name="prix" required/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Quantite <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="quantite" minlength="1" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="category" class="control-label col-lg-2">Fammille<span class="required">*</span></label>

                      <div class="col-lg-3">      
                  <select class="form-control famille" name="famille" placeholder="Cathegory" >
                     <option>AUTRES</option>
                     <option>BEAUTE</option>
                     <option>BOISSON</option>
                     <option>DEO & PARFUM</option>
                     <option>HYGIENE BUCO-DENTAIRE</option>
                     <option>HYGIENE CORPORELLE</option>
                     <option>LESSIVE</option>
                     <option>SOINS CAPILLAIRE</option>
                     <option>SOINS VISAGE</option>  
                  </select>     

                      </div>
                    <label for="category" class="control-label col-lg-2">Groupe<span class="required">*</span></label>
                      <div class="col-lg-3">      
                        <select class="form-control groupe" name="groupe">
                        
                        </select>
                      </div>




                    </div>
                     

                     <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Description
<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <textarea class="form-control" rows="5" name="description" required></textarea>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Ingrédient 
<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <textarea class="form-control" rows="5" name="ingredient" ></textarea>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="quantite" class="control-label col-lg-2">Conseil d'utilisation<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control" rows="5" id="comment" name="ModeUtilisation" required></textarea>
                      </div>
                    </div>



                   <div class="form-group ">
                      <label for="image" class="control-label col-lg-2">Argument et Objection (PDF)<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <input type="file" name="pdf">
                      </div>
                    </div>


                    <div class="form-group ">
                      <label for="image" class="control-label col-lg-2">Photo du produit<span class="required">*</span></label>
                      <div class="col-lg-10">
                       <input type="file" name="image">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Enregistrement</button>
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
    list();
    $('.famille').on('change',function(){
         list();
    });
    function list(){
      var famille=$('.famille').val();
      $.post('fonction/cat.php',{famille:famille},function(data){
           $('.groupe').empty().append(data);
      });
    }
  });
</script>

