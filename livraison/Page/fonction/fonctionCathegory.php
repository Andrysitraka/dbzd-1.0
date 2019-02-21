<?php 
include_once 'class/main.php';
$main=new main();
$sql="SELECT * FROM `categoryproduit`";
$requette=$main->fetchAll($sql);
?>
<tr>
    <th>ID Cathegory</th>
    <th>Designation</th>
    <th></th>
</tr>
<?php foreach ($requette as $requette):?>
 <tr>
    <td><?php echo $requette['id']; ?></td>
    <td><?php echo $requette['designation']; ?></td>
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
      $('.supprcat').on('click',function(event){
         event.preventDefault();
         $.get($(this).attr('href'),function(data){
         });

      });
});
</script>
