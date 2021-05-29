<?php include 'header.php';
   error_reporting(0);

    $yayinlarsor = $baglan->prepare("SELECT DISTINCT yayin_hocasi FROM yayinlar");
    $yayinlarsor->execute();  

    $yazimsor = $baglan->prepare("SELECT DISTINCT yayin_tarihi FROM yayinlar ORDER BY yayin_tarihi DESC");
    $yazimsor->execute();

 ?>
<style type="text/css">
  .accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
    <hr>
     <!-- yayınlar -->
     <div class="mt-2 text-center"><h1 style="font-weight: bold;">YAYINLARIMIZ</h1></div>
     <hr>
    <p class="text-center">Bu bölümde Prof.Dr Yaşar Becerkli Arş.Gör Fulya Akdeniz ve Arş.Gör Burcu Kır Savaş hocalarımızın yayınları yeralmaktadır.</p>
      <section id="yayinlar">
  <form method="post">
  <div style="margin-left: 25%;" class="form-row">
    <div class="col-auto my-2 ml-4 text-center">
      <select name="yazaradi" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Yazar</option>
      <?php  while($yayinlarcek = $yayinlarsor->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php echo $yayinlarcek["yayin_hocasi"] ?>"><?php echo $yayinlarcek["yayin_hocasi"] ?></option>
        <?php } ?>
      </select>
    </div>
      <div class="col-auto my-2 ml-4 text-center">
      <select name="yazimyili" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option selected>Yazım Yılı</option>
        <option value="tumu">Tümü</option>
      <?php  while($yazimcek = $yazimsor->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value="<?php echo $yazimcek["yayin_tarihi"] ?>"><?php echo $yazimcek["yayin_tarihi"] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-auto my-2 ml-4">
     <input type="submit" class="btn btn-info" name="goster" value="Göster">
    </div>
  </div>
</form>
       
      </section>

  


    <?php if (isset($_POST["goster"])) { 
                  
                 
         // $yazimyili = $_POST["yazimyili"];
          $yazaradi  = trim($_POST["yazaradi"]);
          $yazimyili = trim($_POST["yazimyili"]);

       
            
   $yayinlarsor = $baglan->prepare("SELECT * FROM yayinlar WHERE yayin_hocasi=:yazaradi and yayin_tarihi=:yayintarihi");
   $yayinlarsor->execute(array(

          'yazaradi' => $yazaradi,
          'yayintarihi' => $yazimyili
          

   ));

   

  
  
           if ($yazaradi && $yazimyili && $yazaradi != "Yazar") {  

              ?>

                 <h4><?php echo $yazaradi; ?> Yazıları</h4>
<?php while($yayinlarcek = $yayinlarsor->fetch(PDO::FETCH_ASSOC)) { ?>
<button class="accordion"><?php echo $yayinlarcek["yayin_tarihi"] ?></button>
<div class="panel">
  <h6 class="mt-2"><?php echo $yayinlarcek["yayin_adi"] ?></h6>
  <hr>
  <p class="mt-2"><?php echo $yayinlarcek["yayin_detay"] ?></p>
</div>

 
<?php } 
           
           if($yazimyili == "tumu" && $yazaradi) { 

            $yayinlarsor2 = $baglan->prepare("SELECT * FROM yayinlar WHERE yayin_hocasi=:yazaradi ORDER BY yayin_tarihi DESC");
            $yayinlarsor2->execute(array(

                 'yazaradi' => $yazaradi
            )); ?>

            
            <?php while($yayinlarcek2 = $yayinlarsor2->fetch(PDO::FETCH_ASSOC)) { ?>
            
<button class="accordion"><?php echo $yayinlarcek2["yayin_tarihi"] ?></button>
<div class="panel">
  <h6 class="mt-2"><?php echo $yayinlarcek2["yayin_adi"] ?></h6>
  <hr>
  <p class="mt-2"><?php echo $yayinlarcek2["yayin_detay"] ?></p>
</div>
                  

             <?php } ?>


            
          <?php } }

    
    } ?> 
     
     <!-- İÇERİK SON-->

	</div><!-- ÇERCEVE SONU-->

 <!-- footer -->

<script>
  var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

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