<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Utilisateur</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accuiel</a></li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
<div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#feed">
                        <i class="orange ace-icon  fa fa-address-cardbigger-120"></i>
                        Historique
                    </a>
                </li>
            </ul>

      <div class="tab-content no-border padding-24">
                <div id="home" class="tab-pane in active">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 center">
                            <span class="profile-picture">
                                  <?php echo '<img style="border-radius: 0px;height:160px; 
  width:160px;" src="../img/Profil/'.$login['photo'].'" >';?> 
                            </span>

                            <div class="space space-4"></div>

                            <a href="#" class="btn btn-sm btn-block btn-success">
                                <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                                <span class="bigger-110">Modifier Profil</span>
                    
                            </a>

                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-9">
                            <h4 class="blue">
                                <span class="middle"></span>
                            </h4>

                            <div class="profile-user-info">
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Matricule </div>

                                    <div class="profile-info-value">
                                        <span><?php echo " ".$login['matricule'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nom et Prenom </div>

                                    <div class="profile-info-value">
                                        
                                        <span><?php echo $login['Nom']." ".$login['Prenom'] ;?></span>
              
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name">E-mail </div>

                                    <div class="profile-info-value">
                                        <span> <?php echo "" .$login['email'];?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">Fonction</div>

                                    <div class="profile-info-value">
                                        <span> <?php echo " ".$login['fonction'];?></span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Telephone </div>

                                    <div class="profile-info-value">
                                    <i class="middle ace-icon fa fa-phone-square bigger-150 green"></i>
                                        <span><?php echo " ".$login['numero'];?></span>      
                                    </div>
                                </div>
                             </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    
                </div><!-- /#home -->

                <div id="feed" class="tab-pane">
                    <div class="profile-feed row">
                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <img class="pull-left" alt="Alex Doe's avatar" src="http://bootdey.com/img/Content/avatar/avatar1.png">
                                    <a class="user" href="#"> Alex Doe </a>
                                    changed his profile photo.
                                    <a href="#">Take a look</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        an hour ago
                                    </div>
                                </div>

                            
                            </div>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <div class="profile-activity clearfix">
                                <div>
                                    <i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
                                    <a class="user" href="#"> Alex Doe </a>
                                    published a new blog post.
                                    <a href="#">Read now</a>

                                    <div class="time">
                                        <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                        11 hours ago
                                    </div>
                                </div>

                                
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space-12"></div>

                    <div class="center">
                        <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                            <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                            <span class="bigger-110">View more activities</span>

                            <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div><!-- /#feed -->
            </div>
        </div>
    </div>














