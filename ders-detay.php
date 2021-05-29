<?php include 'header.php';

$derslersor = $baglan->prepare("SELECT * FROM dersler WHERE ders_id=:id");
 $derslersor->execute(array(

    'id' => $_GET["id"]

 ));

  $derslercek = $derslersor->fetch(PDO::FETCH_ASSOC);

    

 ?>

    <hr>
     <!-- DERS DETAY -->
   
      <section id="dersDetay">
      	<div class="row mt-2">
      		<div class="col-md-12 text-center">
      			<img width="300" src="<?php echo $derslercek["ders_resimyol"]; ?>" class="img-fluid bigImg"><br>
              <h3><?php echo $derslercek["ders_adi"]; ?></h3>
              <p class="mt-4"><?php echo $derslercek["ders_detay"]; ?></p>
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