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
                Api Bilgisi Ayarları <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <label>Analystic Api Bilgisi</label>
                            <input type="text" name="ayar_analystic" value="<?php echo $ayarcek["ayar_analystic"]; ?>" class="form-control" />
                            <label>Maps Api Bilgisi</label>
                            <input type="text" name="ayar_maps" value="<?php echo $ayarcek["ayar_maps"]; ?>" class="form-control" />
                            <label>Zopim Api Bilgisi</label>
                            <input type="text" name="ayar_zopim" value="<?php echo $ayarcek["ayar_zopim"]; ?>" class="form-control" />
                             <br>
                            <button type="submit" name="apiayarkaydet" class="btn btn-primary">Güncelle</button>
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