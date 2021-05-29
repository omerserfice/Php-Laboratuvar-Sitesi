<?php include 'header.php';

$projelersor = $baglan->prepare("SELECT * FROM projeler WHERE proje_id=:id");
 $projelersor->execute(array(

    'id' => $_GET["id"]

 ));

  $projelercek = $projelersor->fetch(PDO::FETCH_ASSOC);



 ?>
    <hr>
     <!-- PROJE DETAY -->
   
      <section id="projeDetay">
      	<div class="row mt-2">
      		<div class="col-md text-center">
      			<img width="300" src="<?php echo $projelercek["proje_resimyol"] ?>" class="img-fluid bigImg">
      		</div>
      		<div class="col-md-12 right">
      				<h3><?php echo $projelercek["proje_adi"] ?></h3>
      				<p class="mt-4"><?php echo $projelercek["proje_icerik"] ?></p>
              
      			
      		
      		</div>
      	</div>
      </section>
    
     
     <!-- İÇERİK SON-->

	</div><!-- ÇERCEVE SONU-->

 <!-- footer -->

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