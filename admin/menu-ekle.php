   <?php include 'header.php';
      error_reporting(0);


    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Menü Ekleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Menü Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" method="post">

                        <div class="form-group">
                            <input type="hidden" name="menu_id">
                            <label>Menü Ad</label>
                            <input type="text" name="menu_ad" class="form-control" placeholder="Menu Adı" />
                            <label>Menü Detay</label>
                            <textarea class="ckeditor" id="editor1" name="menu_detay" placeholder="Menu Detay"></textarea>
                            <script>
                            CKEDITOR.replace( 'editor1' );
                            </script>
                          <label>Menü Url</label>
                            <input type="text" name="menu_url" placeholder="Menu Url" class="form-control" />
                              <label>Menü Sıra</label>
                            <input type="text" name="menu_sira" placeholder="Menu Sıra" class="form-control" />
                            <label>Menü Durum</label>
                            <select id="heard" class="form-control" name="menu_durum" required>
                             
                             
                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            </select><br>
                            <button type="submit" name="menuekle" class="btn btn-primary">Ekle</button>
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