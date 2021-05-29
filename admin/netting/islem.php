<?php 
error_reporting(0);
ob_start();
session_start();

include 'baglan.php';
include '../fonksiyon.php';


//kullanıcı kaydetme işlemi 


if (isset($_POST["kullanicikaydet"])) {
	
	$kullanici_adsoyad = htmlspecialchars($_POST["kullanici_adsoyad"]);
	$kullanici_mail    = htmlspecialchars($_POST["kullanici_mail"]);
	
	$kullanici_passwordone = trim($_POST["kullanici_passwordone"]);
	$kullanici_passwordtwo = trim($_POST["kullanici_passwordtwo"]);
	
	$kullanici_yetki    = $_POST["kullanici_yetki"];

	$passwordlength = strlen($kullanici_passwordone);


	if ($kullanici_passwordone==$kullanici_passwordtwo) {
          
       if ($passwordlength>=6) {

       	//bu kayıt varmı ?? BAŞLANGIÇ


          $kullanicisor = $baglan->prepare("select * from kullanici where kullanici_mail=:mail");
          $kullanicisor->execute(array(

              'mail' => $kullanici_mail

          ));

          $say = $kullanicisor->rowCount();

          if ($say == 0) {
          	
               $password = md5($kullanici_passwordone);

               //kaydetme işlemi 
               $kullanicikaydet=$baglan->prepare("INSERT INTO kullanici SET

                  kullanici_adsoyad=:kullanici_adsoyad,
                  kullanici_mail=:kullanici_mail,
                  kullanici_password=:kullanici_password,
                  kullanici_yetki=:kullanici_yetki
                  
               	");

               $insert = $kullanicikaydet->execute(array(


                   'kullanici_adsoyad' => $kullanici_adsoyad,
                   'kullanici_mail' => $kullanici_mail,
                   'kullanici_password' => $password,
                   'kullanici_yetki' => $kullanici_yetki

               ));

             if ($insert) { ?>

             	   
           <?php    header("Location:../login/login.php?state=successfulregister");	 

             }


          }else{

           header("Location:../login/register.php?state=unsuccessful");

          }

       	//BİTİŞ 
	

       }else{

        header("Location:../login/register.php?state=shortpassword");

       }

		
	}else{

		header("Location:../login/register.php?state=differentpassword");
	}

}

//slider güncelleme işlemi //

if (isset($_POST["sliderguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE slider SET

		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_durum=:slider_durum


		WHERE slider_id={$_POST['slider_id']}");


	$update = $ayarkaydet->execute(array(


		'slider_ad' => $_POST["slider_ad"],
		'slider_sira' => $_POST["slider_sira"],
		'slider_link' => $_POST["slider_link"],
		'slider_baslik' => $_POST["slider_baslik"],
		'slider_aciklama' => $_POST["slider_aciklama"],
		'slider_durum' => $_POST["slider_durum"]

	));


	if ($update == 1) {

		header("Location:../slider.php?state=updatesuccess");
	}else{

		header("Location:../slider.php?state=updateunsuccessful");
	}

}

//slider silme işlemi

 if ($_GET["slidersil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from slider where slider_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../slider.php?remove=success");
		}else{

			header("Location:../slider.php?remove=unsuccessful");
		}

 }

// ekibimiz-doktora resim güncelleme  işlemi

if (isset($_POST['ekibimizdduzenle'])) {




	$uploads_dir = '../../dimg/ekip';

	@$tmp_name = $_FILES['ekipd_resimyol']["tmp_name"];
	@$name = $_FILES['ekipd_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE ekibimiz_doktora SET

		ekipd_resimyol=:ekip

		WHERE ekipd_id={$_POST['ekipd_id']}");

	$update=$duzenle->execute(array(
		'ekip' => $refimgyol
		));


	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../ekibimiz.php?state=updatesuccess");

	} else {

		Header("Location:../ekibimiz.php?state=updateunsuccesful");
	}


}

//ekibimiz doktora kaydetme işlemi

if (isset($_POST["ekibimizdekle"])) {
	
	$uploads_dir = '../../dimg/ekip';
    @$tmp_name = $_FILES['ekipd_resimyol']["tmp_name"];
    @$name = $_FILES['ekipd_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO ekibimiz_doktora SET
   
  
		ekipd_adsoyad=:ekipd_adsoyad,
		ekipd_unvan=:ekipd_unvan,
		ekipd_twitter=:ekipd_twitter,
		ekipd_facebook=:ekipd_facebook,
		ekipd_linkedin=:ekipd_linkedin,
		ekipd_resimyol=:ekipd_resimyol,
		ekipd_durum=:ekipd_durum
	
      
    	");

    $insert = $kaydet->execute(array(

      
          'ekipd_adsoyad'  => $_POST["ekipd_adsoyad"],
          'ekipd_unvan'    => $_POST["ekipd_unvan"],
          'ekipd_twitter'  => $_POST["ekipd_twitter"],
          'ekipd_facebook' => $_POST["ekipd_facebook"],
          'ekipd_linkedin' => $_POST["ekipd_linkedin"],
          'ekipd_resimyol' => $refimgyol,
          'ekipd_durum'    => $_POST["ekipd_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../ekibimiz.php?state=success");
    }else{
    	header("Location:../ekibimiz.php?state=unsuccessful");
    }

}



//ekibimiz doktora düzenleme işlemi //

if (isset($_POST["ekibimizdguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ekibimiz_doktora SET

		
        ekipd_adsoyad=:ekipd_adsoyad,
		ekipd_unvan=:ekipd_unvan,
		ekipd_twitter=:ekipd_twitter,
		ekipd_facebook=:ekipd_facebook,
		ekipd_linkedin=:ekipd_linkedin,
		ekipd_durum=:ekipd_durum


		WHERE ekipd_id={$_POST['ekipd_id']}");


	$update = $ayarkaydet->execute(array(


		  'ekipd_adsoyad'  => $_POST["ekipd_adsoyad"],
          'ekipd_unvan'    => $_POST["ekipd_unvan"],
          'ekipd_twitter'  => $_POST["ekipd_twitter"],
          'ekipd_facebook' => $_POST["ekipd_facebook"],
		  'ekipd_linkedin' => $_POST["ekipd_linkedin"],
          'ekipd_durum'    => $_POST["ekipd_durum"]

	));


	if ($update == 1) {

		header("Location:../ekibimiz.php?state=updatesuccess");
	}else{

		header("Location:../ekibimiz.php?state=updateunsuccessful");
	}

}

//ekibimiz silme işlemi

 if ($_GET["ekibimizdsil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from ekibimiz_doktora where ekipd_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../ekibimiz.php?remove=success");
		}else{

			header("Location:../ekibimiz.php?remove=unsuccessful");
		}

 }

 // ekibimiz-yükseklisans resim güncelleme  işlemi

if (isset($_POST['ekibimizylduzenle'])) {




	$uploads_dir = '../../dimg/ekip';

	@$tmp_name = $_FILES['ekipyl_resimyol']["tmp_name"];
	@$name = $_FILES['ekipyl_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE ekibimiz_ylisans SET

		ekipyl_resimyol=:ekip

		WHERE ekipyl_id={$_POST['ekipyl_id']}");

	$update=$duzenle->execute(array(
		'ekip' => $refimgyol
		));


	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../ekibimiz.php?state=updatesuccess");

	} else {

		Header("Location:../ekibimiz.php?state=updateunsuccesful");
	}


}

//ekibimiz ylisans kaydetme işlemi

if (isset($_POST["ekibimizylekle"])) {
	
	$uploads_dir = '../../dimg/ekip';
    @$tmp_name = $_FILES['ekipyl_resimyol']["tmp_name"];
    @$name = $_FILES['ekipyl_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO ekibimiz_ylisans SET
   
  
		ekipyl_adsoyad=:ekipyl_adsoyad,
		ekipyl_unvan=:ekipyl_unvan,
		ekipyl_twitter=:ekipyl_twitter,
		ekipyl_facebook=:ekipyl_facebook,
		ekipyl_linkedin=:ekipyl_linkedin,
		ekipyl_resimyol=:ekipyl_resimyol,
		ekipyl_durum=:ekipyl_durum
	
      
    	");

    $insert = $kaydet->execute(array(

      
          'ekipyl_adsoyad'  => $_POST["ekipyl_adsoyad"],
          'ekipyl_unvan'    => $_POST["ekipyl_unvan"],
          'ekipyl_twitter'  => $_POST["ekipyl_twitter"],
          'ekipyl_facebook' => $_POST["ekipyl_facebook"],
          'ekipyl_linkedin' => $_POST["ekipyl_linkedin"],
          'ekipyl_resimyol' => $refimgyol,
          'ekipyl_durum'    => $_POST["ekipyl_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../ekibimiz.php?state=success");
    }else{
    	header("Location:../ekibimiz.php?state=unsuccessful");
    }

}



//ekibimiz ylisans düzenleme işlemi //

if (isset($_POST["ekibimizylguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ekibimiz_ylisans SET

		
        ekipyl_adsoyad=:ekipyl_adsoyad,
		ekipyl_unvan=:ekipyl_unvan,
		ekipyl_twitter=:ekipyl_twitter,
		ekipyl_facebook=:ekipyl_facebook,
		ekipyl_linkedin=:ekipyl_linkedin,
		ekipyl_durum=:ekipyl_durum


		WHERE ekipyl_id={$_POST['ekipyl_id']}");


	$update = $ayarkaydet->execute(array(


		  'ekipyl_adsoyad'  => $_POST["ekipyl_adsoyad"],
          'ekipyl_unvan'    => $_POST["ekipyl_unvan"],
          'ekipyl_twitter'  => $_POST["ekipyl_twitter"],
          'ekipyl_facebook' => $_POST["ekipyl_facebook"],
		  'ekipyl_linkedin' => $_POST["ekipyl_linkedin"],
          'ekipyl_durum'    => $_POST["ekipyl_durum"]

	));


	if ($update == 1) {

		header("Location:../ekibimiz.php?state=updatesuccess");
	}else{

		header("Location:../ekibimiz.php?state=updateunsuccessful");
	}

}

//ekibimiz silme işlemi

 if ($_GET["ekibimizylsil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from ekibimiz_ylisans where ekipyl_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../ekibimiz.php?remove=success");
		}else{

			header("Location:../ekibimiz.php?remove=unsuccessful");
		}

 }


 // ekibimiz-lisans resim güncelleme  işlemi

if (isset($_POST['ekibimizlduzenle'])) {




	$uploads_dir = '../../dimg/ekip';

	@$tmp_name = $_FILES['ekipl_resimyol']["tmp_name"];
	@$name = $_FILES['ekipl_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE ekibimiz_lisans SET

		ekipl_resimyol=:ekip

		WHERE ekipl_id={$_POST['ekipl_id']}");

	$update=$duzenle->execute(array(
		'ekip' => $refimgyol
		));


	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../ekibimiz.php?state=updatesuccess");

	} else {

		Header("Location:../ekibimiz.php?state=updateunsuccesful");
	}


}

//ekibimiz-lisans kaydetme işlemi

if (isset($_POST["ekibimizlekle"])) {
	
	$uploads_dir = '../../dimg/ekip';
    @$tmp_name = $_FILES['ekipl_resimyol']["tmp_name"];
    @$name = $_FILES['ekipl_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO ekibimiz_lisans SET
   
  
		ekipl_adsoyad=:ekipl_adsoyad,
		ekipl_unvan=:ekipl_unvan,
		ekipl_twitter=:ekipl_twitter,
		ekipl_facebook=:ekipl_facebook,
		ekipl_linkedin=:ekipl_linkedin,
		ekipl_resimyol=:ekipl_resimyol,
		ekipl_durum=:ekipl_durum
	
      
    	");

    $insert = $kaydet->execute(array(

      
          'ekipl_adsoyad'  => $_POST["ekipl_adsoyad"],
          'ekipl_unvan'    => $_POST["ekipl_unvan"],
          'ekipl_twitter'  => $_POST["ekipl_twitter"],
          'ekipl_facebook' => $_POST["ekipl_facebook"],
          'ekipl_linkedin' => $_POST["ekipl_linkedin"],
          'ekipl_resimyol' => $refimgyol,
          'ekipl_durum'    => $_POST["ekipl_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../ekibimiz.php?state=success");
    }else{
    	header("Location:../ekibimiz.php?state=unsuccessful");
    }

}



//ekibimiz lisans düzenleme işlemi //

if (isset($_POST["ekibimizlguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ekibimiz_lisans SET

		
        ekipl_adsoyad=:ekipl_adsoyad,
		ekipl_unvan=:ekipl_unvan,
		ekipl_twitter=:ekipl_twitter,
		ekipl_facebook=:ekipl_facebook,
		ekipl_linkedin=:ekipl_linkedin,
		ekipl_durum=:ekipl_durum


		WHERE ekipl_id={$_POST['ekipl_id']}");


	$update = $ayarkaydet->execute(array(


		  'ekipl_adsoyad'  => $_POST["ekipl_adsoyad"],
          'ekipl_unvan'    => $_POST["ekipl_unvan"],
          'ekipl_twitter'  => $_POST["ekipl_twitter"],
          'ekipl_facebook' => $_POST["ekipl_facebook"],
		  'ekipl_linkedin' => $_POST["ekipl_linkedin"],
          'ekipl_durum'    => $_POST["ekipl_durum"]

	));


	if ($update == 1) {

		header("Location:../ekibimiz.php?state=updatesuccess");
	}else{

		header("Location:../ekibimiz.php?state=updateunsuccessful");
	}

}

//ekibimiz silme işlemi

 if ($_GET["ekibimizlsil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from ekibimiz_lisans where ekipl_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../ekibimiz.php?remove=success");
		}else{

			header("Location:../ekibimiz.php?remove=unsuccessful");
		}

 }



// ekibimiz resim güncelleme  işlemi

if (isset($_POST['ekibimizduzenle'])) {




	$uploads_dir = '../../dimg/ekip';

	@$tmp_name = $_FILES['ekip_resimyol']["tmp_name"];
	@$name = $_FILES['ekip_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE ekibimiz SET

		ekip_resimyol=:ekip

		WHERE ekip_id={$_POST['ekip_id']}");

	$update=$duzenle->execute(array(
		'ekip' => $refimgyol
		));


	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../ekibimiz.php?state=updatesuccess");

	} else {

		Header("Location:../ekibimiz.php?state=updateunsuccesful");
	}


}

//ekibimiz kaydetme işlemi

if (isset($_POST["ekibimizekle"])) {
	
	$uploads_dir = '../../dimg/ekip';
    @$tmp_name = $_FILES['ekip_resimyol']["tmp_name"];
    @$name = $_FILES['ekip_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO ekibimiz SET
   
  
		ekip_adsoyad=:ekip_adsoyad,
		ekip_unvan=:ekip_unvan,
		ekip_twitter=:ekip_twitter,
		ekip_facebook=:ekip_facebook,
		ekip_linkedin=:ekip_linkedin,
		ekip_resimyol=:ekip_resimyol,
		ekip_durum=:ekip_durum
	
      
    	");

    $insert = $kaydet->execute(array(

      
          'ekip_adsoyad'  => $_POST["ekip_adsoyad"],
          'ekip_unvan'    => $_POST["ekip_unvan"],
          'ekip_twitter'  => $_POST["ekip_twitter"],
          'ekip_facebook' => $_POST["ekip_facebook"],
          'ekip_linkedin' => $_POST["ekip_linkedin"],
          'ekip_resimyol' => $refimgyol,
          'ekip_durum'    => $_POST["ekip_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../ekibimiz.php?state=success");
    }else{
    	header("Location:../ekibimiz.php?state=unsuccessful");
    }

}



//ekibimiz düzenleme işlemi //

if (isset($_POST["ekibimizguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ekibimiz SET

		
        ekip_adsoyad=:ekip_adsoyad,
		ekip_unvan=:ekip_unvan,
		ekip_twitter=:ekip_twitter,
		ekip_facebook=:ekip_facebook,
		ekip_linkedin=:ekip_linkedin,
		ekip_durum=:ekip_durum


		WHERE ekip_id={$_POST['ekip_id']}");


	$update = $ayarkaydet->execute(array(


		  'ekip_adsoyad'  => $_POST["ekip_adsoyad"],
          'ekip_unvan'    => $_POST["ekip_unvan"],
          'ekip_twitter'  => $_POST["ekip_twitter"],
          'ekip_facebook' => $_POST["ekip_facebook"],
		  'ekip_linkedin' => $_POST["ekip_linkedin"],
          'ekip_durum'    => $_POST["ekip_durum"]

	));


	if ($update == 1) {

		header("Location:../ekibimiz.php?state=updatesuccess");
	}else{

		header("Location:../ekibimiz.php?state=updateunsuccessful");
	}

}

//ekibimiz silme işlemi

 if ($_GET["ekibimizsil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from ekibimiz where ekip_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../ekibimiz.php?remove=success");
		}else{

			header("Location:../ekibimiz.php?remove=unsuccessful");
		}

 }

 // dersler resim güncelleme  işlemi

if (isset($_POST['derslerduzenle'])) {

	

	$uploads_dir = '../../dimg/dersler';

	@$tmp_name = $_FILES['ders_resimyol']["tmp_name"];
	@$name = $_FILES['ders_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE dersler SET

		ders_resimyol=:ders

		WHERE ders_id={$_POST['ders_id']}");

	$update=$duzenle->execute(array(
		'ders' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../dersler.php?state=updatesuccess");

	} else {

		Header("Location:../dersler.php?state=updateunsuccesful");
	}

}


 // dersler resim güncelleme  işlemi

if (isset($_POST['derslerduzenle'])) {

	

	$uploads_dir = '../../dimg/dersler';

	@$tmp_name = $_FILES['ders_resimyol']["tmp_name"];
	@$name = $_FILES['ders_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE dersler SET

		ders_resimyol=:ders

		WHERE ders_id={$_POST['ders_id']}");

	$update=$duzenle->execute(array(
		'ders' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../dersler.php?state=updatesuccess");

	} else {

		Header("Location:../dersler.php?state=updateunsuccesful");
	}

}

//dersler kaydetme işlemi

if (isset($_POST["derslerekle"])) {
	
	$uploads_dir = '../../dimg/dersler';
    @$tmp_name = $_FILES['dersler_resimyol']["tmp_name"];
    @$name = $_FILES['dersler_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO dersler SET
   
        ders_adi=:ders_adi,
		ders_detay=:ders_detay,
		ders_hoca=:ders_hoca,
		ders_resimyol=:ders_resimyol,
		ders_durum=:ders_durum
      
    	");

    $insert = $kaydet->execute(array(

          'ders_adi' => $_POST["ders_adi"],
          'ders_detay' => $_POST["ders_detay"],
          'ders_hoca' => $_POST["ders_hoca"],
          'ders_resimyol' => $refimgyol, 
          'ders_durum' => $_POST["ders_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../dersler.php?state=success");
    }else{
    	header("Location:../dersler.php?state=unsuccessful");
    }

}

//dersler düzenleme işlemi //

if (isset($_POST["derslerguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE dersler SET

		ders_adi=:ders_adi,
		ders_detay=:ders_detay,
		ders_hoca=:ders_hoca,
		ders_durum=:ders_durum


		WHERE ders_id={$_POST['ders_id']}");


	$update = $ayarkaydet->execute(array(


		'ders_adi' => $_POST["ders_adi"],
		'ders_detay' => $_POST["ders_detay"],
		'ders_hoca' => $_POST["ders_hoca"],
		'ders_durum' => $_POST["ders_durum"]

	));


	if ($update == 1) {

		header("Location:../dersler.php?state=updatesuccess");
	}else{

		header("Location:../dersler.php?state=updateunsuccessful");
	}

}

//dersler silme işlemi

 if ($_GET["derslersil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from dersler where ders_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../dersler.php?remove=success");
		}else{

			header("Location:../dersler.php?remove=unsuccessful");
		}

 }

 // dersler resim güncelleme  işlemi

if (isset($_POST['derslerduzenle'])) {

	

	$uploads_dir = '../../dimg/dersler';

	@$tmp_name = $_FILES['ders_resimyol']["tmp_name"];
	@$name = $_FILES['ders_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE dersler SET

		ders_resimyol=:ders

		WHERE ders_id={$_POST['ders_id']}");

	$update=$duzenle->execute(array(
		'ders' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../dersler.php?state=updatesuccess");

	} else {

		Header("Location:../dersler.php?state=updateunsuccesful");
	}

}


if (isset($_POST["dokumanekle"])) { ?>
	
	   <?php 

              foreach ($FILES["dosya"]['name'] as $key => $val) {
              	move_uploaded_file($_FILES['dosya']['tmp_name'],[$key],$val);
              }


	    ?>

<?php  }   


//yayınlar kaydetme işlemi

if (isset($_POST["yayinlarekle"])) {
	

    $kaydet = $baglan->prepare("INSERT INTO yayinlar SET
   
        yayin_adi=:yayin_adi,
		yayin_detay=:yayin_detay,
		yayin_hocasi=:yayin_hocasi,
		yayin_tarihi=:yayin_tarihi,
		yayin_durum=:yayin_durum
      
    	");

    $insert = $kaydet->execute(array(

          'yayin_adi' => $_POST["yayin_adi"],
          'yayin_detay' => $_POST["yayin_detay"],
          'yayin_hocasi' => $_POST["yayin_hocasi"],
          'yayin_tarihi' =>  $_POST["yayin_tarihi"], 
          'yayin_durum' => $_POST["yayin_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../yayinlar.php?state=success");
    }else{
    	header("Location:../yayinlar.php?state=unsuccessful");
    }

}

//yayinlar düzenleme işlemi //

if (isset($_POST["yayinlarguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE yayinlar SET

		yayin_adi=:yayin_adi,
		yayin_detay=:yayin_detay,
		yayin_hocasi=:yayin_hocasi,
		yayin_tarihi=:yayin_tarihi,
		yayin_durum=:yayin_durum


		WHERE yayin_id={$_POST['yayin_id']}");


	$update = $ayarkaydet->execute(array(


		'yayin_adi' => $_POST["yayin_adi"],
		'yayin_detay' => $_POST["yayin_detay"],
		'yayin_hocasi' => $_POST["yayin_hocasi"],
		'yayin_tarihi' => $_POST["yayin_tarihi"],
		'yayin_durum' => $_POST["yayin_durum"]

	));


	if ($update == 1) {

		header("Location:../yayinlar.php?state=updatesuccess");
	}else{

		header("Location:../yayinlar.php?state=updateunsuccessful");
	}

}

//yayinlar silme işlemi

 if ($_GET["yayinlarsil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from yayinlar where yayin_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../yayinlar.php?remove=success");
		}else{

			header("Location:../yayinlar.php?remove=unsuccessful");
		}

 }


// slider resim güncelleme  işlemi

if (isset($_POST['sliderduzenle'])) {

	

	$uploads_dir = '../../dimg/slider';

	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE slider SET

		slider_resimyol=:slider

		WHERE slider_id={$_POST['slider_id']}");

	$update=$duzenle->execute(array(
		'slider' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../slider.php?state=updatesuccess");

	} else {

		Header("Location:../slider.php?state=updateunsuccesful");
	}

}


//slider kaydetme işlemi

if (isset($_POST["sliderekle"])) {
	
	$uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO slider SET
   
           slider_ad=:slider_ad,
           slider_sira=:slider_sira,
           slider_link=:slider_link,
           slider_resimyol=:slider_resimyol
      
    	");

    $insert = $kaydet->execute(array(

          'slider_ad' => $_POST["slider_ad"],
          'slider_sira' => $_POST["slider_sira"],
          'slider_link' => $_POST["slider_link"],
          'slider_resimyol' => $refimgyol  

    )); 


    if ($insert) {
    	
    	header("Location:../slider.php?state=success");
    }else{
    	header("Location:../slider.php?state=unsuccessful");
    }

}


// logo düzenleme  işlemi

if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
   $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
      

	$duzenle=$baglan->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=1");

	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../genel-ayar.php?state=updatesuccess");

	} else {

		Header("Location:../genel-ayar.php?state=updateunsuccesful");
	}

}


//login islemi 
/**
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
 	
    $_SESSION["kullanici_mail"] = $kullanici_mail; 

  
 	header("Location:../indexAdmin.php"); 
 	exit; 
      
 	 }else{
 	 	header("Location:../login/login.php?state=loginunsuccessful");
 	    exit;
 	 } 

  }

*/


// projeler resim güncelleme  işlemi

if (isset($_POST['projelerduzenle'])) {

	

	$uploads_dir = '../../dimg/projeler';

	@$tmp_name = $_FILES['proje_resimyol']["tmp_name"];
	@$name = $_FILES['proje_resimyol']["name"];

	
	$benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

   $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

    
@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      

	$duzenle=$baglan->prepare("UPDATE projeler SET

		proje_resimyol=:proje

		WHERE proje_id={$_POST['proje_id']}");

	$update=$duzenle->execute(array(
		'proje' => $refimgyol
		));

     echo $update;

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../projeler.php?state=updatesuccess");

	} else {

		Header("Location:../projeler.php?state=updateunsuccesful");
	}

}

//projeler kaydetme işlemi

if (isset($_POST["projelerekle"])) {
	
	$uploads_dir = '../../dimg/projeler';
    @$tmp_name = $_FILES['proje_resimyol']["tmp_name"];
    @$name = $_FILES['proje_resimyol']["name"];
    
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir,6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name,"$uploads_dir/$benzersizad$name");


    $kaydet = $baglan->prepare("INSERT INTO projeler SET
   
        proje_adi=:proje_adi,
		proje_icerik=:proje_icerik,
		proje_sahibi=:proje_sahibi,
		proje_resimyol=:proje_resimyol,
		proje_durum=:proje_durum
      
    	");

    $insert = $kaydet->execute(array(

          'proje_adi' => $_POST["proje_adi"],
          'proje_icerik' => $_POST["proje_icerik"],
          'proje_sahibi' => $_POST["proje_sahibi"],
          'proje_resimyol' => $refimgyol, 
          'proje_durum' => $_POST["proje_durum"]

    )); 


    if ($insert) {
    	
    	header("Location:../projeler.php?state=success");
    }else{
    	header("Location:../projeler.php?state=unsuccessful");
    }

}

//projeler düzenleme işlemi //

if (isset($_POST["projelerguncelle"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE projeler SET

		proje_adi=:proje_adi,
		proje_icerik=:proje_icerik,
		proje_sahibi=:proje_sahibi,
		proje_durum=:proje_durum


		WHERE proje_id={$_POST['proje_id']}");


	$update = $ayarkaydet->execute(array(


		'proje_adi' => $_POST["proje_adi"],
		'proje_icerik' => $_POST["proje_icerik"],
		'proje_sahibi' => $_POST["proje_sahibi"],
		'proje_durum' => $_POST["proje_durum"]

	));


	if ($update == 1) {

		header("Location:../projeler.php?state=updatesuccess");
	}else{

		header("Location:../projeler.php?state=updateunsuccessful");
	}

}

//projeler silme işlemi

 if ($_GET["projelersil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from projeler where proje_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../projeler.php?remove=success");
		}else{

			header("Location:../projeler.php?remove=unsuccessful");
		}

 }




//genel ayar güncelleme işlemi //

if (isset($_POST["genelayarkaydet"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ayar SET

		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author

		WHERE ayar_id = 1");


	$update = $ayarkaydet->execute(array(


		'ayar_title' => $_POST["ayar_title"],
		'ayar_description' => $_POST["ayar_description"],
		'ayar_keywords' => $_POST["ayar_keywords"],
		'ayar_author' => $_POST["ayar_author"]

	));


	if ($update == 1) {

		header("Location:../genel-ayar.php?state=updatesuccess");
	}else{

		header("Location:../genel-ayar.php?state=updateunsuccessful");
	}

}


// mail ayar güncelleme işlemei // 

if (isset($_POST["mailayarkaydet"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ayar SET

		ayar_smtphost=:ayar_smtphost,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport

		WHERE ayar_id = 1");


	$update = $ayarkaydet->execute(array(


		'ayar_smtphost' => $_POST["ayar_smtphost"],
		'ayar_smtppassword' => $_POST["ayar_smtppassword"],
		'ayar_smtpport' => $_POST["ayar_smtpport"]
		

	));


	if ($update == 1) {

		header("Location:../mail-ayar.php?state=updatesuccess");
	}else{

		header("Location:../mail-ayar.php?state=updateunsuccessful");
	}

}

	// sosyal ayar güncelleme işlemei // 

if (isset($_POST["sosyalayarkaydet"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ayar SET

		
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube

		WHERE ayar_id = 1");


	$update = $ayarkaydet->execute(array(


		'ayar_facebook' => $_POST["ayar_facebook"],
		'ayar_twitter' => $_POST["ayar_twitter"],
		'ayar_google' => $_POST["ayar_google"],
		'ayar_youtube' => $_POST["ayar_youtube"]
		

	));


	if ($update == 1) {

		header("Location:../sosyal-ayar.php?state=updatesuccess");
	}else{

		header("Location:../sosyal-ayar.php?state=updateunsuccessful");
	}

}

// api ayar ayar güncelleme işlemei // 

if (isset($_POST["apiayarkaydet"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ayar SET

		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
	

		WHERE ayar_id = 1");


	$update = $ayarkaydet->execute(array(


		'ayar_analystic' => $_POST["ayar_analystic"],
		'ayar_maps' => $_POST["ayar_maps"],
		'ayar_zopim' => $_POST["ayar_zopim"],
		
		

	));


	if ($update == 1) {

		header("Location:../api-ayar.php?state=updatesuccess");
	}else{

		header("Location:../api-ayar.php?state=updateunsuccessful");
	}

}

// iletisim ayar güncelleme işlemei // 

if (isset($_POST["iletisimayarkaydet"])) {
	
	$ayarkaydet = $baglan->prepare("UPDATE ayar SET

		
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_il=:ayar_il,
		ayar_ilce=:ayar_ilce,
		ayar_faks=:ayar_faks,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
	

		WHERE ayar_id = 1");


	$update = $ayarkaydet->execute(array(


		'ayar_tel' => $_POST["ayar_tel"],
		'ayar_gsm' => $_POST["ayar_gsm"],
		'ayar_faks' => $_POST["ayar_faks"],
		'ayar_il' => $_POST["ayar_il"],
		'ayar_ilce' => $_POST["ayar_ilce"],
		'ayar_adres' => $_POST["ayar_adres"],
		'ayar_mesai' => $_POST["ayar_mesai"]

		
		

	));


	if ($update == 1) {

		header("Location:../iletisim-ayar.php?state=updatesuccess");
	}else{

		header("Location:../iletisim-ayar.php?state=updateunsuccessful");
	}

}

//hakkımızda güncelleme işlemi //

if (isset($_POST["hakkimizdaayarkaydet"])) {
	
	$hakkimizdakaydet = $baglan->prepare("UPDATE hakkimizda SET

		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_misyon=:hakkimizda_misyon,
		hakkimizda_vizyon=:hakkimizda_vizyon

		WHERE hakkimizda_id = 1");


	$update = $hakkimizdakaydet->execute(array(


		'hakkimizda_baslik' => $_POST["hakkimizda_baslik"],
		'hakkimizda_icerik' => $_POST["hakkimizda_icerik"],
		'hakkimizda_video' => $_POST["hakkimizda_video"],
		'hakkimizda_misyon' => $_POST["hakkimizda_misyon"],
		'hakkimizda_vizyon' => $_POST["hakkimizda_vizyon"]

	));


	if ($update == 1) {

		header("Location:../hakkimizda.php?state=updatesuccess");
	}else{

		header("Location:../hakkimizda.php?state=updateunsuccessful");
	}

}

//kullanici düzenleme işlemi //

if (isset($_POST["kullaniciduzenle"])) {

	$kullanici_id =  $_POST["kullanici_id"];

	$kullaniciduzenlekaydet = $baglan->prepare("UPDATE kullanici SET

		
		kullanici_resim=:kullanici_resim,
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_mail=:kullanici_mail,
		kullanici_gsm=:kullanici_gsm,
		kullanici_adres=:kullanici_adres,
		kullanici_yetki=:kullanici_yetki,
		kullanici_durum=:kullanici_durum


		WHERE kullanici_id={$_POST['kullanici_id']}");


	$update = $kullaniciduzenlekaydet->execute(array(
          
        
		'kullanici_resim'   => $_POST["kullanici_resim"],
		'kullanici_tc'      => $_POST["kullanici_tc"],
		'kullanici_adsoyad' => $_POST["kullanici_adsoyad"],
		'kullanici_mail'    => $_POST["kullanici_mail"],
		'kullanici_gsm'     => $_POST["kullanici_gsm"],
		'kullanici_adres'   => $_POST["kullanici_adres"],
		'kullanici_yetki'   => $_POST["kullanici_yetki"],
		'kullanici_durum'   => $_POST["kullanici_durum"]


	));

if ($update == 1) {

		header("Location:../kullanici-duzenle.php?id=$kullanici_id&state=updatesuccess");
	}else{

		header("Location:../kullanici-duzenle.php?id=$kullanici_id&state=updateunsuccessful");
	}
 
 }

 //kullanıcı silme işlemi

 if ($_GET["kullanicisil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from kullanici where kullanici_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../kullanici.php?remove=success");
		}else{

			header("Location:../kullanici.php?remove=unsuccessful");
		}

 }

 //menü güncelleme işlemi 
    

    if (isset($_POST["menuduzenle"])) {

    	$menu_id = $_POST["menu_id"];
    	$menu_seourl = seo($_POST["menu_ad"]);
	
	$menukaydet = $baglan->prepare("UPDATE menu SET

		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum

		WHERE menu_id={$_POST["menu_id"]}");


	$update = $menukaydet->execute(array(
    

		'menu_ad' => $_POST["menu_ad"],
		'menu_detay' => $_POST["menu_detay"],
		'menu_url' => $_POST["menu_url"],
		'menu_sira' => $_POST["menu_sira"],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST["menu_durum"]

	));


	if ($update == 1) {

		header("Location:../menu-duzenle.php?id=$menu_id&state=updatesuccess");
	}else{

		header("Location:../menu-duzenle.php?id=$menu_id&state=updateunsuccessful");
	}

}

//menü silme işlemi

 if ($_GET["menusil"]=="success") {
 
    
    $sil = $baglan->prepare("DELETE from menu where menu_id=:id");
		$kontrol = $sil->execute(array(
 

         'id' => $_GET["id"]

		));

		if ($kontrol) {
		
		    header("Location:../menu.php?remove=success");
		}else{

			header("Location:../menu.php?remove=unsuccessful");
		}

 }

 // menü ekleme işlemleri

  if (isset($_POST["menuekle"])) {
          

        $menu_id = $_POST["menu_id"];
    	$menu_seourl = seo($_POST["menu_ad"]);


    	$menuekle = $baglan->prepare("INSERT INTO menu SET

		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum

		");

$insert = $menuekle->execute(array(
    

		'menu_ad' => $_POST["menu_ad"],
		'menu_detay' => $_POST["menu_detay"],
		'menu_url' => $_POST["menu_url"],
		'menu_sira' => $_POST["menu_sira"],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST["menu_durum"]

	));

	if ($insert) {

		header("Location:../menu.php?state=addsuccess");
	}else{

		header("Location:../menu.php?state=addunsuccessful");
	}



    
           
}

?>



	

<!--





    
	
	


	






 -->