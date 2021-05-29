   <?php include 'header.php';

   @include 'fonksiyon.php';

      error_reporting(0);

$menusor = $baglan->prepare("SELECT * FROM menu WHERE menu_id=:id");
 $menusor->execute(array(

    'id' => $_GET["id"]

 ));

  $menucek = $menusor->fetch(PDO::FETCH_ASSOC);

    ?>


   <!-- /. NAV SIDE  -->
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Menü Düzenleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Menü Bilgileri Güncelleme <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                            <input type="hidden" name="menu_id" value="<?php echo $menucek["menu_id"]; ?>">
                            <label>Sayfa Linki</label>
                            <input type="text" name="menu_seourl" disabled="" value="<?php echo $ayarcek["ayar_url"]; ?>/sayfa-<?php echo seo($menucek['menu_ad'])?>" class="form-control" />
                            <label>Menü Ad</label>
                            <input type="text" name="menu_ad" value="<?php echo $menucek["menu_ad"]; ?>" class="form-control" />
                            <label>Menü Detay</label>
                            <textarea class="ckeditor" id="editor1" name="menu_detay"><?php echo $menucek["menu_detay"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>
                          <label>Menü Url</label>
                            <input type="text" name="menu_url" value="<?php echo $menucek["menu_url"]; ?>" class="form-control" />
                              <label>Menü Sıra</label>
                            <input type="text" name="menu_sira" value="<?php echo $menucek["menu_sira"]; ?>" class="form-control" />
                            <label>Menü Durum</label>
                            <select id="heard" class="form-control" name="menu_durum" required>
                              <?php if ($menucek["menu_durum"]==0) { ?>
                                
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              
                                       
                             <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                             <?php } ?> 
                            </select><br>
                            <button type="submit" name="menuduzenle" class="btn btn-primary">Güncelle</button>
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