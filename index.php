<?php include 'header.php';

$slidersor = $baglan->prepare("SELECT * FROM slider");
$slidersor->execute();





 ?>
 <style>
   
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3s;
  animation-name: fade;
  animation-duration: 3s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

 </style>
    <hr>
    <div class="mt-2 text-center"><h2 style="font-weight: bold;">BİLGİSAYAR MÜHENDİSLİĞİ AR-GE LAB</h2></div>
    <hr>
    <!-- Slideshow container -->
<div class="slideshow-container">
 <?php while($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
<div class="mySlides fade">
  
  <a href="slider-detay.php?id=<?php echo $slidercek["slider_id"] ?>"><img src="<?php echo $slidercek["slider_resimyol"] ?>" style="width:100%"></a>
  <div class="text"><?php echo $slidercek["slider_baslik"] ?>
  <hr>
   <p><?php echo substr($slidercek["slider_aciklama"], 0,80); ?><a href="slider-detay.php?id=<?php echo $slidercek["slider_id"] ?>">r</a></p>
  </div>

</div>
<?php } ?>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
     <!-- İÇERİK -->
   

      <section id="content-index">
      	<div class="row">
      		<div class="col-md-6 mt-4 wow fadeInleft">
      			<div c><img src="img/img-index.jpg" class="img-fluid"></div>
      		</div>
      		<div class="col-md-6">
      			<div class="icerik">
      				<p class="p1 wow fadeInRight">Araştırma Laboratuvarı</p>
      				<h3 class="wow fadeInRight" data-wow-duration="1.5s">BİLGİSAYAR MÜHENDİSLİĞİ</h3>
      				<p class="p2 wow fadeInRight" data-wow-duration="2s">Bilgisayar mühendisliği temel olarak yazılım, programlama ve algoritma ile ilgilenir. Bilgisayar ağları, veri tabanı yöneticiliği ve gömülü sistemler de diğer çalışma alanlarıdır.

Bilgisayar mühendisleri, programlama dilleri, yazılım tasarımı ve yazılım - donanım tümleştirmesi eğitimi alırlar. Yazılımların neyi yapabileceği neyi yapamayacağı (bk. Hesaplanabilirlik), yazılımların belirli bir görev üzerinde nasıl etkili bir verim gösterebilecekleri (bk. algoritma ve karmaşıklık), yazılımların saklanmış bir veriyi nasıl yazıp okuyabilecekleri (bk. veri yapıları ve veri tabanları), yazılımların nasıl daha akıllı çalışabilecekleri (bk. Yapay zekâ), insan ve yazılımların birbirleriyle nasıl bir iletişim içerisinde olacakları (bk. insan bilgisayar etkileşimi ve kullanıcı arayüzleri) konuları üzerinde ve ASIC, FPGA, devre tasarımı ile donanım-yazılım entegrasyonu alanlarında çalışırlar.</p>
      				
      			</div>
      		</div>
      	</div>
      </section>
    
     
     <!-- İÇERİK SON-->

	</div><!-- ÇERCEVE SONU-->

 <?php include 'footer.php'; ?>
<script type="text/javascript">
  var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace("active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides,2700); // Change image every 2 seconds

}
</script> 
<script src="script/jquery.js" type="text/JavaScript"></script>
<script src="script/popper.min.js" type="text/JavaScript"></script>
<script src="script/bootstrap.js" type="text/JavaScript"></script>
<script src="script/wow.js"></script>
<script>
  new WOW().init();
</script>


</body>
</html>