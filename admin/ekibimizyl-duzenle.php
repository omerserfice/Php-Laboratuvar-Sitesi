   <?php include 'header.php';

   include 'fonksiyon.php';

  error_reporting(0);

$ekibimizylsor = $baglan->prepare("SELECT * FROM ekibimiz_ylisans WHERE ekipyl_id=:id");
 $ekibimizylsor->execute(array(

    'id' => $_GET["id"]

 ));

  $ekibimizylcek = $ekibimizylsor->fetch(PDO::FETCH_ASSOC);







    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Ekip Bilgileri Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Ekip Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <input type="hidden" name="ekipyl_id" value="<?php echo $ekibimizylcek["ekipyl_id"]; ?>">
                            
                            <label>Ekip Adı</label>
                            <input type="text" name="ekipyl_adsoyad" value="<?php echo $ekibimizylcek["ekipyl_adsoyad"]; ?>" class="form-control" />
                            <label>Ekip Resim Yolu</label>
                            <input type="text" name="ekipyl_resimyol" value="<?php echo $ekibimizylcek["ekipyl_resimyol"]; ?>" class="form-control" />
                          <br>
                            <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kişinin Mevcut Resmi <span class="required">*</span>
                  </label>
                  <br><br><br><br>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($ekibimizylcek['ekipyl_resimyol'])>0) {?>

                    <img width="200"  src="../<?php echo $ekibimizylcek['ekipyl_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../dimg/logo-yok.jpg">


                    <?php } ?>

                    
                  </div>
                </div>
                <br><br><br><br><br><br><br><br><br><hr>
                 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="ekipyl_resimyol"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $ekibimizylcek['ekipyl_resimyol']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"><br>
                  <button type="submit" name="ekibimizylduzenle" class="btn btn-primary">Seçilen Resmi Güncelle</button>
                </div>
               
              </form>
                 <br><br><br><br><hr>
                            
                       
                           
                            <label>Ad Soyadı</label>
                            <input type="text" name="ekipyl_adsoyad" value="<?php echo $ekibimizylcek["ekipyl_adsoyad"]; ?>" class="form-control" />

                            <label>Unvan</label>
                            <input type="text" name="ekipyl_unvan" value="<?php echo $ekibimizylcek["ekipyl_unvan"]; ?>" class="form-control" />

                            <label>Twitter Adresi</label>
                            <input type="text" name="ekipyl_twitter" value="<?php echo $ekibimizylcek["ekipyl_twitter"]; ?>" class="form-control" />

                            <label>Facebook Adresi</label>
                            <input type="text" name="ekipyl_facebook" value="<?php echo $ekibimizylcek["ekipyl_facebook"]; ?>" class="form-control" />

                            <label>Linkedin Adresi</label>
                            <input type="text" name="ekipyl_linkedin" value="<?php echo $ekibimizylcek["ekipyl_linkedin"]; ?>" class="form-control" />
                            
                            
                            <label>Ekip Durum</label>
                            <select id="heard" class="form-control" name="ekipyl_durum" required>
                              <?php if ($ekibimizylcek["ekipyl_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="ekibimizylguncelle" class="btn btn-primary">Güncelle</button>
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