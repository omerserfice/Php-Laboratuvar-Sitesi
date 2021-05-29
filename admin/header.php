<?php 
ob_start();
session_start();
 include '../admin/netting/baglan.php';

 $ayarsor = $baglan->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
 $ayarsor->execute(array(

    'id' => 1

 ));

 $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

 $kullanicisor = $baglan->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
 $kullanicisor->execute(array(

    'mail' => $_SESSION["kullanici_mail"]

 ));
 $say = $kullanicisor->rowCount();
 $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);



 if ($say==0) {
     
  header("Location:login/login.php?state=unauthorized");

 }

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Paneli</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexAdmin.php">Yetkili Paneli</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp;  <a href="login/logout.php" class="btn btn-success square-btn-adjust">Güvenli Çıkış &nbsp; <i class="fa fa-sign-out" aria-hidden="true"></i></a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center bg-white">
                    <br>
                    <div style="background-color: white; padding: 10px 5px 5px 5px;">
                    <h3 style="color:green;"><?php echo $kullanicicek["kullanici_adsoyad"] ?></h3>
                    <hr>
                    <h5 style="color:green;"><?php echo $kullanicicek["kullanici_mail"] ?></h5>
                    </div>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="indexAdmin.php"><i class="fa fa-desktop fa-2x"></i>Anasayfa</a>
                    </li>
                     <li>
                        <a  href="hakkimizda.php">&nbsp;&nbsp;<i class="fa fa-info fa-2x"></i>&nbsp;&nbsp;&nbsp;Hakkımızda</a>
                    </li>
                    <li>
                        <a  href="kullanici.php">&nbsp;<i class="fa fa-user fa-2x"></i>&nbsp;Kullanıcılar</a>
                    </li>
						   <li>
                        <a href="menu.php">&nbsp;<i class="fas fa-bars fa-2x"></i>&nbsp;Menüler</a>
                    </li>	
                      <li>
                        <a href="slider.php"><i class="fas fa-images fa-2x"></i>Slider</a>
                    </li>
                    <li>
                        <a href="dersler.php"><i class="fas fa-book fa-2x"></i>Dersler</a>
                    </li>
                    <li>
                        <a href="yayinlar.php"><i class="fas fa-newspaper fa-2x"></i>Yayınlar</a>
                    </li>
                     <li>
                        <a href="ekibimiz.php"><i class="fas fa-users fa-2x"></i>Ekibimiz</a>
                    </li>   				
					 <li>
                        <a href="projeler.php"><i class="fas fa-project-diagram fa-2x"></i>Projeler</a>
                    </li>
					                   
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-2x"></i>Site Ayarları<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="genel-ayar.php">Genel Ayarlar</a>
                            </li>
                            <li>
                                <a href="mail-ayar.php">Mail Ayarlar</a>
                            </li>
                            <li>
                                <a href="sosyal-ayar.php">Sosyal Ayarlar</a>
                            </li>
                            <li>
                                <a href="api-ayar.php">Api Ayarlar</a>
                            </li>
                            <li>
                                <a href="iletisim-ayar.php">İletişim Ayarlar</a>
                            </li>
                        </ul>
                      </li>  
                 	
                </ul>
               
            </div>
            
        </nav> 