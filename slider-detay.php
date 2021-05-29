<?php include 'header.php';

$slidersor = $baglan->prepare("SELECT * FROM slider WHERE slider_id=:id");
 $slidersor->execute(array(

    'id' => $_GET["id"]

 ));

  $slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);

    

 ?>

    <hr>
     <!-- DERS DETAY -->
   
      <section id="dersDetay">
      	<div class="row mt-2">
      		<div class="col-md-12 text-center">
      			<img width="300" src="<?php echo $slidercek["slider_resimyol"]; ?>" class="img-fluid bigImg"><br>
              <h3><?php echo $slidercek["slider_baslik"]; ?></h3>
              <p class="mt-4"><?php echo $slidercek["slider_aciklama"]; ?></p>
      		</div>
      	
      	</div>
      </section>
    
     
     <!-- İÇERİK SON-->

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