   <?php include 'header.php';
   error_reporting(0);

   $hakkimizdasor = $baglan->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
   $hakkimizdasor->execute(array(

    'id' => 1

  ));

   $hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);


   ?>




  <!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
         <h3>Hakkımızda</h3>   

       </div>
     </div>

     <hr />
     <div class="row">
      <div class="col-md-12">
       <div class="panel panel-default">
        <div class="panel-heading">
          Genel Bilgiler <?php if ($_GET["state"]=="updatesuccess") { ?>
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
                <label>Hakkımızda Başlığı</label>
                <input type="text" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek["hakkimizda_baslik"]; ?>" class="form-control" />
                <label>Hakkımızda İçerik</label>
                             <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek["hakkimizda_icerik"]; ?></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>
                <label>Hakkımızda Video</label>
                <textarea class="form-control" name="hakkimizda_video"><?php echo $hakkimizdacek["hakkimizda_video"] ?></textarea>
                <label>Hakkımızda Misyon</label>
                <input type="text" name="hakkimizda_misyon" value="<?php echo $hakkimizdacek["hakkimizda_misyon"]; ?>" class="form-control" />
                <label>Hakkımızda Vizyon</label>
                <input type="text" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek["hakkimizda_vizyon"]; ?>" class="form-control" /><br>
                <button type="submit" name="hakkimizdaayarkaydet" class="btn btn-primary">Güncelle</button>
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