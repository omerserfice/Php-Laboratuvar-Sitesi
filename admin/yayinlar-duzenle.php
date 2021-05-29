   <?php include 'header.php';

   @include 'fonksiyon.php';

  error_reporting(0);

$yayinlarsor = $baglan->prepare("SELECT * FROM yayinlar WHERE yayin_id=:id");
 $yayinlarsor->execute(array(

    'id' => $_GET["id"]

 ));

  $yayinlarcek = $yayinlarsor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Yayın Bilgileri Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Yayın Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <input type="hidden" name="yayin_id" value="<?php echo $yayinlarcek["yayin_id"]; ?>">
                            
                            <label>Yayının Adı</label>
                            <input type="text" name="yayin_adi" value="<?php echo $yayinlarcek["yayin_adi"]; ?>" class="form-control" />
                          <br>
                 
              </form>
                       
                            <label>Yayının İçeriği</label>
                             <textarea class="ckeditor" id="editor1" name="yayin_detay"><?php echo $yayinlarcek["yayin_detay"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>
                            <label>Yayının Tarihi</label>
                            <input type="text" name="yayin_tarihi" value="<?php echo $yayinlarcek["yayin_tarihi"] ?>" class="form-control"/>
                            <label>Yayının Hocası</label>
                            <input type="text" name="yayin_hocasi" value="<?php echo $yayinlarcek["yayin_hocasi"]; ?>" class="form-control" />
                            <label>Yayının Durumu</label>
                            <select id="heard" class="form-control" name="yayin_durum" required>
                              <?php if ($yayinlarcek["yayin_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="yayinlarguncelle" class="btn btn-primary">Güncelle</button>
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