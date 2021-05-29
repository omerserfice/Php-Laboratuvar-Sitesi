   <?php include 'header.php';

   include 'fonksiyon.php';

  error_reporting(0);

$projelersor = $baglan->prepare("SELECT * FROM projeler WHERE proje_id=:id");
 $projelersor->execute(array(

    'id' => $_GET["id"]

 ));

  $projelercek = $projelersor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Proje Bilgileri Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Proje Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <input type="hidden" name="proje_id" value="<?php echo $projelercek["proje_id"]; ?>">
                            
                            <label>Projein Adı</label>
                            <input type="text" name="proje_adi" value="<?php echo $projelercek["proje_adi"]; ?>" class="form-control" />
                            <label>Proje Resim Yolu</label>
                            <input type="text" name="proje_resimyol" value="<?php echo $projelercek["proje_resimyol"]; ?>" class="form-control" />
                          <br>
                            <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Proje Resmi<br><span class="required">*</span>
                  </label>
                  <br><br><br><br>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($projelercek['proje_resimyol'])>0) {?>

                    <img width="200"  src="../<?php echo $projelercek['proje_resimyol']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../dimg/logo-yok.jpg">


                    <?php } ?>

                    
                  </div>
                </div>
                <br><br><br><br><br><br><br><br><br><hr>
                 
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proje için resim seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="proje_resimyol"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $projelercek['proje_resimyol']; ?>">
                <input type="hidden" name="dokumaneski_yol" value="<?php echo $projelercek['proje_dokumanyol']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"><br>
                  <button type="submit" name="projelerduzenle" class="btn btn-primary">Proje Resmi Güncelle</button>
                </div>
                 <br><br><br><br><br>
                <hr>
                
                            <label>proje Dökümanları Ekle</label>
                            <input type="file" name="dosya[]" multiple class="form-control"/><br>
                            <button class="btn btn-warning" name="dokumanekle" type="submit">Yükle</button><br><br>
               
              </form>
                <br><hr>
                            
                       
                            <label>Projein İçeriği</label>
                             <textarea class="ckeditor" id="editor1" name="proje_icerik"><?php echo $projelercek["proje_icerik"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>

                            <label>Projein Hocası</label>
                            <input type="text" name="proje_sahibi" value="<?php echo $projelercek["proje_sahibi"]; ?>" class="form-control" />
                            <label>Projein Durum</label>
                            <select id="heard" class="form-control" name="proje_durum" required>
                              <?php if ($projelercek["proje_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="projelerguncelle" class="btn btn-primary">Güncelle</button>
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