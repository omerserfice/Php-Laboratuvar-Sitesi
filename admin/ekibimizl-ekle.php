   <?php include 'header.php';
      error_reporting(0);

    ?>


  
   <div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h3>Kişi Ekleme (Lisans)</h3>   

           </div>
       </div>

       <hr />
       <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Kişi Bilgileri 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="../admin/netting/islem.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <input type="hidden" name="ekipl_id">
                            <label>Resim Seç</label>
                            <input type="file" id="first-name"  name="ekipl_resimyol"  class="form-control">
                            
                            <label>Kişi Adı</label>
                            <input type="text" name="ekipl_adsoyad" class="form-control"/>
                            
                            <label>Unvan</label>
                            <input type="text" name="ekipl_unvan" class="form-control"/>

                            <label>Twitter Adresi</label>
                            <input type="text" name="ekipl_twitter" class="form-control"/>

                             <label>Facebook Adresi</label>
                            <input type="text" name="ekipl_facebook" class="form-control"/>
                            
                             <label>Linkedin Adresi</label>
                            <input type="text" name="ekipl_linkedin" class="form-control"/>

                            <label>Ekip Durumu</label>
                            <select id="heard"  name="ekipl_durum" class="form-control" required>
                            

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            
                            </select><br>
                            <button type="submit" name="ekibimizlekle" class="btn btn-primary">Ekle</button>
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