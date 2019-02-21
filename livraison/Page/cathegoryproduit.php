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
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Ajout cathegory
              </header>
              <div class="panel-body">
            <form role="form" action="fonction/fonctionAjoutCathegory.php" method="post">
                  <div class="form-group">
          <label for="textCathegory">Nouvelle cathegory</label>
          <input type="text" class="form-control" id="designation" placeholder="Cathegory" name="designation">
                  </div>
                  <button type="submit" class="btn btn-primary" id="cathegory">Valider</button>
                </form>

              </div>
            </section>
          </div>

<div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Liste des cathegory
              </header>
              <div class="panel-body">
              <table class="table table-striped table-advance table-hover">
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