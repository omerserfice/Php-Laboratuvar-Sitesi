<?php error_reporting(0); ?>
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
	<link rel="stylesheet" type="text/css" href="css/main-register.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="../netting/islem.php" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						<img src="images/logo.png">
						
					</span>
					<span class="login100-form-title p-b-33"><h6 style="font-family:'Poppins', sans-serif; font-size: 25px;">Yetkili Personel Kayıt</h6></span>
					
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="kullanici_adsoyad" placeholder="Ad Soyad">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="kullanici_mail" placeholder="Email Adresi">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="kullanici_passwordone" placeholder="Şifre">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="kullanici_passwordtwo" placeholder="Şifre Tekrarı">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="kullanici_yetki" placeholder="Yetki Kodu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name="kullanicikaydet" class="login100-form-btn">
							Hesap Oluştur
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							
						</span>
                        <a href="login.php"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
						
					</div>

				
				</form><br>
				<?php if ($_GET["state"]=="differentpassword") { ?>

					<div class="text-center"><strong style="color: red; font-family: 'Poppins', sans-serif; text-align: center;"><i class="far fa-times-circle fa-2x"></i>&nbsp;Şifreler farklı olamaz</strong></div>
				<?php }elseif ($_GET["state"]=="shortpassword") { ?>
					<div class="text-center"><strong style="color: red; font-family: 'Poppins', sans-serif; text-align: center;"><i class="far fa-times-circle fa-2x"></i>&nbsp;Şifre 6 karakterden az olamaz</strong></div>
				<?php }elseif ($_GET["state"]=="unsuccessful") { ?>

					<div class="text-center"><strong style="color: red; font-family: 'Poppins', sans-serif; text-align: center;"><i class="far fa-times-circle fa-2x"></i>&nbsp;Bu kullanıcı daha önce kayıt edilmiş</strong></div>

				<?php } ?>
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