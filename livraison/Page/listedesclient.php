
<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i>Liste des clients</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-users"></i>Client</li>
              <li><i class="fa fa-list"></i>Liste des clients</li>
            </ol>
          </div>
        </div>
      <div class="row">
          <div class="col-lg-12">
            <section class="panel listProduit">
              <table class="table table-striped table-advance table-hover">
                <tbody>

           
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        liste();
        function liste (){
          $.post('fonction/fonctionlisteclient.php',function(data){
            $('.listProduit').empty().append(data);
          });
        }
      });
    </script>