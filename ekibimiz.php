<?php include 'header.php';


$ekibimizsor = $baglan->prepare("SELECT * FROM ekibimiz where ekip_durum=:durum");
$ekibimizsor->execute(array(

       'durum' => 1
));

$ekibimizdsor = $baglan->prepare("SELECT * FROM ekibimiz_doktora where ekipd_durum=:durum");
$ekibimizdsor->execute(array(

       'durum' => 1

));

$ekibimizylsor = $baglan->prepare("SELECT * FROM ekibimiz_ylisans where ekipyl_durum=:durum");
$ekibimizylsor->execute(array(

        'durum' => 1
));

$ekibimizlsor = $baglan->prepare("SELECT * FROM ekibimiz_lisans where ekipl_durum=:durum");
$ekibimizlsor->execute(array(

        'durum' => 1


));


 ?>
     <hr>
     <!-- ekibimiz -->
     <div class="mt-2 text-center"><h1 style="font-weight: bold;">EKİBİMİZ</h1></div>
     <hr>
      
      <section id="ekibimiz">
        <div class="container">
          <div class="ekibimiz-top text-center">
            <h3>LABORATUVAR SORUMLULARI</h3>
            <p class="paragraf">
              
            </p>
          </div>
          <div class="ekibimiz-content">
            <div class="row">
               <?php  while ($ekibimizcek = $ekibimizsor->fetch(PDO::FETCH_ASSOC)) { ?>
              
               <div class="col-md-12 text-center wow fadeInDown">
                <div class="ekibimiz-circle">
                  <img class="ekibimiz-circle" src="<?php echo $ekibimizcek["ekip_resimyol"] ?>">
                </div>
                <h4><?php echo $ekibimizcek["ekip_adsoyad"] ?></h4>
                <h5><?php echo $ekibimizcek["ekip_unvan"] ?></h5>
                <ul class="social-icons">
                  <li class="social-icon"><a href="<?php echo $ekibimizcek["ekip_twitter"] ?>"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizcek["ekip_facebook"] ?>"><i class="fab fa-facebook"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizcek["ekip_linkedin"] ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
              
                 <?php } ?>
            </div>
            <br>
            <hr>
              <div class="mt-4 text-center"><h3>DOKTORA ÖĞRENCİLERİ</h3></div>
              
              <br>
            <div class="row">
               <?php  while ($ekibimizdcek = $ekibimizdsor->fetch(PDO::FETCH_ASSOC)) { ?>
               <div class="col-md-6 text-center wow fadeInLeft">
                <div class="ekibimiz-circle">
                  <img class="ekibimiz-circle" src="<?php echo $ekibimizdcek["ekipd_resimyol"] ?>">
                </div>
                <h4><?php echo $ekibimizdcek["ekipd_adsoyad"] ?></h4>
                <h5><?php echo $ekibimizdcek["ekipd_unvan"] ?></h5>
                <ul class="social-icons">
                  <li class="social-icon"><a href="<?php echo $ekibimizdcek["ekipd_twitter"] ?>"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizdcek["ekipd_facebook"] ?>"><i class="fab fa-facebook"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizdcek["ekipd_linkedin"] ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
          <?php } ?>
              
            </div>
            <br>
            <hr>
              <div class="mt-4 text-center"><h3>YÜKSEK LİSANS ÖĞRENCİLERİ</h3></div>
              <br>
            <div class="row">
               <?php  while ($ekibimizylcek = $ekibimizylsor->fetch(PDO::FETCH_ASSOC)) { ?>
               <div class="col-md-4 text-center wow fadeInRight">
                <div class="ekibimiz-circle">
                  <img class="ekibimiz-circle" src="<?php echo $ekibimizylcek["ekipyl_resimyol"] ?>">
                </div>
                <h4><?php echo $ekibimizylcek["ekipyl_adsoyad"] ?></h4>
                <h5><?php echo $ekibimizylcek["ekipyl_unvan"] ?></h5>
                <ul class="social-icons">
                  <li class="social-icon"><a href="<?php echo $ekibimizylcek["ekipyl_twitter"] ?>"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizylcek["ekipyl_facebook"] ?>"><i class="fab fa-facebook"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizylcek["ekipyl_linkedin"] ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
            <?php } ?>
            </div>
             <br>
            <hr>
              <div class="mt-4 text-center"><h3>LİSANS ÖĞRENCİLERİ</h3></div>
              <br>
            <div class="row">
              <?php  while ($ekibimizlcek = $ekibimizlsor->fetch(PDO::FETCH_ASSOC)) { ?>
               <div class="col-md-4 text-center wow fadeInUp">
                <div class="ekibimiz-circle">
                  <img class="ekibimiz-circle" src="<?php echo $ekibimizlcek["ekipl_resimyol"] ?>">
                </div>
                <h4><?php echo $ekibimizlcek["ekipl_adsoyad"] ?></h4>
                <h5><?php echo $ekibimizlcek["ekipl_unvan"] ?></h5>
                <ul class="social-icons">
                  <li class="social-icon"><a href="<?php echo $ekibimizlcek["ekipl_twitter"] ?>"><i class="fab fa-twitter"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizlcek["ekipl_facebook"] ?>"><i class="fab fa-facebook"></i></a></li>
                  <li class="social-icon"><a href="<?php echo $ekibimizlcek["ekipl_linkedin"] ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
        <?php } ?>
            </div>
          </div>
           <div class="row text-center">
                <p></p>
              </div>
        </div>
      </section>
   
    
     
     <!-- ekibimiz-->

	</div><!-- ÇERCEVE SONU-->

 <?php include 'footer.php'; ?>
  

<script src="script/jquery.js" type="text/JavaScript"></script>
<script src="script/popper.min.js" type="text/JavaScript"></script>
<script src="script/bootstrap.js" type="text/JavaScript"></script>
<script src="script/wow.js"></script>
<script>
  new WOW().init();
</script>


</body>
</html>