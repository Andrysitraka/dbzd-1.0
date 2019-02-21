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
                    <label class="control-label col-lg-2" for="date" style="margin-right: -95px;"><strong>Livraison du : </strong></label>
                    <div class="col-lg-3" style="margin-top: 1px;">
                          <input type="Date" class="form-control" name="date" required style="font-size: 15px;text-align: center;">
                    </div>
                    </div>
                  </div>

                </form>
              </div>
            </section>
          </div>
        </div>
              </header>

              <table class="table table-striped table-advance table-hover">
                <thead>
                   <tr>
                    <th><i class="blue ace-icon icon_calendar"></i> Date</th>
                    <th><i class="fa fa-users"></i> Client</th>
                    <th><i class="green fa fa-eur"></i> Heure de livrason</th>
                    <th><i class="orange ace-icon fa fa-info-circle bigger-120"></i> Lieu de livraison</th>
                    <th><i class="orange ace-icon fa fa-info-circle bigger-120"></i> DMD INFOS</th>
                  
                  </tr>
                </thead>
                <tbody class="tbody">
                 
                </tbody>  
              </table>
            </section>
          </div>
        </div>
        <!-- page end-->
<!--<script type="text/javascript">
  $(document).ready(function(){
    $.post('fonction/fonctionAccuiel.php',function(data){
      $('.tbody').empty().append(data);
      $('tr').last().remove();
    });
  });
</script> -->