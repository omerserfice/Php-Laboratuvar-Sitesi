<?php include 'header.php';

$projelersor = $baglan->prepare("SELECT * FROM projeler");
$projelersor->execute();



 ?>

    <hr>
     <!-- projeler -->
     <div class="mt-2 text-center"><h1 style="font-weight: bold;">PROJELERİMiZ</h1></div>
     <hr>
   
      <section id="projeler">
      	<div class="row mt-2">
          <?php  while ($projelercek = $projelersor->fetch(PDO::FETCH_ASSOC)) { ?>
      		<div class="col-md-3 col-sm-6 text-center mx-auto">
            <div class="inBorder">
                <a href="proje-detay.php?id=<?php echo $projelercek["proje_id"] ?>"><img src="<?php echo $projelercek["proje_resimyol"] ?>" class="img-fluid"></a>
            </div>
            <div class="content mx-auto">
              <h6><?php echo $projelercek["proje_adi"] ?></h6>

              <p><?php echo substr($projelercek["proje_icerik"], 0,20); ?>...<a href="proje-detay.php?id=<?php echo $projelercek["proje_id"] ?>">Devamını Gör</a></p>
            </div>
      		</div>
      		<?php } ?>
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