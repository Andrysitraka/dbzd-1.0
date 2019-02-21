<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Recherche </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-cube"></i>Produit</li>
              <li><i class="fa fa-search"></i>Recherche produit</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              </header>
              <div class="panel-body">
                <form class="form-inline" role="form"  method="post">
                  <div class="form-group">
                    <label class="sr-only" for="lienfb"></label>
                    <input type="text" class="form-control" id="recherche" placeholder="Entre mot cle" name="recherche">
                  </div>
                <button type="submit" class="btn btn-primary">Recherche</button>
                <div class="form-inline">   
                </form>

              </div>
            </section>

          </div>
        </div>


<div class="row">
          <div class="col-lg-12 resultat">
           
          </div>
        </div>
           
      </section>
    </section>
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn').on('click',function(event){
        event.preventDefault();
        var recherche=$('#recherche').val();
        $.post('fonction/fonctionrechercheproduit.php',{recherche:recherche},function(data){
            $('.resultat').empty().append(data);
            console.log(recherche);
        });
    });

  });
</script>

