<?php include 'header.php';

error_reporting(0);

$ekibimizsor = $baglan->prepare("SELECT * FROM ekibimiz");
$ekibimizsor->execute();

$ekibimizdsor = $baglan->prepare("SELECT * FROM ekibimiz_doktora");
$ekibimizdsor->execute();

$ekibimizylsor = $baglan->prepare("SELECT * FROM ekibimiz_ylisans");
$ekibimizylsor->execute();

$ekibimizlsor = $baglan->prepare("SELECT * FROM ekibimiz_lisans");
$ekibimizlsor->execute();



?>
<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Ekibimiz</h2>   
				
			</div>
		</div>
		
		<hr />
		<div align="right"><a href="ekibimiz-ekle.php"><button class="btn btn-success btn-xs">Kişi Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Başkan Ekle 
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
														<td align="center"><b>Ad Soyad</b></td>
														<td align="center"><b>Unvan</b></td>
														<td align="center"><b>Twitter Adresi</b></td>
														<td align="center"><b>Facebook Adresi</b></td>
														<td align="center"><b>Linkedin Adresi</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($ekibimizcek = $ekibimizsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $ekibimizcek["ekip_resimyol"]; ?>"></td>
								
								<td align="center"><?php echo $ekibimizcek["ekip_adsoyad"]; ?></td>
								<td align="center"><?php echo $ekibimizcek["ekip_unvan"]; ?></td>
								<td align="center"><?php echo $ekibimizcek["ekip_twitter"]; ?></td>
								<td align="center"><?php echo $ekibimizcek["ekip_facebook"]; ?></td>
								<td align="center"><?php echo $ekibimizcek["ekip_linkedin"]; ?></td>
								<td align="center"><?php 

                                                                if ($ekibimizcek["ekip_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="ekibimiz-duzenle.php?id=<?php echo $ekibimizcek["ekip_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $ekibimizcek["ekip_id"];?>&ekibimizsil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
			<hr />
		<div align="right"><a href="ekibimizd-ekle.php"><button class="btn btn-success btn-xs">Kişi Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Doktora Öğrencileri 
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
														<td align="center"><b>Ad Soyad</b></td>
														<td align="center"><b>Unvan</b></td>
														<td align="center"><b>Twitter Adresi</b></td>
														<td align="center"><b>Facebook Adresi</b></td>
														<td align="center"><b>Linkedin Adresi</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($ekibimizdcek = $ekibimizdsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $ekibimizdcek["ekipd_resimyol"]; ?>"></td>
								
								<td align="center"><?php echo $ekibimizdcek["ekipd_adsoyad"]; ?></td>
								<td align="center"><?php echo $ekibimizdcek["ekipd_unvan"]; ?></td>
								<td align="center"><?php echo $ekibimizdcek["ekipd_twitter"]; ?></td>
								<td align="center"><?php echo $ekibimizdcek["ekipd_facebook"]; ?></td>
								<td align="center"><?php echo $ekibimizdcek["ekipd_linkedin"]; ?></td>
								<td align="center"><?php 

                                                                if ($ekibimizdcek["ekipd_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="ekibimizd-duzenle.php?id=<?php echo $ekibimizdcek["ekipd_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $ekibimizdcek["ekipd_id"];?>&ekibimizdsil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
			<hr />
		<div align="right"><a href="ekibimizyl-ekle.php"><button class="btn btn-success btn-xs">Kişi Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Yüksek Lisans Öğrencileri 
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
														<td align="center"><b>Ad Soyad</b></td>
														<td align="center"><b>Unvan</b></td>
														<td align="center"><b>Twitter Adresi</b></td>
														<td align="center"><b>Facebook Adresi</b></td>
														<td align="center"><b>Linkedin Adresi</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($ekibimizylcek = $ekibimizylsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $ekibimizylcek["ekipyl_resimyol"]; ?>"></td>
								
								<td align="center"><?php echo $ekibimizylcek["ekipyl_adsoyad"]; ?></td>
								<td align="center"><?php echo $ekibimizylcek["ekipyl_unvan"]; ?></td>
								<td align="center"><?php echo $ekibimizylcek["ekipyl_twitter"]; ?></td>
								<td align="center"><?php echo $ekibimizylcek["ekipyl_facebook"]; ?></td>
								<td align="center"><?php echo $ekibimizylcek["ekipyl_linkedin"]; ?></td>
								<td align="center"><?php 

                                                                if ($ekibimizylcek["ekipyl_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="ekibimizyl-duzenle.php?id=<?php echo $ekibimizylcek["ekipyl_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $ekibimizylcek["ekipyl_id"];?>&ekibimizylsil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
			<hr />
		<div align="right"><a href="ekibimizl-ekle.php"><button class="btn btn-success btn-xs">Kişi Ekle</button></a></div><br>
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Lisans Öğrencileri 
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
														<td align="center"><b>Ad Soyad</b></td>
														<td align="center"><b>Unvan</b></td>
														<td align="center"><b>Twitter Adresi</b></td>
														<td align="center"><b>Facebook Adresi</b></td>
														<td align="center"><b>Linkedin Adresi</b></td>
														<td align="center"><b>Durum</b></td>
														<td align="center"><b></b></td>
														<td align="center"><b></b></td>
													</tr>
												</thead>
												<tbody>
													<?php
                                                          $say = 0;


													 while ($ekibimizlcek = $ekibimizlsor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
														
														<tr>
								<td align="center"><?php echo $say; ?></td>
								<td align="center"><img width="200" src="../<?php echo $ekibimizlcek["ekipl_resimyol"]; ?>"></td>
								
								<td align="center"><?php echo $ekibimizlcek["ekipl_adsoyad"]; ?></td>
								<td align="center"><?php echo $ekibimizlcek["ekipl_unvan"]; ?></td>
								<td align="center"><?php echo $ekibimizlcek["ekipl_twitter"]; ?></td>
								<td align="center"><?php echo $ekibimizlcek["ekipl_facebook"]; ?></td>
								<td align="center"><?php echo $ekibimizlcek["ekipl_linkedin"]; ?></td>
								<td align="center"><?php 

                                                                if ($ekibimizlcek["ekipl_durum"]==1) { ?>
                                                                	
                                                                	<button class="btn btn-success btn-xs">Aktif</button>
                                                               <?php }else{ ?>

                                                                       <button class="btn btn-danger btn-xs">Pasif</button>

                                                                 <?php  } ?>
															</td>
        <td align="center"><a href="ekibimizl-duzenle.php?id=<?php echo $ekibimizlcek["ekipl_id"]; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
		<td align="center"><a href="netting/islem.php?id=<?php echo $ekibimizlcek["ekipl_id"];?>&ekibimizlsil=success"><button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button></a></td>
															
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
