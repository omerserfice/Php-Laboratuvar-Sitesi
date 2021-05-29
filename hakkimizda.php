<?php include 'header.php';

$hakkimizdasor = $baglan->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
   $hakkimizdasor->execute(array(

    'id' => 1

  ));

   $hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);



 ?>
    <hr>
     <!-- hakkımızda -->
   
      <section id="hakkimizda">
      	<div class="row mt-2">
      		<div class="col-md-5">
      			<img src="img/hakkimizda/hakkimizda2.png" class="img-fluid">
      		</div>
      		<div class="col-md-7 p-2 right">
      				<h3><?php echo $hakkimizdacek["hakkimizda_baslik"] ?></h3>
      				<p class="mt-4"><?php echo $hakkimizdacek["hakkimizda_icerik"] ?></p>
              <h4><b>Misyonumuz</b></h4>
              <p><?php echo $hakkimizdacek["hakkimizda_misyon"] ?></p>
              <h4><b>Vizyonumuz</b></h4>
              <p><?php echo $hakkimizdacek["hakkimizda_vizyon"] ?></p>
             
      		</div>
      	</div>
        <hr>
        <div class="row mt-2">
             <div class="col-md-5">
                 <h4 align="center"><b>Tanıtım</b></h4>
              <?php echo $hakkimizdacek["hakkimizda_video"] ?>
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