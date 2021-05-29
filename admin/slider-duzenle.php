   <?php include 'header.php';

  @include 'fonksiyon.php';

  error_reporting(0);

$slidersor = $baglan->prepare("SELECT * FROM slider WHERE slider_id=:id");
 $slidersor->execute(array(

    'id' => $_GET["id"]

 ));

  $slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Slider Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Slider Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
                   <small style="color: green;">Güncelleme Başarılı</small>  
               <?php  } elseif ($_GET["state"]=="updateunsuccessful") { ?>
                <small style="color: red;">Güncelleme Başarılı</small>  
            <?php  } ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    
                
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="slider_id" value="<?php echo $slidercek["slider_id"]; ?>">
                            
                            <label>Slider Ad</label>
                            <input type="text" name="slider_ad" value="<?php echo $slidercek["slider_ad"]; ?>" class="form-control" />
                            <label>Slider Resim Yolu</label>
                            <input type="text" name="slider_resimyol" value="<?php echo $slidercek["slider_resimyol"]; ?>" class="form-control" />
                          <br>
                            <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Slider<br><span class="required">*</span>
                  </label>
                  <br><br><br>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($slidercek['slider_resimyol'])>0) {?>

                    <img width="200"  src="../<?php echo $slidercek['slider_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../dimg/logo-yok.jpg">


                    <?php } ?>

                    
                  </div>
                </div>
                <br><br><br><br><br><hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Resmi Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"><br>
                  <button type="submit" name="sliderduzenle" class="btn btn-primary">Logo Güncelle</button>
                </div>
               
              </form>
                 <br><br><br><br><hr>
                            
                          <label>Slider Sıra</label>
                            <input type="text" name="slider_sira" value="<?php echo $slidercek["slider_sira"]; ?>" class="form-control" />
                              <label>Slider Link</label>
                            <input type="text" name="slider_link" value="<?php echo $slidercek["slider_link"]; ?>" class="form-control" />
                            <label>Slider Başlık</label>
                            <input type="text" name="slider_baslik" value="<?php echo $slidercek["slider_baslik"]; ?>" class="form-control" />
                             <label>Slider İçeriği</label>
                             <textarea class="ckeditor" id="editor1" name="slider_aciklama"><?php echo $slidercek["slider_aciklama"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>

                            <label>Slider Durum</label>
                            <select id="heard" class="form-control" name="slider_durum" required>
                              <?php if ($slidercek["slider_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="sliderguncelle" class="btn btn-primary">Güncelle</button>
                        </div>

                    </form>

                   


                </div>



                <br />

            </form>
        </div>
    </div>
</div>
</div>

</div>
</div>

</div>

</div>

</div>