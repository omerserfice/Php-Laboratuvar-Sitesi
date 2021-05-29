<?php 
 
 require_once('../netting/baglan.php');

error_reporting(0);
ob_start();
session_start();



 ?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Admin Giriş</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form  method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						<img src="images/logo.png">
						
					</span>
					<span class="login100-form-title p-b-33"><h6 style="font-family:'Poppins', sans-serif; font-size: 25px;">Yetkili Giriş Paneli</h6></span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="kullanici_mail" placeholder="Email Adresi">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="kullanici_password" placeholder="Şifre">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name="loginislemi" class="login100-form-btn">
							Giriş Yap
						</button>
					</div>

				
					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Şifremi Unuttum |
						</span>

						<a href="#" class="txt2 hov1">
							 Yeni Şifre Al?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Yetkili Hesap Oluşturma |
						</span>

						<a href="register.php" class="txt2 hov1">
							Hesap Oluştur
						</a>
					</div>
				</form><br>

                <?php 

                      if (isset($_POST["loginislemi"])) {

                      	$kullanici_mail = $_POST["kullanici_mail"];
                        $kullanici_password = md5($_POST["kullanici_password"]);

                       $kullanicisor = $baglan->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
                      $kullanicisor->execute(array(

					    'mail'     => $kullanici_mail,
					    'password' => $kullanici_password,
					    'yetki' => 5

 ));
 
  $say = $kullanicisor->rowCount();

                   if ($say == 1) {
                   
                   $_SESSION["kullanici_mail"]=$kullanici_mail; ?>

                   <div class="loader"></div>
  
  <?php                 header("Refresh:2; url=../indexAdmin.php");


                   }else{

                      header("Location:login.php?state=loginunsuccessful");

                   }

    
                      }

                 ?>

                 <?php if ($_GET["state"]=="loginunsuccessful") { ?>

					<div class="text-center"><strong style="color: red; font-family: 'Poppins', sans-serif; text-align: center;"><i class="far fa-times-circle fa-2x"></i>&nbsp;Kullanıcı Bulunamadı !</strong></div>
				<?php }elseif ($_GET["state"]=="unauthorized") { ?>
					<div class="text-center"><strong style="color: gray; font-family: 'Poppins', sans-serif; text-align: center;"><i class="fas fa-exclamation fa-2x"></i>&nbsp;Yetkisiz Giriş</strong></div>
				<?php }elseif ($_GET["state"]=="exit") { ?>

					<div class="text-center"><strong style="color: red; font-family: 'Poppins', sans-serif; text-align: center;">Çıkış Yaptınız..</strong></div>

				<?php }elseif ($_GET["state"]=="successfulregister") { ?>
					
                     <div class="text-center"><strong style="color: green; font-family: 'Poppins', sans-serif; text-align: center;"><i class="far fa-check-circle fa-2x"></i>&nbsp;Kayıt Başarılı</strong></div>

			<?php 	} ?>



				
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>