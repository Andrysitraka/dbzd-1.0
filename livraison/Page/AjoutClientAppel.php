<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Ajout client</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-users"></i>Client</li>
              <li><i class="fa fa-plus"></i>Ajout Client</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Saisie client
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="fonction/fonctionAjoutClient.php" enctype="multipart/form-data">
      <fieldset><legend>Information sur le client</legend>
                    <div class="form-group ">
                      <label for="Nom" class="control-label col-lg-2">Nom et Prénom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="Nom" name="Nom" type="text" />
                      </div>
                    </div>
                    <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="fonction/fonctionAjoutClient.php">
                    <div class="form-group ">
                      <label for="trancedage" class="control-label col-lg-2">Trance d'age <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control" name="trancedage"> 
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
                        <select class="form-control" name="SituationMatrimonial"> 
                            <option >Célibataire </option>
                            <option >Marié(e)</option>
                  
                          </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Occupation " class="control-label col-lg-2">Occupation <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control" name="Occupation"> 
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
                        <input class=" form-control" id="address" name="identifient" type="text" />
                      </div>
                    </div>
              
                    <div class="form-group ">
                      <label for="Contact" class="control-label col-lg-2">Contact<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="Contact" name="Contact" type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ville" class="control-label col-lg-2">Ville<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="ville" name="ville" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Quartier" class="control-label col-lg-2">Quartier<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="Quartier" name="Quartier" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Sexe" class="control-label col-lg-2">Sexe <span class="required">*</span></label>
                      <div class="col-lg-10">
                         
                           <select class="form-control" name="Sexe"> 
                            <option >Homme</option>
                            <option >Femme</option>
                            
                          </select>
                           
                        
                      </div>
                    </div>
        </fieldset>            
       <fieldset><legend>Achat</legend>



        <div class="form-group ">
                      <label for="identifient" class="control-label col-lg-2">Nom et Prénom commercial<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="address" name="identifient" type="text" />
                      </div>
                    </div>
              
                    <div class="form-group ">
                      <label for="Contact" class="control-label col-lg-2">Matricule<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="Contact" name="Contact" type="text" />
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="ville" class="control-label col-lg-2">Stand<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="ville" name="ville" type="text" />
                      </div>
                    </div>
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
              
    <div class="row">
      <div class="col-lg-12">
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
                      
                      </th>
                </tr>
          </tfoot>
         </table>
        </div> 
      </fieldset>        


                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Enregistre</button>
                        <button class="btn btn-default" type="button">Annuler</button>
                      </div>
                    </div>
                  </fieldset>      
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
    </section>