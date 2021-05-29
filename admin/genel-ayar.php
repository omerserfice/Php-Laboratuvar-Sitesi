   <?php include 'header.php';
      error_reporting(0);
    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Site Ayarları</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Genel Ayarlar <?php if ($_GET["state"]=="updatesuccess") { ?>
                   <small style="color: green;">Güncelleme Başarılı</small>  
               <?php  } elseif ($_GET["state"]=="updateunsuccessful") { ?>
                <small style="color: red;">Güncelleme Başarılı</small>  
            <?php  } ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                  <form action="../admin/netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($ayarcek['ayar_logo'])>0) {?>

                    <img width="200"  src="../<?php echo $ayarcek['ayar_logo']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../dimg/logo-yok.jpg">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="logoduzenle" class="btn btn-primary">Logo Güncelle</button>
                </div>

              </form>
               <br>
              <hr>


                    <form action="../admin/netting/islem.php" method="post">
                        <div class="form-group">
                            <label>Site Başlığı</label>
                            <input type="text" name="ayar_title" value="<?php echo $ayarcek["ayar_title"]; ?>" class="form-control" />
                            <label>Site Açıklaması</label>
                            <input type="text" name="ayar_description" value="<?php echo $ayarcek["ayar_description"]; ?>" class="form-control" />
                            <label>Site Anahtar Kelimeleri </label>
                            <input type="text" name="ayar_keywords" value="<?php echo $ayarcek["ayar_keywords"]; ?>" class="form-control" />
                            <label>Site Yazar</label>
                            <input type="text" name="ayar_author" value="<?php echo $ayarcek["ayar_author"]; ?>" class="form-control" /><br>
                            <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncelle</button>
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