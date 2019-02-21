<?php
include_once('class/main.php');
$main=new main();
$json=array("error"=>"true");
$sqll="SELECT `NumFact` FROM `facture` ORDER BY `idfacture` DESC LIMIT 1";
    $fact=$main->fetch($sqll);
    $dt = new DateTime();
    date_default_timezone_set('UTC');
    $Date=$dt->format('Y-m-d');
    if($fact){
       $facture=explode("/",$fact['NumFact']);
       $codefactvar=$facture[3];
       if($codefactvar<10){
       $json['codefact']="CTL/FB/". $Date."/000".$codefactvar+=1;
   }else if($codefactvar<100){
       $json['codefact']="CTL/FB/". $Date."/00".$codefactvar+=1;
   }else if($codefactvar<1000){
       $json['codefact']="CTL/FB/". $Date."/0".$codefactvar+=1;
   }else{
       $json['codefact']="CTL/FB/". $Date."/".$codefactvar+=1;
   }
    }else{
       $json['codefact']="CTL/FB/". $Date."/0001";
    } 

    echo json_encode($json);
?>