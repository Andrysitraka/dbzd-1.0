<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Cathegory des produits </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-cube"></i>Produit</li>
              <li><i class="fa fa-list-alt"></i>Cathogory</li>
            </ol>
          </div>
        </div>
        


          <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Ajout cathegory
              </header>
              <div class="panel-body">
            <form role="form" action="fonction/fonctionAjoutCathegory.php" method="post">
                  <div class="form-group">
                    <div class="col-lg-3">
                  <select class="form-control famille" placeholder="Cathegory" >
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
                 <div class="col-lg-3">   
          
          <input type="text" class="form-control groupe" placeholder="Goupe" name="designation">
                  </div>
                  
                  <div class="col-lg-3">
                   <button type="submit" class="btn btn-primary" id="cathegory"><i class="fa fa-plus"></i></button>
        
                  </div>

                  </div>
                  
                </form>

              </div>
            </section>
          </div>
<div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Liste des cathegory
              </header>
         <table class="table table-striped table-advance table-hover">
          <thead>               
           <tr>
             <th>Id</th>
             <th>Famille</th>
             <th>Groupe</th>
             <th></th>
          </tr>
        </thead>
     <tbody class="tableCat">     
      </tbody>
     </table>
              
            </section>
          </div>
        </div>

              </div>
            </section>





      </section>
    </section>
 