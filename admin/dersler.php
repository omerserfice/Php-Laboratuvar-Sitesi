<?php include 'header.php';

error_reporting(0);

$derslersor = $baglan->prepare("SELECT * FROM dersler");
$derslersor->execute();



?>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Dersler</h2>   
				
			</div>
		</div>
		
		<hr />
		<div align="right"><a href="dersler-ekle.php"><button class="btn btn-success btn-xs">Ders Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Dersler 
					</div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								
								<div class="panel panel-default">

									<div class="panel-body">

										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<td align="center"><b>Sıra No</b></td>
					                                    <td align="center"><b>Resim</b></td>
														<td align="center"><b>Dersin Adı</b></td>
														<td align="center"><b>Ders İçeriği</b></td>
														<td align="center"><b>Dersin Hocası</b></td>
														<td align="center"><b>Ders Dökümanları</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($derslercek = $derslersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $derslercek["ders_resimyol"]; ?>"></td>
								<td align="center"><?php echo $derslercek["ders_adi"]; ?></td>
								<td align="center"><?php echo $derslercek["ders_detay"]; ?></td>
								<td align="center"><?php echo $derslercek["ders_hoca"]; ?></td>
								<td align="center"><?php 

                                                                if ($derslercek["ders_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="dersler-duzenle.php?id=<?php echo $derslercek["ders_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $derslercek["ders_id"];?>&derslersil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
														</tr>
													<?php } ?>
													
												</tbody>
											</table>
													
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>


</div>

</div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISslider SCRIPTS -->
<script src="assets/js/jquery.metisslider.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
