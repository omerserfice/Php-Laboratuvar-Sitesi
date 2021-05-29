   <?php include 'header.php';
      error_reporting(0);

  $kullanicisor = $baglan->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
 $kullanicisor->execute(array(

    'id' => $_GET["id"]

 ));

  $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Kullanıcı Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Kullanıcı Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
                   <small style="color: green;">Güncelleme Başarılı</small>  
               <?php  } elseif ($_GET["state"]=="updateunsuccessful") { ?>
                <small style="color: red;">Güncelleme Başarılı</small>  
            <?php  } ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" method="post">

                      <?php 

                       $zaman = explode(" ",$kullanicicek['kullanici_zaman']);
                       ?>
                        <div class="form-group">
                            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek["kullanici_id"]; ?>" class="form-control" />
                          <label>Kayıt Tarihi</label>
                            <input type="date" name="kullanici_zaman" disabled="" value="<?php echo $zaman[0]; ?>" class="form-control" />
                             <label>Kayıt Saati</label>
                            <input type="time" name="kullanici_zaman" disabled="" value="<?php echo $zaman[1]; ?>" class="form-control" />
                            <label>Resim Url</label>
                            <input type="text" name="kullanici_resim" value="<?php echo $kullanicicek["kullanici_resim"]; ?>" class="form-control" />
                            <label>TC Kimlik Numarası</label>
                            <input type="text" name="kullanici_tc" value="<?php echo $kullanicicek["kullanici_tc"]; ?>" class="form-control" />
                            <label>Ad Soyad</label>
                            <input type="text" name="kullanici_adsoyad" value="<?php echo $kullanicicek["kullanici_adsoyad"]; ?>" class="form-control" />
                            <label>E-Mail Adresi</label>
                            <input type="text" name="kullanici_mail" value="<?php echo $kullanicicek["kullanici_mail"]; ?>" class="form-control" />
                            <label>Telefon(GSM)</label>
                            <input type="text" name="kullanici_gsm" value="<?php echo $kullanicicek["kullanici_gsm"]; ?>" class="form-control" />
                            <label>Adres</label>
                            <textarea name="kullanici_adres" rows="5" cols="5" class="form-control"><?php echo $kullanicicek["kullanici_adres"]; ?></textarea>
                            <label>Yetki Kodu</label>
                            <input type="text" name="kullanici_yetki" value="<?php echo $kullanicicek["kullanici_yetki"]; ?>" class="form-control" />
                            <label>Kullanıcı Durum</label>
                            <select id="heard" class="form-control" name="kullanici_durum" required>
                              <?php if ($kullanicicek["kullanici_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="kullaniciduzenle" class="btn btn-primary">Güncelle</button>
                        </div>

                    </form>

                    <form>

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