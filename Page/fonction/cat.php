<?php
include_once('class/main.php');
$main=new main();
if(isset($_POST['famille'])){
	$sql="SELECT `groupe` FROM `categoryproduit` WHERE `famille` LIKE '".$_POST['famille']."'";
	$reponse=$main->fetchAll($sql);
	foreach ($reponse as $reponse):

?>
   <option><?php echo $reponse['groupe'];?></option>
<?php
endforeach;
}
?>