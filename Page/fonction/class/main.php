<?php
class main {
private $host="localhost";	
private $pass="";	
private $user="root";	
private $dbname="gestiondevente";
private $con;	
public	function __construct()
	{
		try{
        $this->con=new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->user,$this->pass);
		}catch(PDOEXEPTION $e){
           die('error'.$e->getMessage());
		}

	}
public function fetch($sql,$parametre=array()){
  $requette=$this->con->prepare($sql);
  $requette->execute($parametre);
  return $requette->fetch();
 } 	
 public function test($sql){
  $requette=$this->con->prepare($sql);
  $requette->execute();
  return $requette->rowCount();
 } 	

 public function fetchAll($sql,$parametre=array()){
  $requette=$this->con->prepare($sql);
  $requette->execute($parametre);
  return $requette->fetchAll();
 } 

  public function count($sql,$parametre=array()){
  $requette=$this->con->prepare($sql);
  $requette->execute($parametre);
  return $requette->rowCount();
 } 

 public function requette($sql){
   $requette=$this->con->prepare($sql);
   $requette->execute();
   if($requette){
   	return true;
   }else{
   	return false;
   }
 }

 public function requette2($sql){
   $requette=$this->con->prepare($sql);
   $requette->execute();
   if($requette->rowCount()>0){
    return true;
   }else{
    return false;
   }
 }

}
?>