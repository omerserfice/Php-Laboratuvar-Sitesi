   <?php include 'header.php';
      error_reporting(0);

    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Proje Ekleme</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Proje Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="proje_id">
                            <label>Resim Seç</label>
                            <input type="file" id="first-name"  name="proje_resimyol"  class="form-control">
                            
                            <label>Projenin Adı</label>
                            <input type="text" name="proje_adi" class="form-control"/>
                            
                            <label>Proje İçerikleri</label>
                             <textarea class="ckeditor" id="editor1" name="proje_icerik"></textarea>
                <script>
                  CKEDITOR.replace( 'editor1' );
                </script><br>
                             
                            
                            <label>Proje Sahibi</label>
                            <input type="text" name="proje_sahibi" class="form-control"/>
                            
                            <label>Projenin Durumu</label>
                            <select id="heard"  name="proje_durum" class="form-control" required>
                            

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            
                            </select><br>
                            <button type="submit" name="projelerekle" class="btn btn-primary">Ekle</button>
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