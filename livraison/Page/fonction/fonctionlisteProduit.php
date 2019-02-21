<?php 
include_once('class/main.php');
$main=new main();
            $sql="SELECT * FROM `produit`";
            $reponse=$main->fetchAll($sql);
            ?>       
                  <tr>
                    <th> Code du produit</th>
                    <th>Designation</th>
                    <th> Quantite</th>
                    <th>Prix Unitaire</th>
                    <th> Cathegory</th>
                    <th>Photo Produit</th>
                  </tr>
             <?php foreach ($reponse as $reponse):?> 
                  <tr>
                    <td><?php echo $reponse['codeproduit'];?> </td>
                    <td><?php echo $reponse['designation'];?></td>
                    <td><?php echo $reponse['quantite'];?></td>
                    <td><?php echo $reponse['prix'].' Ar';?></td>
                    <td><?php echo $reponse['category'];?></td>
                    <td>
                     <?php 
                    echo  '<a style=" border: none;"href="#'.$reponse['codeproduit'].'" data-toggle="modal" class="btn btn-primary">';
                    echo '<img style="height:50px;width:50px;" src="../img/produit/'.$reponse['photoproduit'].'"></a>';
                    echo '<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="'.$reponse['codeproduit'].'" class="modal fade">';
                    ?> 
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" style="text-align: center;font-family:50px; ">
                       <span><?php echo $reponse['designation'];?></span> 
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      </div>
                      <div class="modal-body" style="text-align: center;">   
                  <?php echo '<img style="height:500px;width:500px;" src="../img/produit/'.$reponse['photoproduit'].'">';?>
                  </script>
                        
                      </div>
                     <div class="modal-footer" style="text-align: center;">
                      <?php echo '<a href="?page=ficheproduit&codeproduit='.$reponse['codeproduit'].'">Consulter fiche individuel du produit </a>';?>
                     </div>    
                    </div>
                  </div>
                </div>
               </td>
                  <td>
                      <div class="btn-group">
                        <?php echo '<a class="btn btn-info" href="?page=ficheproduit&codeproduit='.$reponse['codeproduit'].'"><i class="fa fa-info"></i></a>';?>
                        <!--<a class="btn btn-primary" href="?page=Ajoutproduit"><i class="icon_plus_alt2"></i></a>-->
                        <?php echo '<a class="btn btn-success" href="?page=Modificationproduit&codeproduit='.$reponse['codeproduit'].'"><i class="fa fa-edit"></i></a>';?>
       <?php echo '<a class="btn btn-danger" href="fonction/fonctionSupprimerProduit.php?codeproduit='.$reponse['codeproduit'].'"><i class="icon_close_alt2"></i></a>';?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach;?>  



      <script type="text/javascript">
        $(document).ready(function(){
           $('.btn-danger').on('click',function(event){
            event.preventDefault();
          $.get($(this).attr('href'),function(data){
            $.post('fonction/fonctionlisteProduit.php',function(data){
            $('.listProduit').empty().append(data);
                });
             });
         });
        });
      </script>