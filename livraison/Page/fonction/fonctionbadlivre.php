<?php
include_once('class/main.php');
session_start();
$main=new main();
$json=array("error"=>"true");
$dt=new DateTime();
$date=$dt->format('Y-m-d');


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
$sql="SELECT `NumFact` FROM `facture` WHERE `Statut`='confirmer' AND `vulivraison` LIKE 'off' AND `datelivre`='".$date."'";;
$reponse1=$main->fetchAll($sql);
$rep =unique_multidim_array($reponse1,'NumFact'); 
$reponse=count($rep);
$json["badge"]=$reponse;
$json["error"]="false";
echo json_encode($json);
?>