<?php
include_once('class/main.php');
session_start();
$main=new main();
$dt=new DateTime();
$DateTime=$dt->format('Y-m-d');
$sql="SELECT * FROM `relance` WHERE `datedererelance`<='".$DateTime."' AND  `user` ='".$_SESSION['login']['matricule']."' AND `Statu`='on'";
$reponse=$main->fetchAll($sql);
foreach ($reponse as $reponse):
?>
 <li>
      <?php echo '<a href="?page=relance&idclient='.$reponse['idclient'].'">';?>
      	<?php
      	$sqlclient="SELECT * FROM `client` WHERE `idclient`='".$reponse['idclient']."'";
      	$rep=$main->fetch($sqlclient);
      	?>
            <span class="photo">
        	<?php echo '<img alt="'. $rep['identifientsurfacebook'].'" src="../img/photoclient/'.$rep['photo'].'" class="img-thumbnail" style="width:40px;">';?>
        	</span>
            <span class="from"><?php echo $rep['identifientsurfacebook'];?> doit être relancé</span>
            </span>
            </a>
    </li>

     <li>
                
<?php 
endforeach;
?>