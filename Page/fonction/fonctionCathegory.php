<?php 
include_once 'class/main.php';
$main=new main();
$sql="SELECT * FROM `categoryproduit`";
$requette=$main->fetchAll($sql);
?>

                  
               
<?php foreach ($requette as $requette):?>
 <tr>
    <td><?php echo $requette['id']; ?></td>
    <td><?php echo $requette['famille']; ?></td>
    <td><?php echo $requette['groupe']; ?></td>
    <td class="no-print">
    <div class="btn-group">
<?php echo '<a class="btn btn-danger supprcat"  id="delCathegory" href="fonction/fonctionSupprimerCathegory.php?id='.$requette['id'].'"><i class="icon_close_alt2"></i></a>';?>
<a class="btn btn-primary"  id="delCathegory" href="#"><i class="fa fa-edit"></i></a>
    </div>
    </td>
</tr> 
 
<?php endforeach; ?>
<script type="text/javascript">
$(document).ready(function(){    
    function listcat(){
    $.post('fonction/fonctionCathegory.php',function(data){
        $('.tableCat').empty().append(data);
    });}
      $('.supprcat').on('click',function(event){
         event.preventDefault();
         if (confirm("voulez-vous vraiment supprimer ce catégorie!") ){
         $.get($(this).attr('href'),function(data){
            listcat();
         });   
         }
         

      });
});
</script>
