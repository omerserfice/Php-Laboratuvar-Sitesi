<?php include 'header.php';
$derslersor = $baglan->prepare("SELECT * FROM dersler");
$derslersor->execute();

 ?>

    <hr>
     <!-- dersler -->
     <div class="mt-2 text-center"><h1 style="font-weight: bold;">DERSLER</h1></div>
     <hr>
   
        <section id="dersler">
        <div class="row mt-2">
<?php
          $derslersor = $baglan->prepare("SELECT * FROM dersler where ders_durum=:durum");;
              $derslersor->execute(array(

                                  'durum' => 1
              ));

              ?>

           <?php  while ($derslercek = $derslersor->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="col-md-3 col-sm-6 text-center mx-auto wow fadeInLeft">
            <div class="inBorder">
                <a href="ders-detay.php?id=<?php echo $derslercek["ders_id"]; ?>"><img src="<?php echo $derslercek["ders_resimyol"]; ?>" class="img-fluid"></a>
            </div>
            <div class="content mx-auto wow fadeInUp">
              <h6 class="text-success"><?php echo $derslercek["ders_adi"]; ?></h6>
             
              <p><a style="color: green;" href="ders-detay.php?id=<?php echo $derslercek["ders_id"]; ?>"><i><u>İçeriği Gör</u></i></a></p>
            </div>
          </div>
        <?php } ?>
         
         
    
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