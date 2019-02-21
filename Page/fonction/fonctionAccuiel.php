<?php
session_start();
$user=$_SESSION['login']['matricule'];
include_once('class/main.php');
$main=new main();
if(isset($_POST['datedecomand'])){
$sql="SELECT * FROM `comande` WHERE `matriculeuser` ='".$user."'  AND `datedecomand` ='".$_POST['datedecomand']."'";
}else{
 $dt = new DateTime();
 $DateTime=$dt->format('Y-m-d');
}
$sql1="SELECT `datedecomand` FROM `comande` WHERE `matriculeuser` ='".$user."'  AND `datedecomand` ='".$DateTime."'";
$reponse=$main->requette2($sql1);

?>

 <table class="table table-striped table-advance table-hover" id="tableau'">
                <thead>
                   <tr>
                    <th><i class="blue ace-icon icon_calendar"></i> Date</th>
                    <th><i class="blue ace-icon fa fa-shopping-cart" aria-hidden="true"></i> Vente</th>
                    <th><i class="green fa fa-eur"></i> Montant</th>
                    <th><i class="orange ace-icon fa fa-info-circle bigger-120"></i> DMD PRIX</th>
                    <th><i class="orange ace-icon fa fa-info-circle bigger-120"></i> DMD INFOS</th>
                    <th>  
                   <i class="red ace-icon fa fa-exclamation-circle" aria-hidden="true"></i> RECLAMATION
                    </th>
                    <th><i class="blue ace-icon  fa fa-paper-plane-o bigger-120" aria-hidden="true"></i>
 RELANCE</th>
                    <th><i class="blue ace-icon fa fa-life-ring" aria-hidden="true"></i>
 AUTRES</th>
                    <th><i class="blue ace-icon fa fa-plus" aria-hidden="true"></i>
                    TOTAL DISCUTION</th>
                  </tr>
                </thead>
           <tbody >
                 

  <tr>
  	<th style="text-align: center;"><?php echo $DateTime ;?></th>
  	
  	<?php 
  	if($reponse){
  	  
  	?>
  	<th  style="text-align: center;" class="somme">	
  		<?php
      $reponsecount=$main->count($sql1);
  	  echo $reponsecount;
  		?>
  	</th>
  	<th style="text-align: center;" class="somme">
  		<?php 
  	$sql3="SELECT `codeproduit` FROM `comande` WHERE  `matriculeuser` ='".$user."'  AND `datedecomand` ='".$DateTime."'";
  	 $produit=$main->fetchAll($sql3);
  	 $total=0;
  	 foreach ($produit as $produit) {
  	 $sqlprix="SELECT `prix` FROM `produit` WHERE `codeproduit`='".$produit['codeproduit']."'";
  	 	 $rep=$main->fetch($sqlprix);
  	 	 $total+=$rep['prix'];
  	 	
  	 }
  	 echo number_format($total, 2, ',', '.');
  	?>	
  	</th>
  	<?php }else{
  		$reponsecount=0;
     ?>
     <th style="text-align: center;" class="somme">0</th>
     <th style="text-align: center;">0</th>
 <?php }?>
  	<th style="text-align: center;" class="somme">
  <?php		
  	$sqlifoprix="SELECT * FROM `discutionfb` WHERE `nature`LIKE 'Demande d\'information' AND `type` LIKE 'Prix' AND `user`='".$user."'  AND `Date` ='".$DateTime."'";
  	 $reponseprix=$main->count($sqlifoprix);
  	 echo $reponseprix;
  	 	
  ?>	
  </th>
  	<th style="text-align: center;" class="somme">
  	<?php	
  $sql4="SELECT * FROM `discutionfb` WHERE `nature` LIKE 'Demande d\'information' AND `type` <> 'Prix' AND `Date` ='".$DateTime."' AND `user`='".$_SESSION['login']['matricule']."'";
  $reponseinfo=$main->count($sql4);
  	  echo $reponseinfo;
  	  ?>
  	</th>
  	<th style="text-align: center;" class="somme">
  		<?php	
  	$sqrecla="SELECT * FROM `discutionfb` WHERE `nature`='Réclamation' AND `user`='".$user."' AND `Date`='".$DateTime."'";
  	 $reponsecountrecla=$main->count($sqrecla);
  	 echo  $reponsecountrecla;
  	?>
  	</th>
  	<th style="text-align: center;">
  		<?php	
  	$sqlrel="SELECT * FROM `relance` WHERE `user`='".$user."' AND `Statu`='off' AND `datedererelance`='".$DateTime."'";
  	 $reponsecountrel=$main->count($sqlrel);
  	 echo   $reponsecountrel;
  	?>
  	</th>
  	<th style="text-align: center" class="somme">
  <?php	
  	$sqrecla="SELECT * FROM `discutionfb` WHERE `nature`='Autre' AND `user`='".$user."' AND `Date`='".$DateTime."'";
  	 $reponseAutre=$main->count($sqrecla);
  	 echo $reponseAutre;
  	?>
  	</th>
  	<th class="totaltab" style="text-align: center"><?php echo $reponseAutre+$reponsecountrecla+$reponseinfo + $reponseprix+$reponsecount+$reponsecountrel;  ?></th>
  </tr>
