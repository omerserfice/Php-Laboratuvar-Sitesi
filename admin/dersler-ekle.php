   <?php include 'header.php';
      error_reporting(0);

    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Ders Ekleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Ders Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="ders_id">
                            <label>Resim Seç</label>
                            <input type="file" id="first-name"  name="dersler_resimyol"  class="form-control">
                            
                            <label>Dersin Adı</label>
                            <input type="text" name="ders_adi" class="form-control"/>
                            
                            <label>Ders İçerikleri</label>
                             <textarea class="ckeditor" id="editor1" name="ders_detay"></textarea>
                <script>
                  CKEDITOR.replace( 'editor1' );
                </script><br>
                             
                            
                            <label>Dersin Hocası</label>
                            <input type="text" name="ders_hoca" class="form-control"/>
                            
                            <label>Dersin Durumu</label>
                            <select id="heard"  name="ders_durum" class="form-control" required>
                            

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            
                            </select><br>
                            <button type="submit" name="derslerekle" class="btn btn-primary">Ekle</button>
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