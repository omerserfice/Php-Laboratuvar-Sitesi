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
                İletişim Ayarları <?php if ($_GET["state"]=="updatesuccess") { ?>
                   <small style="color: green;">Güncelleme Başarılı</small>  
               <?php  } elseif ($_GET["state"]=="updateunsuccessful") { ?>
                <small style="color: red;">Güncelleme Başarılı</small>  
            <?php  } ?>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" method="post">
                        <div class="form-group">
                            <label>Telefon Numarası</label>
                            <input type="text" name="ayar_tel" value="<?php echo $ayarcek["ayar_tel"]; ?>" class="form-control" />
                            <label>Telefon Numarası(GSM)</label>
                            <input type="text" name="ayar_gsm" value="<?php echo $ayarcek["ayar_gsm"]; ?>" class="form-control" />
                            <label>Faks Numarası</label>
                            <input type="text" name="ayar_faks" value="<?php echo $ayarcek["ayar_faks"]; ?>" class="form-control" />
                            <label>İl</label>
                            <input type="text" name="ayar_il" value="<?php echo $ayarcek["ayar_il"]; ?>" class="form-control" />
                            <label>İlçe</label>
                            <input type="text" name="ayar_ilce" value="<?php echo $ayarcek["ayar_ilce"]; ?>" class="form-control" />
                            <label>Adres Bilgisi</label>
                            <input type="text" name="ayar_adres" value="<?php echo $ayarcek["ayar_adres"]; ?>" class="form-control" />
                            <label>Mesai Bilgisi</label>
                            <input type="text" name="ayar_mesai" value="<?php echo $ayarcek["ayar_mesai"]; ?>" class="form-control" /><br>
                            <button type="submit" name="iletisimayarkaydet" class="btn btn-primary">Güncelle</button>
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