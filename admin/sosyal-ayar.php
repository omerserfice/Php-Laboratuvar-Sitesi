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
                Sosyal Medya Ayarları <?php if ($_GET["state"]=="updatesuccess") { ?>
                   <small style="color: green;">Güncelleme Başarılı</small>  
               <?php  } elseif ($_GET["state"]=="updateunsuccessful") { ?>
                <small style="color: red;">Güncelleme Başarısız</small>  
            <?php  } ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" method="post">
                        <div class="form-group">
                            <label>Facebook Adresi</label>
                            <input type="text" name="ayar_facebook" value="<?php echo $ayarcek["ayar_facebook"]; ?>" class="form-control" />
                            <label>Twitter Adresi</label>
                            <input type="text" name="ayar_twitter" value="<?php echo $ayarcek["ayar_twitter"]; ?>" class="form-control" />
                            <label>YouTube Adresi</label>
                            <input type="text" name="ayar_youtube" value="<?php echo $ayarcek["ayar_youtube"]; ?>" class="form-control" />
                            <label>Google Bilgisi</label>
                            <input type="text" name="ayar_google" value="<?php echo $ayarcek["ayar_google"]; ?>" class="form-control" /><br>
                            <button type="submit" name="sosyalayarkaydet" class="btn btn-primary">Güncelle</button>
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