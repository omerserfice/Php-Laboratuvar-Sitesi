   <?php include 'header.php';

   @include 'fonksiyon.php';

  error_reporting(0);

$derslersor = $baglan->prepare("SELECT * FROM dersler WHERE ders_id=:id");
 $derslersor->execute(array(

    'id' => $_GET["id"]

 ));

  $derslercek = $derslersor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Ders Bilgileri Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Ders Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <input type="hidden" name="ders_id" value="<?php echo $derslercek["ders_id"]; ?>">
                            
                            <label>Dersin Adı</label>
                            <input type="text" name="ders_adi" value="<?php echo $derslercek["ders_adi"]; ?>" class="form-control" />
                            <label>Ders Resim Yolu</label>
                            <input type="text" name="ders_resimyol" value="<?php echo $derslercek["ders_resimyol"]; ?>" class="form-control" />
                          <br>
                            <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Ders Resmi<br><span class="required">*</span>
                  </label>
                  <br><br><br><br>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($derslercek['ders_resimyol'])>0) {?>

                    <img width="200"  src="../<?php echo $derslercek['ders_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../dimg/logo-yok.jpg">


                    <?php } ?>

                    
                  </div>
                </div>
                <br><br><br><br><br><br><br><br><br><hr>
                 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ders için resim seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="ders_resimyol"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $derslercek['ders_resimyol']; ?>">
                <input type="hidden" name="dokumaneski_yol" value="<?php echo $derslercek['ders_dokumanyol']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"><br>
                  <button type="submit" name="derslerduzenle" class="btn btn-primary">Ders Resmi Güncelle</button>
                </div>
                 <br><br><br><br><br>
                <hr>
                
                            <label>Ders Dökümanları Ekle</label>
                            <input type="file" name="dosya[]" multiple class="form-control"/><br>
                            <button class="btn btn-warning" name="dokumanekle" type="submit">Yükle</button><br><br>
               
              </form>
                <br><hr>
                            
                       
                            <label>Dersin İçeriği</label>
                             <textarea class="ckeditor" id="editor1" name="ders_detay"><?php echo $derslercek["ders_detay"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>

                            <label>Dersin Hocası</label>
                            <input type="text" name="ders_hoca" value="<?php echo $derslercek["ders_hoca"]; ?>" class="form-control" />
                            <label>Dersin Durum</label>
                            <select id="heard" class="form-control" name="ders_durum" required>
                              <?php if ($derslercek["ders_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="derslerguncelle" class="btn btn-primary">Güncelle</button>
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