<?php	
$dt->modify('-1 day');
$DateTime=$dt->format('Y-m-d');
$reponsedate=true;
while ($reponsedate==true) {
$sql="SELECT `datedecomand` FROM `comande` WHERE `matriculeuser` ='".$user."'  AND `datedecomand` ='".$DateTime."'";
 $reponsedate=$main->requette2($sql);
 ?>
 <tr>
  	<th style="text-align: center;"><?php echo $DateTime ;?></th>
  	<th style="text-align: center;">
  	<?php 
  	$sql="SELECT `datedecomand` FROM `comande` WHERE `matriculeuser` ='".$user."'  AND `datedecomand` ='".$DateTime."'"; 
  	  $reponsevent=$main->count($sql);
  	  echo $reponsevent;
  	?>	

  	</th>
  	<th style="text-align: center;">
  		<?php 
  	$sql3="SELECT `codeproduit` FROM `comande` WHERE  `matriculeuser` ='".$user."'  AND `datedecomand` ='".$DateTime."'";
  	 $produit=$main->fetchAll($sql3);
     $total=(int)0;
  	 foreach ($produit as $produit) {
  	 $sqlprix="SELECT `prix` FROM `produit` WHERE `codeproduit`='".$produit['codeproduit']."'";
  	 	 $rep=$main->fetch($sqlprix);
  	 	 $prix=(int)$rep['prix'];
  	 	 $total+=$prix;
  	 }
  	echo number_format($total, 2, ',', '.');
  	?>	

  	</th>
  	<th style="text-align: center;">
  		
  		<?php		
  	$sqlifoprix="SELECT * FROM `discutionfb` WHERE `nature`LIKE 'Demande d\'information' AND `type` LIKE 'Prix' AND `user`='".$user."' `Date` ='".$DateTime."'";
  	 $reponseprix=$main->count($sqlifoprix);
  	 
  	 echo $reponseprix;
  ?>	
  	</th>
  	<th style="text-align: center;">
  		<?php	
  $sql4="SELECT * FROM `discutionfb` WHERE `nature` LIKE 'Demande d\'information' AND `type` <> 'Prix' AND `Date` ='".$DateTime."' AND `user`='".$_SESSION['login']['matricule']."'";
  $reponseinfo=$main->count($sql4);
  	  echo $reponseinfo;
  	  ?>
  	</th>
  	<th style="text-align: center;">
  	<?php	
  	$sqrecla="SELECT * FROM `discutionfb` WHERE `nature`='Réclamation' AND `user`='".$user."' AND `Date`='".$DateTime."'";
  	 $reponsecountrecla=$main->count($sqrecla);
  	 echo  $reponsecountrecla;
  	?>
  </th>
  	<th style="text-align: center;">
  <?php	
  	$sqlrel="SELECT * FROM `relance` WHERE `user`='".$user."' AND `Statu`='off' AND `datedererelance`='".$DateTime."'";
  	 $reponsecountrel=$main->count($sqlrel);
  	 echo   $reponsecountrel;
  	?>	
  	
  	</th>
  	<th style="text-align: center;">
  	<?php	
  		$sqrecla="SELECT * FROM `discutionfb` WHERE `nature`='Autre' AND `user`='".$user."' AND `Date`='".$DateTime."'";
  	  $reponseAutre=$main->count($sqrecla);
  	 echo   $reponseAutre;
  	 ?>
  	</th>
  	<th style="text-align: center;">
  	<?php echo $reponseAutre+$reponsecountrecla+$reponseinfo + $reponseprix+$reponsevent+$reponsecountrel;?>
  	</th>
  </tr>

  </tbody>  
</table>
 <?php
 $dt->modify('-1 day');
 $DateTime=$dt->format('Y-m-d');
}

 ?>            
