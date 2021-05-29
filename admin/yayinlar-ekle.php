   <?php include 'header.php';
      error_reporting(0);

    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Yayın Ekleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Yayın Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="yayin_id">
                            <label>Yayınin Adı</label>
                            <input type="text" name="yayin_adi" class="form-control"/>
                            
                            <label>Yayın İçerikleri</label>
                             <textarea class="ckeditor" id="editor1" name="yayin_detay"></textarea>
                <script>
                  CKEDITOR.replace( 'editor1' );
                </script>
                            <label>Yayınin Tarihi</label>
                            <input type="text" name="yayin_tarihi" class="form-control"/>
                            
                            <label>Yayınin Hocası</label>
                            <input type="text" name="yayin_hocasi" class="form-control"/>
                            
                            <label>Yayınin Durumu</label>
                            <select id="heard"  name="yayin_durum" class="form-control" required>
                            

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            
                            </select><br>
                            <button type="submit" name="yayinlarekle" class="btn btn-primary">Ekle</button>
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