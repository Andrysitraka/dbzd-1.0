<?php
include_once('fonction/class/main.php');
$main=new main();
session_start();
if (!isset($_SESSION['login'])){
 header('location:../Index.php');
 }else{
  $sql="SELECT * FROM `user` WHERE `matricule` LIKE ?";
  $login=$main->fetch($sql,array($_SESSION['login']['matricule']));
 } 
 $page=scandir('../page');
 if(isset($_GET['page']) AND in_array( $_GET['page'].'.php',$page)){
       $pages=$_GET['page'];
 }else{
      $pages='recap';
 }
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/icons/logo.ico">
  <title>Gestion de vente sur Facebook</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../css/dataTables.material.css" rel="stylesheet">
  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-ui-1.10.4.min.js"></script>
  </head>

<body>
  <section id="container" class="">	
    <header class="header " style="background-image: url('../img/banniere blanc.png');background-size: cover;background-repeat: no-repeat; ">
      <div class="top-nav notification-row">








        <ul class="nav pull-right top-menu">

          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                           <i class="orange fa fa-paper-plane circle" aria-hidden="true"></i>
                            <span class="badge bg-important"></span>
                        </a>




            <ul class="dropdown-menu extended notification relancedrop">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p>Vous aviez <span></span>relance</p>
              </li>

              
              <li>
                <a href="#">Voir tous</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                          <?php echo '<img style="height:40;width:40px" alt="" src="../img/Profil/'.$login['photo'].'">'; ?>
                            </span>
                            <span class="username"><?php  echo $login['Prenom'];?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="?page=profile"><i class="icon_profile"></i>Profile</a>
              </li>
              <li>
                <a href="fonction/deconnection.php"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Se deconnecter</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse " style="background-color: #054d63;">
        <ul class="sidebar-menu" style="color:#fff;">
          <li>
            <a class="" href="?page=recap">
                          <i class="icon_house_alt"></i>
                          <span>Accuiel</span>
                      </a>
          </li>
          <li>
            <a class="" href="?page=profile">
            <i class="fa fa-user" aria-hidden="true"></i>
                          <span>Utilisateur</span>
                      </a>
          </li>

           <li class="sub-menu">
            <a href="javascript:;" class="">
                    <i class="fa fa-users"></i>
                          <span>Client</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="?page=AjoutClient">Ajout client </a></li>
              <li><a class="" href="?page=listedesclient">Liste des clients </a></li>

            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                     <i class="fa fa-cube"></i>
                          <span>Produit</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="?page=Ajoutproduit">Ajout produit </a></li>
              <li><a class="" href="?page=listedesproduit">Liste des produit </a>
             <li><a class="" href="?page=cathegoryproduit">Cathegory des produits</a>
            </ul>
          </li>
          <li class="sub-menu">
            <a  href="?page=infoetreclamation">
                          <i class="fa fa-info"></i>
                          <span>Info et Réclamation </span>
                      </a>
          </li>
             <li class="sub-menu">
            <a  href="?page=vente">
                    <i class=" fa fa-eur"></i> 
                          <span>Vente</span>

                      </a>

          </li>

        

        </ul>
       
      </div>
    </aside>
        <?php 
          include_once $pages.'.php';
        ?> 
         
            

  
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/function.js"></script>
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../js/gritter.js" type="text/javascript"></script>
  <script  src="../js/dataTables.min.js"></script>
  <script  src="../js/dataTablesmin.js"></script>
  <script src="../js/scripts.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $.post('fonction/fonctiondropdown.php',function(data){
               $('.relancedrop li:last-child').prev().append(data);
              
      });
      $.post('fonction/fonctionbadgerelance.php',function(data){
         $('.bg-important').empty().append(data.badge);
      },'json');
    });
  </script>
</body>
</html>
