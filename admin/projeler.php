<?php include 'header.php';

error_reporting(0);

$projelersor = $baglan->prepare("SELECT * FROM projeler");
$projelersor->execute();



?>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Projeler</h2>   
				
			</div>
		</div>
		
		<hr />
		<div align="right"><a href="projeler-ekle.php"><button class="btn btn-success btn-xs">Proje Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Projeler 
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
														<td align="center"><b>Projenin Adı</b></td>
														<td align="center"><b>Proje İçeriği</b></td>
														<td align="center"><b>Proje Dökümanı</b></td>
														<td align="center"><b>Projenin Sahibi</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($projelercek = $projelersor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $projelercek["proje_resimyol"]; ?>"></td>
								<td align="center"><?php echo $projelercek["proje_adi"]; ?></td>
								<td align="center"><?php echo substr($projelercek["proje_icerik"], 0,200); ?></td>
								<td align="center"><?php echo $projelercek["proje_dokumanyol"] ?></td>
								<td align="center"><?php echo $projelercek["proje_sahibi"]; ?></td>
								<td align="center"><?php 

                                                                if ($projelercek["proje_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="projeler-duzenle.php?id=<?php echo $projelercek["proje_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $projelercek["proje_id"];?>&projelersil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
