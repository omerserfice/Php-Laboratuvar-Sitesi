<?php 

include 'admin/netting/baglan.php';
include 'admin/fonksiyon.php';

// AYAR SORGUSU

$ayarsor = $baglan->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
 $ayarsor->execute(array(

    'id' => 1

 ));

 $ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

//

 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
	
	<meta charset="utf-8">
		<title><?php echo $ayarcek["ayar_title"]; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
		<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>">
		<meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>">
		<link href="css/bootstrap.css" rel="stylesheet">      
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
		
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		
		

</head>
<body>
	<div class="cerceve">
		<!-- Site Menüsü -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="index.php" class="navbar-brand"><img width="100" src="<?php echo $ayarcek['ayar_logo']; ?>"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse justify-content-end" id="menu">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="index.php" class="nav-link">ANASAYFA</a></li>
					<?php
							$menusor = $baglan->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 8");
							$menusor->execute(array(

                                  'durum' => 1
							));

                           
                           while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { ?>
					<li class="nav-item"><a href="


                                   <?php 
                                      
                                      if(!empty($menucek['menu_url'])){

                                      	echo $menucek['menu_url'];


                                          }else{

                                         echo "sayfa-".seo($menucek['menu_ad']);
                                          }
                                    ?>
                                      


								" class="nav-link"><?php echo $menucek["menu_ad"]; ?></a></li>

                        <?php } ?>
				</ul>
			</div>
		</nav>