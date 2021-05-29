   <?php include 'header.php';
      error_reporting(0);


    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Slider Ekleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Slider Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="slider_id">
                            <label>Resim Seç</label>
                             <input type="file" id="first-name"  name="slider_resimyol"  class="form-control">
                            <label>Slider Ad</label>
                            <input type="text" name="slider_ad" class="form-control" placeholder="slider Adı" />
                          <label>Slider Url</label>
                            <input type="text" name="slider_link" placeholder="slider Link" class="form-control" />
                              <label>Slider Sıra</label>
                            <input type="text" name="slider_sira" placeholder="slider Sıra" class="form-control" />
                            <label>Slider Durum</label>
                            <select id="heard" class="form-control" name="slider_durum" required>
                             
                             
                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            </select><br>
                            <button type="submit" name="sliderekle" class="btn btn-primary">Ekle</button>
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