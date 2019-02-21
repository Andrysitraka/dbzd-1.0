 <?php 
 include_once('class/main.php');
 $main=new main();
 ?>
 <tr><td>
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
</td>
<td class="contprix"><span class="prix">20</span></td>
<td><input style="width:90px;"  class="form-control qt" type="number"></td>
<td class="total"><span class="conttotal"></span></td>
<td></td>
<td>
  <button class="btn btn-danger suppr"><i class="icon_close_alt2"></i></button>
</td>
</tr>"
<script type="text/javascript">
  $(document).ready(function(){
 $(".suppr").on('click',function(){   
      $(this).parent().parent().remove();;
    });
 $(".qt").on('change',function(){
    var quantite=$(this).val();
    var priproduit=$('.contprix .prix').text();
    var total=quantite*priproduit;
    $('.total .conttotal').empty().append(total+" Ar");
   });

  $(".selectProduit").on('change',function(){
     var codeproduittemp=$('.selectProduit').val();
     var codeproduitsplit=codeproduittemp.split("/");
     var codeproduit=codeproduitsplit[0];
     $.post('fonction/fonctionProduit.php',{codeproduit:codeproduit},function(data){
           console.log(data.Message);
           var th=$(this).parent("tr");
           var lien=th + '.contprix .prix';
           console.log(th);
           $(lien).empty().append(data.prix);
           console.log(data.sql);
     },'json');
     console.log(codeproduit);
    });
  });


</script>
