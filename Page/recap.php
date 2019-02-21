<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
            </ol>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading" style="height: 40px;">
               <div class="form-group">
                <div class="col-lg-10">
                    <div class="row"> 
                    <label class="control-label col-lg-2" for="date" style="margin-right: -95px;"><strong>Vente du : </strong></label>
                    
                    </div>
                  </div>

                </form>
              </div>
            </section>
          </div>
        </div>
              </header>
               <div class="conttable">
                 
               </div>
             
            </section>
          </div>
        </div>
        <!-- page end-->
<script type="text/javascript">
  $(document).ready(function(){
    $.post('fonction/fonctionAccuiel.php',function(data){
      $('.conttable').empty().append(data);
      
      $('tr').last().remove();
      $('#tableau').DataTable();
    }); 

  });
</script> 