<?php
include_once('class/main.php');
session_start();
$main=new main();
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
$sql="SELECT `NumFact` FROM `facture` WHERE `vu`='off'";
$reponse1=$main->fetchAll($sql);
$rep =unique_multidim_array($reponse1,'NumFact'); 
foreach ($rep as $rep):
 $sql="SELECT * FROM `facture` WHERE `NumFact`='".$rep['NumFact']."'";
 $reponse=$main->fetch($sql);
?>
 <li>
      <?php echo '<a href="?page=relance&idclient='.$reponse['idclient'].'&idfacture='.$rep['NumFact'].'">';?>
      	<?php
      	$sqlclient="SELECT * FROM `client` WHERE `idclient`='".$reponse['idclient']."'";
      	$rep=$main->fetch($sqlclient);
      	?>
            <span class="photo">
      <?php echo '<img alt="'. $rep['identifientsurfacebook'].'" src="../../img/photoclient/'.$rep['photo'].'" class="img-thumbnail" style="width:40px;">';?>
        	</span>
            <span class="from"><?php echo $rep['identifientsurfacebook'];?> a fait une commande</span>
            </span>
            </a>
    </li>

     <li>
                
<?php 
endforeach;
?>